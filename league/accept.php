<?php
    include('../database_only.php'); #This file is in .gitignore
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";
    $username = $_POST["username"];
    $league_id = $_POST["id"];
    $conn->query("INSERT INTO LeagueRecord (league_id, username, l_wins, l_losses) VALUES ('" . $league_id . "', '" . $username . "', 0, 0)");
    /*
    $conn->query("DELETE FROM Requests WHERE username = '" . $username . "' AND league_id = '" . $league_id . "'");
    */
    echo $ret
?>
