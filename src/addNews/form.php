<section class="news">
    <div class="container">
    <div class="news__add">
    <form method="POST" action="vendor/news.php" enctype="multipart/form-data" class="news_form">
    <span class="news_span">Расскажите,<br> о проблеме <span class="news_him">своего</span> города!</span>
    <span class="news_avatar"><img src="img/avatar_01.png" alt=""></span>
    <input type="text" name="login" placeholder="Введите имя пользователя" value=<?=$_SESSION['user']['login']?> class="none">
    <input name="title" type="text" placeholder="Введите название проблемы" class="news_input">
    <label  for="" class="news_label">Добавьте изображение</label>
    <input name="picture" type="file" class="news_input">
    <textarea name="descr"  cols="30" rows="1" placeholder="Добавьте описание" class="news_texta"></textarea>
    <button type="submit" class="news_btn">Опубликовать</button>
</div>
</form>
    </div>
    </div>
    </section>