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
$result = $conn->query("SELECT * FROM League NATURAL JOIN LeagueRecord NATURAL JOIN Player WHERE username='" . $_SESSION["username"] . "'");
$result2 = $conn->query("SELECT * FROM Game WHERE username1='" . $_SESSION["username"] . "' OR username2='" . $_SESSION["username"] . "' ORDER BY game_id DESC");
echo "<h3>Your Leagues</h3>";
if (mysqli_num_rows($result) > 0) {
    echo "<table id='leagues'><tr>";
    echo "<th>Name</th>";
    echo "<th>Wins</th>";
    echo "<th>Losses</th>";

    echo "</tr>";
    while($row = $result->fetch_assoc())
    {


        echo "<tr>";

        echo "<td><a href='/league?id=" . $row["league_id"] . "'>" . $row['name'] . "</a></td>";
        echo "<td>" . $row['l_wins'] . "</td>";
        echo "<td>" . $row['l_losses'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
} else echo "<i>You are not a member of any leagues</i>";

echo "<br><br><h3>Your Games</h3>";
if (mysqli_num_rows($result2) > 0) {
    echo "<table><tr>";
    echo "<th>Game ID</th>";
    echo "<th>Opponent</th>";
    echo "<th>Result</th>";
    echo "</tr>";

    while($row = $result2->fetch_assoc())
    {
        $gameResult = ($name === $row['winner_username']) ? "W" : "L";
        $opponent = ($name == $row['username1']) ? $row['username2'] : $row['username1'];
        echo "<tr>";
        echo "<td><a href='/game?id=" . $row["game_id"] . "'>" . $row['game_id'] . "</td>";
        echo "<td><a href='/player?username=" . $opponent . "'>" . $opponent . "</td>";
        echo "<td><b>" . $gameResult . "</b></td>";

        echo "</tr>";
    }
    echo "</table>";
} else echo "<i>You have not played any games</i>";
?>



</div>
