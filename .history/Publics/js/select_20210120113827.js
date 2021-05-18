// $(document.body).on('click', '#btn_compteC', function() {
$('#btn_compteC').on('click', function() {
    var $op = $('.select_acc').val();
    var $depot = $('#depot_compte').val();
    var $observ = $('#observ_compte').val();

    var data = "operateur_c=" + $op + "&depot=" + $depot + "&observation=" + $observ;

    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            $('.solde_content').html('<p><h2> <strong class="total_compte">Ar ' + data + '</strong> </h2></p>');
            $('#depot_compte').val(" ");
            $('#observ_compte').val(" ");
            $('.affichage_depot_compte').load('Views/Back/affichage_depot_compte.php');
        }
    })

});

$('#btn_adresse').on('click', function() {
    var $emplacement = $('#emplacement').val();
    var $adresse = $('.adresse').val();
    var $province = $('#province').val();

    var data = "province=" + $province + "&adresse=" + $adresse + "&emplacement=" + $emplacement;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            $('.adresse').val(" ");
            $('#province').val(" ");
            $('#emplacement').val(" ");

            if (data = "ko") {
                $('.adresse_content').load("./Views/Front/affichage_adresse.php");
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "succes!",
                });
            } else if (data == "non") {
                Swal.fire({
                    icon: "warning",
                    title: "Cette adresse existe déjà !"
                });
            }
        }

    })
});

// supprimer adresse

function effacer($id) {
    var data = "id_adresse=" + $id;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data = "ko") {
                $('.adresse_content').load("./Views/Front/affichage_adresse.php");
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "succes!",
                });
            }
        }
    })
}

//modifier adresse
function modifier($id) {
    var data = "id_adress=" + $id;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            $('#id_adresse').val(data[0].id)
            $('.adresse').val(data[0].lot);
            $('#emplacement').val(data[0].emplacement);
            $('#province').val(data[0].province);
            $('#btn_adresse').addClass('hide');
            $('#btn_modif_adresse').removeClass('hide');
            $('#btn_annuler_adresse').removeClass('hide');
        }
    })
    $('#btn_modif_adresse').on('click', function() {
        var $adresse = $('.adresse').val();
        var $id = $('#id_adresse').val();
        var $province = $('#province').val();
        var $emplacement = $('#emplacement').val();

        var data = "province_modif=" + $province + "&adresse_modif=" + $adresse + "&id_modif=" + $id + "&emplacement=" + $emplacement;
        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
                $('.adresse').val(" ");
                $('#province').val(" ");
                $('#emplacement').val(" ")

                if (data = "ko") {
                    $('.adresse_content').load("./Views/Front/affichage_adresse.php");
                    $('#btn_adresse').removeClass('hide');
                    $('#btn_modif_adresse').addClass('hide');
                    $('#btn_annuler_adresse').addClass('hide');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "succes!",
                    });
                }
            }
        })
    });
    $('#btn_annuler_adresse').on('click', function() {
        $('#id_adresse').val(" ")
        $('.adresse').val(" ");
        $('#emplacement').val(" ");
        $('#province').val(" ");
        $('#btn_adresse').removeClass('hide');
        $('#btn_modif_adresse').addClass('hide');
        $('#btn_annuler_adresse').addClass('hide');
    })

}
// insertion transaction

