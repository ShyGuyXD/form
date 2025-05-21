<?php
namespace private\functions\claasses;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class Validator  extends Response{
    private $conn;
    public $errors = [];

    public function __construct($connection) {
        $this->conn = $connection;
    }

    public function validate($data) {
        $name = mysqli_real_escape_string($this->conn, trim($data['fio']));
        $email = mysqli_real_escape_string($this->conn, trim($data['email']));
        $message = mysqli_real_escape_string($this->conn, trim($data['message']));

        if (empty($name)) {
            $this->errors[] = "Введите ФИО.";
        }
        if (empty($email)) {
            $this->errors[] = "Введите email.";
        }
        if (empty($message)) {
            $this->errors[] = "Введите сообщение.";
        }
        if (!preg_match('/^[А-Яа-яЁё\s]+$/u', $name)) {
            $this->errors[] = "ФИО должно содержать только русские буквы.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Некорректный email.";
        }
        if ((substr_count($name, ' ') < 2)) {
            $this->errors[] = "ФИО должно состоять из трёх слов.";
        }

        return empty($this->errors);
    }

    public function save($name, $email, $message) {
        $stmt = $this->conn->prepare("INSERT INTO new_table (fio, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        return $stmt->execute();
    }
}
?>