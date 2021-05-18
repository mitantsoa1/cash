$('#show-sidebar').on("click", function() {

    $('.sidebar-content').css({ "display": "block" });
    $('.sidebar-wrapper').css({ "display": "block" });
    $('#close-sidebar').css({ "display": "block" });
    $("#site-cacher").removeClass("hide");

})
$("#site-cacher").on('click', function() {
    $('.sidebar-content').css({ "display": "none" });
    $('.sidebar-wrapper').css({ "display": "none" });
    $('#close-sidebar').css({ "display": "none" });
    $("#site-cacher").addClass("hide");
})
$('#close-sidebar').on("click", function() {
    $('.sidebar-content').css({ "display": "none" });
    $('.sidebar-wrapper').css({ "display": "none" });
    $('#close-sidebar').css({ "display": "none" });
    $("#site-cacher").addClass("hide");

})