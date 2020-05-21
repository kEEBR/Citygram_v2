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
          <a href="#" class="menu_link">
            <li class="menu_item">Карта</li>
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
      <div class="article_info">
          <div class="article_likes">
              <a src="#" alt="" class="button-like">
              <span class="article_eye"></span>
              <span class="article_like"></span>
              </a>
              </div>
            <?=$article['likes']?>
          </div>
      <img src="<?=$article['picture']?>" alt="" class='article_img'/>
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
    <div id="disqus_thread" class="disqus_thread"></div>
<script>
var disqus_config = function () {
this.page.url = content_article.php;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};

(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://citygram-1.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
    </div>
    </div>
    </section>
    <section class="troubles">
      <div class="container">
        <div class="troubles_label">Проблемы</div>
        <div class="troubles_title">По всему городу</div>
        <div class="troubles_subtitle">Решаем в один клик</div>
        <div class="troubles_footer">Посмотреть все проблемы</div>
      </div>
    </section>
    <footer class="footer">
      <a href="tel:88000000000" class="footer_tel">8(800)000-00-00</a>
      <div class="footer_underline"></div>
    </footer>
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