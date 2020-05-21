<?php 
    session_start();
    require_once 'connect.php';
$login = $_POST['login'];
$title = $_POST['title'];
$path = 'uploads/' . time() . $_FILES['picture']['name'];
move_uploaded_file($_FILES['picture']['tmp_name'], '../' . $path);
$descr = $_POST['descr'];
mysqli_query($connect,"INSERT INTO `news` (`id_n`,`login`, `title`, `picture`,`descr`) VALUES (NULL,'$login', '$title', '$path', '$descr');");
header('Location: ../news_auth.php');
 ?>