<?php
namespace Controllers;

class RequestController {
    private string $request_string;
    private array $request_array;
    public function __construct() {
    }

    public function setRequest(string $request): bool {
        $this->request_string=$request;
        $this->request_array=json_decode($this->request_string, true);
        return $this->validate();

    }

    private function validate(): bool {
        $request = $this->request_array;
        if ($request == null && json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("O fomato do JSON está invalido!");
        }

        if (!isset($request["info"]) || !isset($request["data"])) {
            throw new \Exception("O json deve conter as chaves 'info' e 'data'");
        }

        return true;
    }

    

    // public function hasError() {
    //     $status = $this->response["info"]["status"];
    //     if ($status == "error") {
    //         return true;
    //     }
    // }

    // public function getError() {
    //     if ($this->hasError()) return true;
    // }


    // private function setError(string $error_message): void {
    //     $error = ["status" => "error", "message" => $error_message];
    //     $this->response["info"] = $error;
    // }





    // public function getRawRequest(): string {
    //     return $this->request_string;
    // }

    // public function getRequest(): array {
    //     return $this->request_array;
    // }
}