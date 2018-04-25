<?php
session_start();
include('../database.php'); #This file is in .gitignore
if ($type != 'god') echo "<script>window.location='/';</script>";
?>
<script src="/data/data.js"></script>
<div id="inner" style="margin-left: 35%; text-align: left">
<h1> WARNING: This can't be undone unless exported JSON data is saved</h1>

<button onclick="clearDatabase()">Clear Database</button>

