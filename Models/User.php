<?php
namespace Models;

use Exception;
use Models\Database;
use mysqli;


class User {
    private Database $database;
    public function __construct() {
        $this->database = new Database();
    }
    
    public function getAll(): array {
        $data = $this->database->select();
        if ($data -> num_rows == 0) {
            throw new Exception("Nao existe nenhum usuario cadastrado");
        }
        return $data -> fetch_all();
    }

    public function create() {
        $this->database->insert();
    }
}