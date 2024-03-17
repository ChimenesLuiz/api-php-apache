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

            $service = $this->request->getService();
            $this->doService($service);
            $response = $this->response->getResponse();
            
            return $response;
        } catch (\Throwable $th) {
            $error = $th->getMessage();
            $this->response->create();
            $this->response->error($error);
            $response = $this->response->getResponse();
            
            return $response;
        }
        
    }

    private function doService($service) {
        switch ($service) {
            case "list-user":
                $user = new User();
                $user_data = $user->getAll();
                $this->response->create($user_data);
                break;
            case "create-user":
                $user = new User();
                $user->create();
                $this->response->create(["dsadas"]);
                break;
        }
    }

}