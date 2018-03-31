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
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . "placeholder" . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
