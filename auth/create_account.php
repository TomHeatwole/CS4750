<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");
    ?>


    <h1>Create an Account</h1>
    <br>

    <form method="POST" action='/auth/create_action.php'>
        <label><b>First Name: </b></label>
        <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>
        <br>
        <label><b>Last Name: </b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>
        <br>
        <label><b>Email: </b></label>
        <input type="text" placeholder="Enter Email" name="email" id="email" required>
        <br>
        <label><b>Username: </b></label>
        <input type="text" placeholder="Enter Username" name="uname" id="uname" required>
        <br>
        <label><b>Password: </b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="uname" required>
        <br>
        <input type="submit">
    </form>

    <br>

    <a href = "index.php">Already have an account?</a>
</body>
