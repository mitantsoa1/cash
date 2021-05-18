<?php
	require_once('../../Controls/util.php');
    // init_session();
    require_once('../../Models/Database.class.php');
    header('Content-type: application/json');
    
    Database::init("localhost","cash","root","");
    $db = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="Publics/css/style.css">
	
</head>
<body>
<div class="container forme">
		<form class="form-group" id="form_transaction">
            <input type="hidden" id="id_transaction">
			
			
				  <label>Operateur</label>  
				<select class="form-control select_acc" id="select_transaction">
					<option value="telma" >telma</option>
					<option value="airtel">Airtel</option>
					<option value="orange">Orange</option>	
				</select>    
			
				<label>Type</label>  
				<select class="form-control select_type" id="select_type_transaction">
					<option value="retrait">retrait</option>
					<option value="depot" >depot</option>
					<option value="transfert">transfert</option>	
				</select>    
			
				<label>Montant</label>  
				<input type="tel" class="form-control" id="montant_transaction" name="montant_transaction" required>    
			
				<label>Numero</label>  
				<input type="tel" class="form-control" id="numero_transaction" name="numero_transaction" required>    
			
				<label>Observation</label>    
				<textarea class="form-control" id="observ_transaction"></textarea>    
		
				<label>Lieu</label>  
				<select class="form-control select_lieu" id="select_lieu_transaction">
					<?php
						$tab = $db->selectSP()
									->from("adresse")
									->executeSP();
						for($i=0;$i<count($tab);$i++){
							echo'
								<option value="'.$tab[$i]->lot.'">'.$tab[$i]->lot.'</option>
							';
						}
					?>
						
				</select>    
			
			<a href="#" id="btn_transaction" class="btn btn-block btn-primary"><span></span><span></span><span></span><span></span> Effectuer </a>
		</form>
		
		<div class="sold">
			<?php
				// include_once('Models/Database.class.php');
				// Database::init('localhost','cash','root',"");
				// $db = new Database();

				// $t= $db->selectSP()
				// 		->from('operator')
				// 		->where('name','=')
				// 		->execute($_SESSION['operateur']);

				// 		$id_oper=t[0]->id_operator;
				// $tab = $db ->selectSP()
				// 			->from("solde")
				// 			->where("id_operator","=")
				// 			->execute([id_oper]);
			?>
			
		</div>
	</div>
	<div class="container div_trans" >
					<label>Date min. :</label>	
                    <input type="date" class="form-control dat" id="date_minT">
               
                    <label>Date max. :</label>
					<input type="date" class="form-control dat" id="date_maxT">
					<select name="select_lieuT" id="select_lieuT" class="form-control dat">
						<option value="rien" selected> --- Choisir un lieu ---</option>
						<?php
							$db = new Database();
							Database::init("localhost","cash","root","");
							$tab = $db ->selectSP()
										->from("adresse")
										->executeSP();
							for($i=0;$i<count($tab);$i++){
								echo "
									<option value='".$tab[$i]->lot."'>".$tab[$i]->lot." ".$tab[$i]->emplacement."</option>";
							}
						?>
						
					</select>
                
                    <a href="#" class="btn btn-info dat" id="btn_transaction_recherche">Rechercher transaction</a>
                
    </div>
	
	<div class="transaction_recherche"></div>
<form action="excel" method="post" id="form_excel" class="form"> 
		<input type="submit" name="export_excel" class="btn btn-success" value="Exporter en excel">
	</form>


<script src="Publics/js/select.js"></script>
</body>
</html>
