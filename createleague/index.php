<?php
include("../database.php");
if ($type !== "admin") echo "<script>window.location='/registeradmin';</script>";
?>
<div id="inner" style="margin-left: 35%; text-align: left">
<h2>Create League</h2>
<BR>
<form action="createleague/createleague.php" method="post">
    Name of League: <input type="text" name = "name"><br>
    <!--League ID: input type="text" name = "league_id"><br>-->
    Admin Name: <input type="text" name="username"><br>
    Admin Phone Number: <input type="text" name="phone_number"><br>
<!-- Age: <input type="text" name="age"> -->
<input type="Submit">
</form>
</div>
