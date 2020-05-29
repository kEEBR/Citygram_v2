<?php
session_start();
require_once 'vendor/connect.php';
if (!$_SESSION['user']) {
    header('Location: index.php');
}
$login = $_SESSION['user']['login'];
$query = mysqli_query($connect,"SELECT * FROM `news` WHERE `login` = '$login'" );
include("news/docktype.php");
include("header/header_auth.php");
?>

<section class="lk">
      <div class="container">
      <p>Ваш личный кабинет</p>
        <div class="lk_user">
        <img src="<?= $_SESSION['user']['avatar'] ?>" alt="avatar">
        <div class="lk_text">
        <div class="lk_fio">ФИО: <span><?=$_SESSION['user']['fullname']?></span></div>
        <div class="lk_login">Login: <span><?= $_SESSION['user']['login'] ?></span></div>
        <div class="lk_mail">eMail: <span><?= $_SESSION['user']['email']?></span></div>
        <div class="lk_role">Статус: <span><?= $_SESSION['user']['role']?></span></div>
        <a href="vendor/logout.php">Выйти</a>
        </div>
        </div>
      </div>
    </section>
    <section class="lk_news">
    <div class="container">
    <p>ВАШИ НОВОСТНЫЕ ПОСТЫ</p>
    <div class="row">
    <?php
    while($article = mysqli_fetch_assoc($query)){?>
      
     <div class="col-md-4 col-sm-6">
  <div class="news_wrapper">
  <img src="<?=$article['picture']?>" alt="" class='news_img'/>
  <div class="news_text">
      <div class="news_title">
        <a href="content_article.php?id_n=<?=$article['id_n']?>"><?=$article['title']?></a>
      </div>
        <div class="news_descr">
          <?=$article['descr']?>
        </div> 
          <div class="news_info">
            <div class="news_login">
              <?=$article['login']?>
            </div>
            </div>
          </div>
      </div>
      </div>
      
      <?php
      }?>
</div>
    </section>
<?php
include("footer/footer_auth.php");
?>


