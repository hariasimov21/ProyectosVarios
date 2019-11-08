<?php
	session_start();
	include_once('../includes/conectar.php');

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$disponibilidad = $_POST['disponibilidad'];
		$imagen = $_POST['imagen'];
		$descripcion = $_POST['descripcion'];
		$categoria = $_POST['categoria'];

		$sql = "UPDATE productos SET nombre = '$nombre', precio = '$precio', disponibilidad = '$disponibilidad', imagen = '$imagen', descripcion = '$descripcion', categoria = '$categoria' WHERE id = '$id'";

		if($con->query($sql)){
			$_SESSION['success'] = 'CORRECTO :Se modificaron los datos del plato/producto: <strong>'.$_POST['nombre'].'.</strong>';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select member to edit first';
	}

	header('location: ../pagina_adm.php');

?>