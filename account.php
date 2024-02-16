<?php
ob_start();

// starting session only when $_session is set
session_start();
include("back/env.php");

include("db/connection.php");

// getting GET parameters
if (isset($_GET['search'])) {
    $username = $_GET['search'];

    // including root database connection file

    $sql = "SELECT `id`,`username`, `fname`, `lname`, `email` FROM `users` WHERE `username` LIKE '%$username%'OR `fname` LIKE '%$username%' OR `lname` LIKE '%$username%';";
    // die($sql);
    $result = mysqli_query($connection, $sql);
}

?>

<html>
<title>Minglr - Get Connected</title>

<head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/account.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon_minglr.png" type="image/png">
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>
    <script>
        function showAlert(message) {
            alert(message);
        }
    </script>

<body>
    <nav>
        <label class="logo"><a href="/"><img class="logo" src="logo\logo.png"></a></label>
        <div class="menu-btn">
            <div class="bar bar1"></div>
            <div class="bar bar2"></div>
            <div class="bar bar3"></div>
        </div>

        <ul class="menu-items">
            <li class="menu-items-li"><a class="navv-item" href="feed.php">Feed</a></li>
            <li class="menu-items-li">
                <?php
                if(isset($_SESSION['username'])){
                    echo '<a class="navv-item active" href="account.php?username='.$_SESSION['username'].'" ">Account</a>';
                }else{
                    echo '<a class="navv-item active" href="account.php">Account</a>';
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
            echo '<script>showAlert("User not found!");</script>';
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
                <div class="account-banner" style="background-image: url('img/banner.png');">
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
                                        <button type="submit" class="post-btn" style="cursor: pointer;">Post</button>
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
                                                <form method="post" action="" onsubmit="return confirmDeletePost();">
       <input type="hidden" name="post_id" value="' . $postrow[2] . '">
       <button type="submit" name="delete_post" class="delete-btn">Delete</button>
        </form>
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
                                                <form method="post" action="" onsubmit="return confirmDeletePost();">
       <input type="hidden" name="post_id" value="' . $postrow[2] . '">
       <button type="submit" name="delete_post" class="delete-btn">Delete</button>
        </form>
                                            </div>
                                            <div class="feed-post-display-box-message">
                                                <div class="post-image">
                                                    <img src="' . $postrow[1] . '" alt="Post Image" class="post-image">
                                                </div>
                                                ' . str_replace("\n", "<br>", $postrow[0]) . '
                                            </div>
                                        </div>';
                                    }
                                }
                            } else {
                                echo "<p>No post yet...</p>";
                            }
                            ?>
                        </div>
                    <?php elseif (isset($tab) && $tab == "info") : ?>
                        <!-- Logic to show users info: This peice of code fetches the posts
                    from Post table in database for that particular user.
                    If user have multiple posts created then the fetching operation (SQL query) will
                    return multiple rows and the post boxes will recursively created for every posts -->
                        <div class="acc-info">
                            <p>Welcome to <?php echo $fname ?>'s info...</p>
                            <div class="acc-info-wrapper">
                                <ul>
                                    <li>Username: <?php echo $username_row; ?></li>
                                    <li>Name: <?php echo $fname . " " . $lname; ?></li>
                                    <li>Email: <?php echo $email; ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php elseif (isset($tab) && $tab == "photo") : ?>
                        <!-- Logic to show users photo: This peice of code fetches the posts
                    from Post table in database for that particular user.
                    If user have multiple posts created then the fetching operation (SQL query) will
                    return multiple rows and the post boxes will recursively created for every posts -->
                        <div class="acc-photo">
                            <p>Welcome to <?php echo $fname ?>'s photo...</p>
                            <!-- Here we are fetching user uploaded photo and displaying it on the
                        photo tab page. -->
                            <?php
                            // fetching all the posts image with help of the image URL and then displaying
                            // it on the screen in the form of image box.
                            $photosql = "SELECT `image`, `pid`, `dop` FROM `posts` WHERE `uid` = " . $user_id . " AND `image` IS NOT NULL ORDER BY `dop` DESC;";
                            $photoresult = mysqli_query($connection, $photosql);
                            if (mysqli_num_rows($photoresult) > 0) {
                                $photorows = mysqli_fetch_all($photoresult);
                                foreach ($photorows as $photorow) {
                                    echo '<div class="acc-photo-box">
                                            <img src="' . $photorow[0] . '" alt="Post Image" class="acc-photo-img">
                                        </div>';
                                }
                            } else {
                                echo "<p>No photo yet...</p>";
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.menu-btn').click(function() {
                $('.menu-items').toggleClass("active");
                $('.menu-btn').toggleClass("active");
            });
        });
    </script> -->
    <script src="script.js"></script>
    <script>
    function confirmDeletePost() {
        return confirm("Are you sure you want to delete this post?");
    }
</script>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_post'])) {
    // Validate and sanitize input
    $post_id = $_POST['post_id'];

    // Prepare a delete statement
    $sql = "DELETE FROM posts WHERE pid = ?";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($connection, $sql);
    if ($stmt === false) {
        // Handle the error
        die("Error: Could not prepare statement");
    }

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "i", $post_id);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Post deleted successfully
        // Redirect back to the account page or wherever you want
        $username = $_GET['username']; // Get the username from the URL parameter
        header("Location: account.php?username=$username");
        exit();
    } else {
        // Handle the error
        echo "Error: Could not execute the statement";
        exit(); // Exit script to prevent further output
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($connection);

// Flush the output buffer and turn off buffering
ob_end_flush();
?>