<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/jsfilestext_api/path.php");
include (CONECT_PATH.'cnx.php');
include(CLASS_PATH.'codes.class.php');

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