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
   <!-- <link rel="stylesheet" media="screen and (min-width: 720px)" href="Publics/css/CssSup992.css">-->
    <link rel="stylesheet"  href="Publics/css/ms.css">
    <link rel="stylesheet" href="Publics/css/util.css">
    <link rel="stylesheet" href="Publics/css/accueil.css">
    <!-- <link rel="stylesheet" href="Publics/css/sidebar.css"> -->
    <link rel="stylesheet" href="Publics/vendor4/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="Publics/vendor4/font-awesome5/css/all.css">
    <link rel="stylesheet" href="Publics/css/sweetalert2.min.css">
    <link rel="icon" type="image/jpg" sizes="50x50" href="Publics/images/dollar.jpg">
</head>
<!-- <body style="background: url('Publics/images/background2.png') !important ;"> -->
<body>

<div class="container-fluid ">
<div class="row">
  <div class="col-xl-3 col3 page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="glyphicon glyphicon-tasks" ></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="#" class="side"> CASH POINT </a>
        <span id="close-sidebar">
         &nbsp; <i class="glyphicon glyphicon-remove" data-toggle="tooltip" title=" Fermer " data-placement="bottom"></i>
        </span>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">
          <img class="img-responsive img-rounded" src="Publics/images/SD.png" alt="User picture">
        </div>
        <div class="user-info">
          <span class="user-name">
            <strong> NOM </strong> Prenom
          </span>
          <span class="user-role">Admin</span>
          <a href="deconnecter" data-toggle="tooltip" title=" Se deconnecter " data-placement="bottom" onclick="return confirm('Se deconnecter?')">
            <span class="user-status">
              <i class="glyphicon glyphicon-off"></i>
              <span>Online</span>
            </span>
          </a>
        </div>
      </div>
      <!-- sidebar-header  -->
      <!-- <div class="sidebar-search">
        <div>
          <div class="input-group">
            <input type="text" class="form-control search-menu" placeholder="Search...">
          </div>
        </div>
      </div> -->
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>

          <li class="sidebar-dropdown">
            <a href="#" id="compte">
              <i class="glyphicon glyphicon-euro"></i>
              <span>Compte</span>
            </a>
          </li>

          <li class="sidebar-dropdown">
            <a href="#" id="adresse">
              <i class="glyphicon glyphicon-map-marker"></i>
              <span>Adresse/Tel.</span>
            </a>
          </li>

          <li class="sidebar-dropdown">
            <a href="#" id="frais">
              <i class="glyphicon glyphicon-usd"></i>
              <span>Frais</span>
              <!-- <span class="badge badge-pill badge-danger">3</span> -->
            </a>
          </li>

          <li class="sidebar-dropdown">
            <a href="#" id="commission">
              <i class="glyphicon glyphicon-yen"></i>
              <span>Commission</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#" id="transaction">
              <i class="glyphicon glyphicon-send"></i>
              <span>Transaction</span>
            </a>
          </li>
          <li class="sidebar-dropdown">
            <a href="#" id="etat">
              <i class="glyphicon glyphicon-book"></i>
              <span>Etat</span>
            </a>
          </li>
          <li class="header-menu">
            <span>Extra</span>
          </li>
          <li class="extra">
            <a href="#" id="documentation">
              <i class="glyphicon glyphicon-list-alt"></i>
              <span>Documentation</span>
            </a>
          </li>
          <li class="extra">
            <a href="#">
              <i class="glyphicon glyphicon-calendar"></i>
              <span>Calendar</span>
            </a>
          </li>
          <li class="extra">
            <a href="#">
              <i class="glyphicon glyphicon-globe"></i>
              <span>Maps</span>
            </a>
            <!-- <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div> -->
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
    <div class="sidebar-footer">
      <a href="#">
        <i class="glyphicon glyphicon-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="glyphicon glyphicon-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>
      <a href="#">
        <i class="glyphicon glyphicon-cog"></i>
        <span class="badge-sonar"></span>
      </a>
      <a href="#">
        <i class="glyphicon glyphicon-power-off"></i>
      </a>
    </div>
  </nav>
  </div><!-- col-3 -->
  <div class="col-xl-9 col9">
  <div class="container-fluid" onblur="close()">
   <!-- <div class="row"> -->

            <div class="entete col-md-12 m-t-100">
                            <!-- entete -->
            </div>
    <!-- </div>
    <div class="row"> -->

               <!-- <div class="col-md-offset-2 col-md-8 contenu" id="contenue"> </div> -->
               <div class="contenu" id="contenue"></div>
                                <!-- contenu -->



                <div class="solde_content"> </div>


                     <div class="affichage_depot_compte affichage_tableau">
                                <!-- contenu du depot dans la base  -->
                </div>

                <div class="affichage_tableau adresse_content">
                                    <!-- contenu de l'adresse -->
                </div>
                <div class="affichage_tableau frais_content" style="height: 100px;">
                                    <!-- contenu de l'adresse -->
                </div>

                <div class="commission_affichage"></div>
                                    <!-- contenu de l'adresse -->


    <!-- </div>-->

</div>
  </div><!-- col-9 -->
</div><!-- row -->
</div><!-- container -->
<div class="site-cacher"></div>

  <!-- page-content" -->

<!-- page-wrapper -->


    <script src="Publics/js/jquery-3.1.1.js"></script>
    <script src="Publics/vendor4/bootstrap/js/bootstrap.js"></script>
    <script src="Publics/js/main.js"></script>
    <script src="Publics/js/select.js"></script>
    <script src="Publics/js/acc.js"></script>
    <!-- <script src="Publics/js/screen.js"></script> -->
    <script src="Publics/js/sweetalert2.min.js"></script>
    <!-- <script src="Publics/js/sidebar.js"></script> -->
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>
</html>
