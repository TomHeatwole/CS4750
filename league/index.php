<?php
    include('../database.php'); #This file is in .gitignore
?>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/league/lg.js"></script>
</head>

<script>document.getElementById("leagues").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
<?php
//        include("../config.php");
        if (!isset($_GET['id'])) {
            echo "<script>window.location='/leagues'</script>";
        }
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
        echo "</tr>";
        $result = $conn->query("SELECT *, l.l_losses - l.l_wins AS difference FROM LeagueRecord  l NATURAL JOIN Player p WHERE league_id=" . $leagueId . " ORDER BY difference");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . "<a href='../player?username=" . $row['username'] . "'>" . $row['username'] . "</a></td>";
            echo "<td>" . $row['elo'] . "</td>";
            echo "<td>" . $row['l_wins'] . " - " . $row["l_losses"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        $requests = $conn->query("SELECT * FROM Requests WHERE league_id=" . $leagueId);
        echo "<div style='display: none' id='reqListDiv'>";
        echo "<h1>Requests</h1>";
        echo "<table id='reqList'><tr>";
        echo "<th>Player</th>";
        echo "<th>Accept</th>";
        echo "<th>Decline</th>";
        echo "</tr>";
        while ($row = $requests->fetch_assoc()) {
            echo "<tr id='" . $row["username"] . "ROW'>";
            echo "<td>" . "<a href='../player?username=" . $row['username'] . "'>" . $row['username'] . "</a></td>";
            ?>
            <td><button id = "<?php echo $row['username']; ?>" type = 'Button' onclick = "accept(this.id)">Accept</button></td>
            <td><button id = "<?php echo $row['username']; ?>" type = 'Button' onclick = "decline(this.id)">Decline</button></td>
            <?php
            echo "</tr>";
        }

        echo "</table></div>";
        echo "<br><br><a href='../seasons?id=" . $leagueId . "'>" . $ln['name'] . "'s Seasons</a>";
        echo "<br><br><button id='req' onclick='request()' style='display: none'>Request to join</button>";
        echo "<br><br><a href='../leagues/'>Back to Leagues</a>";
    ?>
</div>

