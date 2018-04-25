<?php
include('../database.php'); #This file is in .gitignore
?>
<script>document.getElementById("games").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <h1> Games </h1>
    <table>
        <tr>
            <th>Game</th>
            <th>First Player</th>
            <th>Second Player</th>
            <th>Winner</th>
            <th>Date</th>
            <th>Score</th>
        <tr>
        <?php
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM Game ORDER BY date DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='../game?id=" . $row['game_id'] . "'>" . "Game " . $row['game_id'] . "</a></td>";
                echo "<td>" . $row['username1'] . "</td>";
                echo "<td>" . $row['username2'] . "</td>";
                echo "<td>" . $row['winner_username'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['score'] . "</td>";

                echo "</tr>";
            }
        ?>
    </table>
</div>
