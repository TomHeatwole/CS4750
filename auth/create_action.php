<?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");


        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $usrname = $_POST["uname"];
        $pd = $_POST["psw"];
        $hash = md5($pd);

        $conn = mysqli_connect($host, $username, $password, $database);
        echo ("INSERT INTO Player (username, elo, wins,losses)
        VALUES (" . "'" . $usrname . "', 1200, 0, 0");
        $result = $conn->query("INSERT INTO User (username, password, first_name, last_name, email)
        VALUES (" . "'" . $usrname . "'" . "," . "'" . $hash . "'" . ",'" . $fname . "','" . $lname . "','" . $email . "'" . ")");       
        $another = $conn->query("INSERT INTO Player (username, elo, wins,losses)
        VALUES (" . "'" . $usrname . "', 1200, 0, 0)");

        if($result) {
            session_start();
            $_SESSION["firstname"] = $first_name;
            $_SESSION["lastname"] = $last_name;
            $_SESSION["email"] = $email;
            $_SESSION["username"] = $usrname;
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