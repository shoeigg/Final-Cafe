<?php
    session_start();
    class Database{
        private $servername = "localhost:8889";
        private $username = "root";
        private $password = "root";
        private $database = "Cafe";
        public $conn;

        public function __construct(){
            // $conn = new mysqli($servername, $username, $password, $database);

            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

            if($this->conn->error){
                die("Unable to connect to database " .$this->database. ": " .$this->conn->connect_error);
            }
        }
    }

?>