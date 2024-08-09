<?php
include("db/connection.php");
include("back/env.php");

// starting session
session_start();

// redirecting user if not logged-in
if(!isset($_SESSION['username']) || !isset($_GET['recp2']) || !isset($_SESSION['id'])){
    echo "
    <script>
        alert('Error occurred please Login to continue');
        window.location = '$home_page';
    </script>
    ";
}

// getting GET & SESSION variables
$recp1 = $_SESSION['id'];
$recp2 = $_GET['recp2'];

// $recp1 = 7;
// $recp2 = 1;

//set $username for both the recipients
// creating associative array to access username with id
$username = array();
$name = array();
$status = array();

$sql = "SELECT `username` FROM `users` WHERE `id` = $recp1";
$result = mysqli_query($connection, $sql);
$rows = mysqli_fetch_all($result);
// setting username and name for recipient 1
$username[$recp1] = $rows[0][0];
$name[$recp1] = "Me";
$status[$recp1] = 1;

$sql = "SELECT `username`, `fname`, `status` FROM `users` WHERE `id` = $recp2";
$result = mysqli_query($connection, $sql);
$rows = mysqli_fetch_all($result);
// setting username and name for recipient 2
$username[$recp2] = $rows[0][0];
$name[$recp2] = $rows[0][1];
$status[$recp2] = $rows[0][2];


// checking whether the room with recipient already exits or not
$sql = "SELECT * FROM `rooms` WHERE (`recp1` = ".$recp1." OR `recp1` = ".$recp2.") AND (`recp2` = ".$recp1." OR `recp2` = ".$recp2.");";
$result = mysqli_query($connection, $sql);

if(mysqli_num_rows($result) == 1){
    $rows = mysqli_fetch_assoc($result);
    // set $room_id
    $room_id = $rows['room_id'];
} else if(mysqli_num_rows($result) == 0){
    // creating new room for the recipients
    $sql = "INSERT INTO `rooms` (`room_id`, `recp1`, `recp2`) VALUES (NULL, '".$recp1."', '".$recp2."');";
    $result = mysqli_query($connection, $sql);
    
    // set $room_id
    $sql = "SELECT `room_id` FROM `rooms` WHERE `recp1` = ".$recp1." AND `recp2` = ".$recp2.";";
    $result = mysqli_query($connection, $sql);
    $rows = mysqli_fetch_assoc($result);
    $room_id = $rows['room_id'];
}

?>

<html>
    <title>Minglr - Get Connected</title>
    <head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/message.css"> -->

    <!-- Dark theme css -->
    <link rel="stylesheet" href="style/lighttheme_css/light_style.css?t=<?php echo time();?>">  
    <link rel="stylesheet" href="style/lighttheme_css/light_message.css?t=<?php echo time();?>" id="theme">  

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
      <label class="logo"><a href="/"><img class="logo" src="logo/Minglr logo1.png"></a></label>

        <ul>
            <img src="img/dark_img/MoonIcon.png" alt="Theme Icon" height="19" width="19" id="theme-icon" id="theme-toggle" class="theme-button" onclick="changeTheme()">
        </ul>
      <ul class="menu-items">
        <li class="menu-items-li"><a class="navv-item" href="feed.php"> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                        <path fill-rule="evenodd" d="M3.75 4.5a.75.75 0 0 1 .75-.75h.75c8.284 0 15 6.716 15 15v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75C18 11.708 12.292 6 5.25 6H4.5a.75.75 0 0 1-.75-.75V4.5Zm0 6.75a.75.75 0 0 1 .75-.75h.75a8.25 8.25 0 0 1 8.25 8.25v.75a.75.75 0 0 1-.75.75H12a.75.75 0 0 1-.75-.75v-.75a6 6 0 0 0-6-6H4.5a.75.75 0 0 1-.75-.75v-.75Zm0 7.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                    </svg>Feed</a></li>
        <li class="menu-items-li">
            <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="navv-item" href="account.php?username='.$_SESSION['username'].'" "><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                  </svg>Account</a>';
                }else{
                    echo '<a class="navv-item" href="account.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
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
                <a href="<?php echo $home_page; ?>"><img class="logo" src="logo/logo.png"></a>
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

    <div class="message-body">
        <div class="message-window">
            <div class="message-window-head">
                <ul>
                    <li>
                        <a href="account.php?username=<?php if($username[$recp1] != $_SESSION['username']){echo $username[$recp1];} else{echo $username[$recp2];} ?>" style="text-decoration: none;"><img src="img/user.png" alt="profile" class="<?php if($status[$recp2]==1){echo "message-account-profpic-online";} else{echo "message-account-profpic-offline";}?>"></a>
                    </li>
                    <li>
                        <?php if($username[$recp1] != $_SESSION['username']){echo "<b>".$name[$recp1]."</b>";} else{echo "<b>".$name[$recp2]."</b>";} ?>
                        <?php if($status[$recp2]==1){echo "<small><br>online</small>";} else{echo "<small><br>offline</small>";} ?>
                    </li>
                </ul>
            </div>
            <div class="message-window-message-box" id="message-window-message-box">
                    <?php
                        // fetching all the messages for room_id
                        $sql = "SELECT `author`, `message`, `dos` FROM `messages` WHERE `room_id` = ".$room_id.";";

                        $result = mysqli_query($connection, $sql);

                        if(mysqli_num_rows($result) > 0){
                            $rows = mysqli_fetch_all($result);
                            foreach($rows as $row){
                                echo '<div class="message-window-message-display-box">
                                    <div class="message-window-message-display-box-head">
                                        <ul>
                                            <li style="padding-left: 0px; padding-right: 10px;">
                                                <a href="account.php?username='.$username[$row[0]].'" style="text-decoration: none;">'.$name[$row[0]].'</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="message-window-message-display-box-message">
                                        '.str_replace("\n", "<br>", $row[1]).'
                                    </div>
                                </div>';
                            }
                        } else{
                            echo "<center><small>Start new Conversation</small></center>";
                        }
                    ?>
            </div>
            <script>
                document.getElementById("message-window-message-box").scrollTo(0, document.getElementById("message-window-message-box").scrollHeight);
            </script>
            <div class="message-window-input-message">
                <form action="pvtmsg.php" method="POST">
                    <input type="text" name="message" id="message" placeholder="type message..." required>
                    <input type="hidden" name="author" id="author" value="<?php echo $recp1; ?>">
                    <input type="hidden" name="room" id="room" value="<?php echo $room_id; ?>">
                    <input type="hidden" name="recp1" id="recp1" value="<?php echo $recp1; ?>">
                    <input type="hidden" name="recp2" id="recp2" value="<?php echo $recp2; ?>">
                </form>
            </div>
        </div>
    </div>

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
    <script src="js/script.js"></script>
</body>
</html>
