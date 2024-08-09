<?php
include("back/env.php");

// starting session only when $_session is set
session_start();
include("db/connection.php");

// getting GET parameters
if (isset($_GET['search'])) {
    $username = $_GET['search'];
    
    // including root database connection file

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
    
    <!-- <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/account.css"> -->
    
    <!-- Dark theme css -->
    <link rel="stylesheet" href="style/lighttheme_css/light_style.css?v=<?php echo time();?>">  
    <!-- <link rel="stylesheet" href="style/darktheme_css/dark_account.css?v=<?php echo time();?>" id="theme">   -->
    <link rel="stylesheet" href="style/lighttheme_css/light_account.css?t=<?php echo time();?>" id="theme">  

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- favicon -->
    <link rel="shortcut icon" href="logo/Minglr logo4.png" type="image/png">
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>

<body>
    <nav>
      <label class="logo"><a href="/"><img class="logo" src="logo/Minglr logo1.png"></a></label>
      <div class="menu-btn">
        <div class="bar bar1"></div>
        <div class="bar bar2"></div>
        <div class="bar bar3"></div>
      </div>
        <ul>
            <img src="img/dark_img/MoonIcon.png" alt="Theme Icon" height="19" width="19" id="theme-icon" id="theme-toggle" class="theme-button" onclick="changeAccountTheme()">
        </ul>

      <ul class="menu-items">
        <li class="menu-items-li"><a class="navv-item" href="feed.php"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                        <path fill-rule="evenodd" d="M3.75 4.5a.75.75 0 0 1 .75-.75h.75c8.284 0 15 6.716 15 15v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75C18 11.708 12.292 6 5.25 6H4.5a.75.75 0 0 1-.75-.75V4.5Zm0 6.75a.75.75 0 0 1 .75-.75h.75a8.25 8.25 0 0 1 8.25 8.25v.75a.75.75 0 0 1-.75.75H12a.75.75 0 0 1-.75-.75v-.75a6 6 0 0 0-6-6H4.5a.75.75 0 0 1-.75-.75v-.75Zm0 7.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                    </svg>Feed</a></li>
        <li class="menu-items-li">
            <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="navv-item active" href="account.php?username='.$_SESSION['username'].'" "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                  </svg>Account</a>';
                }else{
                    echo '<a class="navv-item active" href="account.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                  </svg>Account</a>';
                }
            ?>
        </li>
        <li class="menu-items-li">
            <?php
                    if(!isset($_SESSION['username'])){
                        echo '<a class="navv-item" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                      </svg>Login</a>';
                    }
                    else{
                        echo '<a class="navv-item" href="back/logout.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu-icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                      </svg>Logout</a>';
                    }
            ?>
        </li>
        <li class="menu-items-li"><a class="navv-item" href="about-us.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                        <path d="M4.5 6.375a4.125 4.125 0 1 1 8.25 0 4.125 4.125 0 0 1-8.25 0ZM14.25 8.625a3.375 3.375 0 1 1 6.75 0 3.375 3.375 0 0 1-6.75 0ZM1.5 19.125a7.125 7.125 0 0 1 14.25 0v.003l-.001.119a.75.75 0 0 1-.363.63 13.067 13.067 0 0 1-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 0 1-.364-.63l-.001-.122ZM17.25 19.128l-.001.144a2.25 2.25 0 0 1-.233.96 10.088 10.088 0 0 0 5.06-1.01.75.75 0 0 0 .42-.643 4.875 4.875 0 0 0-6.957-4.611 8.586 8.586 0 0 1 1.71 5.157v.003Z" />
                    </svg>About Us</a></li>
        
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
                if (!isset($_SESSION['username'])) {
                    echo '<a href="account.php" style="text-decoration: none;">Account</a>';
                } else {
                    echo '<a href="account.php?username=' . $_SESSION["username"] . '"  style="text-decoration: none;">Account</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                if (!isset($_SESSION['username'])) {
                    echo '<a href="' . $home_page . '" style="text-decoration: none;">Login</a>';
                } else {
                    echo '<a href="back/logout.php"  style="text-decoration: none;">Logout</a>';
                }
                ?>
            </li>
        </ul>
    </div> -->

    <?php if (isset($_GET['search'])) : ?>
        <?php if (mysqli_num_rows($result) >= 1) : ?>
            <?php while ($row = mysqli_fetch_assoc($result)) {
                $username_row = $row['username'];
                $user_id = $row['id'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $email = $row['email'];
            ?>
                <a href="account.php?username=<?php echo $username_row; ?>">
                    <div class="user-profile">
                        <img class="user-avatar" src="https://api.dicebear.com/6.x/initials/png?seed=<?php echo $fname ?>&size=128" alt="User 1">
                        <div class="user-info">
                            <div class="user-username"><?php echo $username_row; ?></div>
                            <div class="user-name"><?php echo $fname . ' ' . $lname; ?></div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        <?php endif; ?>
        <?php if (mysqli_num_rows($result) == 0) {
            readfile('error/user_not_found.html');
        } ?>
    <?php endif; ?>
    <?php if (isset($_GET['username'])) { ?>
        <?php
        if (isset($_GET['tab'])) {
            $tab = $_GET['tab'];
        } else {
            $tab = "feed";
        }
        $username = $_GET['username'];
        $sql = "SELECT `id`,`username`, `fname`, `lname`, `email` FROM `users` WHERE `username` ='$username';";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result);
        $username_row = $row['username'];
        $user_id = $row['id'];
        $fname = $row['fname'];
        $lname = $row['lname'];
        $email = $row['email'];
        ?>
        <div class="account">
            <div class="account-body">
                <div class="account-banner" style="background-image: url('logo/banner2.jpg');">
                    <div class="account-img">
                        <ul>
                            
                            <li>
                                <img src="https://api.dicebear.com/6.x/initials/png?seed=<?php echo $fname ?>&size=128" alt="profile" class="account-profpic">
                            </li>
                            <li style="padding-left: 10px;">
                                
        			<div class="message-buttons-name">
            		   	<?php
                                echo "<b>$fname</b>";
                                echo "<small>@$username_row</small><br>";
                                ?>
                                <?php if (isset($_SESSION['username']) and ($username != $_SESSION['username'])) : ?>
           			<form action="message.php" method="GET">
                		   <input type="hidden" name="recp2" value="<?php echo $user_id; ?>">
                		   <button class="message-btn mobile-btn">Send message</button>
            			</form>
                                <?php endif; ?>
        			</div>

                            </li>
                            <li>
                                <?php if (isset($_SESSION['username']) and ($username != $_SESSION['username'])) : ?>
                                    <form action="message.php" method="GET">
                                        <input type="hidden" name="recp2" value="<?php echo $user_id; ?>">
                                        <button class="message-btn desktop-btn">Send message</button>
                                    </form>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="account-tabs">
                    <ul>
                        <li class="acc-tabs-item">
                            <?php echo '<a href="account.php?username=' . $username . '&tab=feed" class="acc-tabs-link">Feed</a>'; ?>
                        </li>
                        <li class="acc-tabs-item">
                            <?php echo '<a href="account.php?username=' . $username . '&tab=info" class="acc-tabs-link">Info</a>'; ?>
                        </li>
                        <li class="acc-tabs-item">
                            <?php echo '<a href="account.php?username=' . $username . '&tab=photo" class="acc-tabs-link">Photo</a>'; ?>
                        </li>
                    </ul>
                </div>

                <div class="acc-tabs-page">
                    <!-- Account tabs (Feed, Info, etc) This peice of code gives the logic to display
            various account feed to as per users login status -->

                    <!-- By default feed account tab will be shown to any user -->
                    <?php if (isset($tab) && $tab == "feed") : ?>
                        <!-- Logic to show users feed/posts: This peice of code fetches the posts
                    from Post table in database for that particular user.
                    If user have multiple posts created then the fetching operation (SQL query) will
                    return multiple rows and the post boxes will recursively created for every posts -->
                        <div class="acc-feed">
                            <p>Welcome to <?php echo $fname ?>'s feed...</p>

                            <!-- Feed posting box logic: This box will only be visible to the user
                        who is logged in and present on his/her account page only -->

                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $username) : ?>
                                <div class="feed-post-box">
                                    <form action="/post.php" method="post" enctype="multipart/form-data">
                                        <textarea name="post" id="post" wrap="hard" placeholder="Whats in your mind? <?php echo $fname; ?>" class="feed-post-box-textarea"></textarea>
                                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                        <input type="hidden" name="username" value="<?php echo $username; ?>">
                                        <input type="file" name="postimage" accept=".jpg, .png, .jpeg" class="postimage">
                                        <button type="submit" class="post-btn" style="cursor: pointer;" >Post</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                            <!-- Logic for Displaying users post in the form of Post box -->
                            <?php
                            /*post fetching query: this query fetches all the rows where uid is users id.
                        all the posts (rows) are iterated with help of foreach loop*/
                            $postsql = "SELECT `msg`, `image`, `pid`, `dop` FROM `posts` WHERE `uid` = " . $user_id . " ORDER BY `dop` DESC;";
                            // executing query
                            $postresult = mysqli_query($connection, $postsql);
                            // counting number of rows return by query and only show post box
                            // if number posts are greater than zero

                            if (mysqli_num_rows($postresult) > 0) {
                                // fetching rows returned by query
                                $postrows = mysqli_fetch_all($postresult);

foreach ($postrows as $postrow) {
                                    if ($postrow[1] == NULL) {
                                        echo '<div class="feed-post-display-box">
                                            <div class="feed-post-display-box-head">
                                                <ul>
                                                    <li>
                                                    <a href="account.php?username=' . $username . '" style="text-decoration: none;"><img src="https://api.dicebear.com/6.x/initials/png?seed=' . $fname . '&size=128" alt="profile" class="account-profpic"></a>
                                                    </li>
                                                    <li style="padding-left: 10px; padding-right: 10px;">
                                                        <a href="account.php?username=' . $username . '" style="text-decoration: none;">' . $fname . '</a>
                                                    </li>
                                                    <li style="vertical-align:baseline;">
                                                    <small>shared a post in the feed on </small>
                                                        <small>' . $postrow[3] . '</small>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="feed-post-display-box-message">
                                                ' . str_replace("\n", "<br>", $postrow[0]) . '
                                            </div>
                                        </div>';
                                    } else {
                                        echo '<div class="feed-post-display-box">
                                            <div class="feed-post-display-box-head">
                                                <ul>
                                                    <li>
                                                    <a href="account.php?username=' . $username . '" style="text-decoration: none;"><img src="https://api.dicebear.com/6.x/initials/png?seed=' . $fname . '&size=128" alt="profile" class="account-profpic"></a>
                                                    </li>
                                                    <li style="padding-left: 10px; padding-right: 10px;">
                                                        <a href="account.php?username=' . $username . '" style="text-decoration: none;">' . $fname . '</a>
                                                    </li>
                                                    <li style="vertical-align:baseline;">
                                                    <small>shared a post in the feed on </small>
                                                        <small>' . $postrow[3] . '</small>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="feed-post-display-box-message">
                                                ' . str_replace("\n", "<br>", $postrow[0]) . '
                                            </div>
                                            <div class="feed-post-display-box-image">
                                                <img src="uploads/' . $postrow[1] . '" alt="' . $postrow[1] . '" style="width: 100%; object-fit:contain; margin-bottom: 20px; border-radius: 5px">
                                            </div>
                                        </div>';
                                    }
                                }
                            } else {
                                echo '<p>Posts Not found</p>';
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($tab == "info") : ?>
                        <div class="acc-info">
                            <p>Get to know <?php echo $fname ?> more...</p>
                            <div class="acc-info-content">
                                <h3 class="acc-info-content-head">Basic</h3>
                                <ul class="acc-info-content-lst">
                                    <li>
                                        <ul class="acc-info-content-list">
                                            <li class="acc-info-content-list">
                                                <p>Name :</p>
                                            </li>
                                            <li class="acc-info-content-list">
                                                <?php
                                                echo "$fname";
                                                ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <ul class="acc-info-content-list">
                                            <li class="acc-info-content-list">
                                                <p>Last Name :</p>
                                            </li>
                                            <li class="acc-info-content-list">
                                                <?php
                                                echo "$lname";
                                                ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <ul class="acc-info-content-list">
                                            <li class="acc-info-content-list">
                                                <p>Username :</p>
                                            </li>
                                            <li class="acc-info-content-list">
                                                <?php
                                                echo"$username";
                                                ?>
                                            </li>
                                        </ul>
                                    </li>

                                    <li>
                                        <ul class="acc-info-content-list">
                                            <li class="acc-info-content-list">
                                                <p>Email :</p>
                                            </li>
                                            <li class="acc-info-content-list">
                                                <?php
                                                echo "$email";
                                                ?>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if ($tab == "photo") : ?>
    <div class="acc-photo">
        <p>See photos from <?php echo $fname; ?>...</p>
        <?php
        $postsqlimg = "SELECT `image`, `msg`, `dop`, `uid` FROM `posts` WHERE `uid` = " . $user_id . " AND `image` IS NOT NULL ORDER BY `dop` DESC;";
        $postresultimgs = mysqli_query($connection, $postsqlimg);

        if (mysqli_num_rows($postresultimgs) > 0) {
            while ($postrow = mysqli_fetch_assoc($postresultimgs)) {
                echo '<div class="feed-post-display-box">
                        <div class="feed-post-display-box-head">
                            <ul>
                                <li>
                                <a href="account.php?username=' . $username . '" style="text-decoration: none;"><img src="https://api.dicebear.com/6.x/initials/png?seed=' . $fname . '&size=128" alt="profile" class="account-profpic"></a>
                                </li>
                                <li style="padding-left: 10px; padding-right: 10px;">
                                    <a href="account.php?username=' . $username . '" style="text-decoration: none;">' . $fname . '</a>
                                </li>
                                <li style="vertical-align:baseline;">
                                <small>shared a post in the feed on </small>
                                    <small>' . $postrow['dop'] . '</small>
                                </li>
                            </ul>
                        </div>
                        <div class="feed-post-display-box-message">
                            ' . str_replace("\n", "<br>", $postrow['msg']) . '
                        </div>
                        <div class="feed-post-display-box-image">
                        <a href="#">  <img src="uploads/' . $postrow['image'] . '" alt="' . $postrow['image'] . '" style="width: 100%; object-fit:contain; margin-bottom: 20px; border-radius: 5px">
                        </a></div>
                    </div>';
            }
        } else {
            echo '<p>Posts Not found</p>';
        }
        ?>
    </div>
<?php endif; ?>
</div>
</div>
</div>
<?php } ?>



    <?php
    if (!(isset($_GET['search'])) && !(isset($_GET['username']))) {
        readfile("back/search.php");
    }
    ?>

<div class="footer" style="height:16rem">
        <p style="  font-size: x-large;margin-top:0;">Minglr</p>
    <ul class="footer-icons">
    <li class="foot-item">
            <a href="https://github.com/Mayuresh-22/Minglr" class="foot-link"><i class="fa-brands fa-github"></i></a>
        </li>
        <li class="foot-item">
            <a href="https://x.com/mayuresh_empire" class="foot-link"><i class="fab fa-twitter"></i></a>
        </li>
        <li class="foot-item">
            <a href="https://www.linkedin.com/in/mayureshchoudhary/" class="foot-link"><i class="fa-brands fa-linkedin"></i></a>
        </li>
        <!-- <li class="foot-item">
            <a href="#" class="foot-link"><i class="fab fa-youtube"></i></a>
        </li> -->
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
