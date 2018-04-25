<?php
session_start()
?>
<link rel="stylesheet" href="/stylesheet.css"/>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<ul>
    <li>
        <a id="home" href="/">
            <i class="fa fa-home"></i> &nbsp; Home
        </a>
    </li>
    <li>
        <a id="leagues" href="/leagues/">
            <i class="fa fa-trophy"></i> &nbsp; Leagues
        </a>
    </li>
    <li>
        <a id="players" href="/players/">
            <i class="fa fa-users"></i> &nbsp; Players
        </a>
    </li>
    <li>
        <a id="games" href="/games/">
            <i class="fa fa-gamepad"></i> &nbsp; Games
        </a>
    </li>
    <li>
        <a id="gamereport" href="/gamereport/">
            <i class="fa fa-check"></i> &nbsp; Enter Results
        </a>
    </li>
    <li>
        <a href="/logout.php">
            <i class="fa fa-sign-out"></i> &nbsp; Sign Out
        </a>
    </li>
</ul>
<?php

#    This file handles:
#    - Redirecting if user isn't logged in
#    - Getting session variables
#    - Setting database variables to correct permissions based on user type
#    - Setting up the database connection


$type = $_SESSION["usertype"];
if (!$type) echo "<script>window.location='/auth'</script>";
$username = ($type == "god") ? "CS4750tgh8xna" : "CS4750tgh8xnc" ;
if ($type == "admin") $username = "CS4750tgh8xnb";
$host = "stardock.cs.virginia.edu";
$password = "spring2018";
$database = "CS4750tgh8xn";

$name = $_SESSION["username"];
$conn = mysqli_connect($host, $username, $password, $database);



?>
