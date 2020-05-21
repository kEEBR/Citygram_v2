<?php
session_start();
$connect = mysqli_connect( 'localhost', 'root',  'root',  'citygram');
include("includes/header.php");
$url_full = basename($_SERVER['REQUEST_URI']);
if ($_GET['del']>0){
    mysqli_query($connect, "UPDATE `category` SET `status` = 'del' WHERE `id` = '{$_GET['del']}'");
}
if ($_GET['repair']>0){
    mysqli_query($connect, "UPDATE `category` SET `status` = 'ok' WHERE `id` = '{$_GET['repair']}'");
}
$url_array = explode("?",$url_full);
$url = $url_array[0];
$name=$_POST['element'];
if (isset($_POST['element']))
{
 mysqli_query($connect,"INSERT INTO `category`(`name`, `parent_id`, `url`) VALUES ('$name','0','$url');");
}
?>
<div class="container">
<div class="margin">
<h2>Создание списка</h2>
<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="">
  <div class="form-group">
    <label class="control-label col-sm-2" for="">Имя:</label>
    <div class="col-sm-10">
      <input class="form-control" placeholder="Введите имя элемента" name="element">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Добавить</button>
    </div>
  </div>
</form>
<h3>Активные записи</h3>
<table class="table table-hover">
    <thead>
    <tr>
        <th>№</th>
        <th>Имя</th>
        <th>Удалить</th>
    </tr>
        </thead>
        <tbody>
      <?php
      $data = mysqli_query($connect,"SELECT * FROM `category` WHERE `url` = '$url' and `status` = 'ok' ");
      $cnt = 0;
      while($item = mysqli_fetch_assoc($data)){?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$item['name'];?></td>
        <td><a href="?del=<?=$item['id'];?>">Удалить</a></td>
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
        <th>Восстановить</th>
    </tr>
        </thead>
        <tbody>
      <?php
      $data = mysqli_query($connect,"SELECT * FROM `category` WHERE `url` = '$url' and `status` = 'del' ");
      $cnt = 0;
      while($item = mysqli_fetch_assoc($data)){?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$item['name'];?></td>
        <td><a href="?repair=<?=$item['id'];?>">Восстановить</a></td>
      </tr>
       <?php
      }
      ?>
</tbody>
  </table>
</div>
</div>