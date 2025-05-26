<?php
namespace App\classes;

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "new_schema";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new \PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Ошибка подключения: " . $e->getMessage());
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}
?>