<?php require_once 'koneksi.php';
if (!isset($_GET['post'])) {
  header("Location:index.php");
}
$id = $_GET['post'];
$query = "SELECT * FROM post WHERE id_post=$id";
$result = mysqli_query($link,$query);
$post = mysqli_fetch_assoc($result);

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


   $now = new DateTime();
   $now->setTimezone(new DateTimeZone('Asia/Jakarta'));
   $content = new DateTime($post['create_at']);
    $interval = $content->diff($now);
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
      <a href="index.php" style="text-decoration:none"><div class="mui--text-white mui--text-display1 mui--align-vertical">Blog</div></a>
    </div>
    <div id="content" class="mui-container-fluid">
      <div class="mui-row">
        <div class="mui-col-sm-8 mui-col-sm-offset-1">
          <br>
          <br>
          <div class="mui-divider"></div>
          <br>


          <div class="mui--text-headline"><?=$post['title']?></div>
          <div class="mui--text-black-54"> <?=count_time($interval).'ago' ?></div>
          <div><?=$post['content']?></div>
          <br>
      </div>
    </div>
  </body>
</html>
