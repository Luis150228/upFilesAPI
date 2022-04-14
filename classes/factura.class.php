<?php
<<<<<<< HEAD
include_once '../conexion/cnx.php';
=======
require_once '../conexion/cnx.php';
require_once '../classes/codes.class.php';

>>>>>>> 61e18ae22f8f8d8045123495a42fe8c782b9eb60
class ClassFactura extends cnx {

    public function ctaFactura($json){
        $info = json_decode($json, true);
        // echo $info;
        foreach($info as $row){
            // print_r($row);
            $ncta = $row['cta'];
            $imp_recargos = $row['recargos'];
            $inpc = $row['actualiza'];
            $imp_total = $row['total'];
            $save = [$this->saveFactura($ncta, $imp_recargos, $inpc, $imp_total)];
            // echo $ncta;
        };
        return $save;
        
    }

    private function saveFactura($ncta, $imp_recargos, $inpc, $imp_total)
    {
        $sql = "call saveFactura('$ncta', '$imp_recargos', '$inpc', '$imp_total')";
        // print_r($sql);
        $query = parent::getDataPa($sql);
        // print_r($query);
        return $query;
    }
}

?>