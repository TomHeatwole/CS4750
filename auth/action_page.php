<?php
session_start();


include('auth_database.php');
include("../config.php");



$usrname = $_POST["uname"];
$pd = $_POST["psw"];

$conn = mysqli_connect($host, $username, $password, $database);
$result1 = $conn->prepare("SELECT * FROM `User` WHERE username =?");
$result1->bind_param("s", $usrname);
$result1->execute();
$result = $result1->get_result();
$userData = $result->fetch_assoc() or die($conn->error);
$hash = md5($pd);

$admin = $conn->query("SELECT * FROM Admin WHERE username = '" . $usrname . "'");


if(!$userData) {
    echo "<h1>User: " . $usrname . " not found</h1>";
    echo "<a href='../auth'>Back to Login</a>";
    exit();
}

if($hash == $userData['password']) {

    $_SESSION["firstname"] = $first_name;
    $_SESSION["lastname"] = $last_name;
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $usrname;
    if($usrname == "god"){
        $_SESSION["usertype"] = "god";
    }
    else if($admin->num_rows>0){
        $_SESSION["usertype"] = "admin";
    }
    else{
        $_SESSION["usertype"] = "normie";
    }
    echo "<script>
        window.location = '../index.php';
           </script>";
        }
        else{
            $_SESSION = array();
            echo "<script>
                window.location = 'index.php';
            </script>";
        }


?>
