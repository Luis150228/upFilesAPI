<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/jsfilestext_api/path.php");
include( CLASS_PATH.'factura.class.php');

$_factura = new ClassFactura;
$_cod = new codigosnum;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $contBody = file_get_contents('php://input');
    $dataClass = $_factura->ctaFactura($contBody);
    // $resp = json_encode($dataClass, true);
    // print_r($dataClass[0][0]['code']);

    if ($dataClass[0][0]['code'] == 200) {
        http_response_code($dataClass[0][0]['code']);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($dataClass);
    } else {
        $errClass = $_cod->code_204();
        http_response_code($errClass['message']['code']);
    }
    

} else {
    http_response_code(416);
    header('Content-Type: application/json; charset=UTF-8');
}

?>