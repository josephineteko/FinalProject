<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="style/login.css" />
  <script src="https://code.jquery.com/jquery-3.2.1.js"
    integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
  <script src="script/login.js"></script>
  <title>
    Login
  </title>
</head>
    <body>
      <div class="background">
        <h1>Advices for foreigners in Korea </h1>
        <form action="request/auth/login.php" method="get">
        <label for="username">Username: <input type="text" name="username" id="username"></label></br>
        <label for="password">Password: <input type="password" name="password" id="password"></label></br>
        <a href=register.php>Click here for sign up</a></br>
        <input type="submit" value="Log in" >
        </form>
        </div>
      </div>
    </body>
</html>