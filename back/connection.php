<?php
// database connection for Minglr
$host = "localhost";
$user = "minglrcu_ma123";
$pswd = "minglrcuma";
$db = "minglrcu_ma";

// create connect to db
$connection = mysqli_connect($host, $user, $pswd, $db);

// home page
$home_page = "/";
?>