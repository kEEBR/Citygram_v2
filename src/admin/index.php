<?php
session_start();
include_once("../vendor/connect.php");
if (!$_SESSION['user']) {
    header('Location: ../login.php');
}
include("includes/header.php");
?>
