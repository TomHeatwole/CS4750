<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <h1> Players </h1>
    <table>
        <tr>
            <th>Username</th>
            <th>ELO</th>
            <th>Wins</th>
            <th>Losses</th>
        <tr>
        <?php
            include('../database.php'); #This file is in .gitignore
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM Player");
            while ($row = $result->fetch_assoc()) {
                // $playerData = $conn->query("SELECT COUNT(username), AVG(elo) FROM BelongsTo NATURAL JOIN Player WHERE league_id=" . $row['league_id'] ." GROUP BY league_id");
                // $pd = $playerData->fetch_assoc();
                // if (!$pd['COUNT(username)']) $pd['COUNT(username)'] = 0;
                // if (!$pd['AVG(elo)']) $pd['AVG(elo)'] = 'N/A';
                echo "<tr>";
                echo "<td><a href='../player?id=" . $row['username'] . "'>" . $row['username'] . "</a></td>";
                echo "<td>" . $row['elo'] . "</td>";
                echo "<td>" . $row['wins'] . "</td>";
                echo "<td>" . $row['losses'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>