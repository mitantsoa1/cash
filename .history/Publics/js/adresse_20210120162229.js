$('#adresse_top').on('click', function() {
    $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top"> Adresse </a>/<a href="#" id="telephone"> Telephone </a></h2>');
    $('#adresse_top').css({ "color": "black" });
    $('#telephone').css({ "color": "grey" });
    $('.contenu').load('Views/Back/adresse.php');
    $('.solde_content').hide();
    $('.adresse_content').show();
    $('.adresse_content').load("./Views/Front/affichage_adresse.php");
    $('.affichage_depot_compte').hide();
    $('.login-box').addClass('hide');
    $('#compte').removeClass('activee');
    $('.frais_content').hide();
    $('.commission_affichage').hide();
    $('.depot_content').hide();
    // alert('ok');
})
$('#telephone').on('click', function() {

    $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top"> Adresse </a>/<a href="#" id="telephone"> Telephone </a></h2>');
    $('#telephone').css({ "color": "black" });
    $('#adresse_top').css({ "color": "black" });
    $('.contenu').load('Views/Back/telephone.php');
    $('.solde_content').hide();
    $('.adresse_content').show();
    $('.adresse_content').load("./Views/Front/affichage_telephone.php");
    $('.affichage_depot_compte').hide();
    $('.login-box').addClass('hide');
    $('#compte').removeClass('activee');
    $('.frais_content').hide();
    $('.commission_affichage').hide();
    // $('.depot_content').hide();
})