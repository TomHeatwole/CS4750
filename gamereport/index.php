<?php
include("../database.php");
?>
<head>
    <script src="/jquery.js"></script>
    <script type="text/javascript" src="/gamereport/gr.js"></script>
</head>
<script>document.getElementById("gamereport").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <h1>Report Game Reslts</h1>
    <formText style="width: 300px">Opponent username:</formText> <input type="text" id="u2"><br>
    Did you win? 
    <select id="winner">
    <option>Yes</option>
    <option>No</option>
</select></br>
League (If this match was associated with a league): <select id="id" onclick="getSeasons()"><option value="">N/A</option>

<?php
$result = $conn->query("SELECT name, league_id FROM League");
while ($row = $result->fetch_assoc()) echo "<option value='" . $row['league_id'] . "'>" . $row['name'] . "</option>"
?>

</select><br>
Season (If this was a season match): <select id="sn"><option value="">N/A</option></select><br><br>
<button onclick="submit()">Submit</button><br>
<p style="color: red" id="error"></p>
</div>
