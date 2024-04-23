<?php
    include("back/env.php");

    // starting session only when $_session is set
    session_start();
    // including root database connection file
    include("db/connection.php");

?>

<html>
    <title>Minglr - Get Connected</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <!-- Dark theme css -->
    <link rel="stylesheet" href="style/lighttheme_css/light_style.css?t=<?php echo time();?>" >  
    <!-- <link rel="stylesheet" href="style/darktheme_css/dark_style.css?t=<?php echo time();?>" >   -->
    <link rel="stylesheet" href="style/lighttheme_css/light_feed.css" id="theme">  
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <!-- favicon -->
    <link rel="shortcut icon" href="logo/Minglr logo4.png" type="image/png">
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>
</head>

<body>
        <nav>
            <div class="menu-btn">
                <div class="bar bar1"></div>
                <div class="bar bar2"></div>
                <div class="bar bar3"></div>
            </div>
            <label class="logo"><a href="/"><img class="logo" src="logo/Minglr logo1.png"></a></label>
            <ul>
            <img src="img/dark_img/MoonIcon.png" alt="Theme Icon" height="19" width="19" id="theme-icon" id="theme-toggle" class="theme-button" onclick="changeTheme()">
            </ul>
            
            <ul class="menu-items">
                <li class="menu-items-li"><a class="navv-item active" href="feed.php">Feed</a></li>
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
        <li class="menu-items-li"><a class="navv-item" href="about-us.php">About Us</a></li>
      
    </ul>
        
</nav>
    


<div class="seperate_header"></div>
<!-- <div class="navbar">
    <ul>
        <li>
            <a href="<?php echo $home_page; ?>"><img class="logo" src="logo\logo.png"></a>
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
    </div> -->

    <div class="feed-page-body">
        <div class="feed-page-head">
            <h2>Feed</h2>
        </div>

        <?php if(isset($_SESSION['username']) && isset($_SESSION['id'])): ?>
            <div class="feed-posting-box">
                <form action="post.php?redirect=feed.php" method="post" enctype="multipart/form-data">
                    <textarea name="post" id="post" wrap="hard" placeholder="Whats in your mind? <?php echo $_SESSION['username']; ?>" class="feed-post-box-textarea"></textarea>
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id']; ?>">
                    <input type="hidden" name="username" id="username" value="<?php echo $_SESSION['username']; ?>">
                    <input type="hidden" name="redirect" id="redirect" value="<?php echo "feed.php"; ?>">
                    <input type="file" name="postimage" accept=".jpg, .png, .jpeg" class="postimage">
                    <button type="submit" class="post-btn">Post</button>
                </form>
            </div>
        <?php endif; ?>

        <div class="feeds">
            <?php
                // Posts fetching query which orders rows returned by query in descendin form (Old post -> New post)
                $postsql = "SELECT `msg`, `image`, `uid`, `dop` FROM `posts` ORDER BY `dop` DESC;";
                // executing query
                $postresult = mysqli_query($connection, $postsql);
                // counting number of rows return by query and only show post box
                // if number posts are greater than zero

                if(mysqli_num_rows($postresult)>0){
                    

                    // fetching rows returned by query
                    $postrows = mysqli_fetch_all($postresult);

                    foreach($postrows as $postrow){
                        // getting usernames for every posts as usernames are not stored in same table
                        $usrsql = "SELECT `username`, `fname` FROM `users` WHERE `id` = ".$postrow[2].";";
                        $usrresult = mysqli_query($connection, $usrsql);
                        $usrrow = mysqli_fetch_assoc($usrresult);

                        if($postrow[1] == NULL){
                            echo '<div class="feed-post-display-box">
                                    <div class="feed-post-display-box-head">
                                        <ul>
                                            <li>
                                            <a href="account.php?username='.$usrrow['username'].'" style="text-decoration: none;"><img src="https://api.dicebear.com/6.x/initials/png?seed='.$usrrow['fname'].'&size=128" alt="profile" class="account-profpic"></a>
                                            </li>
                                            <li style="padding-left: 10px; padding-right: 10px;">
                                                <a href="account.php?username='.$usrrow['username'].'" style="text-decoration: none;">'.$usrrow['fname'].'</a>
                                            </li>
                                            <li style="vertical-align:baseline;">
                                            <small>shared a post in the feed on </small>
                                                <small>'.$postrow[3].'</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="feed-post-display-box-message">
                                        '.str_replace("\n", "<br>", $postrow[0]).'
                                    </div>
                                </div>';
                        }else{
                            echo '<div class="feed-post-display-box">
                                    <div class="feed-post-display-box-head">
                                        <ul>
                                            <li>
                                            <a href="account.php?username='.$usrrow['username'].'" style="text-decoration: none;"><img src="https://api.dicebear.com/6.x/initials/png?seed='.$usrrow['fname'].'&size=128" alt="profile" class="account-profpic"></a>
                                            </li>
                                            <li style="padding-left: 10px; padding-right: 10px;">
                                                <a href="account.php?username='.$usrrow['username'].'" style="text-decoration: none;">'.$usrrow['fname'].'</a>
                                            </li>
                                            <li style="vertical-align:baseline;">
                                            <small>shared a post in the feed on </small>
                                                <small>'.$postrow[3].'</small>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="feed-post-display-box-message">
                                        '.str_replace("\n", "<br>", $postrow[0]).'
                                    </div>
                                    <div class="feed-post-display-box-image">
                                    <a href="#">   <img src="uploads/'.$postrow[1].'" alt="'.$postrow[1].'" style="width: 100%; object-fit:contain; margin-bottom: 20px; border-radius: 5px">
                                    </a></div>
                                </div>';
                        }
                    }
                }else{
                    echo '<p>Posts Not found</p>';
                }
            ?>
        </div>
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
<div id="lightbox-overlay" class="lightbox-overlay" onclick="closeLightbox()">
        <img id="lightbox-image" class="enlarged-photo" src="" alt="Enlarged Photo">
    </div>

    <script src="js/script.js"></script>
</body>
</html>
