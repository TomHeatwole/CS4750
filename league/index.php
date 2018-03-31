<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");
        if (!isset($_GET['id'])) header("Location: ../leagues/");
        $leagueId = $_GET['id'];
    ?>
    <table>
        <!-- TODO: League data -->
    </table>
</body>
