// Check button in mobile view
const menuBTN = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');

function toggleBtn() {
    menuBTN.classList.toggle("change");
    menuItems.classList.toggle("active");
}

menuBTN.addEventListener('click', toggleBtn);

document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.getElementById("logout-anchor");
    const logoutConfirmation = document.getElementById("Confirm-logout-box");
    const confirmLogoutBtn = document.getElementById("Confrim-btn");
    const cancelLogoutBtn = document.getElementById("Cancel-btn");
    
    // Show confirmation panel when logout button is clicked
    logoutBtn.addEventListener("click", function() {
        logoutConfirmation.style.display = "block";
    });

    // Hide confirmation panel when cancel button is clicked
    cancelLogoutBtn.addEventListener("click", function() {
        logoutConfirmation.style.display = "none";        

    });

    // Perform logout action when confirm button is clicked
    confirmLogoutBtn.addEventListener("click",function() {
        window.location.href="back/logout.php";

    });
});

