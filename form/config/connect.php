<?php
// тут свои параметры базы 

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "new_schema"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
echo "Подключение успешно!";