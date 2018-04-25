<?php
    include('../database_only.php'); #This file is in .gitignore
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";
    $result = $conn->query("UPDATE Season SET season_winner ='" . $_POST["winner"] ."' WHERE season_number = " . $_POST["sn"] . " AND league_id = " . $_POST["leagueId"]);
    // Old Schema:
    // $conn->query("INSERT INTO SeasonWinner (season_number, username, league_id) VALUES (" . $_POST["sn"] . ", '" . $_POST["winner"] . "'," . $_POST["leagueId"] . ")");

    echo $ret;
?>
