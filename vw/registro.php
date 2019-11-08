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
  <title>Virtual Waiter - Registro</title>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/bootstrap-social.css" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/validar.css" rel="stylesheet">
  <script src="validar.js"></script>
</head>

<body class="cyan">

  <div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">Formulario de Registro</div>
        <div class="panel-body">
  
          <form  method="post" action="routers/registro_r.php" name="formorden" onsubmit="return validarregistro();">
              <div id="alerta"></div>
                <div class="form-group">
                <input 
                  class="form-control" 
                  placeholder="Usuario" 
                  name="usu" id="usu" type="text" 
                  minlength="5" maxlength="11" 
                  required pattern="[A-Za-z0-9]+" 
                  title="Letras Minusculas y números (Sin espacio). Tamaño mínimo: 5. Tamaño máximo: 11"
                />
              </div>
              <div class="form-group">
                <input 
                  class="form-control" 
                  placeholder="Nombre" 
                  name="nom" id="nom" type="text" 
                  minlength="5" maxlength="11" 
                  required pattern="[^0-9][A-Za-z0-9]+" 
                  title="Solo letras (Sin espacio). Tamaño mínimo: 5. Tamaño máximo: 11"
                />
              </div>              
              <div class="form-group">
                <input
                  class="form-control" 
                  placeholder="Contraseña" 
                  name="contra" id="contra" type="password" 
                  minlength="8" maxlength="15" 
                  required pattern="[A-Za-z0-9]+" 
                  title="Letras, numeros y algunos caracteres (guiones,puntos y comas). Tamaño mínimo: 8. Tamaño máximo: 15"
              />
              </div>     
              <div class="form-group">
                <input 
                  class="form-control" 
                  placeholder="Correo Electronico" 
                  name="email" id="email" type="email" 
                  minlength="10" maxlength="35" 
                  required
                  title="Ingrese un correo valido"
              />
              </div>   
              <div class="form-group">
                <input 
                  class="form-control" 
                  placeholder="Direccion" 
                  name="dir" id="dir" type="text" 
                  minlength="6" maxlength="20" 
                  required pattern="[A-Za-z0-9]+" 
                  title="Letras, numeros y algunos caracteres (guiones,puntos y comas). Tamaño mínimo: 6. Tamaño máximo: 20"
                />
              </div>   
              <div class="form-group">
                <input 
                  class="form-control" 
                  placeholder="Telefono" 
                  name="tel" id="tel" type="number" 
                  minlength="8" maxlength="8" 
                  required pattern="[0-9]+" 
                  title="Solo numeros. Tamaño mínimo y maximo de 8"
                />
              </div>  

              <div class="form-group">
                 <input type="file" class="form-control-file" name="foto" if="foto" accept="image/png, .jpeg, .jpg, image/gif">
              </div>  

              <div class="form-group">
                  <button href="javascript:void(0);" type="submit" class="btn btn-bg btn-block btn-primary" onclick="document.getElementById('form').submit();">Registrarse Ahora!</button>
              </div> 
          </form>

              <div align="center" class="panel-footer">
                <label>Ya estas registrado?<a href="login.php"> Click Aqui</a></label>
              </div>

<!--
              <br>O registrate con redes sociales

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