<?php
    include('../database.php'); #This file is in .gitignore
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";

    $username = $_POST["username"];
    $league_id = $_POST["id"];

    // if ($seasonNumber != "") {
    //     $testSeason = $conn->query("SELECT * FROM Season WHERE league_id=" . $leagueId . " AND season_number=" . $seasonNumber);
    //     if (!$testSeason->fetch_assoc()) $ret = "Season not found in specified league";
    // }

    // if ($leagueId != "") {
    //     $testLeagueName2 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
    //     $testLeagueName1 = $conn->query("SELECT * FROM BelongsTo WHERE username='" . $name1 . "' AND league_id=" . $leagueId);
    //     $testLeague = $conn->query("SELECT * From League WHERE league_id=". $leagueId);
    //     if (!$testLeagueName2->fetch_assoc()) $ret ="Username: " . $name2 . " is not in specified league.";
    //     if (!$testLeagueName1->fetch_assoc()) $ret ="Username: " . $name1 . " is not in specified league.";
    //     if (!$testLeague>fetch_assoc()) $ret ="League not found.";
    // }
    // $testName1 = $conn->query("SELECT elo FROM Player WHERE username='" . $name1 . "'");
    // $testName2 = $conn->query("SELECT elo FROM Player WHERE username='" . $name2 . "'");
    // $elo1 = $testName1->fetch_assoc();
    // $elo2 = $testName2->fetch_assoc();
    // if (!$elo1) $ret ="Username: " . $name2 . " not found.";
    // if (!$elo2) $ret ="Username: " . $name1 . " not found.";
    // if ($ret == "pass") {
    //     // TODO: Update record and elo
    //     if ($leagueId == "") {
    //         $conn->query("INSERT INTO Game (username1, username2, winner_username) VALUES ('" . $name1 . "', '" . $name2 . "', '" . $winner . "')");
    //     } else if ($seasonNumber = "") {
    //         // TODO
    //     } else {
    //         // TODO
    //     }
    // }
    $conn->query("INSERT INTO BelongsTo (username, league_id) VALUES ('" . $username . "', '" . $league_id . "')");
    $conn->query("INSERT INTO LeagueRecord (league_id, username, l_wins, l_losses) VALUES ('" . $league_id . "', '" . $username . "', 0, 0)");
    $conn->query("DELETE FROM Requests WHERE username = '" . $username . "' AND league_id = '" . $league_id . "'");
    echo $ret
?>