<?php
session_start();
if (!$_SESSION['user'] || $_SESSION['user']['role']!="Администратор") {
    header('Location: ../login.php');
}
$connect = mysqli_connect( 'localhost', 'root',  'root',  'citygram');
include("includes/header.php");
if($_POST['user_id']>0)
{
    if (isset($_POST['status']))
    mysqli_query($connect,"UPDATE `users` SET `status` = '{$_POST['status']}' WHERE `id` = '{$_POST['user_id']}'");
    if (isset($_POST['role']))
    mysqli_query($connect,"UPDATE `users` SET `role` = '{$_POST['role']}' WHERE `id` = '{$_POST['user_id']}'");
}
$all_users = mysqli_query($connect,"SELECT * FROM `users`");
$cnt = 0;

?>
<div class="margin">
<div class="container">
<table class="table table-hover">
    <thead>
      <tr>
        <th>№</th>
        <th>Логин</th>
        <th>Роль</th>
      </tr>
    </thead>
    <tbody>
<?php
 $all_roles = mysqli_query($connect, "SELECT * FROM `category` WHERE `status` = 'ok' and `url` = 'list-role.php' ");
 $all_roles_array = array();
    while($role = mysqli_fetch_assoc($all_roles)){
        array_push($all_roles_array, $role['name']);
        
    }

while($user = mysqli_fetch_assoc($all_users))
{?>
      <tr>
        <td><?=++$cnt;?></td>
        <td><?=$user['login']?></td>
        <td>
        <form method="POST">
        <input type="hidden" name="user_id" value="<?=$user['id']?>">
        <select name='status' onchange='this.form.submit()'>
        <?php foreach($all_statuses_array as $status) {
            $selected = '';
        if($status==$user['status'])
        $selected = 'selected';
            
            ?>
        <option <?=$selected?>><?=$status?></option>
        <?php }?>
        </select>

        </form>
        </td>
        <td>
        <form method="POST">
        <input type="hidden" name="user_id" value="<?=$user['id']?>">
        <select name='role' onchange='this.form.submit()'> 
        <?php foreach($all_roles_array as $role) {
            
            $selected = '';
        if($role==$user['role'])
        $selected = 'selected';
            ?>
        <option <?=$selected?>><?=$role?></option>
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