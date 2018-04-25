<?php
    include('../database.php'); #This file is in .gitignore
?>
<script>document.getElementById("players").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <?php
//        include('../database.php'); #This file is in .gitignore
//        include("../config.php");
        if (!isset($_GET['username'])) header("Location: ../players/");
        $usrname = $_GET['username']; #Note difference between database variable: username and query param: usrname
        $conn = mysqli_connect($host, $username, $password, $database);
        $result = $conn->query("SELECT * FROM Player NATURAL JOIN User NATURAL JOIN LeagueRecord WHERE username='" . $usrname . "'");
        $playerData = $result->fetch_assoc();
        if (!$playerData) {
            echo "<h1>Player: " . $usrname . " not found</h1>";
            echo "<a href='../players'>List of players</a>";
            exit();
        }      
        echo "<h1>". $usrname . "</h1>";
        echo "<b>ELO:</b> " . $playerData['elo'] . "</br>";
        echo "<b>Name:</b> " . $playerData['first_name'] . " " . $playerData['last_name'] . "</br>";
        echo "<b>Email:</b> " . $playerData['email'] . "</br>";
        echo "<b>League:</b> ";
        echo $playerData['league_id'];
        while ($row = $result->fetch_assoc()) {
            echo ", " . $row['league_id'];
        }
        echo "<br>";
        echo "<br><br><a href='../players/'>List of Players</a>";
    ?>
</div>