$('#btn_transaction').on('click', function() {
    var $operateur = $('.select_acc').val();
    var $type = $('#select_type_transaction').val();
    var $montant = $('#montant_transaction').val();
    var $numero = $('#numero_transaction').val();
    var $observation = $('#observ_transaction').val();
    // var $frais = $('#frais_transaction').val();
    var $lieu = $('.select_lieu').val();

    var data = "operateur_trans=" + $operateur + "&type=" + $type + "&montant=" + $montant + "&numero=" + $numero + "&observation=" + $observation + "&lieu=" + $lieu;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            // console.log(data);
            if (data != "") {
                $('.solde_content').html('<p><h2> <strong class="total_compte">Ar ' + data + '</strong> </h2></p>');
                $('#montant_transaction').val(" ");
                $('#numero_transaction').val(" ");
                $('#observ_transaction').val(" ");

                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "succes!"
                });
            }
        }
    })
});
$('#btn_transaction_recherche').on('click', function() {
    var $date_min = $('#date_minT').val();
    var $date_max = $('#date_maxT').val();
    var $lieu = $('#select_lieuT').val();

    var data = "date_minT=" + $date_min + "&date_max=" + $date_max + "&lieu=" + $lieu;
    // alert(data);
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data != "rien") {
                $('.transaction_recherche').removeClass('hide');
                var table_affichage = "<div style='height: 200px;overflow: auto; width: 119%;'> <table class='table table-striped affichage_depot m-t-10' style='position: relative !important;'><thead style='position: sticky !important;z-index: 1000;'><th>Operateur</th><th>Type</th><th>Montant</th><th>Numero</th><th>Observation</th><th>frais</th><th>Lieu</th><th>Date</th></thead><tbody>";
                for (var i = 0; i < data.length; i++) {
                    table_affichage = table_affichage + "<tr><td>" + data[i].operateur + "</td><td>" + data[i].type + "</td><td>" + data[i].montant + "</td><td>" + data[i].numero + "</td><td>" + data[i].observation + "</td><td>" + data[i].frais + "</td><td>" + data[i].lieu + "</td><td>" + data[i].date;
                }
                table_affichage = table_affichage + "</td></tr></tbody></table></div>";

                $('.transaction_recherche').html(table_affichage);
            } else {
                $('.transaction_recherche').addClass('hide');
                Swal.fire({
                    position: "center",
                    icon: "warning",
                    title: "Rien!"
                });
            }
        }
    })
});
// filtre etat transaction
$('#btn_etat_recherche').on('click', function() {
    var $date_min = $('#date_min').val();
    var $date_max = $('#date_max').val();

    var data = "date_min=" + $date_min + "&date_max=" + $date_max;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data != "") {

                var table_affichage = "<table class='table table-striped affichage_depot'><thead><th>Operateur</th><th>Type</th><th>Montant</th><th>Numero</th><th>Observation</th><th>frais</th><th>Lieu</th><th>Date</th><th>Etat</th></thead><tbody>";
                for (var i = 0; i < data.length; i++) {
                    table_affichage = table_affichage + "<tr><td>" + data[i].operateur + "</td><td>" + data[i].type + "</td><td>" + data[i].montant + "</td><td>" + data[i].numero + "</td><td>" + data[i].observation + "</td><td>" + data[i].frais + "</td><td>" + data[i].lieu + "</td><td>" + data[i].date + "</td><td>" + data[i].id;
                }
                table_affichage = table_affichage + "</td></tr></tbody></table>";
                $('.etat_recherche').html(table_affichage);
                // $('.etat_recherche').load('.Views/Back/affichage_etat_recherche.php');
            }
        }
    })
});

// filtre etat depot

$('#btn_etat_recherche_depot').on('click', function() {
    var $date_min = $('#date_min').val();
    var $date_max = $('#date_max').val();

    var data = "date_min_d=" + $date_min + "&date_max_d=" + $date_max;
    // alert(data);
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data != "") {
                var table_affichage = "<table class='table table-striped table-bordered table-responsive' id='table_etat'><thead><th>Operateur</th><th>Montant</th><th>description</th><th>date</th></thead><tbody>";
                for (var i = 0; i < data.length; i++) {
                    table_affichage = table_affichage + "<tr><td>" + data[i].operateur + "</td><td>" + data[i].montant + "</td><td>" + data[i].description + "</td><td>" + data[i].date;
                }
                table_affichage = table_affichage + "</td></tr></tbody></table>";
                $('.etat_recherche').html(table_affichage);
            }
        }
    })
});

