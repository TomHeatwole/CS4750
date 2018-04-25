<?php
session_start();
include('auth_database.php');
?>
<body>
    <script>document.getElementById("home").classList.add("active");</script>
    <div id="inner" style="margin-left: 35%; text-align: left">


    <h1>Create an Account</h1>
    <br>

    <form method="POST" action='/auth/create_action.php'>
        <div style="display: table"><div style="display: table-row; line-height: 30px">
            <div style="display: table-cell">
                <label><b>First Name: </b></label>
                <br>
                <label><b>Last Name: </b></label>
                <br>
                <label><b>Email: </b></label>
                <br>
                <label><b>Username: </b></label>
                <br>
                <label><b>Password: </b></label>
                <br>
            </div>
            <div style="display: table-cell">
                <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>
                <br>
                <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>
                <br>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>
                <br>
                <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
                <br>
                <input type="password" placeholder="Enter Password" name="psw" id="uname" required>
                <br>
            </div>
        </div></div>
        <br>
        <input type="submit">
        <br>
    </form>

    <br>

    <a href = "index.php">Already have an account?</a>
</body>
