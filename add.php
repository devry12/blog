<?php
require_once 'koneksi.php';

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $error;

    $query = "INSERT INTO post (title,content) VALUE('$title',$content)";
    $result = mysqli_query($link,$$query);
    if ($result) {
      header("location:index.php");
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add</title>
    <link rel="stylesheet" href="form.css">
  </head>
  <body>
    <?php if (isset($error) != null): ?>

    <h4 class="error"><?php echo $error;?></h4>
    <?php endif; ?>
    <form class="" action="" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <input type="text" class="form-control"  placeholder="Title" name="title">
      </div>

      <div class="form-group">
        <textarea name="content"class="form-control" placeholder="Content" rows="8" cols="20"></textarea>
      </div>


      <button type="submit"class="form-control hover" name="submit">ADD</button>
    </form>
  </body>
</html>
