<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/jsfilestext_api/path.php");
include (CONECT_PATH.'cnx.php');
include(CLASS_PATH.'codes.class.php');

class ClassFactura extends cnx {

    public function ctaFactura($json){
        $_cod = new codigosnum;
        $info = json_decode($json, true);
        
        foreach($info as $row){
            // print_r($row);
            $ncta = $row['cta'];
            $imp_recargos = $row['recargos'];
            $inpc = $row['actualiza'];
            $imp_total = $row['total'];
            $save = [$this->saveFactura($ncta, $imp_recargos, $inpc, $imp_total)];
            // echo $save;
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