<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location:index_auth.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <div class="signin">
        <form class="signin_form">
            <span class="signin_welcome">Добро пожаловать в <span class="signin_citygram">Citygram</span></span>
            <span class="signin_avatar"><img src="img/avatar_01.png" alt=""></span>
        <input type="text" name="login" placeholder="Введите Логин" class="signin_input">
        <input type="password" name="password" placeholder="Введите Пароль" class="signin_input second_input">
        <button type="submit" class="signin_btn">Войти</button>
        <p class="signin_noacc">У вас нет аккаунта? - <a href="register.php">Зарегистрируйтесь!</a></p>
        
        <p class="msg none">Lorem ipsum dolor sit amet.</p>

        </form>
    </div>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>