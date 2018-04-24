<?php
    $type = $_SESSION["usertype"];
    if (!$type) echo "<script>window.location='./auth'</script>";
    $username = ($type == "god") ? "CS4750tgh8xna" : "CS4750tgh8xnc" ;
    if ($type == "admin") $username = "CS4750tgh8xnb";
    $host = "stardock.cs.virginia.edu";
    $password = "spring2018";
    $database = "CS4750tgh8xn";

    $name = $_SESSION["username"];
    $conn = mysqli_connect($host, $username, $password, $database);
?>

