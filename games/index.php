<?php
include('../database.php'); #This file is in .gitignore
?>
<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
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
                echo "<td>" . $row['username1'] . "</td>";
                echo "<td>" . $row['username2'] . "</td>";
                echo "<td>" . $row['winner_username'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";

                echo "</tr>";
            }
        ?>
    </table>
</body>
