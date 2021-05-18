<?php
    class Database {
        private $query;
        private static $host;
        private static $dbname;
        private static $user;
        private static $pass;
        private static $conn;
        // private $reqA;
        // private $tableA=[];

        public static function init($host,$dbname,$user,$pass){
            self:: $host  = htmlspecialchars(trim($host));
            self:: $dbname  = htmlspecialchars(trim($dbname));
            self:: $user  = htmlspecialchars(trim($user));
            self:: $pass  = htmlspecialchars(trim($pass));
        }

        public static function db(){
            if(!isset(self::$conn)){
                self::$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname,self::$user,self::$pass);
            }
            return self::$conn;
        }
        public function insert($table){
            $table = htmlspecialchars(trim($table));
            $this ->query = "INSERT INTO ".$table ;
            return $this;
        }
        public function parametters($fields){
            $this->query.=" (";
            $cols="";
            $value=" VALUE (";
            for($i=0; $i<count($fields); $i++){
                $cols.=$fields[$i].",";
            }
            $cols = trim($cols,",");
            $cols.=")";
            for($i=0; $i<count($fields); $i++){
                $value.="?,";
            }
            $value = trim($value,",");
            $value.=")";
            $this->query.=$cols.$value;
 
            return $this;

        }
        public function paramettersNV($fields){
            $this->query.=" (";
            $cols="";
            for($i=0; $i<count($fields); $i++){
                $cols.=$fields[$i].",";
            }
            $cols = trim($cols,",");
            $cols.=")";
            
            $this->query.=$cols;
 
            return $this;

        }
        public function selectSP(){
                $this->query = "SELECT * ";
                return $this;  
        }

        public function select($fields){ 
            $this->query = "SELECT ";
            $this->query.=" (";
            $cols="";
            for($i=0; $i<count($fields); $i++){
                $cols.=$fields[$i].",";
            }
            $cols = trim($cols,",");
            $cols.=")";
            
            $this->query.=$cols;
        
            return $this;
        }
        public function from($table){
            $table = htmlspecialchars((trim($table)));
            $this->query .= " FROM ".$table;

            return $this;
            
        }
        public function getQuery(){
            echo $this->query;
        }

        public function execute($data){
           
            if(strpos($this->query,"?") > -1){
                $req = self::db()->prepare($this->query);
                $req->execute($data); 
                return $req->fetchAll(PDO::FETCH_OBJ);    
            }
        }
        // public function executeAff($data){
        //     if(strpos($this->query,"?") > -1){
        //         $reqA = self::db()->prepare($this->query);
        //         $reqA->execute($data);  
        //         return $reqA->fetchAll(PDO::FETCH_OBJ);          
        //     }
        // }
        public function executeSP(){
                $req = self::db()->prepare($this->query);
                $req->execute(); 
                return $req->fetchAll(PDO::FETCH_OBJ); 
        }
        
        public function sum($table,$fields) {
            $fields = htmlspecialchars(trim($fields)) ;
            $table = htmlspecialchars(trim($table)) ;
            $this->query="SELECT SUM(".$fields.") AS somme FROM ".$table ;
            return $this ;
        }
        
        public function update($table){
            $this->query = "UPDATE ".$table;

            return $this;
        }
        public function set($fields){
            $this->query .=" SET ";
            for ($i=0; $i<count($fields); $i++){
                $this->query .= $fields[$i]." = ? ,";
            }
            $this->query= trim($this->query,",");

            return $this;
        }

        public function where($primary,$operator){
            $this->query.=" WHERE ".$primary." ".$operator." ?";
            return $this;
        }

        public function delete($table){
            $table = htmlspecialchars(trim($table));
            $this->query = "DELETE FROM ".$table;
            return $this;

        }
        public function et($col,$operator){
            $sql="";
            for($i=0; $i<count($col);$i++){
                $sql.= " AND ".$col[$i]." ".$operator[$i]." ?";
            }
            $this->query .=$sql;

            return $this;
        }
        public function ou($col,$operator){
            $sql="";
            for($i=0; $i<count($col);$i++){
                $sql.= " OR ".$col[$i]." ".$operator[$i]." ?";
            }
            $this->query .=$sql;

            return $this;
        }
        public function out($col){
            $sql="";
            for($i=0; $i<count($col);$i++){
                $sql.= " OR ".$col[$i]." LIKE ?";
            }
            $this->query .=$sql;

            return $this;
        }
        public function retour(){
            return "success";
        }
        public function innerJoin($table1,$table2,$id1,$id2){
            $table1 = htmlspecialchars(trim($table1));
            $table2 = htmlspecialchars(trim($table2));
            $id1 = htmlspecialchars(trim($id1));
            $id2 = htmlspecialchars(trim($id2));

            $this->query .=" INNER JOIN ".$table2." ON ".$table1.".".$id1."=".$table2.".".$id2;
            return $this; 
        }
        public function like($cols,$wildcards){
            $this->query .= " WHERE ".$cols." LIKE ".$wildcards;
            return $this;
        }
        public function lik($cols){
            $this->query .= " WHERE ".$cols." LIKE ?";
            return $this;
        }
        public function order($col,$tri){
            $this->query.=" ORDER BY ".$col." ".$tri;
            return $this;
        }
        public function limit($initial,$final){
            $this->query.=" LIMIT ".$initial.", ".$final;
            return $this;
        }

    }
   
     Database::init("localhost","cash","root","");
     $db = new Database();
    $tab = $db ->selectSP()
                                   ->from("frais")
                                   ->where("operateur","=")
                                   ->et(['type'],['='])
                                   ->order("id","ASC")
    // $db ->insert('commission')
    //                           ->parametters(['operateur','montant_min','montant_max','commission_d','commission_r','commission_t'])

    

    // $tab = $db ->selectSP()
    // ->from("transaction")
    // ->where("date",">=")
    // ->et(["date"],["<="])
    // ->getQuery();
    // $db ->insert("depot")
    //                           ->parametters(['operateur','montant','description'])
    //                           ->execute(['telma',10000,'ici']);
                              ->getQuery();
    // $db ->update("adresse")
    //                                          ->set(['lot','province'])
    //                                          ->where("id","=")
    // $tab = $db ->selectSP()->from("adresse")->getQuery();
                                    // ->executeSP();
                                    // var_dump($tab);

                                    // $db ->update("adresse")
                                    // ->set(['lot','province'])
    // $db->update("solder")
    //                         //   ->paramettersNV(['solde','observation'])
    //                           ->set(['solde','observation'])
    //                           ->where("operateur","=")
    //                           ->execute([20050,'drer','airtel']);
    // $tab = $db  ->selectSP()
    // ->from("solde")
    // ->where("username", "=")
    // ->et(["password","id_operator"], ["=","="])
    // ->getQuery();

    // $table = $db  ->selectSP()
    // ->from("voiture")
    // ->innerJoin("voiture", "personne", "id_personne", "id")
    // ->lik("matricule")
    // ->out(["marque","couleur","nom","prenom"])
    // ->getQuery();

