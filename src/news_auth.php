<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
  $connection = mysqli_connect("localhost", "root", "root", "citygram");
  if (!$_SESSION['user']) {
    header('Location: index.php');
}
  if($connection == false) {
    echo "Error!";
    echo mysqli_connect_errno();
    exit();
  }
  if (isset($_GET['page'])){
    $page = $_GET['page'];
  } else {
    $page = 1;
  }
  $limit = 9;
  $number = ($page * $limit) - $limit;
  $res_count = mysqli_query($connection, "SELECT COUNT(*) FROM `news` WHERE `st` = 'ok' ");
  $row = mysqli_fetch_row($res_count);
  $total = $row[0];
  $str_pag = ceil($total / $limit);
  $query = mysqli_query($connection, "SELECT * FROM `news` WHERE `st` = 'ok' ORDER BY id_n DESC LIMIT $number, $limit ");
  include("news/docktype.php");
  include("header/header_auth.php");
  include("news/info_auth.php");
  include("news/lenta_auth.php");
  include("footer/footer_auth.php");
?>