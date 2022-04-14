<?php
require_once '../classes/factura.class.php';
require_once '../classes/codes.class.php';
<<<<<<< HEAD
=======

>>>>>>> 61e18ae22f8f8d8045123495a42fe8c782b9eb60
$_factura = new ClassFactura;
$_cod = new codigosnum;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $contBody = file_get_contents('php://input');
    // print_r($contBody);
    $dataClass = $_factura->ctaFactura($contBody);
    $resp = json_encode($dataClass, true);
    // print_r($dataClass);

    if ($dataClass[0][0]['code'] == 200) {
        http_response_code($dataClass[0][0]['code']);
        header('Content-Type: application/json; charset=UTF-8');
        echo json_encode($dataClass);
    } else {
        $errClass = $_cod->code_204();
        http_response_code($errClass['message']['code']);
    }
    

} else {
    http_response_code(205);
    header('Content-Type: application/json; charset=UTF-8');
}

?>