<?php
include("db/connection.php");

// // getting post variables
$message = $_POST['message'];
$author = $_POST['author'];
$room_id = $_POST['room'];
$recp1 = $_POST['recp1'];
$recp2 = $_POST['recp2'];

// storing message in the database
$sql = "INSERT INTO `messages` (`author`, `message`, `room_id`, `dos`) VALUES ('".$author."', '".$message."', '".$room_id."', current_timestamp());";

mysqli_query($connection, $sql);

echo 
"<script>
    window.location='message.php?recp2=".$recp2."';
</script>";

?>