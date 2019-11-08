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
			$sql="SELECT * FROM administrador WHERE Usuario='{$_POST["aname"]}' AND Contrasena='{$_POST["apass"]}'";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				$row=$res->fetch_assoc(); 
				$_SESSION["Id_Admin"]=$row["Id_Admin"];
				$_SESSION["Usuario"]=$row["Usuario"];
				echo "<script>window.open('ad_ver_usuarios.php','_self')</script>";
			}
			else
			{
				echo"<p class='alert alert-danger' id='error'><strong>Usuario o contrseña incorrecta</strong>, intentelo nuevamente</p>";
			}
		}
		?>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div id="login-box">
		<h3>Login Administrador</h3>
		  <div class="form-group">
		    <label>Usuario</label>
		    <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su usuario" type="text" name="aname" required>
		  </div>
		  <div class="form-group">
		    <label>Contraseña</label>
		    <input class="form-control" id="exampleInputPassword1" placeholder="Contraseña" type="password" name="apass" required>
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
