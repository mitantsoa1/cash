<?php 
	include '../../Models/Database.class.php';

	$db = new Database();
	Database::init('localhost','cash','root','');
    $table = $db->selectSP()
                ->from('adresse')
                ->order("id","DESC")
                ->executeSP();
	
	echo "<table class='table table-striped table-hover table-bordered mTable'>
			<thead>
				<th>Adresse</th>
				<th>Emplacement</th>
				<th>Province</th>
				<th>Actions</th>
			</thead>
			<tbody>";

    for ($i=0; $i < count($table); $i++) { 
    	echo "<tr>
				<td>".$table[$i]->lot."</td>
				<td>".$table[$i]->emplacement."</td>
    			<td>".$table[$i]->province."</td>
    			<td>
				<a href='#' id='effacer' class='m-l-50'  data-toggle='tooltip' title='effacer' onclick='effacer(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
				<a href='#' id='modifierP' class='m-l-50' data-toggle='tooltip' title='modifier' onclick='modifier(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
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
	<style>
		table{
			height: 20px !important;
		}
	</style>
</head>
<body>
	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip({animation:true,delay: {show: 50, hide: 300}});
		})
	</script>
</body>
</html>
