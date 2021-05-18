<h2>PAR ICI</h2>

<?php 
	include '../../Models/Database.class.php';

	$db = new Database();
	Database::init('localhost','cash','root','');
	
		 $table = $db ->selectSP()
                ->from("transaction")
                ->where("date",">=")
                ->et(["date"],["<="])
                ->execute([$_POST['date_min'],$_POST['date_max']]);
	
	echo "<table class='table table-striped table-hover table-bordered'>
			<thead>
				<th>Operateur</th>
				<th>Type</th>
                <th>Montant</th>
                <th>Numero</th>
				<th>Observation</th>
                <th>frais</th>
                <th>Lieu</th>
				<th>Date</th>
				<th>Etat</th>
			</thead>
			<tbody>";

    for ($i=0; $i < count($table); $i++) { 
    	echo "<tr>
    			<td>".$table[$i]->operateur."</td>
    			<td>".$table[$i]->type."</td>
    			<td>".$table[$i]->montant."</td>
    			<td>".$table[$i]->numero."</td>
                <td>".$table[$i]->observation."</td>
                <td>".$table[$i]->frais."</td>
                <td>".$table[$i]->lieu."</td>
				<td>".$table[$i]->date."</td>
				<td>".$table[$i]->id."</td>
				
    		</tr>";
    }


	echo "</tbody>
	      </table>";
	
 ?>