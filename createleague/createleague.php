<?php
include("../database.php"); // To connect to the database
include("../config.php");
$conn = mysqli_connect($host, $username, $password, $database);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Form the SQL query (an INSERT query)
$conn->query("INSERT INTO League(name) VALUES ('$_POST[name]')");
$leagueId = $conn->query("SELECT league_id FROM League ORDER BY league_id DESC");
$id = $leagueId->fetch_assoc()["league_id"];
$Admin="INSERT INTO Admin (username, phone_number)
    VALUES
    ('$_POST[username]','$_POST[phone_number]')";
$conn->query("INSERT INTO Moderates (username, league_id) VALUES ('$_POST[name]', '$id')");

echo "Records added"; // Output to user
mysqli_close($con);
?> 
