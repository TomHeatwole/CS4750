<?php

session_start();
include('../database.php'); #This file is in .gitignore

$number = $_POST['phone'];
$conn->query("INSERT INTO Admin (username, phone_number) VALUES ('$name', '$number')");
$_SESSION["usertype"] = "admin";

?>
