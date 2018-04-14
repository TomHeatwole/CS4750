<?php
 include("../database.php"); // To connect to the database
 include("../config.php");
 $con = mysqli_connect($host, $username, $password, $database);
 // Check connection
 if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $name = "INSERT INTO League(league_id, name) VALUES ('$_POST[league_id]', '$_POST[name]')";
 $Admin="INSERT INTO Admin (username, phone_number)
 VALUES
 ('$_POST[username]','$_POST[phone_number]')";

 if (!mysqli_query($con,$name) || !mysqli_query($con,$Admin))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "Records added"; // Output to user
 mysqli_close($con);
?> 