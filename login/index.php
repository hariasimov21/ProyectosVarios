<?php

session_start();

require_once('vendor/autoload.php');
require_once('App/Auth/config.php');
require_once('App/Auth/Auth.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="assets/css/stile.css">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/bootstrap-social.css">
  <script src="assets/js/jquery.js"></script>

  <link rel="stylesheet" href="assets/js/ani.js">
  <title>Inicio de sesion </title>

</head>

<body>
  <div class="login-page">
    <div class="form">
      <form class="register-form">
        <input type="text" placeholder="name" />
        <input type="password" placeholder="password" />
        <input type="text" placeholder="email address" />
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form">
        <input type="text" placeholder="username" />
        <input type="password" placeholder="password" />
        <button>login</button>
        <div class="row">

          <?php

          Auth::getUserAuth();

          ?>

          <div class="container">


            <div class="col-md-12">

              <a href="?login=Facebook" class="btn btn-block btn-social btn-facebook"><span class="fa fa-facebook"></span>Inicio de sesion con facebook</a>
              <a href="?login=Google" class="btn btn-block btn-social btn-google"><span class="fa fa-google"></span>Inicio de sesion con google</a>
              <a href="?login=Twitter" class="btn btn-block btn-social btn-twitter"><span class="fa fa-twitter"></span>Inicio de sesion con Twitter</a>
            </div>
          </div>
        </div>
        <p class="message">Not registered? <a href="#">Create an account</a></p>

      </form>
    </div>
  </div>


</body>

</html>