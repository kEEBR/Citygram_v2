<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role']!="Администратор") {
  header('Location: ../login.php');
}
require_once("../vendor/connect.php");
include("includes/header.php");
if ($_GET['del']>0){
    mysqli_query($connect, "UPDATE `news` SET `st` = 'del' WHERE `id_n` = '{$_GET['del']}'");
}
if ($_GET['repair']>0){
    mysqli_query($connect, "UPDATE `news` SET `st` = 'ok' WHERE `id_n` = '{$_GET['repair']}'");
}
?>
<div class="container">
<div class="margin">
<h3>Активные записи</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Изображение</th>
        <th>Удалить</th>
    </tr>
        </thead>
        <tbody>
      <?php
      $data = mysqli_query($connect,"SELECT * FROM `news` WHERE `st` = 'ok' ");
      $cnt = 0;
      while($item = mysqli_fetch_assoc($data)){?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$item['title'];?></td>
        <td><img src="../<?=$item['picture'];?>" alt="" class="post_img"></td>
        <td><a href="?del=<?=$item['id_n'];?>">Удалить</a></td>
      </tr>
       <?php
      }
      ?>
</tbody>
  </table>
  <h3>Удалённые записи</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Изображение</th>
        <th>Восстановить</th>
    </tr>
        </thead>
        <tbody>
      <?php
      $data = mysqli_query($connect,"SELECT * FROM `news` WHERE `st` = 'del' ");
      $cnt = 0;
      while($item = mysqli_fetch_assoc($data)){?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$item['title'];?></td>
        <td><img src="../<?=$item['picture'];?>" alt="" class="post_img"></td>
        <td><a href="?repair=<?=$item['id_n'];?>">Восстановить</a></td>
      </tr>
       <?php
      }
      ?>
</tbody>
  </table>
</div>
</div>