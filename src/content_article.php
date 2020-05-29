<?php
  session_start();
  $connection = mysqli_connect("localhost", "root", "root", "citygram");
  if (!$_SESSION['user']) {
    header('Location: news_lenta.php');
}
  if($connection == false) {
    echo "Error!";
    echo mysqli_connect_errno();
    exit();
  }
  $page = $_GET['id_n'];
  $query = mysqli_query($connection, "SELECT * FROM news WHERE id_n='$page'");
?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Citygram</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css" />
    <link rel="stylesheet" href="css/bootstrap-grid.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
      integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/style.min.css" />
  </head>
  <body>
    <header>
      <nav>
        <a href="index_auth.php"
          ><img src="img/logo.png" alt="logo" class="logo"
        /></a>
        <ul class="menu">
          <a href="about_auth.php" class="menu_link">
            <li class="menu_item">О нас</li>
          </a>
          <a href="news_auth.php" class="menu_link">
            <li class="menu_item">Лента</li>
          </a>
          <a href="lk.php">
          <li class="menu_item"><img src="<?= $_SESSION['user']['avatar'] ?>" alt="user_avatar" class="menu_avatar"></li>
          </a>
        </ul>
        <div class="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </nav>
    </header>
    <section class="article">
    <div class="container">
    <div class="article_post">
<?php
while($article = mysqli_fetch_assoc($query)){?>
  <div class="article_wrapper">
  <div class="article_text">
  <div class="article_login">
             <p>Пользователь: <?=$article['login']?></p> <p>Статус проблемы: <span class="article_status"><?=$article['status']?></span></p> 
            </div>
      <h1 class="article_title">
        <?=$article['title']?>
      </h1>
      <div class="article_adres">Адрес: <span class="article_status"><?=$article['adres']?></span></div>
      <div class="article_info">
            <?=$article['likes']?>
          </div>
      <img src="<?=$article['picture']?>" alt="" class='article_img'/>
      <div class="article_date">Дата записи: <?=$article['date']?></div>
        <div class="article_descr">
          <?=$article['descr']?>
        </div> 
      </div>
  </div>
<?php
}?>
</div>
</div>
    </div>
    <div class="container">
    <form action="vendor/comments.php" method="POST" class="comments_form">
    <input name="login" type="text" class="none" value="<?=$_SESSION['user']['login']?>">
    <input name="roll" type="text" class="none" value="<?=$_SESSION['user']['role']?>">
    <input type="text" name="id_n" class="none" value="<?=$page?>">
    <label for="" class="comments_label">Комментарии</label>
    <textarea name="comm" id="form10" class="md-textarea form-control" cols="150" rows="8"></textarea>
    <button type="submit" class="comments_btn">Отправить</button>
    </form>
    <div class="comments">
    <?php 
    $comments = mysqli_query($connection,"SELECT * FROM `comments` WHERE `id_n` = '$page' and `st` = 'ok'");
    while($comment = mysqli_fetch_assoc($comments)){?>
    <div class="comments_wrapper">
    <div class="comments_login"><?=$comment['login']?> <span><?=$comment['role']?></span></div>
    <div class="comments_descr"><?=$comment['descr']?></div>
    <div class="comments_data"><?=$comment['date']?></div>
    </div>
     <?php
    }
    ?>
    </div>
    </div>
    </div>
    </section>
<?php
include("footer/footer_auth.php");
?>
    <script src="js/script.js"></script>
    <script src="https://kit.fontawesome.com/50fff6b33b.js" crossorigin="anonymous"></script>
    <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script src="js/likes.js"></script>
  </body>
</html>