<?php
include("../database.php");
if ($type !== "admin") echo "<script>window.location='/registeradmin';</script>";
?>
<script src="/createleague/cl.js"></script>
<div id="inner" style="margin-left: 35%; text-align: left">

<h2>Create New League</h2>

Name of League: <input type="text" id="name">
<br><br><br><button onclick="create()">Create League</button>
<br><br>
<p id="error" style="display: none"> Please enter a valid league name </p>

</div>

