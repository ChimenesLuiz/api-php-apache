<?php
require_once "Autoload/autoload.php";
use Controllers\ApiController;

global $api;
$api = new ApiController();
$request = file_get_contents("php://input");
if (strlen($request) == 0) {
    //ENTRADA EXEMPLO
    $static_request = file_get_contents("request.json");
    $response = $api->start($static_request);
} else {
    $response = $api->start($request);
}


header('Content-Type: application/json');
echo json_encode($response, true);