<?php
    include('../database.php'); #This file is in .gitignore
?>
<script>document.getElementById("games").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <?php
//       include('../database.php'); #This file is in .gitignore
//       include("../config.php");
        if (!isset($_GET['id'])) header("Location: ../games/");
        $usrname = $_GET['id']; #Note difference between database variable: username and query param: usrname
        $conn = mysqli_connect($host, $username, $password, $database);
        $result = $conn->query("SELECT * FROM Game WHERE game_id=" . $usrname);
        $gameData = $result->fetch_assoc();
        if (!$gameData) {
            echo "<h1>Game: " . $usrname . " not found</h1>";
            echo "<a href='../games'>List of Games</a>";
            exit();
        }
        echo "<h1>Game #". $usrname . "</h1>";
        echo "<b>First Player:</b> " . $gameData['username1'] . "</br>";
        echo "<b>Second Player:</b> " . $gameData['username2'] . "</br>";
        echo "<b>Winner:</b> " . $gameData['winner_username'] . "</br>";
        echo "<b>Date:</b> " . $gameData['date'] . "</br>";
        echo "<b>Score:</b> " . $gameData['score'] . "</br>";
        echo "<br>";

        echo "<a href='../games'>List of all Games</a>";
    ?>
</div>
