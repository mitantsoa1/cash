<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="Publics/css/frais.css"> -->
</head>
<body>
<div class="container forme">
			<!-- <form class="form-group" id="form_compte">
			<input type="hidden" id="id_frais">

	
			
				<div class="userBox">
					<input type="tel" name="montant_min" id="montant_min" required><br><br>
					<label>Montant_min</label>
				</div>

				<div class="userBox">
					<input type="tel" name="montant_max" id="montant_max" required><br><br>
					<label>Montant_max</label>
				</div>

				<div class="userBox">
					<input type="tel" class="frD" name="frais_d" id="frais_d" required>
					<label>Frais depot</label>
				</div>

				<div class="userBox">
					<input type="tel" class="frR" name="frais_r" id="frais_r" required>
					<label>Frais retrait</label>
				</div>

				<div class="userBox">
					<input type="tel" class="frT" name="frais_t" id="frais_t" required>
					<label>Frais transfert</label>
				</div>
			
			<a href="#" id="btn_frais"><span></span><span></span><span></span><span></span> Inserer</a>
			<a href="#" id="btn_frais_modifier" class="hide"><span></span><span></span><span></span><span></span> Modifier</a>
			<a href="#" id="btn_frais_afficher"><span></span><span></span><span></span><span></span> Afficher tous</a>
			<a href="#" id="btn_frais_cacher" class="c"><span></span><span></span><span></span><span></span> Cacher </a>
		</form> -->
		<form class="form-group" id="form_frais">
			<input type="hidden" id="id_frais">
				<label>Montant_min</label>
					<input type="tel" name="montant_min" id="montant_min" class="form-control " required>
					
				<label>Montant_max</label>

					<input type="tel" name="montant_max" id="montant_max"  class="form-control " required>
				<label>Frais depot</label>
					<input type="tel"  name="frais_d" id="frais_d"  class="form-control frD" required>
					
				<label>Frais retrait</label>
					<input type="tel"  name="frais_r" id="frais_r"  class="form-control frR" required>
					
				<label>Frais transfert</label>
					<input type="tel"  name="frais_t" id="frais_t"  class="form-control frT" required>
					
			
			
			<a href="#" id="btn_frais" class=" btn btn-primary btn-block"><span></span><span></span><span></span><span></span> Inserer</a>
			<!-- <a href="#" id="btn_frais_modifier" class=" btn btn-warning hide" ><span></span><span></span><span></span><span></span> Modifier</a>
			<a href="#" id="btn_frais_afficher" class=" btn btn-info"><span></span><span></span><span></span><span></span> Afficher tous</a>
			<a href="#" id="btn_frais_cacher" class=" btn btn-primary hide "><span></span><span></span><span></span><span></span> Cacher </a> -->
		</form>
		<div class="frais_contentes">

		</div>

</div>

<script src="Publics/js/select.js"></script>
</body>
</html>
