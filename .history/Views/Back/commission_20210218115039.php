<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="Publics/css/main.css"> -->
</head>
<body>
<div class="container forme forme_com">
			<form class="form-group" id="form_commission">
			<input type="hidden" id="id_frais">

		
				<label>Operateur</label><br><br>
					<select class="select_acc form-control" id="select_compte">
						<option value="telma" >telma</option>
						<option value="airtel">Airtel</option>
						<option value="orange">Orange</option>	
					</select>

					<label>Montant_min</label>
					<input type="tel" name="montant_min_c" id="montant_min_c" class="form-control m-t-10 m-b-10" required>

					<label>Montant_max</label>
					<input type="tel" name="montant_max_c" id="montant_max_c" class="form-control m-t-10 m-b-10" required>

					<label>Commission depot</label>
					<input type="tel"  name="commission_d" id="commission_d" class="form-control m-t-10 m-b-10 com" required>
					
					<label>Commission retrait</label>
					<input type="tel"  name="commission_r" id="commission_r" class="form-control m-t-10 m-b-10 com" required>
			
					<label>Commission transfert</label>
					<input type="tel"  name="commission_t" id="commission_t" class="form-control m-t-10 m-b-10 com" required>
			
			
			<a href="#" id="btn_commission" class="btn btn-block btn-info"><span></span><span></span><span></span><span></span> Inserer</a>
			<a href="#" id="btn_commission_modifier" class="btn btn-block btn-info hide"><span></span><span></span><span></span><span></span> Modifier</a>
			<a href="#" id="btn_commission_annuler" class="btn btn-block btn-info hide"><span></span><span></span><span></span><span></span> Annuler</a>
			
		</form>
</div>
<div>
	<input type="text" class="form-control commis" id="recherche_com">
	<a href="#" class="btn btn-info commis" id="btn_recherche_com"> Rechercher</a>
</div>

<script src="Publics/js/site-cacher.js"></script> 
<script>
	
	 $(document.body).on('click', '#btn_commission', function() {
        // alert('ici');
        var $operateur = $('.select_acc').val();
        var $montant_min = $('#montant_min_c').val();
        var $montant_max = $('#montant_max_c').val();
        var $commission_d = $('#commission_d').val();
        var $commission_t = $('#commission_t').val();
		var $commission_r = $('#commission_r').val();

        var data = "operateur_com=" + $operateur + "&montant_min=" + $montant_min + "&montant_max=" + $montant_max + "&commission_t=" + $commission_t + "&commission_r=" + $commission_r + "&commission_d=" + $commission_d;
		console.log(data);
		$.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
				// console.log(data);
                if (data == "ok") {
					$('.commission_affichage').load("./Views/Back/commission_affichage.php");
                    $('#montant_min_c').val(" ");
                    $('#montant_max_c').val(" ");
					$('#commission_d').val(" ");
					$('#commission_t').val(" ");
					$('#commission_r').val(" ");

					Swal.fire({
						position: "center",
						icon: "success",
						title: "effectué!"
                	});
                }else if(data == "ko"){
					Swal.fire({
						position: "center",
						icon: "warning",
						title: "Erreur!"
					})
				}
			}
        })
	})
	function supprimerCom($id){
		Swal.fire({
            title: 'Attention!',
            text: "Voulez-vous supprimer?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Annuler',
            reverseButtons: true
        })
        .then((result) => {
			if (result.isConfirmed == true) {
                
            }
            var data = "id_commission=" + $id;
			$.ajax({
				url: "Controls/ajax.php",
				type: "POST",
				data: data,
				datatype: "json",
				success: function(data) {
					if (data = "okay") {
						$('.commission_affichage').load("./Views/Back/commission_affichage.php");
						Swal.fire({
							position: "center",
							icon: "success",
							title: "succes!",
						});
					}
				}
			})

        })
		
	}
	function modifierCom($id){
		var data = "id_commis=" + $id;
		$('#btn_commission').addClass('hide');
		$('#btn_commission_modifier').removeClass('hide');
		$('#btn_commission_annuler').removeClass('hide');
		$.ajax({
			url: "Controls/ajax.php",
			type: "POST",
			data: data,
			datatype: "json",
			success: function(data) {
				if (data != " ") {
					$('#montant_max_c').val(data[0].montant_max);
					$('#montant_min_c').val(data[0].montant_min);
					$('#commission_d').val(data[0].commission_d);
					$('#commission_r').val(data[0].commission_r);
					$('#commission_t').val(data[0].commission_t);
				}
			}
		})
	}
	$(document.body).on('click', '#btn_commission_modifier', function() {
        // alert('ici');
        var $operateur = $('.select_acc').val();
        var $montant_min = $('#montant_min_c').val();
        var $montant_max = $('#montant_max_c').val();
        var $commission_d = $('#commission_d').val();
        var $commission_t = $('#commission_t').val();
        var $commission_r = $('#commission_r').val();

        var data = "operateur_commis=" + $operateur + "&montant_min=" + $montant_min + "&montant_max=" + $montant_max + "&commission_t=" + $commission_t + "&commission_r=" + $commission_r + "&commission_d=" + $commission_d;
		// console.log(data);
		$.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
				// console.log(data);
                if (data == "ok") {
					$('.commission_affichage').load("./Views/Back/commission_affichage.php");
                    $('#montant_min_c').val(" ");
                    $('#montant_max_c').val(" ");
					$('#commission_d').val(" ");
					$('#commission_t').val(" ");
					$('#commission_r').val(" ");

					Swal.fire({
						icon: "success",
						title: "effectué!"
                	});
                }else if(data == "ko"){
					Swal.fire({
						icon: "warning",
						title: "Erreur!"
					})
				}
			}
        })
	})
	$(document.body).on('click', '#btn_commission_annuler', function() {
		$('#montant_min_c').val(" ");
                    $('#montant_max_c').val(" ");
					$('#commission_d').val(" ");
					$('#commission_t').val(" ");
					$('#commission_r').val(" ");
			$('#btn_commission_annuler').addClass('hide');
			$('#btn_commission_modifier').addClass('hide');
			$('#btn_commission').removeClass('hide');

	});
	$('#btn_recherche_com').on('click', function() {
		var data = "recherche=" + $('#recherche_com').val();
		$.ajax({
            url: "Controls/ajax.php",
            type: "POST",
            data: data,
            datatype: "json",
            success: function(data) {
				if(data=="" || data.length <0){
					$('.commission_affichage').addClass('hide');
					Swal.fire({
						icon: "warning",
						title: "Vide!"
                	});
				}else{
					$('.commission_affichage').removeClass('hide');
                var table_affichage = "<div style='height: 200px;overflow: auto; width: 100%;'> <table class='table table-striped affichage_depot m-t-10' style='position: relative !important;'><thead style='position: sticky !important;z-index: 1000;'><th>Operateur</th><th>Montant min.</th><th>Montant max.</th><th>Com. depot</th><th>Com. retrait</th><th>Com. transfert</th></thead><tbody>";
                for (var i = 0; i < data.length; i++) {
                    table_affichage = table_affichage + "<tr><td>" + data[i].operateur + "</td><td>" + data[i].montant_min + "</td><td>" + data[i].montant_max + "</td><td>" + data[i].commission_d + "</td><td>" + data[i].commission_r + "</td><td>" + data[i].commission_t;
                }
                table_affichage = table_affichage + "</td></tr></tbody></table></div>";
                $('.commission_affichage').html(table_affichage);
				}
				// console.log(data);
				
			}
        })
    })
</script>
</body>
</html>
