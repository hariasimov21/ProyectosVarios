<?php
	include "basededatos.php";
	session_start();
if(!isset($_SESSION["Id_Usuario"]))
{
	echo "<script>window.open('in_lector_login','_self')</script>";
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
	
	<div class="row">
	<div class="col-sm-6" id="tabla-box">
		
		<h3>Datos sobre el libro</h3>
		<?php 
		if(isset($_POST["submit"]))
		{
			$sql="insert into comentario (IdLibro,IdUsuario,Comentario,Fecha) values ({$_GET["id"]},{$_SESSION["Id_Usuario"]},'{$_POST["comment"]}',now())";
			$res=$db->query($sql);
		}
		
		$sql="SELECT * FROM libro WHERE IdLibro=".$_GET["id"];
			$res=$db->query($sql);
			if($res->num_rows>0)
			{
				echo "<table class='table table-sm'>";
					while($row=$res->fetch_assoc())
					{
							echo "<tr><th>ID DEL LIBRO</th>";
							echo "<th>NOMBRE DEL AUTOR</th>";
							echo "<th>NOMBRE DEL LIBRO</th></tr>";
							echo "<tr><td>LIB00{$row["IdLibro"]}</td>";
							echo "<td>{$row["Autor"]}</td>";							
							echo "<td>{$row["Titulo"]}</td></tr>";
					}
			echo "</table>";
			?>

		<h3>Comentar el libro</h3>
		<form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post" id="formulario">
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="comment" required></textarea>
				<button type="submit" name="submit" class="btn btn-primary">Comentar</button>
		</form>	

	</div>

	<div class="col-sm-6" id="tabla-box">
		<h3>Lista de comentarios</h3>
		<?php 
		$s="
		Select lector.Usuario, comentario.Comentario, comentario.Fecha, comentario.IdLibro
		From comentario Inner Join
		  lector On comentario.IdUsuario = lector.Id_Usuario
		Where comentario.IdLibro =".$_GET["id"]." order by comentario.IdUsuario DESC";
							$r=$db->query($s);
							if($r->num_rows>0)
							{
								while($ro=$r->fetch_assoc())
								{
									echo "<p><strong>{$ro["Usuario"]} : </strong>
											{$ro["Comentario"]}   
											<i>&nbsp;&nbsp;{$ro["Fecha"]}</i></p>";
								}
							}
							else
							{
							echo"<p class='alert alert-danger' id='error'><strong>No existen comentarios</strong> para este libro</p>";
							}
				
						?>
					</div>
				<?php
			}
			else
			{
				echo "<p class='error'>No Book Record Found</p>";
			}		
	?>		
	</div>
	</div>

	<div id="tabla-box">
	</div>

</body>
</html>
