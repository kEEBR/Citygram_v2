<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role']!="Администратор") {
    header('Location: ../login.php');
}
$connect = mysqli_connect( 'localhost', 'root',  'root',  'citygram');
include("includes/list.php");
?>