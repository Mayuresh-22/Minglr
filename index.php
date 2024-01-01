<?php
session_start();
    if(isset($_SESSION["username"])){
        header("Location: feed.php");
        exit;
    }
?>
<html>
    <title>Minglr - Social Networking Site</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="description" content="Experience social networking like never before with Minglr, 
     where every user enjoys a personalized journey. Dive into your dedicated account page, 
     showcasing your profile, posts, and photos. Stay in the loop with a dynamic feed, 
     sharing your thoughts directly or exploring content from others. Enrich your expression by sharing photos with your
     posts, creating a vibrant community experience. Manage your account seamlessly in the Info tab, 
     fine-tuning profile details and privacy settings. Revisit your memories in the Photos tab, 
     a collection of shared moments. Explore the diverse world of Minglr by visiting other users' 
     account pages. Forge personal connections through private messaging, 
     making Minglr the ultimate destination for authentic social networking.">
     <meta name="keywords" content="Personalized Account Page,
        Dynamic Feed of Shared Posts,
        Expressive Content Sharing,
        Photo Enriched Posts,
        Account Information Management,
        Photo Collection on Account Page,
        Explore User Content,
        Private Messaging for Personal Connections,
        Social Networking Profile,
        Community Engagement Features" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon_minglr.png" type="image/png">
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>
    </head>

    <body>

    <nav>
      <div class="menu-btn">
        <div class="bar bar1"></div>
        <div class="bar bar2"></div>
        <div class="bar bar3"></div>
      </div>
      <label class="logo"><a href="/"><img class="logo" src="logo\logo.png"></a></label>
      <ul class="menu-items">
        <li class="menu-items-li"><a class="navv-item" href="feed.php">Feed</a></li>
        <li class="menu-items-li">
            <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="navv-item" href="account.php?username='.$_SESSION['username'].'" ">Account</a>';
                }else{
                    echo '<a class="navv-item" href="account.php">Account</a>';
                }
            ?>
        </li>
        <li class="menu-items-li">
            <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a class="navv-item active" href="index.php">Login</a>';
                    }
                    else{
                        echo '<a class="navv-item" href="back/logout.php">Logout</a>';
                    }
            ?>
        </li>
        <li class="menu-items-li"><a class="navv-item" href="about-us.php">About Us</a></li>
      </ul>
    </nav>
  
    <div class="seperate_header"></div>
    <!-- <div class="navbar">
        <ul>
            <li>
                <img class="logo" src="logo\logo.png">
            </li>
            <li class="nav-item">
                <a href="feed.php" style="text-decoration: none">Feed</a>
            </li>
            <li class="nav-item">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a href="account.php?username='.$_SESSION['username'].'" style="text-decoration: none">Account</a>';
                }else{
                    echo '<a href="account.php" style="text-decoration: none">Account</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a href="/" style="text-decoration: none;">Login</a>';
                    }
                    else{
                        echo '<a href="back/logout.php"  style="text-decoration: none;">Logout</a>';
                    }
                ?>
            </li>
        </ul>
    </div> -->

    <div class="login-signup">
        <center><img class="login-logo" src="logo\cover.png" alt="logo"></center>
        <center><small><button class="btn" onclick="getElementById('login-form').style.display='block'; getElementById('regst-form').style.display='none';">Login</button>OR<button class="btn" onclick="getElementById('login-form').style.display='none'; getElementById('regst-form').style.display='block';">Register</button></small></center>
        <div class="login">
            <form action="db/validate.php" method="post" class="login-form" id="login-form">
                <input type="text" for="usrname" id="username" name="username" placeholder="Username" required>
                <input type="password" for="password" id="password" name="password" placeholder="Password" required>
                <button class="login-btn" name="lgn" id="lgn">Login Now</button>
            </form>
        </div>
        <div class="register">
            <form action="db/validate.php" method="post" class="regst-form" id="regst-form" style="display: none;">
                <input type="text" for="usrname" id="usrname" name="username" placeholder="Username" required>
                <input type="text" for="fname" id="fname" name="fname" placeholder="First name" required>
                <input type="text" for="lname" id="lname" name="lname" placeholder="Last name" required>
                <input type="email" for="email" id="email" name="email" placeholder="Email" required>
                <input type="password" for="password" id="password" name="password" placeholder="Password" required>
                <small>Your data will be used to provide you with the seamless experience. We respect your privacy</small>
                <button class="rgst-btn" name="regst" id="regst">Register</button>
            </form>
        </div>
    </div>

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
    
    <script src="js/script.js"></script>
    </body>
</html>