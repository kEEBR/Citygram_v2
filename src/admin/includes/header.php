<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role']!="Администратор" && $_SESSION['user']['role']!="Чиновник") {
    header("Location: ../login.php");
}

?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Citygram</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/style.min.css" />
  </head>
  <body>
  <header>
      <nav>
        <a href="#"
          ><img src="../img/logo.png" alt="logo" class="logo"
        /></a>
        <ul class="menu">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Админ панель
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="list-role.php">Роли пользователей</a>
          <a class="dropdown-item" href="settings-user-role.php">Настройки</a>
          <a class="dropdown-item" href="list-status.php">Статусы пользователей</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Панель Чиновника
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="list-troubles.php">Статус проблем</a>
          <a class="dropdown-item" href="settings-troubles-status.php">Настройка статуса проблемы</a>
        </div>
      </li>
          <a href="#">
          <li class="menu_item"><img src="../<?= $_SESSION['user']['avatar'] ?>" alt="user_avatar" class="menu_avatar"></li>
          </a>
        </ul>
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>
    <script src="../js/script.js"></script>
    <script src="https://kit.fontawesome.com/50fff6b33b.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="../js/likes.js"></script>
  </body>
</html>