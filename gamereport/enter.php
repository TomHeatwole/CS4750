<?php
    include('../database.php'); #This file is in .gitignore
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";
    $name1 = $_POST["u1"];
    $name2 = $_POST["u2"];
    $winner = $_POST["winner"];
    $leagueId = $_POST["league"];
    $seasonNumber = $_POST["season"];
    if ($name1 == $name2) $ret = "You can't play against yourself";
    if ($seasonNumber != "") {
        $testSeason = $conn->query("SELECT * FROM Season WHERE league_id=" . $leagueId . " AND season_number=" . $seasonNumber);
        if (!$testSeason->fetch_assoc()) $ret = "Season not found in specified league";
    }

    $lw1 = 0; // league wins
    $lw2 = 0; 
    $ll1 = 0; // league losses
    $ll2 = 0;
    $sw1 = 0; // season wins
    $sw2 = 0;
    $sl1 = 0; // season losses
    $sl2 = 0;
    if ($leagueId != "") {
        $testLeagueName2 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
        $testLeagueName1 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
        $testLeague = $conn->query("SELECT * From League WHERE league_id=". $leagueId);
        if (!$testLeagueName2->fetch_assoc()) $ret ="Username: " . $name2 . " is not in specified league.";
        else  {
            $leagueRecord2 = $conn->query("SELECT l_wins, l_losses FROM LeagueRecord WHERE league_id=" . $leagueId . " AND username='" . $name2 . "'");
            $lr2 = $leagueRecord2->fetch_assoc();
            $lw2 = $lr2["l_wins"];
            $ll2 = $lr2["l_losses"];
            if ($seasonNumber != "" && $ret=="pass") {
                $seasonRecord2 = $conn->query("SELECT s_wins, s_losses FROM SeasonRecord WHERE league_id='" .$leagueId . "' AND username='" . $name2 . "' AND season_number='" . $seasonNumber . "'");
                $sr2 = $seasonRecord2->fetch_assoc();
                $sw2 = $sr2["s_wins"];
                $sl2 = $sr2["s_losses"];
            }
        }
        if (!$testLeagueName1->fetch_assoc()) $ret ="Username: " . $name1 . " is not in specified league.";
        else {
            $leagueRecord1 = $conn->query("SELECT l_wins, l_losses FROM LeagueRecord WHERE league_id='" . $leagueId . "' AND username='" . $name1 . "'");
            $lr1 = $leagueRecord1->fetch_assoc();
            $lw1 = $lr1["l_wins"];
            $ll1 = $lr1["l_losses"];
            if ($seasonNumber != "" && $ret=="pass") {
                $seasonRecord1 = $conn->query("SELECT s_wins, s_losses FROM SeasonRecord WHERE league_id='" .$leagueId . "' AND username='" . $name1 . "' AND season_number='" . $seasonNumber . "'");
                $sr1 = $seasonRecord1->fetch_assoc();
                $sw1 = $sr1["s_wins"];
                $sl1 = $sr1["s_losses"];
            }
        }
        if (!$testLeague->fetch_assoc()) $ret ="League not found.";
    }
    $testName1 = $conn->query("SELECT elo, wins, losses FROM Player WHERE username='" . $name1 . "'");
    $testName2 = $conn->query("SELECT elo, wins, losses FROM Player WHERE username='" . $name2 . "'");
    $tn1 = $testName1->fetch_assoc();
    $tn2 = $testName2->fetch_assoc();
    $elo1 = $tn1["elo"];
    $elo2 = $tn2["elo"];
    $w1 = $tn1["wins"];
    $l1 = $tn1["losses"];
    $w2 = $tn2["wins"];
    $l2 = $tn2["losses"];
    if (!$elo2) $ret ="Username: " . $name2 . " not found.";
    if (!$elo1) $ret ="Username: " . $name1 . " not found.";
    if ($ret == "pass") {
        // CALCULATE ELO:
        // Using elo algorithm from this website:
        // http://gobase.org/studying/articles/elo/
        // New rating = old rating + 40 * (expected score)
        $eloDiff = abs($elo1 - $elo2);
        $expectedScore = 0.5;
        if ($eloDiff > 20 && $eloDiff <= 40) $expectedScore = 0.53;
        else if ($eloDiff > 40 && $eloDiff <= 60) $expectedScore = 0.58;
        else if ($eloDiff > 60 && $eloDiff <= 80) $expectedScore = 0.62;
        else if ($eloDiff > 80 && $eloDiff <= 100) $expectedScore = 0.66;
        else if ($eloDiff > 100 && $eloDiff <= 120) $expectedScore = 0.69;
        else if ($eloDiff > 120 && $eloDiff <= 140) $expectedScore = 0.73;
        else if ($eloDiff > 140 && $eloDiff <= 160) $expectedScore = 0.76;
        else if ($eloDiff > 160 && $eloDiff <= 180) $expectedScore = 0.79;
        else if ($eloDiff > 180 && $eloDiff <= 200) $expectedScore = 0.82;
        else if ($eloDiff > 200 && $eloDiff <= 300) $expectedScore = 0.87;
        else if ($eloDiff > 300 && $eloDiff <= 400) $expectedScore = 0.93;
        else if ($eloDiff > 400) $expectedScore = 0.97;
        if ($winner == $name1 && $elo1 > $elo2) $expectedScore = 1 - $expectedScore;
        else if ($winner == $name2 && $elo2 > $elo1) $expectedScore = 1 - $expectedScore;
        $eloChange = round($expectedScore * floatval(40.0));
        $newElo1 = $elo1;
        $newElo2 = $elo2;
        if ($winner == $name1) {
            $newElo1 += $eloChange;
            $newElo2 -= $eloChange;
            $w1++;
            $lw1++;
            $sw1++;
            $l2++;
            $ll2++;
            $sl2++;
        } else {
            $newElo1 -= $eloChange;
            $newElo2 += $eloChange;
            $w2++;
            $lw2++;
            $sw2++;
            $l1++;
            $ll1++;
            $sl1++;
        }
        $conn->query("INSERT INTO Game (username1, username2, winner_username) VALUES ('" . $name1 . "', '" . $name2 . "', '" . $winner . "')");
        $conn->query("UPDATE Player SET elo=" . $newElo1 . ", wins=" . $w1 . ", losses=" . $l1 . " WHERE username='" . $name1 . "'");
        $conn->query("UPDATE Player SET elo=" . $newElo2 . ", wins=" . $w2 . ", losses=" . $l2 . " WHERE username='" . $name2 . "'");
        if ($leagueId != "") {
            $conn->query("UPDATE LeagueRecord SET l_wins=" . $lw1 . ", l_losses=" . $ll1 . " WHERE username='" . $name1 . "' AND league_id='" . $leagueId . "'");
            $conn->query("UPDATE LeagueRecord SET l_wins=" . $lw2 . ", l_losses=" . $ll2 . " WHERE username='" . $name2 . "' AND league_id='" . $leagueId . "'");
        } if ($seasonNumber != "") {
            $conn->query("UPDATE SeasonRecord SET s_wins=" . $sw1 . ", s_losses=" . $sl1 . " WHERE username='" . $name1 . "' AND league_id='" . $leagueId . "' AND season_number=" . $seasonNumber);
            $conn->query("UPDATE SeasonRecord SET s_wins=" . $sw2 . ", s_losses=" . $sl2 . " WHERE username='" . $name2 . "' AND league_id='" . $leagueId . "' AND season_number=" . $seasonNumber);
        }
    }
    echo $ret; 

?>