//     $db  ->selectSP()
//     ->from("voiture")
//   ->where("matricule","=")
//     // -> set(["matricule","marque","place","couleur","id_personne"])
// $_POST["chercher"]="tr";
// $wild='%'.$_POST["chercher"].'%';
//         $table = $db  ->selectSP()
//                                      ->from("voiture")
//                                      ->innerJoin("voiture", "personne", "id_personne", "id")
//                                      ->like("matricule",$wild)
//                                      ->getQuery();
// //     ->getQuery();

    // Database::init("localhost","stage","root","");
    // $db = new Database();
    // $db  ->update("voiture")
    // ->paramettersNV(["matricule","marque","place","couleur","id_personne"])
    // -> set(["matricule","marque","place","couleur","id_personne"])
    // ->where("id","=")
    // ->getQuery();
    //                                 ->paramettersNV(["nom","prenom","adresse"])
    //                                 ->set(["nom","prenom","adresse"])
    //                                 ->where("id","=")
    //                                 ->getQuery();
                                    // ->executeSP(["nom","prenom","adresse",7]);
// $tab=$db->selectSP()
// ->from("voiture")
// ->like("marque","'a%'")
// ->where("matricule","=")
// // ->executeAff(["a"]);
// // ->getQuery();
// ->executeSP();
// var_dump($tab) ;
// for($i=0;$i<count($tab);$i++){
// echo $tab[$i]->marque."<br>";
// }

// ->innerJoin("voiture","personne","id_personne","id")
// ->getQuery();
// $db = new Database();
//     $db ->update("personne")
//         ->set(["nom","prenom"])
//         -> where("prenom","=")
//         ->getQuery();
// $db->delete("personne")
// -> where("nom","=")
//        ->getQuery();
// $tab = $db ->selectSP()
//                 ->from("voiture")
//                 ->where("id","=")
//                 // ->getQuery();
//                 ->execute([3]);
//                 var_dump($tab);
?>