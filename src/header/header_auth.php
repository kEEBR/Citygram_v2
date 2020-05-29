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