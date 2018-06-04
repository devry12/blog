<?php require_once 'koneksi.php';

$query = "SELECT * FROM post ORDER BY create_at DESC";
$result = mysqli_query($link,$query);



 ?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="mui.css" rel="stylesheet" type="text/css" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="mui.js"></script>
  </head>
  <body>
    <div id="sidebar">
      <div class="mui--text-white mui--text-display1 mui--align-vertical">Blog</div>
    </div>
    <div id="content" class="mui-container-fluid">
      <div class="mui-row">
        <div class="mui-col-sm-10 mui-col-sm-offset-1">
          <br>
          <br>
          <div class="mui--text-black-54 mui--text-body2">RECENT POSTS</div>
          <div class="mui-divider"></div>
          <br>
          <?php
          function count_time($time){
             if ($time->y>0)
               return $time->y. ' year ';
             if ($time->m>0)
               return $time->m. ' month ';
             if ($time->d>0)
               return $time->d. ' day ';
             if ($time->h>0)
               return $time->h. ' hour ';
             if ($time->m>0)
               return $time->m. ' minutes ';
             if ($time->s >0)
               return $time->s. ' second ';
          };



           while ($post = mysqli_fetch_assoc($result)) {
             $now = new DateTime();
             $now->setTimezone(new DateTimeZone('Asia/Jakarta'));
             $content = new DateTime($post['create_at']);
              $interval = $content->diff($now);
              ?>

          <div class="mui--text-headline"><?=$post['title']?></div>
          <div class="mui--text-black-54"> <?=count_time($interval).'ago' ?></div>
          <div><?=substr($post['content'],0,430)?>... <a href="single.php?post=<?=$post['id_post']?>">Read more...</a></div>
          <br>
          <?php } ?>
      </div>
    </div>
  </body>
</html>
