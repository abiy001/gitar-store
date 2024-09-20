$(window).scroll(function() {
    var wScroll = $(this).scrollTop();

    console.log(wScroll);

    $('.content h4').css({
        'transform' : `translate(${wScroll/-1}%, 0px)`
    })

    $('.content h1').css({
        'transform' : `translate(${wScroll/-1.5}%, 0px)`
    })

    $('.content h3, .newslatter').css({
        'transform' : `translate(${wScroll/-2.5}%, 0px)`
    })



    // about img
    if( wScroll > $('.about').offset().top - 350) {
        console.log('ok')

        $('.about .foto').addClass('in')
    }
});

