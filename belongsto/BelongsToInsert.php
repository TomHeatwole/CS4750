<?php
    include("../database.php"); // To connect to the database
    include("../config.php");
    $conn = mysqli_connect($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $conn->query("INSERT INTO Requests (username, league_id) VALUE ('$_POST[username]','$_POST[leagueID]')");
    $conn->query("INSERT INTO LeagueRecord (username, league_id) VALUE ('$_POST[username]','$_POST[leagueID]')");

    echo "Request made"; // Output to user
    mysqli_close($con);
?> 
