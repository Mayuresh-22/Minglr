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
    <meta name="description" content="Discover a new dimension of social networking with Minglr,
     where connections come alive! Connect with friends, meet like-minded individuals, and explore a vibrant 
     online community. Minglr is your go-to social platform, designed for meaningful interactions and genuine 
     connections. Join us to share, connect, and thrive in a welcoming digital space. Your social journey begins here,
     at Minglr - where friendships flourish and possibilities abound.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>
    </head>

    <body>

    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fa-solid fa-bars" style="color: #12209d;"></i>
      </label>
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
    </body>
</html>