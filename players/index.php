<?php
include("../database.php");
?>

<script>document.getElementById("players").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <h1> Players </h1>
    <table>
        <tr>
            <th>Username</th>
            <th>ELO</th>
            <th>Wins</th>
            <th>Losses</th>
        <tr>
        <?php
//            include('../database.php'); #This file is in .gitignore
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM Player ORDER BY elo DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='../player?username=" . $row['username'] . "'>" . $row['username'] . "</a></td>";
                echo "<td>" . $row['elo'] . "</td>";
                echo "<td>" . $row['wins'] . "</td>";
                echo "<td>" . $row['losses'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br><br><br><a href="/data/player.php"> Export Player Data </a>
</div>
