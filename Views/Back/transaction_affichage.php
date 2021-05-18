<?php 
include '../../Models/Database.class.php';

$db = new Database();
Database::init('localhost','cash','root','');
$table = $db->selectSP()
            ->from('transaction')
            ->order("id","DESC")
            ->executeSP();

echo "
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
            <th> Actions</th>
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
            <td>
				<a href='#' id='effacerTrs' class='m-l-4 glyph' data-toggle='tooltip' data-placement='left' title='effacer' onclick='supprTrs(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
				<a href='#' id='modifierTrs' class='m-l-10 ' data-toggle='tooltip' data-placement='bottom' title='modifier' onclick='modifTrs(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
			</td>
            
            // // <td>
            // // <a href='#' id='effacerCom' data-toggle='tooltip' data-placement='left' title='effacer' class='glyph' onclick='supprimerCom(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
            // // <a href='#' id='modifierCom' class='m-l-10 ' data-toggle='tooltip' data-placement='bottom' title='modifier' onclick='modifierCom(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
            // // </td>
        </tr>";
}
echo "</tbody>
      </table>";
?>