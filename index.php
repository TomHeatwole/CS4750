<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
        include('database.php'); #This file is in .gitignore
        include("config.php");
        echo "<h1>Elo League Tracker</h1>";
        echo "<h2><a href = '/leagues'>All Leagues</a></h2>";
        echo "<h2><a href = '/players'>All Players</a></h2>";
        echo "<h2><a href = '/games'>All Games</a></h2>";
        echo "<h2><a href = '/gamereport'>Game Report</a></h2>";

    ?>
</body>
