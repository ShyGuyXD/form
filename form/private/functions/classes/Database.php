<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "new_schema";
    public $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn) {
            die("Ошибка подключения: " . mysqli_connect_error());
        }
    }

    public function close() {
        mysqli_close($this->conn);
    }
}
?>