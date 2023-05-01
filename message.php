<?php
include("db/connection.php");

// starting session
session_start();

// getting GET & SESSION variables
$recp1 = $_SESSION['uid'];
$recp2 = $_GET['recp2'];

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
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/message.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    </head>

<body>
    <div class="navbar">
        <ul>
            <li>
                <a href="<?php echo $home_page; ?>"><img class="logo" src="logo/logo.png"></a>
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
        </ul>
    </div>
</body>
</html>