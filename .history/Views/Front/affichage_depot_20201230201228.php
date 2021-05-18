
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
    <style>
        #myInput{
            border-radius: 5px;
            border: 5px black solid;
        }
    </style>
 </head>

 <body>
    <input type="text" name="myInput" id="myInput" class="col-md-3 col-md-offset-2" placeholder="search"><br><br>
    <?php 
        include '../../Models/Database.class.php';
        $db = new Database();
        Database::init('localhost','cash','root','');
            $table = $db->selectSP()
                            ->from('depot')
                            ->order("id","DESC")
                            // ->limit(0,2)
                            ->executeSP();
            
            echo "<table class='table table-striped table-hover table-bordered' id='myTable'>
                    <thead>
                        <th>Operateur</th>
                        <th>Montant</th>
                        <th>Description</th>
                        <th>Date</th>
                    </thead>
                    <tbody>";

            for ($i=0; $i < count($table); $i++) { 
                echo "<tr>
                        <td>".$table[$i]->operateur."</td>
                        <td>".$table[$i]->montant."</td>
                        <td>".$table[$i]->description."</td>
                        <td>".$table[$i]->date."</td>
                    </tr>";
            }
            echo "</tbody>
                </table>";
    ?>
    <script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
    <script>
        // filtre depot
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    </script>
 </body>
 </html>