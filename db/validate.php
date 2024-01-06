<?php
// including root connection file
include("connection.php");
include("../back/env.php");

// Data from Post
$username = strtolower(trim($_POST['username']));
$password = trim($_POST['password']);

// Additional data for registration
if (isset($_POST['regst'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
}

// login tracker
$login = 0;

// validate function to validate username and password
function validate($username, $password, $connection) {
    // login variable
    global $login;

    // Convert plain password to hashed form
    $hashed_pswd = crypt($password, '$1$');

    // SQL query to check if username exists and password matches
    $sql = "SELECT `id`, `username`,`password` FROM `users` WHERE `username` = '$username'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (($row['username'] == $username) && ($row['password'] == $hashed_pswd)) {
            $login = 1;
        } else {
            $login = 0;
        }
    } else {
        $login = 0;
    }
}

// alerting function
function alert_message($message, $location) {
    echo '<script language="javascript">';
    echo 'alert("' . $message . '");';
    echo 'window.location="' . $location . '";';
    echo '</script>';
}

// checking if the user is logging in or registering
if (isset($_POST['lgn']) && isset($username) && isset($password)) {
    // passing required value to validate function and checking the result
    validate($username, $password, $connection);
    if ($login == 0) {
        alert_message("Username & Password don't match", $home_page);
        exit();
    }
    /* As logged in details are validated, we will start the session for that user.
    We will be adding some piece of information */

    // to add user id we will run another query
    $sql = "SELECT `id` FROM `users` WHERE `username` = '$username';";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        // fetching and storing records in variables
        $row = mysqli_fetch_assoc($result);
        $uid = $row['id'];
    }

    // start session after verification
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['status'] = $login;
    $_SESSION['id'] = $uid;

    echo '<script language="javascript">';
    echo 'window.location="' . $home_page . 'account.php?username=' . $username . '";';
    echo '</script>';
} else {
    if (isset($_POST['regst']) && isset($username) && isset($password) && isset($email) && isset($fname) && isset($lname)) {
        // Validating email format using RegEx
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            alert_message("Invalid email format", $home_page);
            exit();
        }

        // Validating password using RegEx
        $password_pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if (!preg_match($password_pattern, $password)) {
            alert_message("Invalid password format", $home_page);
            exit();
        }

        $hashed_pswd = crypt($password, '$1$');

        $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
        $result = mysqli_query($connection, $sql);

        // check whether username exists
        if (mysqli_num_rows($result) == 0) {
            /* After passing validation (username exists? .etc) we will create an account for the user */
            $sql = "INSERT INTO `users` (`id`, `username`, `fname`, `lname`, `email`, `password`) VALUES (NULL, '$username', '$fname', '$lname', '$email', '$hashed_pswd')";

            mysqli_query($connection, $sql);

            // to add user id we will run another query
            $sql = "SELECT `id` FROM `users` WHERE `username` = '$username';";
            $result = mysqli_query($connection, $sql);

            if (mysqli_num_rows($result) == 1) {
                // fetching and storing records in variables
                $row = mysqli_fetch_assoc($result);
                $uid = $row['id'];
            }

            /* After creating an account for the user we will start the session for the user and redirect the user to the user's account page */
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["status"] = $login;
            $_SESSION["id"] = $uid;

            echo '<script language="javascript">';
            echo 'alert("Successfully! registered");';
            echo 'window.location="' . $home_page . 'account.php?username=' . $username . '";';
            echo '</script>';
        } else {
            alert_message("Username already taken. Try another one", $home_page);
        }
    }
}
?>
