<?php  
session_start(); 
if(isset($_SESSION['adminc']) || isset($_SESSION['usuarioc']))
{
	header("location:index.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Virtual Waiter - Login</title>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-social.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
</head>

<body class="cyan">

  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">Ingreso/Login</div>
        <div class="panel-body">

          <form method="post" action="routers/cambio.php">
          <?php
                if(isset($_SESSION['error'])){
                  echo
                  "
                  <div class='alert alert-danger text-center'>
                    <button class='close'>&times;</button>
                    ".$_SESSION['error']."
                  </div>
                  ";
                  unset($_SESSION['error']);
                }
                if(isset($_SESSION['success'])){
                  echo
                  "
                  <div class='alert alert-success text-center'>
                    <button class='close'>&times;</button>
                    ".$_SESSION['success']."
                  </div>
                  ";
                  unset($_SESSION['success']);
                }
              ?>
              <div class="form-group">
                <input class="form-control" placeholder="Usuario" name="usu" id="usu" type="text" minlength="5" maxlength="11" required/>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Contraseña" name="contra" id="contra" type="password" minlength="8" maxlength="15" required/>
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me">
                  Recordar la contraseña
                </label>
              </div>
              <div>
                <input href="javascript:void(0);" type="submit" class="btn btn-md btn-block btn-primary" onclick="document.getElementById('form').submit();"/>
              </div>
          </form>

          <div class="panel-footer" align="center"><label>Aun no estas registrado? <a href="registro.php"> Click Aqui</a></label>
    <!---
            <br>o ingresa con redes sociales</div>              
              <a class="btn btn-block btn-social btn-twitter">
                <span class="fa fa-twitter"></span> Ingresa con Twitter
              </a>
              <a class="btn btn-block btn-social btn-facebook">
                <span class="fa fa-facebook"></span> Ingresa con Facebook
              </a>
     -->
        </div>
      </div>
    </div>
  </div>

</body>
</html>
<?php
}
?>