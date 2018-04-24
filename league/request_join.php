<?php

# Return true when "request join league" is successful


include("../database.php");

$ret = "pass";
$id = $_POST["id"];

$res1 = $conn->query("SELECT username FROM SeasonRecord WHERE league_id='$id' AND username='$name'");
$res2 = $conn->query("SELECT username FROM Requests WHERE league_id='$id' AND username='$name'");
if ($res1->fetch_assoc() || $res2->fetch_assoc()) $ret = "false";
else $conn->query("INSERT INTO Requests (username, league_id) VALUES ('$name', '$id')");
echo $ret;


?>

