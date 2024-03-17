<?php
namespace Controllers;
use Controllers\RequestController;
use Controllers\ResponseController;
use Models\User;

class ApiController {
    private RequestController $request;
    private ResponseController $response;

    public function __construct() {
        $this->request = new RequestController();
        $this->response = new ResponseController();
    }

    public function start(string $request) {
        try {
            $this->request->setRequest($request);

            $user = new User();
            $database_response = $user->getAll();
            
            $this->response->create(false);


        } catch (\Throwable $th) {
            $error = $th->getMessage();
            $this->response->create(true);
            $this->response->error($error);
            $response = $this->response->getResponse();
            
            return $response;
        }
        
    }

}