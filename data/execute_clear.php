<?php
session_start();
include('../database_only.php'); #This file is in .gitignore

$tables = ["Admin", "Game", "League", "LeagueRecord", "Moderates", "Player", "Requests", "Season", "SeasonRecord"];

for ($i = 0; $i < 10; $i++) {
    $table = $tables[$i];
    $conn->query("DELETE FROM $table");
}
$conn->query("DELETE FROM $user WHERE username!='god'");
?>
