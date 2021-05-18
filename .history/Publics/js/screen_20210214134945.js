$(window).resize(function() {
    var Lscreen = screen.width;
    if (Lscreen < 768) {
        $('.entete').html('<h3 class="centre"><a href="#" id="adresse_top">Adresse</a>/<a href="#" id="telephone"> Tel </a></h3>');

    }
})