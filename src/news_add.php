<?php
session_start();
if (!$_SESSION['user']) {
  header('Location: index.php');
}
include("news/docktype.php");
include("header/header_auth.php");
include("addNews/info.php");
include("addNews/form.php");
include("footer/footer_auth.php");
?>
