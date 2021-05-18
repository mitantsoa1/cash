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
    var $numero = $('.num').val();
    var $select = $('#select_tel').val();
    var data = "numero=" + $numero + "&selec=" + $select;

    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data == "ok") {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "succes!",
                });
                $('.num').val("");
            } else if (data == "non") {
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Refusé!",
                });
            }

        },
        Error: function() {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Une erreur est survenue!",
            });
        }
    })
});

function effacerTel($id) {
    var data = "id_tel=" + $id;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data == "effacer") {
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "Effacé!",
                });
                $('.num').val("");
            } else if (data == "non") {
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Refusé!",
                });
            }

        },
        Error: function() {
            Swal.fire({
                position: "center",
                icon: "warning",
                title: "Une erreur est survenue!",
            });
        }
    })
}