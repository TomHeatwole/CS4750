<?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");

        $usrname = $_POST["uname"];
        $pd = $_POST["psw"];

        $conn = mysqli_connect($host, $username, $password, $database);
        $result = $conn->query("SELECT * FROM `User` WHERE username ='" . $usrname . "'");

        $userData = $result->fetch_assoc() or die($conn->error);;
        $hash = md5($pd);

        $admin = $conn->query("SELECT * FROM Admin WHERE username = '" . $usrname . "'");


        if(!$userData) {
            echo "<h1>User: " . $usrname . " not found</h1>";
            echo "<a href='../auth'>Back to Login</a>";
            exit();
        }

        if($hash == $userData['password']) {
        	session_start();
            $_SESSION["firstname"] = $first_name;
            $_SESSION["lastname"] = $last_name;
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $usrname;
            if($usrname == "god"){
                $_SESSION["usertype"] = "god";
            }
            else if(mysqli_num_rows($admin)>0){
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
        	echo "<script>
			    window.location = 'index.php';
			</script>";
        }


        ?>