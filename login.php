<?php

ini_set('display_errors','On');

$included=true; // set this so it can only be accessed by this script.
require_once("passwords.php");
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
     header('Location: index.php');
     exit;
}

function checkAccount($accounts, $username, $password) {
    if (isset($accounts[$username]) && $accounts[$username] == $password) {
        return true;
    }
    return false;
}

?>

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
      <div class="login-box col-md-4 col-md-offset-4 well">
        <form name="login" method="post" action="">
          <?php
              if (isset($_POST['username'])) {
                  echo "<div class='alert alert-danger'>";
                  if (checkAccount($accounts, $_POST['username'], sha1($_POST['password']))) {
                    $_SESSION['loggedin'] = true;
                    header('Location: index.php');
                  } else {
                      echo 'Bien tenté, mais non... </br> plus que 10^65465416678165467 de combinaisons possible!';
                  }
                  echo "</div>";
              }
          ?>
          <input type="text" name="username" placeholder="User name" required class="form-control"><br>
          <input type="password" name="password" placeholder="Password" required class="form-control"><br>
          <input type="submit" value="Login" class="btn btn-primary btn-block">
        </form>
      </div>
    </div>
  </div>
</body>
</html>