<?php
session_start();
include('../database.php'); #This file is in .gitignore
if ($type == "admin") echo "<script>window.location='/createleague/';</script>";
else echo "<script>alert('You must register as an admin before creating a league');</script>";
?>
<script src="/registeradmin/ra.js"></script>
<div id="inner" style="margin-left: 35%; text-align: left">
    <script>document.getElementById("leagues").classList.add("active");</script>

    <h1> Register as an admin </h1>

    We collect phone numbers from our admin users.
    <br><br>
    Phone Number (xxx-xxx-xxxx): <input id="phone" type="text"/>
    <br><br>
    <button onclick="register()">Register</button>
    <p id="error" style="display: none"> Please enter a valid phone number using format: xxx-xxx-xxxx </p>
</div>
