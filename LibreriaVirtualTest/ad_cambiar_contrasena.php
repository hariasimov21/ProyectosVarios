<?php
	include "basededatos.php";
	session_start();
	if(!isset($_SESSION["Id_Admin"]))
	{
		echo "<script>window.open('in_lector_login.php','_self')</script>";
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
	<title>Libreria Virtual</title>
</head>
<body>

	<?php include "ad_navbar.php"; ?>
	<?php
	if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM administrador WHERE Contrasena='{$_POST["opass"]}' and Id_Admin=".$_SESSION["Id_Admin"];
			$res=$db->query($sql);
			if($_POST['npass'] != $_POST['nrpass'])
			{
				echo"<p class='alert alert-danger' id='error'><strong>Las Contraseñas no coinciden</strong>, intentelo nuevamente</p>";				
			}else if($res->num_rows>0)
			{
				$s="update administrador set Contrasena='{$_POST["npass"]}' WHERE Id_Admin=".$_SESSION["Id_Admin"];
				$db->query($s);
				echo"<p class='alert alert-success' id='error'><strong>Contrasena actualizada correctamente</strong></p>";				
			}else{
				echo"<p class='alert alert-danger' id='error'><strong>Contrseña incorrecta</strong>, intentelo nuevamente</p>";
			}
		}
	?>

		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div id="camcon-box">
		<h3>Cambiar contraseña</h3>
		<div class="form-group">
			<label>Contraseña actual</label>
			<input class="form-control" type="password" name="opass" required>
		</div>
		<div class="form-group">
			<label>Nueva contraseña</label>
			<input class="form-control" type="password" name="npass" required>
		</div>
		<div class="form-group">
			<label>Repita la nueva contraseña</label>
			<input class="form-control" type="password" name="nrpass" required>
		</div>
			<button class="btn btn-primary" type="submit" name="submit">Cambiar Contraseña</button>
		</div>
	</form>				
	
</body>
</html>
