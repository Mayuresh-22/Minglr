// Check button in mobile view
const menuBTN = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');

function toggleBtn() {
    menuBTN.classList.toggle("change");
    menuItems.classList.toggle("active");
}

menuBTN.addEventListener('click', toggleBtn);
        
// JavaScript code for the lightbox feature
        function openLightbox(imageSrc) {
            var lightboxOverlay = document.getElementById('lightbox-overlay');
            var lightboxImage = document.getElementById('lightbox-image');

            lightboxImage.src = imageSrc;
            lightboxOverlay.style.display = 'block';
        }

        function closeLightbox() {
            var lightboxOverlay = document.getElementById('lightbox-overlay');
            lightboxOverlay.style.display = 'none';
        }

        document.addEventListener("DOMContentLoaded", function() {
            var images = document.querySelectorAll('.feed-post-display-box-image img');

            images.forEach(function(image) {
                image.addEventListener('click', function() {
                    openLightbox(this.src);
                });
            });
        });

//Dark theme code
  

function changeTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_feed.css");
        themeIcon.setAttribute("src", "img/dark_img/MoonIcon.png");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_feed.css");
        themeIcon.setAttribute("src", "img/dark_img/SunIcon.png");
    }
}

function changeAccountTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_account.css");
        themeIcon.setAttribute("src", "img/dark_img/MoonIcon.png");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_account.css");
        themeIcon.setAttribute("src", "img/dark_img/SunIcon.png");
    }
}

function changeIndexTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_style.css");
        themeIcon.setAttribute("src", "img/dark_img/MoonIcon.png");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_style.css");
        themeIcon.setAttribute("src", "img/dark_img/SunIcon.png");
    }
}


function changeMessageTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_message.css");
        themeIcon.setAttribute("src", "img/dark_img/MoonIcon.png");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_message.css");
        themeIcon.setAttribute("src", "img/dark_img/SunIcon.png");
    }
}




