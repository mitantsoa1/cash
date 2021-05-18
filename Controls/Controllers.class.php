<?php
    
    class Controllers{

        public static function BackLoadView($page){
            include("Views/Back/".$page);
        }
        public static function FrontLoadView($page){
            include("Views/Front/".$page);
        }
        public function logout(){
            self::BackLoadView("logOut.php");
        }
        // public function monCompte(){
           
        // }
        // public function inscrire(){
        //     if (isset($_POST['btnIndex'])){
        //         require_once('Models/Database.class.php');
        //         Database::init("localhost","cash","root","");
        //         $db = new Database();

        //         $username = htmlspecialchars(trim($_POST['username']));
        //         $password = htmlspecialchars(trim($_POST['password']));
        //         $operator = $_POST['selectOperator'];

        //         $tab = $db  ->selectSP()
        //                         ->from("solde")
        //                         ->where("username","=")
        //                         ->execute([$username]);
        //             if(count($tab)>0){
        //                 echo "Erreur ! le nom est déjà pris. Veillez choisir un autre.";
        //             }else{
        //                 $db->insert("solde")
        //                     ->parametters(["username","password","operator"])
        //                     ->execute([$username,$password,$operator]);
        //             }   

        //     }
        // }
        // public function connecter(){
        //     require_once('Models/Database.class.php');
        //     Database::init("localhost","cash","root","");
        //         $db = new Database();
        //         self::loadView("indexViews.php");
        //     if (isset($_POST['btnIndex'])) {
        //         $username = htmlspecialchars(trim($_POST['username']));
        //         $password = htmlspecialchars(trim($_POST['password']));
        //         $operator = $_POST['selectOperateur'];
        //         $tab = $db  ->selectSP()
        //                     ->from("solde")
        //                     ->where("username","=")
        //                     ->et(["userpass","id_operator"], ["=","="])
        //                     ->execute([$username,$password,$operator]);
                            
        //                     var_dump($tab);
        //         if(count($tab)>0){
        //             self::loadView("accueil.php");
        //         }else{
        //             self::loadView("erreur.php");
        //         }
        //     }
            
        // }
        
    }
    
    
?>