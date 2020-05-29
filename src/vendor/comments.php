<?php 
    session_start();
    require_once 'connect.php';
    $page = $_POST['id_n'];
    $query = mysqli_query($connect, "SELECT * FROM news WHERE id_n='$page'");
    $path = "content_article.php?id_n=$page";
    $login = $_POST['login'];
    $descr = $_POST['comm'];
    $role = $_POST['roll'];
    mysqli_query($connect,"INSERT INTO `comments` (`id`,`login`, `descr`,`id_n`,`role`) VALUES (NULL,'$login', '$descr','$page','$role');");
    header("Location: ../content_article.php?id_n=$page");
 ?>