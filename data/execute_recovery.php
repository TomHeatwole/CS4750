<?php
session_start();
include('../database_only.php'); #This file is in .gitignore


function getValuesString($v) {
    $ret = "('" . $v[0] . "'";
    for ($i = 1; $i < count($v); $i++) $ret = $ret . ", '" . $v[$i] . "'";
    return $ret . ")";
}


$data = json_decode($_POST["str"]);
for ($i = 0; $i < count($data); $i++) {
    $d = (array)($data[$i]);
    $table = $d['table'];
    $values = getValuesString($d["values"]);
    $conn->query("INSERT INTO $table VALUES $values"); 
}

?>



