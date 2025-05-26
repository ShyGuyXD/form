<?php
namespace App\classes;

class Validator
{
    private $conn;
    public $errors = [];

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function validate($data)
    {
        $name = trim($data['fio']);
        $email = trim($data['email']);
        $message = trim($data['message']);
        $noPatronymic = isset($data['noPatronymic']) && $data['noPatronymic'] === 'true';

        if (empty($name)) {
            $this->errors[] = "Введите ФИО.";
        } elseif (!preg_match('/^[А-Яа-яЁё\s]+$/u', $name)) {
            $this->errors[] = "ФИО должно содержать только русские буквы.";
        }

        if (empty($email)) {
            $this->errors[] = "Введите email.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Некорректный email.";
        }

        if (empty($message)) {
            $this->errors[] = "Введите сообщение.";
        }

        $nameParts = explode(" ", $name);
        if ($noPatronymic) {
            if (count($nameParts) < 2) {
                $this->errors[] = "ФИО должно состоять как минимум из двух слов.";
            }
        } else {
            if (count($nameParts) < 3) {
                $this->errors[] = "ФИО должно состоять из трёх слов.";
            }
        }

        return empty($this->errors);
    }

    public function save($name, $email, $message)
    {
        $stmt = $this->conn->prepare("INSERT INTO new_table (fio, email, message) VALUES (:fio, :email, :message)");
        $stmt->bindParam(':fio', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':message', $message);
        return $stmt->execute();
    }
}