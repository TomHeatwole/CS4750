<?php
    include('../database.php'); #This file is in .gitignore
?>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="seasons/sn.js"></script>
</head>

<script>document.getElementById("leagues").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <?php
//        include('../database.php'); #This file is in .gitignore
//        include("../config.php");
        if (!isset($_GET['id'])) echo "<script>window.location='/'</script>";
        $leagueId = $_GET['id'];
        $conn = mysqli_connect($host, $username, $password, $database);
        $leagueName = $conn->query("SELECT name FROM League WHERE league_id=" . $leagueId);
        $ln = $leagueName->fetch_assoc();
        if (!$ln) {
            echo "<h1>League not found</h1>";
            echo "<a href='../leagues'>List of leagues</a>";
            exit();
        }
        $result = $conn->query("SELECT * FROM Season WHERE league_id=" . $leagueId . " ORDER BY season_number DESC");
        echo "<h1>". $ln['name'] . "'s Seasons</h1>";
        echo "<table><tr>";
        echo "<th>Name</th>";
        echo "<th>Winner</th>";
        echo "</tr>";
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><a href='../season?id=" . $leagueId . "&num=" . $row['season_number'] . "'>" . $row['name'] . "</a></td>";
                echo "<td>" . (($row['season_winner']) ? "<a href='../player?username=" . $row['season_winner'] . "'>" . $row['season_winner'] . "</a>" : "TBD") . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else{
            echo "</table>";
            echo "No seasons exist";
        }
            
        ?>
        <?php
        $res1 = $conn->query("SELECT username FROM Moderates WHERE league_id='$leagueId' AND username='$name'");
        if ($res1->fetch_assoc()) {
            echo '<br>';
            echo '<br><button id="showCreateSeasonButton" onclick="createNewSeason()">Create New Season</button><br>';
            echo '<div id="createSeason" style="display: none;">';
            echo '<h2>Create New Season</h2>';
            echo 'Enter New Season Name: <input type="text" id="u1"><br><br>';
            echo '<button onclick="create()">Submit</button><br>';
            echo '</div>';
        }
        ?>
       
        <p style="color: red" id="error"></p>
    <?php
        echo "<br><br><a href='../league?id=" . $leagueId . "'>Back to League</a>";
    ?>
</div>
