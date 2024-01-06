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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
              <a class="foot-link footer-Link-Active" href="https://www.google.com/">Home</a>
              <a class="foot-link" href="https://www.google.com/">Feed</a>
              <a class="foot-link" href="https://www.google.com/" >Account</a>
              <a class="foot-link" href="https://www.google.com/">About</a>
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
