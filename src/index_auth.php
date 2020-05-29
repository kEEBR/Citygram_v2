<?php
  session_start();
  if (!$_SESSION['user']) {
    header('Location: index.php');
}
include("mainPage/docktype.php");
include("header/header_auth.php");
include("mainPage/welcome.php");
include("mainPage/main.php");
include("footer/footer_auth.php");
?>