// insertion frais
$('#btn_frais').on('click', function() {
        // var $operateur = $('.select_acc').val();
        var $montant_min = $('#montant_min').val();
        var $montant_max = $('#montant_max').val();
        var $frais_d = $('#frais_d').val();
        var $frais_r = $('#frais_r').val();
        var $frais_t = $('#frais_t').val();

        var data = "montant_min_f=" + $montant_min + "&montant_max=" + $montant_max + "&frais_d=" + $frais_d + "&frais_r=" + $frais_r + "&frais_t=" + $frais_t;
        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
                if (data == "ok") {
                    $('.frais_affichage').load("./Views/Back/frais_affichage.php");
                    $('#montant_min').val(" ");
                    $('#montant_max').val(" ");
                    $('#frais_d').val(" ");
                    $('#frais_r').val(" ");
                    $('#frais_t').val(" ");

                    Swal.fire({
                        icon: "success",
                        title: "effectué!",
                    });
                } else if (data == "!ok") {
                    Swal.fire({
                        icon: "warning",
                        title: "impossible!"
                    })
                }

            }
        })
    })
    // $('#btn_frais_afficher').on('click', function() {
    // $('.frais_affichage').load("./Views/Back/frais_affichage.php");

// $('.frais_affichage').show().css({ "height": "550px", "margin-top": "-50px", "width": "110%", "overflowY": "auto" });
// $('#btn_frais_cacher').removeClass('hide');

// })
// $('#btn_frais_cacher').on('click', function() {
//         $('.gauche').removeClass('col-sm-4');
//         $('.droite').removeClass('col-sm-8');
//         $('.frais_affichage').hide();
//         $('#btn_frais_cacher').addClass('hide');
//         $('#btn_frais_afficher').removeClass('hide');
//         $('#montant_max').val("");
//         $('#montant_min').val("");
//         $('.fr').val("");
//         $('#btn_frais_modifier').hide();
//         $('#btn_frais').removeClass('hide');
//     })
/* .frais_affichage {
    height: 600px;
    overflow-y: auto;
}*/
// supprimer frais

function suppr($id) {
    var data = "id_fra=" + $id;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            if (data = "ko") {
                $('.frais_affichage').load("./Views/Back/frais_affichage.php");
                Swal.fire({
                    position: "center",
                    icon: "success",
                    title: "succes!",
                });
            }
        }
    })
}

//modifier frais
function modif($id) {
    var data = "id_f=" + $id;
    $.ajax({
        url: "Controls/ajax.php",
        type: "POST",
        data: data,
        datatype: "json",
        success: function(data) {
            $('#id_frais').val(data[0].id)
            $('#montant_min').val(data[0].montant_min);
            $('#montant_max').val(data[0].montant_max);
            $('#frais_d').val(data[0].frais_d);
            $('#frais_r').val(data[0].frais_r);
            $('#frais_t').val(data[0].frais_t);
            $('#btn_frais').addClass('hide');
            $('#btn_frais_modifier').removeClass('hide');
            // $('#btn_annuler_adresse').removeClass('hide');
        }
    })
    $('#btn_frais_modifier').on('click', function() {

        var $id = $('#id_frais').val();
        var $montant_min = $('#montant_min').val();
        var $montant_max = $('#montant_max').val();
        var $frais_d = $('#frais_d').val();
        var $frais_r = $('#frais_r').val();
        var $frais_t = $('#frais_t').val();

        var data = "&montant_min_mf=" + $montant_min + "&montant_max=" + $montant_max + "&frais_d=" + $frais_d + "&frais_r=" + $frais_r + "&frais_t=" + $frais_t + "&id=" + $id;

        $.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
                $('#frais_d').val(" ");
                $('#frais_r').val(" ");
                $('#frais_t').val(" ");
                $('#montant_max').val(" ");
                $('#montant_min').val(" ");

                if (data == "ko") {
                    $('.frais_affichage').load("./Views/Back/frais_affichage.php");
                    $('#btn_frais').removeClass('hide');
                    $('#btn_frais_modifier').addClass('hide');
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "succes!",
                    });
                }
            }
        })
    });
    $('#btn_annuler_adresse').on('click', function() {
        $('#id_adresse').val(" ")
        $('.adresse').val(" ");
        $('#emplacement').val(" ");
        $('#province').val(" ");
        $('#btn_adresse').removeClass('hide');
        $('#btn_modif_adresse').addClass('hide');
        $('#btn_annuler_adresse').addClass('hide');
    });
    /*--------------inserer commission--------------*/
    //dans le fichier commission.php



}