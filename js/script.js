// Check button in mobile view
const menuBTN = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');

function toggleBtn() {
    menuBTN.classList.toggle("change");
    menuItems.classList.toggle("active");
}

menuBTN.addEventListener('click', toggleBtn);

//Dark theme code
  

function changeTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_feed.css");
        themeIcon.setAttribute("src", "img/dark_img/Moonicon.svg");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_feed.css");
        themeIcon.setAttribute("src", "img/dark_img/Sunicon.svg");
    }
}

function changeAccountTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_account.css");
        themeIcon.setAttribute("src", "img/dark_img/Moonicon.svg");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_account.css");
        themeIcon.setAttribute("src", "img/dark_img/Sunicon.svg");
    }
}

function changeIndexTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_style.css");
        themeIcon.setAttribute("src", "img/dark_img/Moonicon.svg");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_style.css");
        themeIcon.setAttribute("src", "img/dark_img/Sunicon.svg");
    }
}


function changeMessageTheme() {
    const theme = document.getElementById("theme");
    const themeIcon = document.getElementById("theme-icon");
    //console.log('theme:',theme.getAttribute("href").includes("darktheme_css"));
    if (theme.getAttribute("href").includes("darktheme_css")) {
        theme.setAttribute("href", "style/lighttheme_css/light_message.css");
        themeIcon.setAttribute("src", "img/dark_img/Moonicon.svg");
    } else {
        theme.setAttribute("href", "style/darktheme_css/dark_message.css");
        themeIcon.setAttribute("src", "img/dark_img/Sunicon.svg");
    }
}




