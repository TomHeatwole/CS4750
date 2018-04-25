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
        <tr>
        <?php
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM Game");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='../game?id=" . $row['game_id'] . "'>" . "Game " . $row['game_id'] . "</a></td>";
                echo "<td><a href='../player?username=" . $row['username1'] . "'>" . $row['username1'] . "</a></td>";
                echo "<td><a href='../player?username=" . $row['username2'] . "'>" . $row['username2'] . "</a></td>";
                echo "<td><a href='../player?username=" . $row['winner_username'] . "'>" . $row['winner_username'] . "</a></td>";
                echo "<td>" . $row['date'] . "</td>";

                echo "</tr>";
            }
        ?>
    </table>
</div>
