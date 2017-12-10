<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/addArticle.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script src="script/addArticle.js"></script>
  <title>
    Add Article
  </title>
</head>
    <body>
      <ul id="nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="addArticle.php">Add Article</a></li>
      </ul>
      <div class="body">
        <form method="post" action="request/article/addArticle.php" enctype="multipart/form-data">
        <input type="hidden" name="id_user" value="1"/>
        <label>Title</label> <input type='text' name='title'/></br>
        <label> Description</label> <input type='text' name='content'/></br>
        <label for="country">Type of Article</label>
        <select id="type_article" name="id_type">
        </select>
        <label> Add picture </label>
        <input type='file' name='path'/></br>
        <input type="submit" value="Add your new article" />
        </form>
      </div>
    </body>
</html>
