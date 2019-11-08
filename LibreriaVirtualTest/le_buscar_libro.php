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
  <title>Libreria Virtual</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php include "le_navbar.php"; ?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
		<div id="blibros-box">
		<h3>Busqueda de libros</h3>
			<label>Buscar Libro: </label>
			<input type="text" name="name" required>
			<button class="btn btn-primary" type="submit" name="submit">Buscar libro</button>
		</div>
	</form>
	
	<div id="tabla-box">
	<table class="table table-sm">
	  	<thead class="thead-light">
		<?php 
		if(isset($_POST["submit"]))
		{
			$sql="SELECT * FROM libro WHERE Titulo like '%{$_POST["name"]}%' or Etiquetas like '%{$_POST["name"]}%' ";
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
						echo "<tr>";
							echo "<th>ID LIBRO</th>";
							echo "<th>TITULO</th>";
							echo "<th>LIBRO</th>";
							echo "<th>COMENTARIOS</th>";
						echo "</tr>";
						$i=0;
					while($row=$res->fetch_assoc())
					{
						$i++;
						echo "<tr>";
						echo "<td>{$i}</td>";
						echo "<td>{$row["Titulo"]}</td>";
						echo "<td><a href='{$row["Archivo"]}' target='_blank'>Ver Online</a></td>";
						echo "<td><a href='le_ver_comentarios.php?id={$row["IdLibro"]}'>Ver Comentarios</a></td>";
						echo "</tr>";
					}
				echo "</table>";
			}
			else
			{
				echo "<p id='error' class='alert alert-danger' role='alert'>No se encontraron coincidencias</p>";
			}
		}
	?>
	</div>

</body>
</html>
