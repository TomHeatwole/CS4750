<?php
session_start();
include('auth_database.php');

include("../config.php");

if ($_SESSION["usertype"]) echo "<script>window.location='./';</script>";

?>

<script>document.getElementById("home").classList.add("active");</script>
<div id="inner" style="margin-left: 35%; text-align: left">


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


</div>
