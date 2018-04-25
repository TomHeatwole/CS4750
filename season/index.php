<?php
include("../database.php");
?>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="season/season.js"></script>
</head>

<script>document.getElementById("leagues").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <?php
//        include('../database.php'); #This file is in .gitignore
//        include("../config.php");
        if (!isset($_GET['id'])) echo "<script>window.location='/'</script>";
        $leagueId = $_GET['id'];
        $leagueName = $conn->query("SELECT name FROM League WHERE league_id=" . $leagueId);
        $ln = $leagueName->fetch_assoc();
        if (!$ln) {
            echo "<h1>League not found</h1>";
            echo "<a href='../leagues'>List of leagues</a>";
            exit();
        }
        if (!isset($_GET['num'])) echo "<script>window.location='/seasons'</script>";
        $seasonNumber = $_GET['num'];
        $seasonName = $conn->query("SELECT name FROM Season WHERE league_id=" . $leagueId . " AND season_number= " . $seasonNumber);
        $sn = $seasonName->fetch_assoc();
        if (!$sn) {
            echo "<h1>Season not found</h1>";
            echo "<a href='../seasons?id=" . $leagueId . "'>" . $leagueName . "'s Seasons</a>";
            exit();
        }
        $result = $conn->query("SELECT *, s.s_losses - s.s_wins AS difference FROM SeasonRecord s NATURAL JOIN Player p WHERE season_number=" . $seasonNumber . " AND league_id=" . $leagueId . " ORDER BY difference");
        echo "<h1>" . $ln['name'] . "</h1>";
        echo "<h2>" . $sn['name'] . "</h2>";
        echo "<table><tr>";
        echo "<th>Player</th>";
        echo "<th>ELO</th>";
        echo "<th>Wins</th>";
        echo "<th>losses</th>";
        echo "</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . "<a href='../player?username=" . $row['username'] . "'>" . $row['username'] . "</a></td>";
            echo "<td>" . $row['elo'] . "</td>";
            echo "<td>" . $row['s_wins'] . "</td>";
            echo "<td>" . $row['s_losses'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<br><br><a href='../seasons?id=" . $leagueId . "'>Back to list of seasons</a>";
    ?>

    <?php
        $res1 = $conn->query("SELECT username FROM Moderates WHERE league_id='$id' AND username='$name'");
        if ($res1->fetch_assoc()) {
            echo '<br>';
            echo '<br><button id="showEndButton" onclick="showEndSeason()">End Season</button><br>';
            echo '<div id="endSeason" style="display: none;">';
            echo '<h2>End Season</h2>';
            echo 'Winner: <input type="text" id="u1"><br><br>';
            echo '<button onclick="endSeason()">Submit</button><br>';
            echo '</div>';
        echo '<p style="color: red" id="error"></p>';
        }else{
            echo '<p>User Is Not An Admin</p>';
        }
    ?>
       

</div>
