<?php
  session_start();
  if (!$_SESSION['user']) {
    header('Location: index.php');
}
include("about/docktype.php");
include("header/header_auth.php");
include("about/info.php");
include("about/about.php");
include("about/slider.php");
include("about/virtues.php");
include("footer/footer_auth.php");
?>