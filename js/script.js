
console.log("Number of delete buttons:");// Check button in mobile view
const menuBTN = document.querySelector('.menu-btn');
const menuItems = document.querySelector('.menu-items');

function toggleBtn() {
    menuBTN.classList.toggle("change");
    menuItems.classList.toggle("active");
    console.log("Number of delete buttons:");
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

        // document.addEventListener("DOMContentLoaded", function() {
        //    // Get all delete buttons
        //      var deleteButtons = document.querySelectorAll('.delete-btn');
        
        //     // Loop through each delete button
        //     deleteButtons.forEach(function(button) {
        //         // Add click event listener to each delete button
        //         button.addEventListener('click', function() {
        //             // Find the closest ancestor element with class ".feed-post-display-box"
        //             var post = this.closest('.feed-post-display-box');
        //             // If found, remove the post
        //             if (post) {
        //                 post.remove();
        //             }
        //         });
        //     });
        // });
        var deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var post = this.closest('.feed-post-display-box');
                post.remove();
            });
        });