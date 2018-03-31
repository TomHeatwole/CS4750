<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");
        if (!isset($_GET['id'])) header("Location: ../leagues/");
        $leagueId = $_GET['id'];
        $conn = mysqli_connect($host, $username, $password, $database);
        $leagueName = $conn->query("SELECT name FROM League WHERE league_id=" . $leagueId);
        $ln = $leagueName->fetch_assoc();
        if (!$ln) {
            echo "<h1>League not found</h1>";
            echo "<a href='../leagues'>List of leagues</a>";
            exit();
        }
        echo "<h1>". $ln['name'] . "</h1>";
        echo "<table><tr>";
        echo "<th>Player</th>";
        echo "<th>ELO</th>";
        echo "<th>League Record</th>";
        $result = $conn->query("SELECT *, l.l_losses - l.l_wins AS difference FROM BelongsTo b NATURAL JOIN LeagueRecord  l NATURAL JOIN Player p WHERE league_id=" . $leagueId . " ORDER BY difference");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['elo'] . "</td>";
            echo "<td>" . $row['l_wins'] . " - " . $row["l_losses"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>
