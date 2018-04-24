<?php
session_start();
include('database.php'); #This file is in .gitignore
include("config.php");


if(!$_SESSION["username"]==""){
    echo "<h2>User: " . $_SESSION["username"] . "</h2>";
}
else{
    echo "No one is logged in";
}
echo "<h1>Elo League Tracker</h1>";
echo "<h2><a href = '/leagues'>All Leagues</a></h2>";
echo "<h2><a href = '/players'>All Players</a></h2>";
echo "<h2><a href = '/games'>All Games</a></h2>";
echo "<h2><a href = '/gamereport'>Game Report</a></h2>";

?>

