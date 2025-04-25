<?php
// это наверное надо поменять потому что врятли везде так хы
$link = mysqli_connect("localhost", "root", "", "new_schema");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($link, trim($_POST['fio']));
    $email = mysqli_real_escape_string($link, trim($_POST['email']));
    $password = mysqli_real_escape_string($link, trim($_POST['password']));

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
        $query = "INSERT INTO new_table (fio, email, password) VALUES ('$name', '$email', '$hashedPassword')";
        
        if (mysqli_query($link, $query)) {
            echo "Данные успешно сохранены!";
        } else {
            echo "Произошла ошибка, пожалуйста, повторите попытку.";
        }
    }
}

mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма регистрации</title>
    <script>
        function validateFIO(fio) {
            return /^[А-Яа-яЁё\s]+$/.test(fio);
        }

        function validatePassword(password) {
            return /^(?=.*[A-ZА-ЯЁ])(?=.*[a-zа-яё])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).{6,}$/.test(password);
        }

        function validateEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }

        function validateFIO3words(fio) {
            return (fio.match(/\S+/g) || []).length >= 3;
        }

        function validateField(field) {
            let error = "";
            let value = field.value;

            switch (field.name) {
                case "fio":
                    if (!validateFIO(value)) {
                        error += "ФИО должно содержать только русские буквы.\n";
                    }
                    if (!validateFIO3words(value)) {
                        error += "ФИО должно состоять из трёх слов.\n";
                    }
                    break;
                case "email":
                    if (!validateEmail(value)) {
                        error += "Некорректный email.\n";
                    }
                    break;
                case "password":
                    if (!validatePassword(value)) {
                        error += "Пароль должен состоять хотя бы из 6 символов, включать заглавные буквы, цифры и специальные символы.\n";
                    }
                    break;
            }

            document.getElementById(field.name + "Error").innerText = error;
        }

        function validateForm() {
            let fields = document.forms["myForm"].elements;
            let isValid = true;
            for (let field of fields) {
                if (field.tagName === "INPUT") {
                    validateField(field);
                    if (document.getElementById(field.name + "Error").innerText) {
                        isValid = false;
                    }
                }
            }
            return isValid;
        }

        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const checkbox = document.getElementById("showPassword");
            passwordField.type = checkbox.checked ? "text" : "password";
        }
    </script>
</head>
<body>

    <h1>Отправка форм</h1>
    
    <form name="myForm" action="" method="post" onsubmit="return validateForm()">
        ФИО: <input type="text" name="fio" onblur="validateField(this)"><p>
        <div id="fioError" style="color: red;"></div>

        email: <input type="text" name="email" onblur="validateField(this)"><p>
        <div id="emailError" style="color: red;"></div>

        password: <input type="password" name="password" id="password" onblur="validateField(this)"><p>
        <div id="passwordError" style="color: red;"></div>
        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Показать пароль

        <p>
        <input type="submit">
    </form>

</body>
</html>