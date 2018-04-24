<?php
include("../database.php");
?>
<div id="inner" style="margin-left: 35%; text-align: left">
    <h1> Leagues </h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Admin</th>
            <th># of Players</th>
            <th>Average ELO</th>
        <tr>
        <?php
//            include('../database.php');
            $conn = mysqli_connect($host, $username, $password, $database);
            $result = $conn->query("SELECT * FROM League NATURAL JOIN Moderates");
            while ($row = $result->fetch_assoc()) {
                $playerData = $conn->query("SELECT COUNT(username), AVG(elo) FROM LeagueRecord NATURAL JOIN Player WHERE league_id=" . $row['league_id'] ." GROUP BY league_id");
                $pd = $playerData->fetch_assoc();
                if (!$pd['COUNT(username)']) $pd['COUNT(username)'] = 0;
                if (!$pd['AVG(elo)']) $pd['AVG(elo)'] = 'N/A';
                echo "<tr>";
                echo "<td><a href='../league?id=" . $row['league_id'] . "'>" . $row['name'] . "</a></td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $pd['COUNT(username)'] . "</td>";
                echo "<td>" . round($pd['AVG(elo)']) . "</td>";
                echo "</tr>";
            }
        ?>
    </table>
</div>
