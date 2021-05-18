
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
        .btn_etat{
            /* margin-top: 20px; */
            position: relative;
            top: 32px;
            height: 30px;
            left: 20px;
            width: 200px;
        }
        #table_etat{
            height: 250px;
            overflow-y: auto;
            font-size: 1vw;
        }
        #btn_etat_recherche_depot{
            margin-left: 60px;
        }
    </style>
 </head>

 <body>
    <!-- <input type="text" name="myInput" id="myInput" class="col-md-3 col-md-offset-2" placeholder="search"><br><br> -->
    <div class="container div_etat" >
        <!-- <div class="row"> -->
                <!-- <div class="col-md-3"> -->
                   <br> <label>Date min. :</label><br>
                    <input type="date" class="form-control" id="date_min">	<br>
                <!-- </div> -->

                <!-- <div class="col-md-3"> -->
                    <label>Date max. :</label><br>
                    <input type="date" class="form-control" id="date_max">
                <!-- </div> -->
                    <a href="#" class="btn btn-info btn_etat" id="btn_etat_recherche">Rechercher transaction</a>
                    <a href="#" class="btn btn-info btn_etat" id="btn_etat_recherche_depot">Rechercher depot</a>
                    <br><br><br><br>
                
        <!-- </div> -->
    </div>
       
    
    <br><br>
                <?php 
					include '../../Models/Database.class.php';
					$db = new Database();
					Database::init('localhost','cash','root','');
						$table = $db->selectSP()
                                        ->from('solder')
                                        ->innerJoin("solder","telephone","id_num","id")
										->executeSP();
						var_dump($table);
						echo " <br><table class='table table-striped table-hover table-bordered' id='myTable'>
								<thead>
									<th>Numero</th>
									<th>Solde</th>
								</thead>
								<tbody>";

						for ($i=0; $i < count($table); $i++) { 
							echo "<tr>
									<td>".$table[$i]->numero."</td>
									<td>".$table[$i]->solde."</td>
								</tr>";
						}
						echo "</tbody>
							</table>";
				?>
     <div class="etat_recherche container div_etat">
       
       </div>
    <script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
    <script src="Publics/js/select.js"></script>
 </body>
 </html>