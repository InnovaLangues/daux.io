<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
  .login-box {
    margin-top: 50px;
    padding: 50px;
    text-align: center;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="login-box col-md-6 col-md-offset-3 well">
        <form name="login" method="post" action="">
          <?php
              if (isset($_POST['password'])) {
                  echo "<div class='alert alert-success'>";
                  echo 'Hash : ' . sha1($_POST['password']);
                  echo "</div>";
              }
          ?>
          <input type="password" name="password" placeholder="Password" required class="form-control"><br>
          <input type="submit" value="Generate hash" class="btn btn-primary btn-block">
        </form>
      </div>
    </div>
  </div>
</body>
</html>
