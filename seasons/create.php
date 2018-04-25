<?php
    include('../database_only.php'); #This file is in .gitignore
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    $ret = "pass";
    $id = $_POST["id"];
    $seasonName = $_POST['u1'];
    $result = $conn->query("SELECT MAX(season_number) FROM Season");
    $row = $result->fetch_row();
    $new = $row[0] + 1;
    $conn->query("INSERT INTO Season (season_number, name, league_id) VALUES ('" . $new . "' ,'" . $seasonName . "', '" . $id . "')");
    $result = $conn->query("SELECT username FROM LeagueRecord WHERE league_id=" . $id);
    while ($player = $result->fetch_assoc())
        $conn->query("INSERT INTO SeasonRecord (username, league_id, season_number) VALUES ('" . $player["username"] . "', " . $id . ", " . $new . ")");
    echo $ret
?>
