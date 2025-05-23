<?php

namespace Private\Functions;
use App\classes\Database;
use App\classes\Validator;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new Database();
    $validator = new Validator($db->conn);
    
    if ($validator->validate($_POST)) {
        if ($validator->save($_POST['fio'], $_POST['email'], $_POST['message'])) {
            echo "Данные успешно сохранены!";
        } else {
            echo "Произошла ошибка, пожалуйста, повторите попытку.";
        }
    } else {
        echo implode("\n", $validator->errors);
    }

    $db->close();
}