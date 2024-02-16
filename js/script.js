
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

        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var post = this.closest('.feed-post-display-box');
                post.remove();
            });
        });