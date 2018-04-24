<?php
session_start();
include('database.php'); #This file is in .gitignore
?>
<div id="inner" style="margin-left: 35%; text-align: left">

<?php
echo "<h1>Hello, " . $_SESSION["username"] . "</h2>";
?>


TODO: Fill this page with links to their leagues and their recent games

</div>
