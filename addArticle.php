<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/addArticle.css" />
  <title>
    Add Article
  </title>
</head>
    <body>
        <h1>Add an article </h1>
        <form>
        <label>Title</label> <input type='text' name='title'></br>
        <label> Description</label> <input type='text' name='content'></br>
        <label for="country">Country</label>
        <select id="type_article" name="type_article">
          <script
            src="https://code.jquery.com/jquery-3.2.1.js"
            integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
            crossorigin="anonymous"></script>
          <script>
            $(function() {
                  $.get('request/typeArticle/getTypeArticle.php', function(data) {
                  alert(data);
                  });
              });
          </script>

          <!-- <option value="australia">Australia</option>
          <option value="canada">Canada</option>
          <option value="usa">USA</option> -->
        </select>
        <label for="file" class="label-file"> Add picture </label><input type='file' name='path' class="input-file"></br>
        <input type="submit" value="Add your new article" >
        </form>
    </body>
</html>
