<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- <link rel="stylesheet" href="Publics/css/adresse.css"> -->

    </head>
    <body>
       

        <form class="form-group" id="form_compte">
            <input type="hidden" id="id_adresse" name="id_adresse">
            <label>Numero</label>
            <input type="tel" class="form-control tel"  name="telephone" required>

            <label>Emplacement</label>
            <?php
            include_once('../../Models/Database.class.php');
            $db = new Database();
            Database::init("localhost","cash","root","");

           $tab = $db ->selectSP()
                        ->from("adresse")
                        ->executeSP();
        
       $select= '<select name="select_adr" id="select_adr" class="form-control search">';
                for($i=0;$i<count($tab);$i++){
                    $select .= '<option value="'.$tab{$i}->lot.'_'.$tab[$i]->emplacement.'">'.$tab{$i}->lot.' '.$tab[$i]->emplacement.'</option>';
                }
                $select .= '</select>';
                echo $select;
      
?>
            <a href="#" class="btn btn-primary btn-block" id="btn_adresse">Inserer</a>
            <a href="#" class="btn btn-primary btn-block hide" id="btn_modif_adresse">Modifier</a>
        </form>
        <!-- <input type="text" class="form-control search"  placeholder="search...">
        <?php
        //     include_once('../../Models/Database.class.php');
        //     $db = new Database();
        //     Database::init("localhost","cash","root","");

        //    $tab = $db ->selectSP()
        //                 ->from("adresse")
        //                 ->executeSP();
        ?>
        <select name="select_adr" id="select_adr" class="form-control search"> 
                <option value=" adresse"> ADRESSE</option>
                <option value=" emplacement"> EMPLACEMENT</option>
                <option value=" province"> PROVINCE</option>

        </select>
        <a href="#" class="btn btn-info search"> Rechercher</a> -->
        <!-- </div> -->
   
        <script src="Publics/js/select.js"></script>
        <script src="Publics/js/accueil.js"></script>
    </body>
</html>