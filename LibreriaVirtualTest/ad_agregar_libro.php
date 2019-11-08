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
	<?php
	if(isset($_POST["submit"]))
		{
			$titulo=$_POST["titulo"];
			$etiqueta=$_POST["etiqueta"];
			$target_dir = "upload/";
			$autor=$_POST["autor"];
			$editorial=$_POST["editorial"];			
			$target_file = $target_dir . basename($_FILES["efile"]["name"]);
			if (move_uploaded_file($_FILES["efile"]["tmp_name"], $target_file))
			{
				$sql="INSERT INTO libro (Titulo,Etiquetas,Archivo,Autor,Editorial)
					 VALUES ('{$titulo}','{$etiqueta}','{$target_file}','{$autor}','{$editorial}')";
					 $db->query($sql);
					 echo"<p class='alert alert-success' id='error'><strong>Correcto!</strong> El libro se almaceno en la base de datos.</p>";
			}else{
			echo"<p class='alert alert-danger' id='error'><strong>Error!</strong> Error en la subida del libro.</p>";
			}
		}
	?>

	<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
	  <div id="libro-box">
	  	<h3>Subir un libro</h3>
	  	<div class="form-group">
		   	<label>Nombre del libro</label>
		    <input type="text" class="form-control" placeholder="Ingrese nombre" name="titulo" required>
	   	</div>
	  	<div class="form-group">
		   	<label>Autor</label>
		    <input type="text" class="form-control" placeholder="Ingrese autor" name="autor" required>
	   	</div>	   
	  	<div class="form-group">
		   	<label>Editorial</label>
		    <input type="text" class="form-control" placeholder="Ingrese editorial" name="editorial" required>
	   	</div>	   	
	  	<div class="form-group">
		   	<label>Etiquetas</label>
	      <textarea type="text" class="form-control" placeholder="Ej: html,css..." name="etiqueta" required></textarea>
	    </div>
	  	<div class="form-group">
		   	<label>Archivo</label>
	      <input class="form-control" type="file" name="efile" required>
	    </div>
	    <button type="submit" name="submit" class="btn btn-primary">Registrar Libro</button>
	  </div>
	</form>
	
</body>
</html>
