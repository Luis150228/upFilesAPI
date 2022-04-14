<?php
<<<<<<< HEAD
include_once '../conexion/cnx.php';
=======
require_once '../conexion/cnx.php';
require_once '../classes/codes.class.php';
>>>>>>> 61e18ae22f8f8d8045123495a42fe8c782b9eb60

class ClassPrinterPDF extends cnx {

    public function dataPDF($json){
        $_cod = new codigosnum;
        $info = json_decode($json, true);
        // print_r($info);
        $ubica = $info['ubica'];
        $ini = $info['cantA'];
        $fin = $info['cantB'];
            $save = [$this->showDataprint($ubica, $ini, $fin)];
            return $save;
        
    }

    private function showDataprint($ubica, $ini, $fin)
    {
        $sql = "call baseCarteo('$ubica', '$ini', '$fin')";
        // print_r($sql);
        $query = parent::getDataPa($sql);
        // print_r($query);
        return $query;
    }
}

?>