<?php
session_start();
?>
<?php 
		header('Content-type: application/json');
                    require('../Models/Database.class.php');
                    Database::init("localhost","cash","root","");
                    $db = new Database();

                    // affichage solde
				// if(isset($_POST['airtel'])){

                    // $tab = $db ->selectSP()
                    //             ->from('solder')
                    //             ->where('operateur',"=")
                    //             ->execute([$_POST['airtel']]);

                    //             echo json_encode($tab[0]->solde);
                    // // if(!isset($_SESSION['oper'])){
                    // //      $_SESSION['oper']=$_POST['airtel'];
                    // // }else{
                    // //      session_destroy();
                    // //      $_SESSION['oper']=$_POST['airtel'];
                    // // }

				// }else if(isset($_POST['orange'])){
					
                    // $tab = $db ->selectSP()
                    //             ->from('solder')
                    //             ->where('operateur',"=")
                    //             ->execute([$_POST['orange']]);

                    //             echo json_encode($tab[0]->solde);

                    //           //   if(!isset($_SESSION['oper'])){
                    //           //      $_SESSION['oper']=$_POST['orange'];
                    //           // }else{
                    //           //      session_destroy();
                    //           //      $_SESSION['oper']=$_POST['orange'];
                    //           // }
                                
				// }else if(isset($_POST['telma'])){
					
                    // $tab = $db ->selectSP()
                    //             ->from('solder')
                    //             ->where('operateur',"=")
                    //             ->execute([$_POST['telma']]);

                    //             echo json_encode($tab[0]->solde);
                                
                    //           //   if(!isset($_SESSION['oper'])){
                    //           //      $_SESSION['oper']=$_POST['telma'];
                    //           // }else{
                    //           //      session_destroy();
                    //           //      $_SESSION['oper']=$_POST['telma'];
                    //           // }
                                
                    // }

                    if (isset($_POST['num'])){
                         $t = htmlspecialchars(trim($_POST['num']));
                         $ta = $db->selectSP()
                                   ->from("telephone")
                                   ->where("numero","=")
                                   ->execute([$t]);
                         $id = $ta[0]->id;

                         $tab = $db->selectSP()
                                   ->from("solder")
                                   ->where("id_num","=")
                                   ->execute([$id]);
                         echo json_encode($tab[0]->solde);


                    }
                    
                    // insertion solde

                    if(isset($_POST['number'])){
                         $number = $_POST['number'];
                         $depot = htmlspecialchars(trim($_POST['depot']));
                         $observation = htmlspecialchars(trim($_POST['observation']));

                         $t = $db->selectSP()
                                   ->from('telephone')
                                   ->where('numero',"=")
                                   ->execute([$number]);
                         $id_n = $t[0]->id;
                         $ta = $db->selectSP()
                                   ->from('solder')
                                   ->where('id_num',"=")
                                   ->execute([$id_n]);

                                   $sold = $ta[0]->solde + $depot;

                         $db ->insert("depot")
                              ->parametters(['numero','montant','description'])
                              ->execute([$number,$depot,$observation]);

                         $db->update("solder")
                              ->set(['solde','observation'])
                              ->where("id_num","=")
                              ->execute([$sold,$observation,$id_n]);
                              echo json_encode("$sold");
                    }

                    // if(isset($_POST['province'])){
                    //      $adresse = htmlspecialchars(trim($_POST['adresse']));
                    //      $emplacement = htmlspecialchars(trim($_POST['emplacement']));
                    //      $province = htmlspecialchars(trim($_POST['province']));

                    //      $tab = $db ->selectSP()
                    //                ->from("adresse")
                    //                ->where("adresse","=") 
                    //                ->et(['emplacement'],['='])
                    //                ->execute([$adresse,$emplacement]);

                    //                if(count($tab)>0){
                    //                     echo json_encode("non") ;
                    //                }else{
                    //                      $db ->insert("adresse")
                    //                          ->parametters(['lot','emplacement','province'])
                    //                          ->execute([$adresse,$emplacement,$province]);
                    //                }
                    //                echo json_encode("ko");
                    // }

                    if(isset($_POST['id_adresse'])){
                         $db  ->delete("adresse")
                              -> where("id","=")
                              ->execute([$_POST['id_adresse']]); 

                              echo json_encode("ko");
                    }

                    // modifier adresse

                    if(isset($_POST['id_adress'])){
                        $tableau = $db ->selectSP() 
                              ->from("adresse")
                              -> where("id","=")
                              ->execute([$_POST['id_adress']]); 

                              echo json_encode($tableau);
                    }

                    if(isset($_POST['province_modif'])){
                        $adresse = htmlspecialchars(trim($_POST['adresse_modif']));
                         $emplacement = htmlspecialchars(trim($_POST['emplacement']));
                         $province = htmlspecialchars(trim($_POST['province_modif']));
                                         $db ->update("adresse")
                                             ->set(['lot','emplacement','province'])
                                             ->where("id","=")
                                             ->execute([$adresse,$emplacement,$province,$_POST['id_modif']]);
                                   
                                   echo json_encode("ko");
                    }
                    /* ----------------- telephone --------------------------*/
                    if(isset($_POST["numero"])){
                         $numero = htmlspecialchars(trim($_POST["numero"]));
                         $id_adr= $_POST["selec"];
                         $t = $db ->selectSP()
                                   ->from("telephone")
                                   ->where("numero","=")
                                   ->execute([$numero]);
                         if(count($t)>0){
                         echo json_encode("non");
                         }else{
                         $db ->insert("telephone")
                              ->parametters(['numero','id_adresse'])
                              ->execute([$numero,$id_adr]);
                              echo json_encode("ok");
                         }
                         
                    }
                    ///effacer telephone
                    if(isset($_POST['id_tel'])){
                         $db->delete("telephone")
                              ->where("id","=")
                              ->execute([$_POST['id_tel']]);
                         echo json_encode("effacer");
                    }
                    /*modifier telephone*/
                    if(isset([$_POST['id_t']])){
                    $t = $db ->selectSP()
                              ->from('telephone')
                              ->where("id","=")
                              ->execute([$_POST['id_t']]);
                         echo json_encode($t);

                    }
                    if(isset($_POST['num_tel'])){
                         $db->update("telephone")
                              ->set(["id_adresse"])
                              ->where("id","=")
                              ->execute([$_POST['id']]);
                         echo json_encode("modifier");
                    }

                    /*--------------------transaction-----------------------*/
                    if(isset($_POST['number_trans'])){
                         $num_tr = htmlspecialchars(trim($_POST['number_trans']));
                         $montant = htmlspecialchars(trim($_POST['montant']));
                         $numero = htmlspecialchars(trim($_POST['numero']));
                         $observation = htmlspecialchars(trim($_POST['observation']));

                         $tab =str_split($num_tr);
   
                         if($tab[2]=="4"){
                             $operateur = "telma";
                         }else if($tab[2]=="2"){
                              $operateur = "orange";
                         }else if($tab[2]=="3"){
                              $operateur = "airtel";
                         }


                         $tab = $db ->selectSP()
                                   ->from("frais")
                                   ->order("id","ASC")
                                   ->executeSP();

                         $t_lieu = $db ->selectSP()
                                        ->from("telephone")
                                        ->innerJoin("telephone","adresse","id_adresse","id")
                                        ->et(["telephone.numero"],["="])
                                        ->execute([$num_tr]);
                         $lieu = $t_lieu[0]->lot;

                         for($i=0;$i<count($tab);$i++){
                              if($montant>$tab[$i]->montant_min && $montant<=$tab[$i]->montant_max ){
                                   $frais_d =$tab[$i]->frais_d;
                                   $frais_r =$tab[$i]->frais_r;
                                   $frais_t =$tab[$i]->frais_t;
                              }
                         }
                         $t = $db ->selectSP()
                                   ->from("commission")
                                   ->where("operateur","=")
                                   ->order("id","ASC")
                                   ->execute([$operateur]);


                         for($i=0;$i<count($t);$i++){
                              if($montant>$t[$i]->montant_min && $montant<=$t[$i]->montant_max ){
                                   $commission_d =$t[$i]->commission_d;
                                   $commission_r =$t[$i]->commission_r;
                                   $commission_t =$t[$i]->commission_t;
                              }
                         }

                         if($_POST['type']=='retrait'){
                              $db ->insert("transaction")
                                   ->parametters(['operateur','number','type','montant','numero','observation','frais','commission','lieu'])
                                   ->execute([$operateur,$num_tr,$_POST['type'],$montant,$numero,$observation,$frais_r,$commission_r,$lieu]);
                         }else if($_POST['type']=='depot'){
                              $db ->insert("transaction")
                                   ->parametters(['operateur','number','type','montant','numero','observation','frais','lieu'])
                                   ->execute([$operateur,$num_tr,$_POST['type'],$montant,$numero,$observation,$frais_d,$commission_d,$lieu]);
                         }else if($_POST['type']=='transfert'){
                              $db ->insert("transaction")
                                   ->parametters(['operateur','number','type','montant','numero','observation','frais','lieu'])
                                   ->execute([$operateur,$num_tr,$_POST['type'],$montant,$numero,$observation,$frais_t,$commission_t,$lieu]);
                         }

                         $te = $db ->selectSP()
                                        ->from("telephone")
                                        ->where("numero","=")
                                        ->execute([$num_tr]);
                         
                         $table = $db ->selectSP()
                                        ->from('solder')
                                        ->where('id_num','=')
                                        ->execute([$te[0]->id]);

                         if($_POST['type']=='retrait'){
                              $s = $table[0]->solde + $montant + $frais_r + $commission_r;
                              $db ->update("solder")
                                        ->set(['solde'])
                                        ->where("id_num","=")
                                        ->execute([$s,$te[0]->id]);
                                        
                                        echo json_encode($s);

                         }else if($_POST['type']=='depot'){
                              $s = $table[0]->solde - $montant + $commission_d ;
                              $db ->update("solder")
                                   ->set(['solde'])
                                   ->where("id_num","=")
                                   ->execute([$s,$te[0]->id]);
                              
                              echo json_encode($s);
                         }else if($_POST['type']=='transfert'){
                              $s = $table[0]->solde - $montant + $commission_t;
                              $db ->update("solder")
                                   ->set(['solde'])
                                   ->where("id_num","=")
                                   ->execute([$s,$te[0]->id]);
                             
                              echo json_encode($s);
                         }
                        
                    }
                    //
                    // filtre transaction
                    
                    if(isset($_POST['date_minT'])){
                         if($_POST['date_minT']=="" || $_POST['date_max']==""){
                              $tab = $db ->selectSP()
                                        ->from("transaction")
                                        ->where("lieu","=")
                                        ->execute([$_POST['lieu']]);
                              if(count($tab)>0){
                                   echo json_encode($tab);
                              }else{
                                   echo json_encode("rien");
                              }
                         }else if($_POST['lieu']=="rien" && $_POST['date_minT']!="" && $_POST['date_max']!=""){
                               $tab = $db ->selectSP()
                                             ->from("transaction")
                                             ->where("date",">=")
                                             ->et(["date"],["<="])
                                             ->execute([$_POST['date_minT'],$_POST['date_max']]);
                                             if(count($tab)>0){
                                                  echo json_encode($tab);
                                             }else{
                                                  echo json_encode("rien");
                                             }
                         }else if($_POST['lieu']!="rien" && $_POST['date_minT']!="" && $_POST['date_max']!="" ){
                              $tab = $db ->selectSP()
                                             ->from("transaction")
                                             ->where("date",">=")
                                             ->et(["date","lieu"],["<=","="])
                                             ->execute([$_POST['date_minT'],$_POST['date_max'],$_POST['lieu']]);
                                             if(count($tab)>0){
                                                  echo json_encode($tab);
                                             }else{
                                                  echo json_encode("rien");
                                             }
                         }
                    }


                    // filtre etat transaction

                    if(isset($_POST['date_min'])){
                         $tab = $db ->selectSP()
                                   ->from("transaction")
                                   ->where("date",">=")
                                   ->et(["date"],["<="])
                                   ->execute([$_POST['date_min'],$_POST['date_max']]);
                                   
                                   echo json_encode($tab);
                    }

                    // filtre etat depot

				if(isset($_POST['date_min_d'])){
                         $tab = $db ->selectSP()
                                   ->from("depot")
                                   ->where("date",">=")
                                   ->et(["date"],["<="])
                                   ->execute([$_POST['date_min_d'],$_POST['date_max_d']]);
                                   echo json_encode($tab);
                    }

                    // insertion frais

                    if(isset($_POST['montant_min_f'])){
                         $montant_min = htmlspecialchars(trim($_POST['montant_min_f']));
                         $montant_max = htmlspecialchars(trim($_POST['montant_max']));
                         $frais_d = htmlspecialchars(trim($_POST['frais_d']));
                         $frais_r = htmlspecialchars(trim($_POST['frais_r']));
                         $frais_t = htmlspecialchars(trim($_POST['frais_t']));

                         $ta = $db->selectSP()
                                   ->from('frais')
                                   ->executeSP();
                                   $at = $ta[count($ta)-1];

                         $ftab = $db ->selectSP()
                                        ->from("frais")
                                        ->where('montant_min','<=')
                                        ->et(['montant_max'],['='])
                                        ->execute([$montant_min,$montant_max]);

                         if(count($ftab)>0 || $montant_min >= $montant_max){
                              echo json_encode("!ok");
                         }else{
                               $db->insert("frais")
                                   ->parametters(['montant_min','montant_max','frais_d','frais_r','frais_t'])
                                   ->execute([$montant_min,$montant_max,$frais_d,$frais_r,$frais_t]);
                              echo json_encode("ok");
                         }
                    
                    }

                    //effacer frais
                    if(isset($_POST['id_fra'])){
                         $db  ->delete("frais")
                              -> where("id","=")
                              ->execute([$_POST['id_fra']]); 

                              echo json_encode("ko");
                    }

                     // modifier frais

                     if(isset($_POST['id_f'])){
                         $tableau = $db ->selectSP() 
                               ->from("frais")
                               -> where("id","=")
                               ->execute([$_POST['id_f']]); 
 
                               echo json_encode($tableau);
                     }
                     if(isset($_POST['montant_min_mf'])){
                         $montant_min = htmlspecialchars(trim($_POST['montant_min_mf']));
                         $montant_max = htmlspecialchars(trim($_POST['montant_max']));
                         $frais_d = htmlspecialchars(trim($_POST['frais_d']));
                         $frais_r = htmlspecialchars(trim($_POST['frais_r']));
                         $frais_t = htmlspecialchars(trim($_POST['frais_t']));

                         $db ->update("frais")
                         ->set(['montant_min','montant_max','frais_d','frais_r','frais_t'])
                         ->where("id","=")
                         ->execute([$montant_min,$montant_max,$frais_d,$frais_r,$frais_t,$_POST['id']]);
               
                          echo json_encode("ko");
                     }

                     /* ------insert commission--------*/
                     if(isset($_POST['operateur_com'])){
                         Database::init("localhost","cash","root","");
                         $db = new Database();

                         $montant_min = htmlspecialchars(trim($_POST['montant_min']));
                         $montant_max = htmlspecialchars(trim($_POST['montant_max']));
                         $commission_d = htmlspecialchars(trim($_POST['commission_d']));
                         $commission_r = htmlspecialchars(trim($_POST['commission_r']));
                         $commission_t = htmlspecialchars(trim($_POST['commission_t']));

                         if(!empty($_POST['montant_min']) && !empty($_POST['montant_max']) && !empty($_POST['commission_d']) && !empty($_POST['commission_r']) && !empty($_POST['commission_r'])){
                              $db ->insert('commission')
                              ->parametters(['operateur','montant_min','montant_max','commission_d','commission_r','commission_t'])
                              ->execute([$_POST['operateur_com'],$montant_min,$montant_max,$commission_d,$commission_r,$commission_t]);

                              echo json_encode("ok");
                         }else{
                              echo json_encode('ko');
                         }
                     }
                     /* -----------------recherche commisssion ---------------------*/
                     if(isset($_POST['recherche'])){
                          include_once('../Models/Produit.class.php');
                          $recherche = htmlspecialchars(trim($_POST['recherche']));
                          $tab = explode(" ",$recherche);
                         
                          $tb = $db ->selectSP()
                                   ->from("commission")
                                   ->where("operateur","LIKE")
                                   ->ou(["montant_min","montant_max","commission_d","commission_r","commission_t"],["LIKE","LIKE","LIKE","LIKE","LIKE"])
                                   ->execute(["%".$recherche."%","%".$recherche."%","%".$recherche."%","%".$recherche."%","%".$recherche."%","%".$recherche."%"]);
                         echo json_encode($tb);
                     }

                     /* ---------------------commission modif et suppr -------*/
                     if(isset($_POST['id_commission'])){
                         $db = new Database();

                         $db->delete("commission")
                              ->where("id","=")
                              ->execute([$_POST['id_commission']]);

                              echo json_encode("okay");
                     }
                     if(isset($_POST['id_commis'])){
                         $db = new Database();

                         $tabCom = $db->selectSP()
                              ->from("commission")
                              ->where("id","=")
                              ->execute([$_POST['id_commis']]);

                              echo json_encode($tabCom);
                     }
                     if(isset($_POST['operateur_commis'])){
                         Database::init("localhost","cash","root","");
                         $db = new Database();

                         $montant_min = htmlspecialchars(trim($_POST['montant_min']));
                         $montant_max = htmlspecialchars(trim($_POST['montant_max']));
                         $commission_d = htmlspecialchars(trim($_POST['commission_d']));
                         $commission_r = htmlspecialchars(trim($_POST['commission_r']));
                         $commission_t = htmlspecialchars(trim($_POST['commission_t']));

                         if(!empty($_POST['montant_min']) && !empty($_POST['montant_max']) && !empty($_POST['commission_d']) && !empty($_POST['commission_r']) && !empty($_POST['commission_r'])){
                            $db ->update("commission")
                                   ->set(['operateur','montant_min','montant_max','commission_d','commission_r','commission_t'])
                                   ->execute([$_POST['operateur_commis'],$montant_min,$montant_max,$commission_d,$commission_r,$commission_t]);

                              echo json_encode("ok");
                         }else{
                              echo json_encode('ko');
                         }
                     }

			?>