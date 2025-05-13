<?php
require_once '../config/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, trim($_POST['fio']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    $iserrors = 0;
    $error = "";
    if (empty($name)) {
        $error .= "Введите ФИО. ";
        $iserrors++;
    }
    if (empty($email)) {
        $error .= "Введите email. ";
        $iserrors++;
    }
    if (empty($password)) {
        $error .= "Введите пароль. "; 
        $iserrors++;
    }
    if (!preg_match('/^[А-Яа-яЁё\s]+$/u', $name)) {
        $error .= "ФИО должно содержать только русские буквы.\n";
        $iserrors++;
    }
    if (!preg_match('/^(?=.*[A-ZА-ЯЁ])(?=.*[a-zа-яё])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{6,}$/u', $password)) {
        $error .= "Пароль должен состоять хотя бы из 6 символов, включать заглавные буквы, цифры и специальные символы.\n";
        $iserrors++;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "Некорректный email.\n";
        $iserrors++;
    }
    if ((substr_count($name, ' ') < 2)) {
        $error .= "ФИО должно состоять из трёх слов.\n";
        $iserrors++;
    }

    if ($iserrors > 0) {
        echo $error;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO new_table (fio, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

   if ($stmt->execute()) {
       echo "Данные успешно сохранены!";
   } else {
       echo "Произошла ошибка, пожалуйста, повторите попытку.";
   }
    }
}
mysqli_close($conn);
