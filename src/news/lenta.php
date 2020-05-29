<section class="news">
    <div class="container">
    <form action="" method="post">
    <div class="news_searching"><input type="text" required name="search" class="news_search" placeholder="Введите название статьи">
    <button type="submit" name="submit" class="news_search_button">Найти</button>
    </div>
    </form>
    <hr>
 <?php
 
 if(isset($_POST['submit'])){
  $search = explode(" ", $_POST['search']);
  $count = count($search);
  $array = array();
  $i = 0;
  foreach($search as $key) {
    $i++;
    if($i < $count) $array[] = "CONCAT (`title`) LIKE '%".$key."%' OR "; else $array[] = "CONCAT (`title`) LIKE '%".$key."%'";
  }
  $sql = "SELECT * FROM `news` WHERE `st` = 'ok' AND ".implode("", $array);
  $query = mysqli_query($connection, $sql);?>
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
      }
      }?>
    <div class="row">
<?php
if(mysqli_num_rows($query) == 0){
	echo "Записи не найдены!";
}	else {
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
}
}?>
</div>
<div class="news_pagin">
<?php
for ($i = 1; $i <=$str_pag; $i++){
	echo " <a href=news_lenta.php?page=".$i.">".$i."</a> ";
}	?>
</div>

</div>
    </div>
    </div>
    </section>