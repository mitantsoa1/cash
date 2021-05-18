<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="Publics/css/adresse.css">

    </head>
    <body>
        <div class="container forme">
        <form class="form-group" id="form_compte">
            <input type="hidden" id="id_adresse" name="id_adresse">
            <label>Adresse</label><br>
            <input type="text" class="form-control adresse"  name="adresse" required><br>

            <label>Emplacement</label>
            <input type="text" class="form-control" name="emplacement" id="emplacement" required=""><br>

            <label>Province</label><br>
            <input type="text" class="form-control" id="province" name="province" required><br>

            <a href="#" class="btn btn-primary btn-block" id="btn_adresse">Inserer</a>
            <a href="#" class="btn btn-primary btn-block hide" id="btn_modif_adresse">Modifier</a>
        </form>

        <input type="text" class="form-control search"  placeholder="search..." id="input_adresse">
        <?php
            include_once('../../Models/Database.class.php');
            $db = new Database();
            Database::init("localhost","cash","root","");

           $tab = $db ->selectSP()
                        ->from("adresse")
                        ->executeSP();
        ?>
        <select name="select_adr" id="select_adr" class="form-control search"> 
                <option value=" adresse"> ADRESSE</option>
                <option value=" emplacement"> EMPLACEMENT</option>
                <option value=" province"> PROVINCE</option>

        </select>
        <a href="#" class="btn btn-info search"> Rechercher</a>
        </div>
   
        <script src="Publics/js/select.js"></script>
        <script src="Publics/js/adresse.js"></script>
    </body>
</html>
