<?php
include('../database.php'); #This file is in .gitignore
if ($type != 'god') echo "<script>window.location='/';</script>";
?>
<div id="inner" style="margin-left: 35%; text-align: left">

<h1> Recover data from JSON </h1>

<h2> Enter JSON string </h2>

<textarea id="data" rows="10" cols="80"></textarea>


<br><br><button onclick="recover()"> Recover </button>


<script src="/data/data.js"></script>
<br><br>
<img style="display: none" id="loading" src="/loading.png"/>

