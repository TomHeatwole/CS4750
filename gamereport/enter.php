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
    if ($seasonNumber != "") {
        $testSeason = $conn->query("SELECT * FROM Season WHERE league_id=" . $leagueId . " AND season_number=" . $seasonNumber);
        if (!$testSeason->fetch_assoc()) $ret = "Season not found in specified league";
    }

    if ($leagueId != "") {
        $testLeagueName2 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
        $testLeagueName1 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
        $testLeague = $conn->query("SELECT * From League WHERE league_id=". $leagueId);
        if (!$testLeagueName2->fetch_assoc()) $ret ="Username: " . $name2 . " is not in specified league.";
        if (!$testLeagueName1->fetch_assoc()) $ret ="Username: " . $name1 . " is not in specified league.";
        if (!$testLeague>fetch_assoc()) $ret ="League not found.";
    }
    $testName1 = $conn->query("SELECT elo FROM Player WHERE username='" . $name1 . "'");
    $testName2 = $conn->query("SELECT elo FROM Player WHERE username='" . $name2 . "'");
    $elo1 = $testName1->fetch_assoc()["elo"];
    $elo2 = $testName2->fetch_assoc()["elo"];
    if (!$elo1) $ret ="Username: " . $name2 . " not found.";
    if (!$elo2) $ret ="Username: " . $name1 . " not found.";
    if ($ret == "pass") {
        // CALCULATE ELO:
        // Using elo algorithm from this website:
        // http://gobase.org/studying/articles/elo/
        // New rating = old rating + C * (expected score)
        $C = 40.0;
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
        if ($winner == $username1 && $elo1 > $elo2) $expectedScore = 1 - $expectedScore;
        echo floatval($C);
        $eloChange = round(number_format(40.0,1) * $expectedSCore);
        $newElo1 = $elo1;
        $newElo2 = $elo2;
        if ($winner == $username1) {
            $newElo1 += $eloChange;
            $newElo2 -= $eloChange;
        } else {
            $newElo1 -= $eloChange;
            $newElo2 += $eloChange;
        }
        //$conn->query("INSERT INTO Game (username1, username2, winner_username) VALUES ('" . $name1 . "', '" . $name2 . "', '" . $winner . "')");
        $conn->query("UPDATE Player SET elo=" . $newElo1 . " WHERE username=" . $username1);
        $conn->query("UPDATE Player SET elo=" . $newElo2 . " WHERE username=" . $username2);
        if ($leagueId != "") {
            
        } if ($seasonNumber != "") {
        }
    }
    echo $ret . $eloChange;
?>
