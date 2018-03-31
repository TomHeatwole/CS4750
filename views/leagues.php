<?php 
    include('../setup.php');
    $conn = mysqli_connect($host, $username, $password, $database);
    $result = $conn->query("SELECT * FROM User");
    echo $result->fetch_assoc()['username'];
?>
