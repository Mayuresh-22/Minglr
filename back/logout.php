<?php
	include("connection.php");
    include("env.php");

    session_start();
    $uid = $_SESSION['id'];

    // validation before loggin user out
    if(isset($_SESSION['username'])){
        session_unset();
        session_destroy();

        // set login status in database
        $sql = "UPDATE `users` SET `status`= 0 WHERE `id`=".$uid.";";
        mysqli_query($connection, $sql);

        echo '
        <script>
            window.location="'.$home_page.'";
        </script>
        ';
        exit;
    }else{
        echo '
        <script>
            window.location="'.$home_page.'";
        </script>
        ';
        exit;
    }
?>
