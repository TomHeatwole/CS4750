<?php
include("../database.php");
$id = $_POST["id"];
$res2 = $conn->query("DELETE FROM Requests WHERE league_id='$id' AND username='$name'");
?>

