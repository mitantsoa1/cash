$("#site-cacher").on('click', function() {
    $('.sidebar-content').css({ "display": "none" });
    $('.sidebar-wrapper').css({ "display": "none" });
    $('#close-sidebar').css({ "display": "none" });
    $("#site-cacher").addClass("hide");
})