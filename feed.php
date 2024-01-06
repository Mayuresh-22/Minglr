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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/feed.css">
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
                                        <img src="uploads/'.$postrow[1].'" id="feed-img" alt="'.$postrow[1].'" style="width: 100%; object-fit:contain; margin-bottom: 20px; border-radius: 5px" >
                                    </div>
                                </div>';
                        }
                    }
                }else{
                    echo '<p>Posts Not found</p>';
                }
            ?>
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
