<?php
namespace Controllers;

class ResponseController {
    private string $response_string;
    private array $response_array;
    public function __construct() {
    }

    public function setResponse() {
        
        $src = __DIR__."/../Config/response.json";
        $this->response_string = file_get_contents($src);
        $this->response_array = json_decode($this->response_string, true);
    }
    public function error(string $error): void {
        $this->response_array["info"]["status"] = "error";
        $this->response_array["info"]["message"] = $error;
        $this->response_array["info"]["data"] = [];
    }

    public function getResponse(): array {
        return $this->response_array;
    }

    // private function mountResponse(): void {
    //     $this->response["info"] = [];
    //     $this->response["data"]= [];
    // }

    // public function getResponse(): array {
    //     $this->mountResponse();
    //     return $this->response;
    // }
}