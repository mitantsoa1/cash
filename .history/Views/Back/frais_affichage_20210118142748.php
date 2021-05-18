<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table_frais{
            height: 100px;
        }
    </style>
</head>
<body>
    <div>
        
    
    <?php
    	include '../../Models/Database.class.php';

        $db = new Database();
        Database::init('localhost','cash','root','');
        $table = $db->selectSP()
                    ->from('frais')
                    ->order("id","DESC")
                    ->executeSP();
        
        echo " <table class='table table-striped table-hover table-bordered table_frais'>
                <thead>
                    <th>Montan min.</th>
                    <th>Montant max.</th>
                    <th> Frais depot</th>
                    <th> Frais retrait</th>
                    <th> Frais transfert</th>
                    <th> Action</th>
                </thead>
                <tbody>";
    
        for ($i=0; $i < count($table); $i++) { 
            echo "<tr>
                    <td>".$table[$i]->montant_min."</td>
                    <td>".$table[$i]->montant_max."</td>
                    <td>".$table[$i]->frais_d."</td>
                    <td>".$table[$i]->frais_r."</td>
                    <td>".$table[$i]->frais_t."</td>
                    <td>
                    <a href='#' id='effacer' class='m-l-4' data-toggle='tooltip' title='effacer' onclick='suppr(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
                    <a href='#' id='modifierP' class='m-l-10 ' data-toggle='tooltip' title='modifier' onclick='modif(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
                    </td>
                </tr>";
        }
        echo "</tbody>
              </table>";
?>
</div>

    <script>
        $('[data-toggle="tooltip"]').tooltip({animation:true});
    </script>
</body>
</html>