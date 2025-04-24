// ┏━━━┓ ┏━━━┓ ┏━━━┓ ┏━━━┓ ┏┓︱︱︱   ︱︱┏┓ ┏━━━┓
// ┃┏━━┛ ┃┏━┓┃ ┃┏━┓┃ ┃┏━┓┃ ┃┃︱︱︱   ︱︱┃┃ ┃┏━┓┃
// ┃┗━━┓ ┃┃︱┃┃ ┃┃︱┗┛ ┃┃︱┃┃ ┃┃︱︱︱   ︱︱┃┃ ┃┗━━┓
// ┃┏━━┛ ┃┃︱┃┃ ┃┃︱┏┓ ┃┗━┛┃ ┃┃︱┏┓   ┏┓┃┃ ┗━━┓┃
// ┃┃︱︱︱ ┃┗━┛┃ ┃┗━┛┃ ┃┏━┓┃ ┃┗━┛┃   ┃┗┛┃ ┃┗━┛┃
// ┗┛︱︱︱ ┗━━━┛ ┗━━━┛ ┗┛︱┗┛ ┗━━━┛   ┗━━┛ ┗━━━┛

/*○═════════════════════════════════════════════════════════════════════════○
    This is main JS file that contains custom Codes used in this template
○══════════════════════════════════════════════════════════════════════════○*/

/* Template Name: Triumph Creative*/
/* Version: 1.0 Initial Release*/
/* Author: Alwin From Unbranded.*/
/* Website: http://www.unbrandeddesignstudio.com */
/* Copyright: (C) 2018 */


