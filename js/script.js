// Check button in mobile view
const menuBTN = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');

function toggleBtn() {
    menuBTN.classList.toggle("change");
    menuItems.classList.toggle("active");
}

menuBTN.addEventListener('click', toggleBtn);


//js for footer

//footer nav window animation
let FootLinkClicked=Array.from(document.querySelectorAll('.foot-link'));

FootLinkClicked.forEach(element => {
    element.addEventListener("click",()=>
{
    FootLinkClicked.forEach(e=>{
        e.classList.remove('footer-Link-Active');
    })

   element.classList.toggle("footer-Link-Active");
   
})
});


//top button function
document.querySelector(".footerTopArrow").addEventListener("click",()=>{
    window.scrollTo({top: 0, behavior: 'smooth'});
})


