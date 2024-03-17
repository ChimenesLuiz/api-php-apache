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
    
    public function getAll() {
        $data = $this->database->select();
        if ($data -> num_rows == 0) {
            throw new Exception("Nao existe nenhum usuario cadastrado");
        }
    //     if ($data->num_rows == 0) {
    //         
    //     }
    }
}