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
			
			
				  <label>numero</label>  <br>
				<input type="hidden" class="form-control select_acc" id="select_transaction">
				<select name="select_num" id="select_num" class="form-control dat">
						<?php
							$db = new Database();
							Database::init("localhost","cash","root","");
							$tab = $db ->selectSP()
										->from("telephone")
										->executeSP();
							for($i=0;$i<count($tab);$i++){
								echo "
									<option value='".$tab[$i]->numero."'>".$tab[$i]->numero."</option>";
							}
						?>
						
					</select><br>
			
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
		
				<!-- <label>Lieu</label>  
				<?php
						// $tab = $db->selectSP()
						// 			->from("adresse")
						// 			->executeSP();
						// for($i=0;$i<count($tab);$i++){
						// 	echo'
						// 		<option value="'.$tab[$i]->lot.'">'.$tab[$i]->lot.'</option>
						// 	';
						// }
					?>
				<input type="text" class="form-control select_lieu" disabled value=""> -->
			
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
	<div class="transaction_recherche" id="trs">
	<?php 
// include '../../Models/Database.class.php';

$db = new Database();
Database::init('localhost','cash','root','');
$table = $db->selectSP()
            ->from('transaction')
            ->order("id","DESC")
            ->executeSP();

echo "<div class='table_com'>
<table class='table table-striped table-hover table-bordered'>
        <thead>
            <th> Operateur</th>
            <th>Mon numero</th>
            <th> Type</th>
            <th> Montant</th>
            <th> Numero</th>
            <th> Observation</th>
            <th> Frais</th>
            <th> Commission</th>
            <th> Lieu</th>
            <th> date</th>
        </thead>
        <tbody>";

for ($i=0; $i < count($table); $i++) { 
    echo "<tr>
            <td>".$table[$i]->operateur."</td>
            <td>".$table[$i]->number."</td>
            <td>".$table[$i]->type."</td>
            <td>".$table[$i]->montant."</td>
            <td>".$table[$i]->numero."</td>
            <td>".$table[$i]->observation."</td>
            <td>".$table[$i]->frais."</td>
            <td>".$table[$i]->commission."</td>
            <td>".$table[$i]->lieu."</td>
            <td>".$table[$i]->date."</td>
            
            // // <td>
            // // <a href='#' id='effacerCom' data-toggle='tooltip' data-placement='left' title='effacer' class='glyph' onclick='supprimerCom(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
            // // <a href='#' id='modifierCom' class='m-l-10 ' data-toggle='tooltip' data-placement='bottom' title='modifier' onclick='modifierCom(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
            // // </td>
        </tr>";
}
echo "</tbody>
      </table>
      </div>";
?>
	</div>
<!-- <form action="excel" method="post" id="form_excel" class="form"> 
		<input type="submit" name="export_excel" id="export_excel" class="btn btn-success" value="Exporter en excel">
	</form> -->
	<button class="btn btn-success hide" id="exportToExcel" onclick="exportTableToExcel('tableId')">export to excel</button>


<script src="Publics/js/select.js"></script>
<script src="Publics/js/export.js"></script>
<script src="Publics/js/site-cacher.js"></script> 
</body>
</html>
