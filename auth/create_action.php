<?php
        session_start();

        include('auth_database.php'); #This file is in .gitignore
        include("../config.php");

        

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $usrname = $_POST["uname"];
        $pd = $_POST["psw"];
        $hash = md5($pd);

        $conn = mysqli_connect($host, $username, $password, $database);
        $result = $conn->query("INSERT INTO User (username, password, first_name, last_name, email)
        VALUES (" . "'" . $usrname . "'" . "," . "'" . $hash . "'" . ",'" . $fname . "','" . $lname . "','" . $email . "'" . ")");       

        $another = $conn->query("INSERT INTO Player (username, elo, wins, losses)
        VALUES (" . "'" . $usrname . "', 1200, 0, 0)");


        $admin = $conn->query("SELECT * FROM Admin WHERE username = '" . $usrname . "'");

        if($result) {
            
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
            echo "Made account";
            /*echo "<script>
                window.location = '../index.php';
           </script>";*/
        }

        else{
            $_SESSION = array();
            echo "Failed";
            echo "<script>
               window.location = 'index.php';
            </script>";
        }

        ?>
