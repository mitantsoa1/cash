<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	
</head>

<?php 
	include '../../Models/Database.class.php';

	$db = new Database();
	Database::init('localhost','cash','root','');
    $table = $db->selectSP()
                ->from('telephone')
                ->innerJoin("telephone","adresse","id_adresse","id_a")
                ->order("telephone.id","DESC")
                ->executeSP();
	
	echo "<table class='table table-striped table-hover table-bordered'>
            <thead>
                <th>Numero</th>
				<th>Adresse</th>
				<th>Emplacement</th>
				<th>Province</th>
				<th>Actions</th>
			</thead>
			<tbody>";

    for ($i=0; $i < count($table); $i++) { 
        echo "<tr>
                <td>".$table[$i]->numero."</td>
				<td>".$table[$i]->lot."</td>
				<td>".$table[$i]->emplacement."</td>
    			<td>".$table[$i]->province."</td>
    			<td>
				<a href='#' id='effacerTel' class='m-l-50 glyph'  data-toggle='tooltip' data-placement='bottom' title='effacer' onclick='effacerTel(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
				<a href='#' id='modifierTel' class='m-l-50' data-toggle='tooltip'  data-placement='bottom' title='modifier' onclick='modifierTel(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
    			</td>
    		</tr>";
    }
	echo "</tbody>
		  </table>";
 ?>
 
<body>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip({animation:true,delay: {show: 50, hide: 300}});
			
		$("#Input").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#mTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		
		});
		})
	</script>
</body>
</html>
