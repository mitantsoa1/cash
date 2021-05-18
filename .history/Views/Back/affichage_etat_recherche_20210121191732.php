<h2>PAR ICI</h2>

<?php 
	include '../../Models/Database.class.php';

	$db = new Database();
	Database::init('localhost','cash','root','');
	
		 $table = $db ->selectSP()
                ->from("transaction")
                ->where("date",">=")
				->et(["date"],["<="])
				->order("number","ASC")
                ->execute([$_POST['date_min'],$_POST['date_max']]);
	
	echo "<table class='table table-striped table-hover table-bordered'>
			<thead>
				<th>Operateur</th>
				<th>Mon numero</th>
				<th>Type</th>
                <th>Montant</th>
                <th>Numero</th>
				<th>Observation</th>
				<th>Frais</th>
				<th>Commission</th>
                <th>Lieu</th>
				<th>Date</th>
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
				
    		</tr>";
    }


	echo "</tbody>
	      </table>";
	
 ?>