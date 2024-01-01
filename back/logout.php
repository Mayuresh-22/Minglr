<?php
    include("env.php");

    session_start();
    

    // validation before loggin user out
    if(isset($_SESSION['username'])){
        session_unset();
        session_destroy();

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
