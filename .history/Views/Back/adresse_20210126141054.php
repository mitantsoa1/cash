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
        
        <a href="#" class="btn btn-info search" id="btn_adresse_recherche"> Rechercher</a>
        </div>
   
        <script src="Publics/js/select.js"></script>
        <script src="Publics/js/adresse.js"></script>
    </body>
</html>
