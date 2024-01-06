<?php
session_start();
?>
<html>
    <title>Minglr - About Us</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/about.css">
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon_minglr.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        echo '<a class="navv-item" href="index.php">Login</a>';
                    }
                    else{
                        echo '<a class="navv-item" href="back/logout.php">Logout</a>';
                    }
            ?>
        </li>
        <li class="menu-items-li"><a class="navv-item active" href="about-us.php">About Us</a></li>
      </ul>
    </nav>
  
<!-- <div class="navbar">
    <ul>
        <li>
            <img class="logo" src="logo\logo.png">
        </li>
        <li class="nav-item">
            <a href="feed.php" style="text-decoration: none">Feed</a>
        </li>
        <li class="nav-item">
            <a href="account.php" style="text-decoration: none">Account</a>
        </li>
        <li class="nav-item">
            <a href="/" style="text-decoration: none;">Login</a>
        </li>
    </ul>
</div> -->
<div class="seperate_header"></div>
<div class="about-us">
    <center><img class="about-us-logo" src="logo/cover.png" alt="logo"></center>
    <h2>About Us</h2>
    <p>Minglr is a social networking site where users can share their posts, images, and chat with each other. It was created to provide a seamless experience to people who want to connect with others and share their experiences.</p>
    <p>We believe that social media can be used to bring people together and create positive changes in the world. Minglr is a platform that empowers people to express themselves and share their ideas with a wider audience.</p>
    <p>Our team is committed to creating a safe and inclusive environment for all users. We take privacy and security seriously and have implemented measures to protect user data. Minglr is a place where everyone is welcome and encouraged to be themselves.</p>
    <p>Thank you for being a part of our community. We look forward to seeing what you create and share on Minglr.</p>
</div>

 <div class="footer">
        <!-- footer top section -->
        <div class="footerTop">
          
            <!-- top arrow -->
            <div class="footerTopArrow">
                <img src="img/upload.png" alt="error">
            </div>

            <!-- social media links -->
            <div class="footerSocialMedia">
                 
                <a href="" class="SociaLinks"><img src="img/facebook.png" alt="error"></a>

               <a href="" class="SociaLinks"><img src="img/instagram.png" alt="error"></a> 

                <a href="" class="SociaLinks"><img src="img/linkedin.png" alt="error"></a>

                <a href="" class="SociaLinks"><img src="img/twitter.png" alt="error"></a>
            </div>
        </div>

        <!-- footer mid section -->
        <div class="footerMid">
            <div class="footerBar">
              <a class="foot-link footer-Link-Active" href="">Home</a>
              <a class="foot-link" href="feed.php">Feed</a>
              <a class="foot-link" href="account.php" >Account</a>
              <a class="foot-link" href="about-us.php">About</a>
            </div>
        </div>

        <!-- footer bottom section -->
        <div class="footerBottom">
          
            <div class="footerText1">
                <img src="img/logo.png" alt="error">
                <span>Made by Mayuresh Choudhary</span>
            </div>

            <div class="footerText2">
                This website is only for educational purpose and does not try to replicate any institution/enity/company 
            </div>
            </p>

        </div>
    </div>
    
<script src="js/script.js"></script>
</body>
</html>
