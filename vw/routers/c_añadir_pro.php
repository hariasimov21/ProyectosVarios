<?php
	session_start();
	include_once('../includes/conectar.php');

	if(isset($_POST['add'])){
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$disponibilidad = $_POST['disponibilidad'];
		$imagen = $_POST['imagen'];
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];
		$sql = "INSERT INTO members (nombre, precio, disponibilidad, imagen, descripcion, categoria) VALUES ('$nombre', '$precio', '$disponibilidad', '$imagen', '$descripcion', '$categoria')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Member added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: ../index.php');
?>