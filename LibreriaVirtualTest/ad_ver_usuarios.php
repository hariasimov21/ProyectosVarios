<?php
	include "basededatos.php";
	include "function.php";
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

	<div id="tabla-box">

	<p class="alert alert-primary" role="alert" id="error">Existen un total de: <strong><?php echo countRecord("SELECT * from lector",$db); ?> Usuarios registrados y <?php echo countRecord("SELECT * from administrador",$db); ?> Administradores</strong></p>

	<table class="table table-sm">
		<h3>Registro de usuarios</h3>
	  	<thead class="thead-light">
		<?php 
			$sql="SELECT * FROM lector";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
						echo "<tr>";;
							echo "<th>NOMBRE USUARIO</th>";
							echo "<th>CORREO ELECTRONICO</th>";
						echo "</tr>";
						$i=0;
					while($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$row["Usuario"]}</td>";
						echo "<td>{$row["Correo"]}</td>";
						echo "</tr>";
					}
			}
			else
			{
		echo"<p class='alert alert-warning' id='error'> <strong>Oops!</strong> Aun no se han realizado comentarios!.</p>";
			}
		?>
	</table>
	</div>

</body>
</html>
