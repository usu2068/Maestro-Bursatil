
(function () {
    "use strict";

    $(document).ready(function () {
        $("a").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();
                // Store hash
                var hash = this.hash;
                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function () {
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });



    window.sr = ScrollReveal();

    sr.reveal('.opacity', {
        duration: 9000,
        opacity: 1,
        origin: 'top',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 700,
        reset: false,
        scale: 1.4,
        distance: '0px'
    }, 60);

        sr.reveal('.drop', {
        duration: 3000,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 300,
        reset: false,
        scale: 1,
        distance: '150px'
    }, 60);

         sr.reveal('.logo-l', {
        duration: 3000,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 300,
        reset: false,
        scale: 1,
        distance: '150px'
    }, 60);

          sr.reveal('.scroll-r', {
        duration: 4500,
        opacity: 0,
        origin: 'right',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 300,
        reset: false,
        scale: 1,
        distance: '200px'
    }, 60);

    sr.reveal('.righta', {
        duration: 3400,
        opacity: 0,
        origin: 'right',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 300,
        reset: true,
        scale: 1,
        distance: '190px'
    }, 60);

    /*-------------------------------------------------------------------------------------------------------------------------------*/
   // The End
    /*-------------------------------------------------------------------------------------------------------------------------------*/


})();