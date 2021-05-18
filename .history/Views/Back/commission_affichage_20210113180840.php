<?php
    	include '../../Models/Database.class.php';

        $db = new Database();
        Database::init('localhost','cash','root','');
        $table = $db->selectSP()
                    ->from('commission')
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
                    <td>".$table[$i]->montant_min."</td>
                    <td>".$table[$i]->montant_max."</td>
                    <td>".$table[$i]->commission_d."</td>
                    <td>".$table[$i]->commission_r."</td>
                    <td>".$table[$i]->commission_t."</td>
                    <td>
                    <a href='#' id='effacerC' data-toggle='tooltip' title='effacer' onclick='suppr(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
                    <a href='#' id='modifierC' class='m-l-10 ' data-toggle='tooltip' title='modifier' onclick='modif(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
                    </td>
                </tr>";
        }
        echo "</tbody>
              </table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        $('[data-toggle="tooltip"]').tooltip({animation:true});
    </script>
</body>
</html>