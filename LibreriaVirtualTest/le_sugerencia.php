<?php
	include "basededatos.php";
	session_start();
	if(!isset($_SESSION["Id_Usuario"]))
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

	<?php include "le_navbar.php"; ?>

			<?php
			if(isset($_POST["submit"]))
				{
				 $sql="insert into sugerencia (Id_Usuario,Sugerencia,Fecha) values ({$_SESSION["Id_Usuario"]},'{$_POST["keys"]}',now())";
					$res=$db->query($sql);
				echo"<p class='alert alert-success' id='error'><strong>Correcto!</strong> Hemos recibido tu solicitud y la procesaremos en breve.</p>";
				}
			?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div id="libro-box">
		<h3>Enviar recomendacion</h3>
	  	<div class="form-group">
			<label>Recomendacion</label>
	      <textarea type="text" class="form-control" placeholder="Ej: Mas libros de...." name="keys" required></textarea>
	    </div>
		<button type="submit" name="submit" class="btn btn-primary" name="mess">Enviar</button>
	</form>

</body>
</html>
