<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: index_auth.php');
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
    <div class="signup">
    <form class="signup_form">
    <span class="signin_welcome">Добро пожаловать в <span class="signin_citygram">Citygram</span></span>
    <span class="signin_avatar"><img src="img/avatar_01.png" alt=""></span>
    <input type="text" name="fullname" placeholder="Введите своё ФИО" class="signup_input">
    <input type="text" name="login" placeholder="Введите Логин" class="signup_input">
    <input type="email" name="email" placeholder="Введите свой адрес электронной почты" class="signup_input">
    <div class="signup_img"><label for="" class="signup_label">Изображение профиля</label>
    <input type="file" name="avatar" class="signup_file"></div>
    <input type="password" name="password" placeholder="Введите Пароль" class="signup_input">
    <input type="password" name="password_confirm" placeholder="Подтвердите пароль" class="signup_input">
    <button type="submit" class="register-btn">Зарегистрироваться</button>
    <p class="signin_noacc">У вас уже есть аккаунт? - <a href="login.php">Авторизируйтесь!</a></p>
    <p class="msg none">Lorem ipsum.</p>
   
    </form>
</div>
<script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>