<?php
namespace Controllers;
use Controllers\RequestController;
use Controllers\ResponseController;

class ApiController {
    private RequestController $request;
    private ResponseController $response;

    public function __construct() {
        $this->request = new RequestController();
        $this->response = new ResponseController();
    }

    public function collect() {

    }

    // public function getService(): string {
    //     // $request = $this->request->getRequest();
    //     // $service = $request["info"]["service"];
    //     // return $service;
    // }

    public function start(string $request) {
        try {
            $this->request->setRequest($request);
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            $this->response->setResponse();
            $this->response->error($error);
            $response = $this->response->getResponse();
            header('Content-Type: application/json');
            echo json_encode($response, true);
        }
        
    }

}