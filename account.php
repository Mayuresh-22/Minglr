<?php
    include("back/env.php");

    // starting session only when $_session is set
    session_start();

    // getting GET parameters
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        if(isset($_GET['tab'])){
            $tab = $_GET['tab'];
        }else{
            $tab = "feed";
        }
        // including root database connection file
        include("db/connection.php");
        $sql = "SELECT `id`,`username`, `fname`, `lname`, `email` FROM `users` WHERE `username` LIKE '%$username%'OR `fname` LIKE '%$username%' OR `lname` LIKE '%$username%';";
        // die($sql);
        $result = mysqli_query($connection, $sql);
        // print_r($result);
        // die();
        // if(mysqli_num_rows($result)>=1){
        //     // fetching and storing records in variables
        //     // while(){
                
        //     // }
        //     $row = mysqli_fetch_assoc($result);
        //     $username_row=$row['username'];
        //     $user_id = $row['id'];
        //     $fname = $row['fname'];
        //     $lname = $row['lname'];
        //     $email = $row['email'];
        // }
    }

?>

<html>
    <title>Minglr - Get Connected</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/account.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    </head>

<body>
    <div class="navbar">
        <ul>
            <li>
                <a href="<?php echo $home_page; ?>"><img class="logo" src="logo\logo.png"></a>
                <!-- <h1 class="nav-item-logo">Minglr</h1> -->
            </li>
            <li class="nav-item">
                <a href="feed.php" style="text-decoration: none">Feed</a>
            </li>
            <li class="nav-item">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a href="account.php" style="text-decoration: none;">Account</a>';
                    }
                    else{
                        echo '<a href="account.php?username='.$_SESSION["username"].'"  style="text-decoration: none;">Account</a>';
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a href="'.$home_page.'" style="text-decoration: none;">Login</a>';
                    }
                    else{
                        echo '<a href="back/logout.php"  style="text-decoration: none;">Logout</a>';
                    }
                ?>
            </li>
        </ul>
    </div>

    <?php if(isset($_GET['username'])): ?>
        <?php if(mysqli_num_rows($result)>=1): ?>
        <?php while($row = mysqli_fetch_assoc($result)){
            $username_row=$row['username'];
                $user_id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
            ?>
        <div class="account">
        <div class="user-profile">
            <img class="user-avatar" src="https://api.dicebear.com/6.x/initials/png?seed=<?php echo $fname ?>&size=128" alt="User 1">
            <div class="user-info">
                <div class="user-username"><?php echo $username_row;?></div>
                <div class="user-name"><?php echo $fname.' '.$lname;?></div>
            </div>
        </div>
        </div>
        <?php }?>
        <?php endif; ?>
        <?php if(mysqli_num_rows($result)==0){readfile('error/user_not_found.html');}?>
    <?php endif; ?>
    <?php 
        if(!(isset($_GET['username']))){
            readfile("back/search.php");
        }
    ?>

    <div class="footer">
    <ul>
            <li class="foot-item">
                <a href="" class="foot-link" style="text-decoration: none">Home</a>
            </li>
            <li class="foot-item">
                <a href="feed.php" class="foot-link" style="text-decoration: none">Feed</a>
            </li>
            <li class="foot-item">
                <a href="account.php" class="foot-link" style="text-decoration: none">Account</a>
            </li>
            <li class="foot-item">
                <a href="about-us.php" class="foot-link" style="text-decoration: none">About us</a>
            </li>
            <p>This website is only for educational purpose and does not try to replicate any institution/enity/company - by Mayuresh Choudhary</p>
        </ul>
    </div>
</body>
</html>