<?php
require_once '../conexion/cnx.php';
require_once '../classes/codes.class.php';

class ClassPadron extends cnx {

    public function ctaPadron($json){
        // $_cod = new codigosnum;
        $info = json_decode($json, true);
        // print_r($info);
        foreach($info as $row){
            // print_r($row);
            $cta = $row['cta'];
            $calle = $row['calle'];
            $numExt = $row['numExt'];
            $numInt = $row['numInt'];
            $colonia = $row['colonia'];
            $causante = $row['causante'];
            $otros = $row['otros'];
            $rezago = $row['rezago'];
            $corriente = $row['corriente'];
            $perCorriente = $row['perCorriente'];
            $perRezag = $row['perRezag'];

            $save = [$this->savePadron($cta, $calle, $numExt, $numInt, $colonia, $causante, $otros, $rezago, $corriente, $perCorriente, $perRezag)];            
            // echo $cta;
        };
        return $save;
        
    }

    private function savePadron($cta, $calle, $numExt, $numInt, $colonia, $causante, $otros, $rezago, $corriente, $perCorriente, $perRezag)
    {
        $sql = "call savePadron('$cta','$calle','$numExt','$numInt','$colonia','$causante','$otros','$rezago','$corriente','$perRezag','$perCorriente')";
        // print_r($sql);
        $query = parent::getDataPa($sql);
        // print_r($query);
        return $query;
        // return $sql;
    }
}



?>