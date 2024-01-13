<?php
session_start();

// Redirect to feed.php if the user is already logged in
if (isset($_SESSION["username"])) {
    header("Location: feed.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minglr - Social Networking Site</title>

    <!-- Meta tags for SEO -->
    <meta name="description" content="Experience social networking like never before with Minglr...">
    <meta name="keywords" content="Personalized Account Page, Dynamic Feed of Shared Posts, Expressive Content Sharing, ...">

    <!-- External stylesheets -->
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon_minglr.png" type="image/png">

    <!-- Font Awesome Kit -->
    <script src="https://kit.fontawesome.com/17a4e5185f.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- Navigation -->
    <nav>
        <!-- Your navigation code -->
    </nav>

    <!-- Header Separator -->
    <div class="separate_header"></div>

    <!-- Login/Signup Section -->
    <div class="login-signup">
        <!-- Your login/signup code -->
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <!-- Social Media Icons -->
        <ul class="footer-icons">
            <!-- Your social media icon links -->
        </ul>

        <!-- Footer Links -->
        <ul class="footer-links">
            <!-- Your footer links -->
        </ul>

        <!-- Footer Disclaimer -->
        <p>This website is only for educational purposes and does not try to replicate any institution/entity/company - by Mayuresh Choudhary</p>
    </div>

    <!-- JavaScript -->
    <script src="js/script.js"></script>
</body>

</html>
