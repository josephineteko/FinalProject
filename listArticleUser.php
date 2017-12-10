<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/home.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script src="script/home.js"></script>
  <title>
    Bienvenue
  </title>
</head>
<?php
  if (isset($_GET['id_user'])) {
    $id = $_GET['id_user'];
  }

  ?>
    <body>
      <ul id="nav">
        <li><a href="home.php?id_user=<?php  echo $id;?>">Home</a></li>
        <li><a href="listArticleUser.php?id_user=<?php  echo $id;?>">My Article</a></li>
        <li><a href="addArticle.php?id_user=<?php  echo $id;?>">Add Article</a></li>
      </ul>
        <div id="body" class="body">

        </div>
    </body>
</html>
