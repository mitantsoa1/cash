$(window).resize(function() {
    var Lscreen = screen.width;
    if (Lscreen > 720) {
        $('.col3').removeClass('col-md-3')
        $('.col3').css({ "width": "0px" });
    }
})