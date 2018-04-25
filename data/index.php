<?php
session_start();
include('../database.php'); #This file is in .gitignore
?>
<div id="inner" style="margin-left: 35%; text-align: left">
<h2> Please wait while the data is being prepared...</h2>


<?php


function generateRandomString($length = 30) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

$rand = generateRandomString();
$exportFile = 'files/' . $rand . '.json';
$handle = fopen($exportFile, 'w') or die('Cannot open file:  '. $exportFile); //implicitly creates file


$tables = ["Admin", "Game", "League", "LeagueRecord", "Moderates", "Player", "Requests", "Season", "SeasonRecord", "User"];

for (int i = 0; i < 11; i++) {
    $table = $tables[i];
    $result = $conn->query("SELECT * FROM '$table'");
    while ($row = $result->get_assoc()) //TODO 
}



fwrite($handle, json_encode($data, JSON_PRETTY_PRINT));
echo "<script>window.location='/data/" . $exportFile . "';</script>";
?>
