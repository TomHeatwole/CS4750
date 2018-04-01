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
 $belongsto="INSERT INTO BelongsTo (username, league_id)
 VALUES
 ('$_POST[username]','$_POST[leagueID]')";
 $leagueid="INSERT INTO LeagueRecord (league_id, username, l_wins, l_losses) VALUES ('$_POST[leagueID]', '$_POST[username]', 0, 0)";
 if (!mysqli_query($con,$belongsto) || !mysqli_query($con,$leagueid))
 {
 die('Error: ' . mysqli_error($con));
 }
 echo "Records added"; // Output to user
 mysqli_close($con);
?> 