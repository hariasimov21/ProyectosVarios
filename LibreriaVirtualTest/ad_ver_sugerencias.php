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
	<script src="sweetalert2.min.js"></script>
	<link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="css/style.css">
	<title>Libreria Virtual</title>
</head>
<body>

   	<?php include "ad_navbar.php"; ?>
	

	<div id="tabla-box">

	<p class="alert alert-primary" role="alert" id="error" >Se han realizado <strong> <?php echo countRecord("SELECT * from sugerencia",$db); ?> sugerencias de usuarios</strong></p>

	<table class="table table-sm">
   		<h3>Sugerencias de libros</h3>
	  	<thead class="thead-light">
	<?php 
		$sql="SELECT lector.Usuario,sugerencia.Sugerencia,sugerencia.Fecha from lector inner JOIN sugerencia on lector.Id_Usuario=sugerencia.Id_Usuario;";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
					echo "<tr>";
						echo "<th>NUMERACION</th>";
						echo "<th>USUARIO</th>";
						echo "<th>SUGERENCIA</th>";
						echo "<th>FECHA DE LA SUGERENCIA</th>";
					echo "</tr>";
					$i=0;
				while($row=$res->fetch_assoc())
				{
					$i++;
					echo "<tr>";
					echo "<td>{$i}</td>";
					echo "<td>{$row["Usuario"]}</td>";
					echo "<td>{$row["Sugerencia"]}</td>";
					echo "<td>{$row["Fecha"]}</td>";
					echo "</tr>";
				}
		}else{
		echo"<p class='alert alert-warning' id='error'> <strong>Oops!</strong> Aun no se han realizado sugerencias!.</p>";
		}?>
	</table>
	</div>

</body>
</html>
