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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <!-- Dark theme css -->
    <link rel="stylesheet" href="style/lighttheme_css/light_style.css?t=<?php echo time();?>" id="theme">  
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-ZvHjXoebDRUrTnKh9WKpWV/A0Amd+fjub5TkBXrPxe5F7WfDZL0slJ6a0mvg7VSN3qdpgqq2y1blz06Q8W2Y8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <img src="img/dark_img/MoonIcon.png" alt="Theme Icon" height="19" width="19" id="theme-icon" id="theme-toggle" class="theme-button" onclick="changeIndexTheme()">
      </ul>
      <ul class="menu-items">

        <li class="menu-items-li"><a class="navv-item" href="feed.php"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="menu-icon">
                        <path fill-rule="evenodd" d="M3.75 4.5a.75.75 0 0 1 .75-.75h.75c8.284 0 15 6.716 15 15v.75a.75.75 0 0 1-.75.75h-.75a.75.75 0 0 1-.75-.75v-.75C18 11.708 12.292 6 5.25 6H4.5a.75.75 0 0 1-.75-.75V4.5Zm0 6.75a.75.75 0 0 1 .75-.75h.75a8.25 8.25 0 0 1 8.25 8.25v.75a.75.75 0 0 1-.75.75H12a.75.75 0 0 1-.75-.75v-.75a6 6 0 0 0-6-6H4.5a.75.75 0 0 1-.75-.75v-.75Zm0 7.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                    </svg>
Feed</a></li>
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
                        echo '<a class="navv-item active" href="index.php"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="menu-icon">
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
        <center><img class="login-logo" src="logo/Minglr logo3.png" alt="logo"></center>
        <center><small><button class="btn" onclick="getElementById('login-form').style.display='block'; getElementById('regst-form').style.display='none';">Login</button>OR<button class="btn" onclick="getElementById('login-form').style.display='none'; getElementById('regst-form').style.display='block';">Register</button></small></center>
        <div class="login">
            <form action="db/validate.php" method="post" class="login-form" id="login-form">
                <input type="text" for="usrname" id="username" autocomplete="off" name="username" placeholder="Username" required>
                <input type="password" for="password" id="password" name="password" placeholder="Password" autocomplete="off" required>
                <button class="login-btn" name="lgn" id="lgn">Login Now</button>
            </form>
        </div>
        <div class="register">
            <form action="db/validate.php" method="post" class="regst-form" id="regst-form" style="display: none;">
                <input type="text" for="usrname" id="usrname" name="username" placeholder="Username" autocomplete="off" required>
                <section class="name">
                <input type="text" for="fname" id="fname" name="fname" placeholder="First name" required pattern="[a-zA-Z]{2,}$"title="please enter alphabets only">
                <input type="text" for="lname" id="lname" name="lname" placeholder="Last name" required pattern="[a-zA-Z]{2,}$"title="please enter alphabets only">
                </section>
                <input type="email" for="email" id="email" name="email" placeholder="Email" required>
                <input type="password" id="pass" name="password" placeholder="Password" required>
                <!--only show for password input -->
                <div class="div-toggle-password">
                    <button id="togglePassword" hidden>Show</button>
                    <small id="kindOfPassword" hidden>
                        <span>🔒 size > 8 </span>
                        <span>🔠 Uppercase </span>
                        <span>🔡 Lowercase </span>
                        <span>🔢 Number </span>
                        <span>@!$# Special Character</span>
                    </small>
                </div>
                <small>Your data will be used to provide you with the seamless experience. We respect your privacy</small>
                <button class="rgst-btn" name="regst" id="regst" style="cursor: not-allowed;" disabled>Register</button>
                <!-- Handle password input -->
                <script>
                    const passwordInput = document.getElementById('pass');
                    const registerButton = document.getElementById('regst');
                    //only for password
                    const toggleButton = document.getElementById('togglePassword');
                    const kindOfPassword = document.getElementById('kindOfPassword');
                    const fnameInput=document.getElementById('fname');
                    const lnameInput=document.getElementById('lname');
                    passwordInput.addEventListener("input", () => {
                        //empty password field
                        if (passwordInput.value === "") {
                            passwordInput.classList.remove('valid-password', 'invalid-password');
                            registerButton.disabled = true;
                            registerButton.style.cursor = "not-allowed";    //change cursor to not-allowed
                            toggleButton.hidden = true;
                            kindOfPassword.hidden = true;
                        } else {    //non-empty password field
                            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/; //means a-z, A-Z, 0-9, @$!%*?& and min 8 characters
                            if (passwordPattern.test(passwordInput.value)) {    //check if password is valid
                                passwordInput.classList.remove('invalid-password');
                                passwordInput.classList.add('valid-password');
                                registerButton.disabled = false;     
                                registerButton.style.cursor = "pointer";   //enable register button    
                                toggleButton.hidden = false;            //hide password toggle button
                                kindOfPassword.hidden = false;
                            } else {    //invalid password
                                passwordInput.classList.remove('valid-password');
                                passwordInput.classList.add('invalid-password');
                                registerButton.disabled = true;                 //disable register button
                                registerButton.style.cursor = "not-allowed";    //change cursor to not-allowed
                                toggleButton.hidden = false;
                                kindOfPassword.hidden = false;
                            }
                        }
                    });
                    //toggle password visibility

                    toggleButton.addEventListener('click', (e) => {
                        e.preventDefault();
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);
                        toggleButton.textContent = type === 'password' ? 'Show' : 'Hide';
                    });
                    
                </script>
                
            </form>
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
