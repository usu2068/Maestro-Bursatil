
/*○═════════════════════════════════════════════════════════════════════════○
    This is file contains custom Scroll Animation Setup.
○══════════════════════════════════════════════════════════════════════════○*/

/* Template Name: Triumph Creative*/
/* Version: 1.0 Initial Release*/
/* Author: Alwin From Unbranded.*/
/* Website: http://www.unbrandeddesignstudio.com */
/* Copyright: (C) 2018 */

/*-------------------------------------------------------------------------------------------------------------------------------*/
(function () {
    "use strict";
    /*-------------------------------------------------------------------------------------------------------------------------------*/

    window.sr = ScrollReveal();

    // Style #1
    sr.reveal('.story-block-item', {
        duration: 800,
        opacity: 0,
        origin: 'top',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 200,
        mobile: false,
        reset: false,
        distance: '30px'
    }, 100);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #2
    sr.reveal('.blog-block', {
        duration: 800,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 200,
        reset: false,
        distance: '30px'
    }, 100);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #3
    sr.reveal('.portfolio-one-block', {
        duration: 800,
        opacity: 0,
        origin: 'top',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 200,
        reset: false,
        distance: '30px'
    }, 100);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #4
    sr.reveal('.team-block', {
        duration: 800,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 100,
        reset: false,
        distance: '30px'
    }, 100);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #5 (small)
    sr.reveal('.sml-one', {
        duration: 500,
        opacity: 0,
        scale: 1,
        origin: 'left',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 100,
        mobile: false,
        reset: true,
        distance: '0px'
    }, 50);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #6 (small)
    sr.reveal('.sml-two', {
        duration: 500,
        opacity: 0,
        origin: 'right',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 100,
        mobile: false,
        reset: true,
        scale: 1,
        distance: '0px'
    }, 60);

    /*-------------------------------------------------------------------------------------------------------------------------------*/

    // Style #7 (small)
    sr.reveal('.sml-three', {
        duration: 900,
        opacity: 0,
        origin: 'right',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 2500,
        reset: false,
        scale: 1,
        distance: '-20%'
    }, 60);

    /*-------------------------------------------------------------------------------------------------------------------------------*/


    // Style #7 (small)
    sr.reveal('.e-pop-up', {
        duration: 900,
        opacity: 0,
        origin: 'top',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 2500,
        reset: false,
        scale: 1,
        distance: '-90%'
    }, 60);

    sr.reveal('.e-pop-down', {
        duration: 900,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 2500,
        reset: false,
        scale: 1,
        distance: '-90%'
    }, 60);

    // HOME 05

    sr.reveal('.top', {
        duration: 900,
        opacity: 0,
        origin: 'bottom',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 3900,
        reset: false,
        scale: 1,
        distance: '-90%'
    }, 60);
    sr.reveal('.left', {
        duration: 900,
        opacity: 0,
        origin: 'right',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 3900,
        reset: false,
        scale: 1,
        distance: '-90%'
    }, 60);
    sr.reveal('.mist', {
        duration: 1900,
        opacity: 0,
        origin: 'left',
        easing: 'cubic-bezier(0.1, 0.1, 0.1, 1)',
        delay: 2500,
        reset: false,
        scale: 5.9,
        distance: '0px'
    }, 60);


})();