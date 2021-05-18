<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="Publics/css/style.css">
	<link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
	<style>
        .affichage_depot_t {
            height: 200px !important;
			overflow-y: auto !important;
			padding-top: 0;
			margin-top: 0;
		}
		table{
			position: relative !important;
			margin-top: 0;
			padding-top: 0;
			
		}
		thead{
			position: sticky !important;
			top: 0;
			background: rgb(0, 0, 0);
			color: white;
			margin-top: 0;
			padding-top: 0;
		}
		#myInput::placeholder{
			color: blue;
			font-size: 1.5em;
			font-style: italic;
			opacity: .5;
		}
		
    </style>
</head>
<body>
    <div class="container-fluid">
        <input type="text" name="myInput" id="myInput" placeholder="search... "><br><br>
    </div>
	<br>
	<br>
<div class="container-fluid affichage_depot_t">		
				<?php 
					include '../../Models/Database.class.php';
					$db = new Database();
					Database::init('localhost','cash','root','');
						$table = $db->selectSP()
										->from('depot')
										->order("id","DESC")
										// ->limit(0,2)
										->executeSP();
						
						echo " <br><table class='table table-striped table-hover table-bordered' id='myTable'>
								<thead>
									<th>numero</th>
									<th>Montant</th>
									<th>Description</th>
									<th>Date</th>
									<th>Ations</th>
								</thead>
								<tbody>";

						for ($i=0; $i < count($table); $i++) { 
							echo "<tr>
									<td>".$table[$i]->numero."</td>
									<td>".$table[$i]->montant."</td>
									<td>".$table[$i]->description."</td>
									<td>".$table[$i]->date."</td>
									<td>
										<a href='#' id='effacerCpt' class='m-l-4 glyph' data-toggle='tooltip' data-placement='left' title='effacer' onclick='supprCpt(".$table[$i]->id.")'> <i class='glyphicon glyphicon-trash'></i></a>
										<a href='#' id='modifierCpt' class='m-l-10 ' data-toggle='tooltip' data-placement='bottom' title='modifier' onclick='modifCpt(".$table[$i]->id.")'> <i class='glyphicon glyphicon-edit'></i></a>
									</td>	
								</tr>";
						}
						echo "</tbody>
							</table>";
				?>
			</div>
			<br>
            <script src="Publics/js/jquery-3.1.1.js"></script>
	<script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
	<script src="Publics/js/accueilSide.js"></script>
	<!-- <script src="Publics/js/select.js"></script> -->
	<script>
		// filtre depot

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tbody tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	</script>
</body>
</html>