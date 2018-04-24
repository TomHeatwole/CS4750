<?php

include("../database_only.php");

$id = $_POST["id"];
$result = $conn->query("SELECT name, season_number FROM Season WHERE league_id='$id'");
while ($row = $result->fetch_assoc()) echo $row["season_number"] . "\n" . $row["name"] . "\n";

?>
