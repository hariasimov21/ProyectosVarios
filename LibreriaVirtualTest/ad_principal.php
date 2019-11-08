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
	<div class="row" id="detalle-box">
	  <div class="col-sm-6">
	    <div class="card" id="caja-box">
	      <div class="card-body">
	        <h5 class="card-title">Registros Totales:</h5>
	        <p class="card-text">Existen <?php echo countRecord("SELECT * from lector",$db); ?> registros en total.</p>
	        <button type="button" class="btn btn-primary btn-lg">Revisar registro de usuarios</button>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6">
	    <div class="card" id="caja-box">
	      <div class="card-body">
	        <h5 class="card-title">Cantidad de libros:</h5>
	        <p class="card-text">Existen <?php echo countRecord("SELECT * from libro",$db); ?> libros registrados.</p>
	       	<button type="button" class="btn btn-primary btn-lg">Revisar registro de libros</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="row" id="detalle-box">
	  <div class="col-sm-6">
	    <div class="card" id="caja-box">
	      <div class="card-body">
	        <h5 class="card-title">Sugerencias</h5>
	        <p class="card-text">Se han realizado <?php echo countRecord("SELECT * from sugerencia",$db); ?> sugerencias.</p>
	      	<button type="button" class="btn btn-primary btn-lg">Revisar registro de sugerencias</button>
	      </div>
	    </div>
	  </div>
	  <div class="col-sm-6">
	    <div class="card" id="caja-box">
	      <div class="card-body">
	        <h5 class="card-title">Comentarios</h5>
	        <p class="card-text">Se realizaron <?php echo countRecord("SELECT * from comentario",$db); ?> comentarios.</p>
	       	<button type="button" class="btn btn-primary btn-lg">Revisar registro de comentarios</button>
	      </div>
	    </div>
	  </div>
	</div>
	
</body>
</html>
