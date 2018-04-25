<?php
include("../database.php");
?>
<head>
    <script src="/jquery.js"></script>
    <script type="text/javascript" src="/gamereport/gr.js"></script>
</head>
<script>document.getElementById("gamereport").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <h1>Report Game Results</h1>
    <div style="display: table"><div style="display: table-row">
        <div style="display: table-cell">
            Opponent username:  &nbsp; <br><br>
            Did you win?  &nbsp; <br><br>
            League:  &nbsp; <br><br>
            Season:  &nbsp; 
        </div>
        <div style="margin-left: 20px; display: table-cell">
            <input type="text" id="u2"><br><br>
            <select id="winner">
                <option>Yes</option>
                <option>No</option>
            </select></br><br>
            <select id="id" onclick="getSeasons()"><option value="">N/A</option>

<?php
$result = $conn->query("SELECT name, league_id FROM League");
while ($row = $result->fetch_assoc()) echo "<option value='" . $row['league_id'] . "'>" . $row['name'] . "</option>"
?>

            </select><br><br>
            <select id="sn"><option value="">N/A</option></select><br><br>
        </div>
    </div></div>
    <button onclick="submit()">Submit</button><br>
    <p style="color: red" id="error"></p>
</div>
