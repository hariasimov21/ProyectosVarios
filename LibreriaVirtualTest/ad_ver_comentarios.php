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
	<div id="tabla-box">
	<table class="table table-sm">
		<h3>Registro de comentarios</h3>
	  	<thead class="thead-light">
	<?php 
	$sql="
	select libro.Titulo, lector.Usuario, comentario.Comentario, comentario.Fecha
	From comentario Inner Join
	libro On libro.comentario.IdLibro = libro.IdLibro Inner Join
	lector On libro.comentario.IdUsuario = lector.Id_Usuario";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
					echo "<tr>";
						echo "<th>NUMERACION</th>";
						echo "<th>LIBRO</th>";
						echo "<th>USUARIO</th>";
						echo "<th>COMENTARIO</th>";
						echo "<th>FECHA DEL COMENTARIO";
					echo "</tr>";
					$i=0;
				while($row=$res->fetch_assoc())
				{
					$i++;
					echo "<tr>";
					echo "<td>{$i}</td>";
					echo "<td>{$row["Titulo"]}</td>";
					echo "<td>{$row["Usuario"]}</td>";
					echo "<td>{$row["Comentario"]}</td>";
					echo "<td>{$row["Fecha"]}</td>";
					echo "</tr>";
				}
			echo "</table>";
		}else{
		echo"<p class='alert alert-warning' id='error'> <strong>Oops!</strong> Aun no se han realizado comentarios!.</p>";
		}
	?>
	</div>

</body>
</html>
