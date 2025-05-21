<?php
namespace private\functions\claasses;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class Database extends Response {
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