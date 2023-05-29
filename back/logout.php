<?php

    include("db/connection.php");
    include("db/validate.php");

    session_start();
    
    // validation before loggin user out
    if(isset($_SESSION['username'])){
        session_unset();
        session_destroy();

        // set login status in database
        $sql = "UPDATE `users` SET `status`= 0 WHERE `id`=".$uid.";";
        mysqli_query($connection, $sql);

        echo '
        <script>
            window.location="/";
        </script>
        ';
        exit;
    }else{
        echo '
        <script>
            window.location="/";
        </script>
        ';
        exit;
    }

?>
