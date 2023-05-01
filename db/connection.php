<?php
// database connection for Minglr (Get all this details in phpMyAdmin)
$host = "Your-hostname";
$user = "Your-username";
$pswd = "Your-password";
$db = "Your-databasename";

// create connect to db
$connection = mysqli_connect($host, $user, $pswd, $db);

// home page
$home_page = "/";
?>