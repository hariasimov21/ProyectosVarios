<?php
	session_start();
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

	<?php include "in_navbar.php"; ?>

		<?php
		if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM lector WHERE Usuario='{$_POST["name"]}' AND Contrasena='{$_POST["pass"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc(); 
				$_SESSION["Id_Usuario"]=$row["Id_Usuario"];
				$_SESSION["Usuario"]=$row["Usuario"];
				echo "<script>window.open('le_buscar_libro.php','_self')</script>";
			}
			else
			{
				echo"<p class='alert alert-danger' id='error'><strong>Usuario o contrseña incorrecta</strong>, intentelo nuevamente</p>";
			}
		}
		?>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div id="login-box">
		  <div class="form-group">
		  	<h3>Login Usuario</h3>
		    <label>Usuario</label>
		    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su usuario" type="text" name="name" required>
		  </div>
		  <div class="form-group">
		    <label>Contraseña</label>
		    <input class="form-control" id="exampleInputPassword1" placeholder="Contraseña" type="password" name="pass" required>
		  </div>
		  <div class="form-group form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Recordar Contraseña</label>
		  </div>
		  <button class="btn btn-primary" type="submit" name="submit">Ingresar</button>
		</div>
		</form>

</body>
</html>
