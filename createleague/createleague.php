<?php
include("../database_only.php"); // To connect to the database

/*$conn->query("INSERT INTO League(name) VALUES ('$_POST[name]')");
$leagueId = $conn->query("SELECT league_id FROM League ORDER BY league_id DESC");
$id = $leagueId->fetch_assoc()["league_id"];
$Admin="INSERT INTO Admin (username, phone_number)
    VALUES
    ('$_POST[username]','$_POST[phone_number]')";
$conn->query("INSERT INTO Moderates (username, league_id) VALUES ('$_POST[username]', '$id')");
$conn->query($Admin);

echo "Records added"; // Output to user
mysqli_close($con);*/
echo "league gets created here";
?> 

