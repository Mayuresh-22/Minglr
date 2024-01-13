<?php
include("db/connection.php");
include("back/env.php");

// getting post variables
$message = $_POST['post'];
$user_id = $_POST['user_id'];
$username = $_POST['username'];

if($_FILES['postimage']['error'] != 4){
    $imagename = $_FILES['postimage']['name'];
    $imagetmpname = $_FILES['postimage']['tmp_name'];

    // assigning new name to the image file
    $imagename = explode(".", $imagename);
    $imageext = strtolower(end($imagename));
    $imagename = uniqid().".".$imageext;

    $folder = "uploads/". $imagename;
    move_uploaded_file($imagetmpname, $folder);
}

// Set redirect if provided
if(isset($_POST['redirect'])){
    $redirect = $_POST['redirect'];
}

// Check if message is empty and no image provided
if($message=="" and $_FILES['postimage']['error'] == 4){
    echo "<script>
        alert('Message Empty');
        window.location='".$home_page."account.php?username=".$username."';
    </script>";
    exit();
}

// storing post in database
if(isset($imagename)){
    $sql = "INSERT INTO `posts` (`uid`, `msg`, `image`, `type`, `dop`) VALUES (?, ?, '$imagename', 'p', current_timestamp());";
}else{
    $sql = "INSERT INTO `posts` (`uid`, `msg`, `type`, `dop`) VALUES (?, ?, 'p', current_timestamp());";
}

// prepare statements
$sql = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($sql, "is", $user_id, $message);
// execute
$sql->execute();

// displaying message and redirecting user back to account page
if(isset($_POST['redirect'])){
    echo "<script>
        alert('Successfully! posted');
        window.location='".$redirect."';
    </script>";
}else{
echo "<script>
        alert('Successfully! posted');
        window.location='".$home_page."account.php?username=".$username."';
    </script>";
}
?>