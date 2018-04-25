<?php
session_start();
include('database.php'); #This file is in .gitignore
?>
<div id="inner" style="margin-left: 35%; text-align: left">
<script>document.getElementById("home").classList.add("active");</script>

<?php
if($_SESSION["username"]){
	echo "<h1>Hello, " . $_SESSION["username"] . "</h2>";
}
$conn = mysqli_connect($host, $username, $password, $database);
$result = $conn->query("SELECT * FROM LeagueRecord NATURAL JOIN Player WHERE username='" . $_SESSION["username"] . "'");
$result2 = $conn->query("SELECT * FROM Game WHERE username1='" . $_SESSION["username"] . "' OR username2='" . $_SESSION["username"] . "'");
echo "<h3>List of Leagues for " . $_SESSION["username"] . "</h3>";
echo "<table><tr>";
        echo "<th>League ID</th>";
        echo "<th>Wins</th>";
        echo "<th>Losses</th>";

        echo "</tr>";
while($row = $result->fetch_assoc())
{
	echo "<tr>";

   echo "<td>" . $row['league_id'] . "</td>";
   echo "<td>" . $row['l_wins'] . "</td>";
   echo "<td>" . $row['l_losses'] . "</td>";

   echo "</tr>";
}
echo "</table>";
echo "<h3>List of Games for " . $_SESSION["username"] . "</h3>";
echo "<table><tr>";
        echo "<th>Game ID</th>";
        echo "<th>Player 1</th>";
        echo "<th>Player 2</th>";
        echo "<th>Winner</th>";
        echo "</tr>";
while($row = $result2->fetch_assoc())
{
	echo "<tr>";
	echo "<td>" . $row['game_id'] . "</td>";
   echo "<td>" . $row['username1'] . "</td>";
   echo "<td>" . $row['username2'] . "</td>";
   echo "<td>" . $row['winner_username'] . "</td>";

   echo "</tr>";
}
echo "</table>";
?>



</div>
