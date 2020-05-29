<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role']!="Администратор" && $_SESSION['user']['role']!="Госслужащий") {
  header('Location: ../login.php');
}
$connect = mysqli_connect( 'localhost', 'root',  'root',  'citygram');
include("includes/header.php");
if($_POST['user_id']>0)
{
    if (isset($_POST['status']))
    mysqli_query($connect,"UPDATE `news` SET `status` = '{$_POST['status']}' WHERE `id_n` = '{$_POST['user_id']}'");

}
$all_troubles = mysqli_query($connect,"SELECT * FROM `news`");
$cnt = 0;
?>
<div class="margin">
<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th>№</th>
        <th>Проблема</th>
        <th>Описание</th>
        <th>Статус</th>
      </tr>
    </thead>
    <tbody>
<?php
 $all_statuses = mysqli_query($connect, "SELECT * FROM `articles_st` WHERE `status` = 'ok' and `url` = 'list-troubles.php' ");
 $all_statuses_array = array();
        while($status = mysqli_fetch_assoc($all_statuses)){
            array_push($all_statuses_array,$status['name']);
        }
while($trouble = mysqli_fetch_assoc($all_troubles))
{?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$trouble['title']?></td>
        <td><?=$trouble['descr']?></td>
        <td>
        <form method="POST">
        <input type="hidden" name="user_id" value="<?=$trouble['id_n']?>">
        <select name='status' onchange='this.form.submit()'>
        <?php foreach($all_statuses_array as $status) {
            $selected = '';
        if($status==$trouble['status'])
        $selected = 'selected';
            ?>
        <option <?=$selected?>><?=$status?></option>
        <?php }?>
        </select>
        </form>
        </td>
      </tr>
<?php
}
?>
</tbody>
  </table>
  </div>
  </div>