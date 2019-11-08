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
	<p class="alert alert-primary" role="alert" id="error">Existen un total de: <strong><?php echo countRecord("SELECT * from libro",$db); ?> libros registrados.</strong></p>

	<table class="table table-sm">
		<h3>Registro de libros</h3>
	  	<thead class="thead-light">
	<?php 
	if(isset($_GET["mes"]))
	{
		echo "<p class='alert alert-success' id='error'>".$_GET["mes"]."</p>";
	}
		$sql="SELECT * FROM libro";
		$res=$db->query($sql);
		if($res->num_rows>0)
		{
					echo "<tr>";
						echo "<th>ID LIBRO</th>";
						echo "<th>TITULO LIBRO</th>";
						echo "<th>ETIQUETAS</th>";
						echo "<th>AUTOR</th>";
						echo "<th>EDITORIAL</th>";						
						echo "<th>VER LIBRO</th>";
						echo "<th>BORRAR LIBRO</th>";
					echo "</tr>";
					$i=0;
				while($row=$res->fetch_assoc())
				{
					$i++;
					echo "<tr>";
					echo "<td>{$i}</td>";
					echo "<td>{$row["Titulo"]}</td>";
					echo "<td>{$row["Etiquetas"]}</td>";
					echo "<td>{$row["Autor"]}</td>";
					echo "<td>{$row["Editorial"]}</td>";
					echo "<td><a href='{$row["Archivo"]}' target='_blank'>Ver Libro</a></td>";
					echo "<td><a href='ad_borrar_libro.php?IdLibro={$row["IdLibro"]}'>Borrar Libro</a></td>";
					echo "</tr>";
				}
			echo "</table>";
		}else{
		echo"<p class='alert alert-warning' id='error'>Que esperas para registrar un libro?, <strong>¡No hay ningun libro registrado!</strong></p>";
		}
	?>
	</div>

</body>
</html>