(function () {
    "use strict";

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Feather ICONS Initialization
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    feather.replace()

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Way-point Initialization
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('#about').waypoint(function (direction) {
        if (direction === 'down') {
        $('.logo-wrap').addClass("logo-hide");
        } 
        else {
        $('.logo-wrap').removeClass("logo-hide");
        }
    },);

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // SVG Frame Slider  ( Home 01 )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    {
        setTimeout(() => document.body.classList.add('render'), 60);
        const navdemos = Array.from(document.querySelectorAll('nav.demos > .demo'));
        const navigate = (linkEl) => {
            document.body.classList.remove('render');
            document.body.addEventListener('transitionend', () => window.location = linkEl.href);
        };
        navdemos.forEach(link => link.addEventListener('click', (ev) => {
            ev.preventDefault();
            navigate(ev.target);
        }));
    }

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    //Smooth Between Scrolling Sections
    /*-------------------------------------------------------------------------------------------------------------------------------*/

        $('#master-wrap').delegate('a', 'click', function(event) { 
             if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function () {
                    window.location.hash = hash;
                });
            }
         });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Vegas Background Slider Image Setup ( Common Backgrounds )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    /*---------------------------------------*/
    // home 02 background image Setup

    $("#dark-images.home-02").vegas({
        slides: [{
            src: "images/launch/02/d-bg.jpg"
        }],
        animation: 'kenburns',
        delay: 9000,
        timer: false
    });

    $(".home-02").vegas({
        slides: [{
            src: "images/launch/02/bg.jpg"
        }],
        animation: 'kenburns',
        delay: 9000,
        timer: false
    });


    /*---------------------------------------*/
    // home 03 background image Setup

    $("#dark-images.home-03").vegas({
        slides: [{
            src: "images/launch/03/d-bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    $(".home-03").vegas({
        slides: [{
            src: "images/launch/03/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });


    /*---------------------------------------*/
    // home 05 background image Setup

    $("#dark-images.home-05").vegas({
        slides: [{
            src: "images/launch/05/d-bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    $(".home-05").vegas({
        slides: [{
            src: "images/launch/05/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });


    /*---------------------------------------*/

    // home 06 background image Setup
    $("#dark-images.home-06").vegas({
        slides: [{
            src: "images/launch/06/d-bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    $(".home-06").vegas({
        slides: [{
            src: "images/launch/06/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });


    /*---------------------------------------*/

    // home 07 background image Setup
    $("#dark-images.home-07").vegas({
        slides: [{
            src: "images/launch/07/d-bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    $(".home-07").vegas({
        slides: [{
            src: "images/launch/07/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    /*---------------------------------------*/
    // home 08 background image Setup

    $(".home-08").vegas({
        slides: [{
                src: "images/launch/08/bg.jpg"
            },
            {
                src: "images/launch/08/bg2.jpg"
            },
            {
                src: "images/launch/08/bg3.jpg"
            }
        ],
        transition: 'flash',
        animation: 'kenburnsUpRight',
        delay: 5000,
        timer: false
    });


    $(".personal").vegas({
        slides: [{
            src: "images/personal/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });

    $(".app-landing").vegas({
        slides: [{
            src: "images/app-landing/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 9000,
        timer: false
    });


    $(".coming-soon-page").vegas({
        slides: [{
            src: "images/coming-soon/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 25000,
        timer: false
    });


    $(".error-page").vegas({
        slides: [{
            src: "images/404/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 25000,
        timer: false
    });

    $(".blog-01").vegas({
        slides: [{
            src: "images/blog-page/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 25000,
        timer: false
    });

    $(".blog-02").vegas({
        slides: [{
            src: "images/blog-page/bg.jpg"
        }],
        animation: 'kenburnsUpRight',
        delay: 25000,
        timer: false
    });


    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Animated hamburger menu icon setup   
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.menu-ico-style').delegate('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4', 'click', function() { $(this).toggleClass('open'); });

    
    // Closing Menu after clicking on a item

    $('.ub-svg-menu-items').delegate('a', 'click', function() { 
        $('.overlay-cornershape').removeClass('open');
        $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').removeClass('open');
    });



    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Team Section Slider   
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.team-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        arrows: true,
        prevArrow: "<img class='a-left control-c prev slick-prev' src='images/left.png'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='images/right.png'>",
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 414,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Mini Gallery Section Slider   ( About )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.popular-works-wrap').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        pauseOnHover: false,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 900,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Mini Gallery Section Slider   ( Only in Personal variant )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.personel-works').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        pauseOnHover: false,
        autoplaySpeed: 2000,
        responsive: [{
                breakpoint: 900,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Main Text Content slider  ( Only in Home 03 )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.home-3-txt-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        fade: true,
        pauseOnHover: false,
        autoplaySpeed: 8000
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    //  Testimonial slider ( Client Words )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.client-words').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        swipe: false,
        arrows: false,
        fade: true,
        asNavFor: '.client-thumb'
    });
    $('.client-thumb').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.client-words',
        dots: false,
        centerMode: false,
        swipe: false,
        focusOnSelect: true
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    //  About Section Synced Carousel     
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.about-slide-zip').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        swipe: false,
        adaptiveHeight: true,
        fade: true,
        asNavFor: '.about-slide-btns'
    });
    $('.about-slide-btns').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.about-slide-zip',
        dots: false,
        arrows: false,
        centerMode: false,
        swipe: false,
        focusOnSelect: true
    });


    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Progress Bar Setup  ( About Skills )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('#one').LineProgressbar({
        percentage: 80,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });
    $('#two').LineProgressbar({
        percentage: 95,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });
    $('#three').LineProgressbar({
        percentage: 75,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });
    $('#four').LineProgressbar({
        percentage: 60,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });
    $('#five').LineProgressbar({
        percentage: 85,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });
    $('#six').LineProgressbar({
        percentage: 65,
        fillBackgroundColor: '#00DCD4',
        backgroundColor: '#EEEEEE',
        radius: '0px',
        height: '2px',
        width: '100%'
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Portfolio-grid Setup ( Common Setup | Style changes in CSS )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Portfolio Shuffle init
    var $grid2 = $('.portfolio-grid'),
        $sizer2 = $grid2.find('.shuffle__sizer');
    // imagestoload plugin initialization

    $grid2.imagesLoaded(function () {
        $grid2.shuffle({
            itemSelector: '.picture-item',
            sizer: $sizer2
        });
    });

    /* reshuffle when user clicks a filter item */

 $('#portfolio').delegate('#filter li a', 'click', function(e) { 
    e.preventDefault();
    $('#filter li a').removeClass('active');
        $(this).addClass('active');
        var groupName = $(this).attr('data-group');
        // reshuffle grid
        $grid2.shuffle('shuffle', groupName);
  });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Twitter Update  Setup ( Tweetie.js)
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.example1 .tweet').twittie({
        dateFormat: '%b. %d, %Y',
        template: '<div class="tweet-thumb">{{avatar}}</div> <h3 class="tweet-name font1 letter">{{screen_name}}</h3> <h2 class="tweet-text font1 letter">{{tweet}}</h2> <div class="date font1 letter">{{date}}</div> <a class="font1 tmh-btn" href="{{url}}" target="_blank">Read Tweet</a> ',
        count: 1,
        hideReplies: true
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Contact Form Ajax Section
    /*-------------------------------------------------------------------------------------------------------------------------------*/

$('body').delegate('#contactForm', 'submit', function() { 
    $('.md-content').hide();
            $('.launch_modal').trigger("click");
            //alert(1);
            $.ajax({
                type: $("#contactForm").attr('method'),
                url: $("#contactForm").attr('action'),
                data: $("#contactForm").serialize(),
        dataType : 'html', //set the dataType attribute

                success: function (data) {
        console.log(data);
                    if (data === 'success') {
                        $('#contactForm').each(function () {
                            this.reset();
                        });

                        $('#contactForm input#name').attr('placeholder', $('#contactForm input#name').data('placeholder'));
                        $('#contactForm input#name').removeClass('error-msg');

                        $('#contactForm input#email').attr('placeholder', $('#contactForm input#email').data('placeholder'));
                        $('#contactForm input#email').removeClass('error-msg');

                        $('#contactForm #msg').attr('placeholder', $('#contactForm textarea#msg').data('placeholder'));
                        $('#contactForm #msg').removeClass('error-msg');

                        $('.md-content').show();
                    } else {
                        $('.md-content').show();
                        $('.md-content h3').html('Oops, Something went wrong!');
                        $('.md-content p').html('Please try again.');
                    }
                }
            });
    return false;
 });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Scroll To Top Snippet
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) { // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200); // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200); // Else fade out the arrow
        }
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Multipurpose Counters
    /*-------------------------------------------------------------------------------------------------------------------------------*/


    $('.stati-one').animationCounter({
        start: 28,
        end: 88,
        txt: " K",
        delay: 2000
    });

    $('.stati-two').animationCounter({
        start: 1,
        end: 12,
        txt: " K",
        delay: 2500
    });

    $('.stati-three').animationCounter({
        start: 22,
        end: 58,
        txt: " K",
        delay: 1500
    });

    $('.stati-four').animationCounter({
        start: 12,
        end: 43,
        txt: " K",
        delay: 3100
    });


    // COMING SOON


    $('.cs-day').animationCounter({
        start: 22,
        end: 50,
        delay: 5000
    });

    $('.cs-hour').animationCounter({
        start: 1200,
        end: 3200,
        delay: 4000
    });

    $('.cs-minute').animationCounter({
        start: 121,
        end: 390,
        delay: 3000
    });

    $('.cs-second').animationCounter({
        start: 2306,
        end: 8776,
        delay: 2000
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
    // Magnificent Popup Setup  ( Light boxes in Portfolios and Blogs )
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    $('.blog-opener, .blog-block').magnificPopup({
        items: [{
                src: $('<div class="demo-popup"><div class="blog-post prime-bg"><h5 class="letter font1">May 21, 2017</h5><h2 class="letter font3 w600 caps">Donec eget ex magna. </h2><div class="blg-img-cvr"><img class="img-responsive" src="images/blog-page/grid/1.jpg" alt="unbranded" data-no-retina></div><p class="font1 letter">Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p><a href="blog-basic.html" target="_blank" class="blog-opener tmh-btn font1">Read More</a></div></div>'), // Dynamically created element
                type: 'inline'
            },
            {
                src: $('<div class="demo-popup"><div class="blog-post prime-bg"><h5 class="letter font1">April 24, 2017</h5><h2 class="letter font3 w600 caps">Donec eget ex magna. </h2><div class="blg-img-cvr"><img class="img-responsive" src="images/blog-page/grid/2.jpg" alt="unbranded" data-no-retina></div><p class="font1 letter p-scroll">Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam. Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p><a class="blog-opener tmh-btn font1">Read More</a></div></div>'), // Dynamically created element
                type: 'inline'
            },
            {
                src: $('<div class="demo-popup"><div class="blog-post prime-bg"><h5 class="letter font1">May 21, 2017</h5><h2 class="letter font3 w600 caps">Donec eget ex magna. </h2><div class="blg-img-cvr"><img class="img-responsive" src="images/blog-page/grid/3.jpg" alt="unbranded" data-no-retina></div><p class="font1 letter">Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p><a href="blog-basic.html" target="_blank" class="blog-opener tmh-btn font1">Read More</a></div></div>'), // Dynamically created element
                type: 'inline'
            },
            {
                src: $('<div class="demo-popup"><div class="blog-post prime-bg"><h5 class="letter font1">July 18, 2017</h5><h2 class="letter font3 w600 caps">Donec eget ex magna. </h2><div class="blg-img-cvr"><img class="img-responsive" src="images/blog-page/grid/4.jpg" alt="unbranded" data-no-retina></div><p class="font1 letter">Donec eget ex magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque venenatis dolor imperdiet dolor mattis sagittis magna etiam.</p><a href="blog-basic.html" target="_blank" class="blog-opener tmh-btn font1">Read More</a></div></div>'), // Dynamically created element
                type: 'inline'
            },
        ],
        gallery: {
            enabled: true
        },
        type: 'image' // this is a default type
    });


    $('.portfolio-grid, .portfolio-one-block-wrap').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',
        titleSrc: 'title',
        gallery: {
            enabled: true
        }
        // other options
    });

    /*-------------------------------------------------------------------------------------------------------------------------------*/
   // The End
    /*-------------------------------------------------------------------------------------------------------------------------------*/


})();