<?php
    	include '../../Models/Database.class.php';

        $db = new Database();
        Database::init('localhost','cash','root','');
        $table = $db->selectSP()
                    ->from('frais')
                    ->order("id","DESC")
                    ->executeSP();
        
        echo "<table class='table table-striped table-hover table-bordered'>
                <thead>
                    <th> Operateur</th>
                    <th> Montan min.</th>
                    <th> Montant max.</th>
                    <th> Commission depot</th>
                    <th> Commission retrait</th>
                    <th> Commission transfert</th>
                    <th> Action</th>
                </thead>
                <tbody>";
    
        for ($i=0; $i < count($table); $i++) { 
            echo "<tr>
                    <td>".$table[$i]->operateur."</td>
                    <td>".$table[$i]->type."</td>
                    <td>".$table[$i]->montant_min."</td>
                    <td>".$table[$i]->montant_max."</td>
                    <td>".$table[$i]->frais."</td>
                    <td>
                    <a href='#' id='effacer' class='m-l-40' data-toggle='tooltip' title='effacer' onclick='suppr(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
                    <a href='#' id='modifierP' class='m-l-50 ' data-toggle='tooltip' title='modifier' onclick='modif(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
                    </td>
                </tr>";
        }
        echo "</tbody>
              </table>";
?>