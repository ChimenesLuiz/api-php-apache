<?php
require_once "Autoload/autoload.php";
use Controllers\ApiController;

global $api;
$api = new ApiController();
$request = file_get_contents("php://input");
if (strlen($request) == 0) {
    //ENTRADA EXEMPLO
    $static_request = file_get_contents("request.json");
    $api->start($static_request);
} else {
    $api->start($request);
}
