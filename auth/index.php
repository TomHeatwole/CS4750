<?php
include("../database.php");
?>
<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
//        include('auth_database.php');
//        include("../config.php");
        session_start();
        if ($_SESSION["usertype"]) echo "<script>window.location='./';</script>";
    ?>


    <h1>Login</h1>
    <br>

    <form method="POST" action='/auth/action_page.php'>
        <label><b>Username: </b></label>
        <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
        <br>
        <label><b>Password: </b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="uname" required>
        <br>
        <input type="submit">
    </form>

    <br>

    <a href = "auth/create_account.php">Create an Account</a>
</body>
