<?php

# Return true when "request join league" button should be shown


include("../database.php");

$ret = "fail";
$id = $_POST["id"];
$res1 = $conn->query("SELECT username FROM Moderates WHERE league_id='$id' AND username='$name'");
$res2 = $conn->query("SELECT username FROM Requests WHERE league_id='$id'");
if ($res2->fetch_assoc() && $res1->fetch_assoc()) $ret = "pass";
echo $ret;


?>

