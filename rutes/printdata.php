<?php
require_once '../classes/printerPdf.class.php';
require_once '../classes/codes.class.php';

$_ppdf = new ClassPrinterPDF;
$_cod = new codigosnum;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $contBody = file_get_contents('php://input');
    // print_r($contBody);
    $dataClass = $_ppdf->dataPDF($contBody);
    // print_r($dataClass);
    
    if (count($dataClass[0]) >= 1) {
        http_response_code('200');
        header('Content-Type: application/json; charset=UTF-8');
        // $resp = json_encode($dataClass, true);
        // print_r($resp);
        echo json_encode($dataClass[0]);
    }else{
        http_response_code('204');
        header('Content-Type: application/json; charset=UTF-8');
        // echo json_encode($dataClass[0]);
        $array = [
            "code"=> "204",
            "menssage" => "Sin datos"
        ];
        print_r($array);     
        // echo json_encode($array);
    }
    

} else {
    http_response_code(416);
    header('Content-Type: application/json; charset=UTF-8');
}

?>