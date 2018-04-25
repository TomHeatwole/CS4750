<?php

session_start();
include('../database.php'); #This file is in .gitignore

$number = $_POST['PHONE'];
$conn->query("INSERT INTO admin (username, phone_number) VALUES ('$name', '$number')");
$_SESSION["usertype"] = "admin";

?>
