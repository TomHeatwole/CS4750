<head>
    <link rel="stylesheet" href="../app.css">
</head>
<body>
    <?php
        include('../database.php'); #This file is in .gitignore
        include("../config.php");
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

    <a href = "create_account.php">Create an Account</a>
</body>
