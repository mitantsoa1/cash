$('#adresse_top').on('click', function() {
    $('.entete').html('<h2 class="centre"><a href="#" id="adresse_top" class="topM"> Adresse </a>/<a href="#" id="telephone" class="topM"> Telephone </a></h2>');
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
$('#btn_telephone').on('click', function() {
    var $numero = $('#telephone').val();
    var $select = $('#select_tel').val();
    var data = "numero=" + $numero + "&select=" + $select;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            $('.solde_content').html('<p><h2> <strong class="total_compte">Ar ' + data + '</strong> </h2></p>');
        }
    })
})