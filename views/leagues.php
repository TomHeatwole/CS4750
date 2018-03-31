<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <h1> Leagues </h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Admin</th>
            <th># of Players</th>
        <tr>
        <?php
            include('../setup.php'); #This file is in .gitignore
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM League NATURAL JOIN Moderates");
            while ($row = $result->fetch_assoc()) {
                $playerData = $conn->query("SELECT COUNT(username), AVG(elo) FROM BelongsTo NATURAL JOIN Player WHERE league_id=" . $row['league_id'] ." GROUP BY league_id");
                $pd = $playerData->fetch_assoc();
                if (!$pd['COUNT(username)']) $pd['COUNT(username)'] = 0;
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $pd['COUNT(username)'] . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
