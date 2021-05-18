<?php
    if(isset($_POST['export_excel'])){
        include_once('Models/Database.class.php');
        $db = new Database();
        Database::init("localhost","cash","root","");
        $table = $db->selectSP()
                    ->from("transaction")
                    ->executeSP();
                    $out = "";
        if(count($table)>0){
             $out .= '
                    <table class="table" bordered="1">
                        <tr>
                            <th>operateur</th>
                            <th>Mon numero</th>
                            <th>type</th>
                            <th>montant</th>
                            <th>Numero</th>
                            <th>Observation</th>
                            <th>frais</th>
                            <th>Commission</th>
                            <th>Lieu</th>
                            <th>Date</th>
                        </tr>
            ';
            for($i=0;$i<count($table);$i++){
                $out.='
                    <tr>
                        <td>'.$table[$i]->operateur.'</td>
                        <td>'.$table[$i]->number.'</td>
                        <td>'.$table[$i]->type.'</td>
                        <td>'.$table[$i]->montant.'</td>
                        <td>'.$table[$i]->numero.'</td>
                        <td>'.$table[$i]->observation.'</td>
                        <td>'.$table[$i]->frais.'</td>
                        <td>'.$table[$i]->commission.'</td>
                        <td>'.$table[$i]->lieu.'</td>
                        <td>'.$table[$i]->date.'</td>
                    </tr>
                ';
            }
            $out .= '</table>';
            header('Content-Type: application/xls');
            header("Content-Disposition:attachement, filename=download.xls");
            echo $out;
           
        }
    }
?>