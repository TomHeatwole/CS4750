<?php

# Return true when "request join league" button should be shown


include("../database.php");

$ret = "true";
$id = $_POST["id"];
$res1 = $conn->query("SELECT username FROM BelongsTo WHERE league_id='$id' AND username='$name'");
$res2 = $conn->query("SELECT username FROM Requests WHERE league_id='$id' AND username='$name'");
if ($res1->fetch_assoc() || $res2->fetch_assoc()) $ret = "false";
echo $ret;


?>

