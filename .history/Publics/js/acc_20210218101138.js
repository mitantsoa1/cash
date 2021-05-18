$(document).ready(function() {

    $('#compte').addClass('activee');
    $('entete').css("margin-left", "100px");
    $('.entete').html('<h2 class="centre">Compte</h2>');
    $('#contenue').load('Views/Back/monCompte.php');
    $('.affichage_depot_compte').load('Views/Back/affichage_depot_compte.php');
    $('.login-box').show();
    // $(".centre").animate({
    //     "font-size": "+=20px"
    // }, 700);






    $('#compte').on('click', function() {
        // $('.depot_content').load("./Views/Front/affichage_depot.php");

        $('.entete').html('<h2 class="centre">Compte</h2>');
        $('.contenu').load('Views/Back/monCompte.php');
        $('.affichage_depot_compte').load('Views/Back/affichage_depot_compte.php');

        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').show();
        $('.affichage_depot_compte').show();
        $('.adresse_content').hide();
        $('.login-box').show();
        $('#compte').addClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').hide();
    })

    // $('#adresse').on('click', function() {
    //         $('.entete').html('<h2 class="centre">Adresse</h2>');
    //         $('.contenu').load('Views/Back/adresse.php');
    //         $('.solde_content').hide();
    //         $('.adresse_content').show();
    //         $('.adresse_content').load("./Views/Front/affichage_adresse.php");
    //         $('.affichage_depot_compte').hide();
    //         $('.login-box').hide();
    //         // $('.depot_content').hide();
    //     })
    $('#adresse').on('click', function() {
        // var Lscreen = screen.width;
        // if (Lscreen < 768) {
        //     $('.entete').html('<h3 class="centre"><a href="#" id="adresse_top">Adresse</a>/<a href="#" id="telephone"> Tel </a></h3>');

        // } else {
        //     $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top"> Adresse </a>/<a href="#" id="telephone"> Telephone </a></h2>');

        // }
        // $(window).resize(function() {
        //         var Lscreen = screen.width;
        //         if (Lscreen < 768) {
        //             $('.entete').html('<h3 class="centre"><a href="#" id="adresse_top">Adresse</a>/<a href="#" id="telephone"> Tel </a></h3>');

        //         } else {
        //             $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top"> Adresse </a>/<a href="#" id="telephone"> Telephone </a></h2>');

        //         }
        //     })
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top"> Adresse </a>/<a href="#" id="telephone"> Telephone </a></h2>');
        $('.contenu').load('Views/Back/adresse.php');
        $('.solde_content').hide();
        $('.adresse_content').show();
        $('.adresse_content').load("./Views/Front/affichage_adresse.php");
        $('.affichage_depot_compte').hide();
        $('.login-box').addClass('hide');
        $('#compte').removeClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').hide();
        // $('.depot_content').hide();
    })


    $('#transaction').on('click', function() {
        $('.entete').html('<h2 class="centre">Transaction</h2>');
        $('.contenu').load('Views/Back/transaction.php');
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').hide();
        $('.adresse_content').hide();
        $('.affichage_depot_compte').hide();
        $('#compte').removeClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').hide();
        // $('.depot_content').hide();
    })

    $('#frais').on('click', function() {
        $('.entete').html('<h2 class="centre">Frais</h2>');
        $('.contenu').load('Views/Back/frais.php');
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').hide();
        $('.adresse_content').hide();
        $('.affichage_depot_compte').hide();
        $('#compte').removeClass('activee');
        $('.frais_content').show();
        $('.frais_content').load("./Views/Back/frais_affichage.php");

        $('.frais_affichage').show().css({ "height": "200px", "margin-top": "-50px", "width": "110%", "overflowY": "auto" });
        $('.commission_affichage').hide();
        // $('.depot_content').hide();
    })
    $('#commission').on('click', function() {
        $('.entete').html('<h2 class="centre">Commission</h2>');
        $('.contenu').load('Views/Back/commission.php');
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').hide();
        $('.adresse_content').hide();
        $('.affichage_depot_compte').hide();
        $('#compte').removeClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').load('Views/Back/commission_affichage.php');
        $('.commission_affichage').show();
        // $('.depot_content').hide();
    })

    $('#etat').on('click', function() {
        $('.entete').html('<h2 class="centre">Etat</h2>');
        $('.contenu').load('Views/Back/etat.php');
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').hide();
        $('.adresse_content').hide();
        $('.affichage_depot_compte').hide();
        $('#compte').removeClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').hide();
        // $('.depot_content').hide();
    })

    // $('#btn_frais_afficher').on('click', function() {
    //     $('.gauche').addClass('col-sm-5');
    //     $('.droite').addClass('col-sm-7');
    //     $('.frais_affichage').load("./Views/Back/frais_affichage.php");
    //     $('#btn_frais_cacher').removeClass('hide');
    //     $('.frais_affichage').show();
    //     $('#btn_frais_afficher').addClass('hide');
    // })
    // $('#btn_frais_cacher').on('click', function() {
    //     $('.gauche').removeClass('col-sm-5');
    //     $('.droite').removeClass('col-sm-7');
    //     $('.frais_affichage').hide();
    //     $('#btn_frais_cacher').addClass('hide');
    //     $('#btn_frais_afficher').removeClass('hide');
    // })
    $('#documentation').on('click', function() {
        $('.entete').html('<h2 class="centre">Readme</h2>');
        $('.contenu').load('Views/Back/doc.php');
        // $(".centre").animate({
        //     "font-size": "+=20px"
        // }, 700);
        $('.solde_content').hide();
        $('.adresse_content').hide();
        $('.affichage_depot_compte').hide();
        $('#compte').removeClass('activee');
        $('.frais_content').hide();
        $('.commission_affichage').hide();
    });

})