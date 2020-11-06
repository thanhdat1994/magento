require([ 'jquery'], function($){

    $(window).scroll(function () {
        if ($(this).scrollTop() < 100) {
            $('#scrollUp').fadeOut();
        } else {
            $('#scrollUp').fadeIn();
        }
    });

    $('#scrollUp').click(function () {
        $("html").css("scroll-behavior", "auto");
        $('html, body').animate({
            scrollTop: 0
        }, 800, function () {
            $("html").css("scroll-behavior", "smooth");
        });
        return false;
    });

});
