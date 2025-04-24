
$(window).bind("load", function() {
    setTimeout(function() {
    // section 1
    $('.section-one').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-one').toggleClass("tmh-active");
    } 
    else {
    $('.link-one').removeClass("tmh-active");
    }
    },);
    // Section 2
    $('.section-two').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-one').removeClass("tmh-active");
    $('.link-two').addClass("tmh-active");
    } 
    else {
    $('.link-one').addClass("tmh-active");
    $('.link-two').removeClass("tmh-active");
    }
    },);
    // section 3
    $('.section-three').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-two').removeClass("tmh-active");
    $('.link-three').addClass("tmh-active");
    } 
    else {
    $('.link-two').addClass("tmh-active");
    $('.link-three').removeClass("tmh-active");
    }
    },);
        // section 4
    $('.section-four').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-three').removeClass("tmh-active");
    $('.link-four').addClass("tmh-active");
    } 
    else {
    $('.link-three').addClass("tmh-active");
    $('.link-four').removeClass("tmh-active");
    }
    },);
    // section 5
    $('.section-five').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-four').removeClass("tmh-active");
    $('.link-five').addClass("tmh-active");
    } 
    else {
    $('.link-four').addClass("tmh-active");
    $('.link-five').removeClass("tmh-active");
    }
    },);
     // section 6
    $('.section-six').waypoint(function (direction) {
    if (direction === 'down') {
    $('.link-five').removeClass("tmh-active");
    $('.link-six').addClass("tmh-active");
    } 
    else {
    $('.link-five').addClass("tmh-active");
    $('.link-six').removeClass("tmh-active");
    }
    },);

    },);
    });
