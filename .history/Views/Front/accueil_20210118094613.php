<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <!-- <link rel="stylesheet" href="Publics/css/style.css"> -->
    <!-- <link rel="stylesheet" href="Publics/css/nav.css"> -->
    <link rel="stylesheet" href="Publics/css/accueilSide.css">
    <!-- <link rel="stylesheet" href="Publics/css/main.css"> -->
    <link rel="stylesheet" href="Publics/css/ms.css">
    <link rel="stylesheet" href="Publics/css/util.css">
    <link rel="stylesheet" href="Publics/css/accueil.css">
    <link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
    <link rel="stylesheet" href="Publics/css/sweetalert2.min.css">
    <link rel="icon" type="image/jpg" sizes="50x50" href="Publics/images/dollar.jpg">
</head>
<!-- <body style="background: url('Publics/images/background2.png') !important ;"> -->
<body>

<div class="container-fluid m-t-5" id="contentViews">
<br><br>

</div>
 <br><br><br>
 <div class="container">
    <div class="row">
            <div class="entete">
                            <!-- entete -->
            </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            
                                <!-- contenu du solde -->

              <div class="solde_content"> </div>

                <div class="col-md-offset-2 col-md-8 contenu" id="contenue">
                                <!-- contenu -->
                </div>

                <div class="affichage_depot_compte affichage_tableau">
                                <!-- contenu du depot dans la base  -->
                </div>

                <div class="affichage_tableau adresse_content">
                                    <!-- contenu de l'adresse -->
                </div>
          
        </div>
    </div>
       
</div>
  <!-- page-content" -->

<!-- page-wrapper -->


    <script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
    <!-- <script src="Publics/js/main.js"></script> -->
    <script src="Publics/js/select.js"></script>
    <script src="Publics/js/acc.js"></script>
    <script src="Publics/js/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>
</html>
