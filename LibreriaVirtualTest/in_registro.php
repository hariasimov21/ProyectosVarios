<?php
	include "basededatos.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
	<title>Libreria Virtual</title>
</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{389165658325518}',
      cookie     : true,
      xfbml      : true,
      version    : '{v3.2}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

   	<?php include "in_navbar.php"; ?>

	    <?php
		if(isset($_POST["submit"]))
		{
			$Usuario=$_POST["name"];
			$Contrasena=$_POST["pass"];
			$Correo=$_POST["mail"];

			$sql="INSERT INTO lector(Usuario,Contrasena,Correo)
		 	VALUES ('{$Usuario}','{$Contrasena}','{$Correo}')";	
					
			if(empty($_POST['name']) or empty($_POST['pass']) or empty($_POST['mail']))
			{
				echo "<p id='error' class='alert alert-danger'><strong>Error en el registro</strong>, existe un campo vacio</p>";
			}elseif ($db->query($sql)) {				
				echo "<p id='error' class='alert alert-success' >Usuario registrado correctamente</p>";	
			}
			else
			{
				echo"<p class='alert alert-danger' id='error'><strong>Error en el registro</strong>, intentelo nuevamente</p>";
			}
		}
	?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
	<div id="login-box">	
	<h3>Registro</h3>
	    <div class="form-group">
		      <label for="inputEmail4">Nombre</label>
		      <input type="text" class="form-control" id="inputEmail4" placeholder="Ingrese nombre" name="name" required>
	    </div>
	    <div class="form-group">
		      <label for="inputPassword4">Contraseña</label>
		      <input type="password" class="form-control" id="inputPassword4" placeholder="Ingrese contraseña" name="pass" required>
	    </div>
	  	<div class="form-group">
	    	<label for="inputAddress">E-mail</label>
	    	<input type="email" class="form-control" id="inputAddress" placeholder="Ingrese E-mail" name="mail" required">
	  	</div>
	  <button type="submit" class="btn btn-primary" name="submit">Unete Ahora</button>
	</div>
	</form>

</body>
</html>
