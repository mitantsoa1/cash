
<?php
	include_once('../../Models/Database.class.php');
	$db = new Database();
	Database::init("localhost","cash","root","");
	$tab = $db ->selectSP()
				->from("telephone")
				->executeSP();
	for($i=0;$i<count($tab);$i++){
		echo '<p class=" tableau'.$i.'">'.$tab[$i]->numero.' '.'</p>';  
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="Publics/css/style.css">
	<link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
	
	<style>
		#form_compte{
			height: 300px !important;
			overflow-y: auto;
			width: 89.4% ;
		}
		/* #form_compte input,#form_compte select,#form_compte textarea,#form_compte a{
			width: 40% !important;
		} */
		
	</style>
</head>
<body>
<div id="tr"></div>
	<div class="container forme">

			
				<form class="form-group " id="form_compte">
					<input type="hidden" id="id_compte">

					 <!-- <label>Operateur</label> 
					<select class="form-control select_acc" id="select_compte">
						<option value="telma" >telma</option>
						<option value="airtel">Airtel</option>
						<option value="orange">Orange</option>	
					</select>   -->
					<label>Numero</label> 
					<?php 
						include_once('../../Models/Database.class.php');
						$db = new Database();
						Database::init("localhost","cash","root","");
						$tab = $db ->selectSP()
									->from("telephone")
									->executeSP();
						$select= '<select name="select_tel" id="select_tel" class="form-control telephone">';
									for($i=0;$i<count($tab);$i++){
										$select .= '<option value="'.$tab{$i}->numero.'">'.$tab{$i}->numero.'</option>';
									}
									$select .= '</select>';
									echo $select;
					?>
					
					<label>Depot</label> 
					<input type="text" class="form-control" id="depot_compte" name="depot_compte" required>  

					<label>Observation</label> 
					<textarea class="form-control" id="observ_compte"></textarea>  

					<a href="#" class="btn btn-info btn-block" id="btn_compteC">Inserer</a>
				</form>
			
	</div>

	<script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
	<!-- <script src="Publics/js/accueil.js"></script> -->
	<script src="Publics/js/monCompte.js"></script>
	<script src="Publics/js/select.js"></script>
</body>
</html>
