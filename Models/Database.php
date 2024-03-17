<?php
namespace Models;

use Exception;
use mysqli;

class Database {
    private array $env;
    private mysqli $mysql;
    public function __construct() {

        $this->env = parse_ini_file(__DIR__."/../Config/config.ini", true);
    }

    public function select() {
        $this->connect();

        try {
            $sql = "SELECT * FROM users";
            $result = $this->mysql->query($sql);
            return $result;

        } catch (\mysqli_sql_exception $mysqli_error) {
            throw $mysqli_error;
        }

        $this->disconnect();
    }
    private function disconnect() {
        $this->mysql->close();
    }

    private function connect() {
        try {
            $host = $this->env["database"]["host"];
            $username = $this->env["database"]["username"];
            $password = $this->env["database"]["password"];
            $database = $this->env["database"]["dbname"];
            $port = $this->env["database"]["port"];

            $this->mysql = new mysqli($host, $username, $password, $database, $port);

            // echo "CONEXAO BEM SUCEDIDA";
            } catch (\mysqli_sql_exception $mysqli_error) {
                // echo $th->getMessage();
                throw $mysqli_error;
        }
        
    }
}