<?php
session_start();
?>
<html>
    <title>Minglr - About Us</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/about.css"> -->
       <!-- Dark theme css -->
       <link rel="stylesheet" href="style/lighttheme_css/light_style.css?t=<?php echo time();?>">     
       <link rel="stylesheet" href="style/lighttheme_css/light_about.css?t=<?php echo time();?>" id="theme">     
    
    <!-- favicon -->
    <link rel="shortcut icon" href="logo/Minglr logo4.png" type="image/png">
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

      <ul>
        <img src="img/dark_img/MoonIcon.png" alt="Theme Icon" height="19" width="19" id="theme-icon" id="theme-toggle" class="theme-button" onclick="changeTheme()">
      </ul>
      <label class="logo"><a href="/"><img class="logo" src="logo/Minglr logo1.png"></a></label>
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
    <center><img class="about-us-logo" src="logo/Minglr logo3.png" alt="logo"></center>
    <h2>About Us</h2>
    <p>Minglr is a social networking site where users can share their posts, images, and chat with each other. It was created to provide a seamless experience to people who want to connect with others and share their experiences.</p>
    <p>We believe that social media can be used to bring people together and create positive changes in the world. Minglr is a platform that empowers people to express themselves and share their ideas with a wider audience.</p>
    <p>Our team is committed to creating a safe and inclusive environment for all users. We take privacy and security seriously and have implemented measures to protect user data. Minglr is a place where everyone is welcome and encouraged to be themselves.</p>
    <p>Thank you for being a part of our community. We look forward to seeing what you create and share on Minglr.</p>
</div>

<div class="footer" style="height:16rem">
        <p style="  font-size: x-large;margin-top:0;">Minglr</p>
    <ul class="footer-icons">
        <li class="foot-item">
            <a href="#" class="foot-link"><i class="fab fa-facebook"></i></a>
        </li>
        <li class="foot-item">
            <a href="#" class="foot-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="foot-item">
            <a href="#" class="foot-link"><i class="fab fa-instagram"></i></a>
        </li>
        <li class="foot-item">
            <a href="#" class="foot-link"><i class="fab fa-youtube"></i></a>
        </li>
    </ul>
    <ul class="footer-links">
        <li class="foot-item" style="margin-right:3rem;">
            <a href="" class="foot-link">Home</a>
        </li>
        <li class="foot-item" style="margin-right:3rem;">
            <a href="feed.php" class="foot-link">Feed</a>
        </li>
        <li class="foot-item" style="margin-right:3rem;">
            <a href="account.php" class="foot-link">Account</a>
        </li>
        <li class="foot-item" style="margin-right:3rem;">
            <a href="about-us.php" class="foot-link">About us</a>
        </li>
    </ul>
    <p style="font-size:0.9rem;">This website is only for educational purposes and does not try to replicate any institution/entity/company - by Mayuresh Choudhary</p>
</div>
    
<script src="js/script.js"></script>
</body>
</html>
