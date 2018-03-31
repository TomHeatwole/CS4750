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
        $result = $conn->query("SELECT s.season_number, s.league_id, s.name, w.username FROM Season s LEFT JOIN SeasonWinner w ON s.season_number=w.season_number AND s.league_id = w.league_id WHERE s.league_id=" . $leagueId . " ORDER BY s.season_number DESC");
        echo "<h1>". $ln['name'] . "'s Seasons</h1>";
        echo "<table><tr>";
        echo "<th>Name</th>";
        echo "<th>Winner</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><a href='../season?id=" . $leagueId . "&num=" . $row['season_number'] . "'>" . $row['name'] . "</a></td>";
            echo "<td>" . (($row['username']) ? "<a href='../player?username=" . $row['username'] . "'>" . $row['username'] . "</a>" : "TBD") . "</td>";
            echo "</tr>";
        }

    ?>
</body>