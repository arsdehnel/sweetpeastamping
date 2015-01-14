$(function(){

    var starLocations = [
        {
            'top' : '56%',
            'left' : '-16%'
        },
        {
            'top' : '-35%',
            'left' : '72%'
        },
        {
            'top' : '38%',
            'left' : '45%'
        },
        {
            'top' : '15%',
            'left' : '15%'
        },
        {
            'top' : '63%',
            'left' : '66%'
        },
        {
            'top' : '-42%',
            'left' : '-10%'
        }
    ]

    for( var i = 0; i < starLocations.length; i++ ){
        var $star = $('<div class="star" />');
        $star.css(starLocations[i]);
        $star.appendTo('body');
    }

    $("header h2").lettering();

    var curChar = 0;

    var chars = $("header h2").find('span[class*=char]');

    var charCount = 50;

    var charAnimate = setInterval(function(){

        chars.eq(curChar).addClass('on');

        curChar++;

        if( curChar > charCount ){
            clearInterval(charAnimate);
        }

    }, 30);

    $('body').on('click','.nav-connect .search',function(){
        $('body').toggleClass('search-open');
    })

});
// var latestKnownScrollY = 0;
// var $siteHeader = $('#site-header');
// var headerHeight = $siteHeader.outerHeight();

// function onScroll() {
//     latestKnownScrollY = window.scrollY;
// }

// function update() {
//     requestAnimationFrame(update);

//     var currentScrollY = latestKnownScrollY;

//     if( currentScrollY > headerHeight && $siteHeader.hasClass('large') ){
//         $siteHeader.removeClass('large').addClass('small');
//     }else if( currentScrollY < headerHeight && $siteHeader.hasClass('small') ){
//         $siteHeader.removeClass('small').addClass('large');
//     }

//     // $('.scroll-position').text(currentScrollY);
//     console.log(currentScrollY);

// }

// window.addEventListener('scroll', onScroll, false);
// // update();