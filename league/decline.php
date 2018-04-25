<?php
include("../database_only.php");
$id = $_POST["id"];
$n = $_POST['n'];
$conn->query("DELETE FROM Requests WHERE league_id='$id' AND username='$n'");
?>

