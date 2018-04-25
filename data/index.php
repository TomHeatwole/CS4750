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


$result = $conn->query("SELECT * FROM Player"); 
while($row = $result->fetch_assoc()) {
    $result2 = $conn->query("SELECT * FROM LeagueRecord NATURAL JOIN League WHERE username='" . $row["username"] . "'");
    $leagueData = [];
    while ($row2 = $result2->fetch_assoc()) $leagueData[] = array('name'=> $row2['name'], 'league_id'=> $row2['league_id'], 'wins'=> $row2['l_wins'], 'losses'=>$row2['l_losses']);
    $players[] = array('username'=> $row['username'],'elo'=> $row['elo'], 'wins'=> $row['wins'], 'losses'=> $row['losses'], 'leagues'=> $leagueData);
}


fwrite($handle, json_encode($players, JSON_PRETTY_PRINT));


fwrite($handle, $data);
echo "<script>window.location='/data/" . $exportFile . "';</script>";
?>
