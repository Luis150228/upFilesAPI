<?php
<<<<<<< HEAD
// include_once ($_SERVER['DOCUMENT_ROOT']."/public_html/path.php");
// include( CLASS_PATH.'padron.class.php');
require_once '../classes/padron.class.php'; 
require_once '../classes/codes.class.php'; 
=======
require_once '../classes/padron.class.php';
require_once '../classes/codes.class.php';

>>>>>>> 61e18ae22f8f8d8045123495a42fe8c782b9eb60
$_padron = new ClassPadron;
$_cod = new codigosnum;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: POST");
header("Allow: POST");
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
// header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $contBody = file_get_contents('php://input');
    $dataClass = $_padron->ctaPadron($contBody);
    // print_r($dataClass);
    $resp = json_encode($dataClass, true);
    // print_r($dataClass[0][0]);

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