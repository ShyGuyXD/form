<!DOCTYPE html>
<html lang="ru">

<head> 
    <meta charset="UTF-8">
    <title>Форма регистрации</title>

    <link rel="stylesheet" href="style/style.css">
</head>

<body>
    <h1 class="title">Отправка формы</h1>
    <form class="reg-form" name="myForm" action="./functions/validator.php" method="post">
        <label for="fio">ФИО:</label>
        <input class="fio" id="fio" type="text" name="fio">
        <div id="fioError"></div>

        <label for="email">email:</label>
        <input class="email" id="email" type="text" name="email" autocomplete="username">
        <div id="emailError"></div>

        <label for="password">пароль:</label>
        <input class="password" id="password" type="password" name="password" autocomplete="new-password">
        <div id="passwordError"></div>

        <div class="checkbox-container">
            <input class="show-password" id="showPassword" type="checkbox">
            <label for="showPassword">Показать пароль</label>
        </div>

        <input class="buttton submit" type="submit" value="Отправить">
    </form>

    <script src="js/main.js"></script>
</body>

</html>