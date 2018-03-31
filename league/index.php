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
    ?>
    <table>
        <!-- TODO: League data -->
    </table>
</body>
