<?php
    include('../database_only.php'); #This file is in .gitignore
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";
    $conn->query("INSERT INTO SeasonWinner (season_number, username, league_id) VALUES (" . $_POST["sn"] . ", '" . $_POST["winner"] . "'," . $_POST["leagueId"] . ")");
    echo $ret
?>
