<?php
include '../includes/conectar.php';

$disponibilidad = $_POST['disponibilidad'];
$mesa = $_POST['mesa'];

$sql = "UPDATE mesa SET disponibilidad = $disponibilidad WHERE id = $mesa;";

	if($con->query($sql)==true){
		$_SESSION['success'] = 'Correcto : Se cambio la disponibilidad de la mesa '.$mesa.' </strong>.';	
	}else{

		$_SESSION['error'] = 'Error : No se pudo cambiar la disponibilidad.';
	};

header("location: ../registrar_cat.php");

?>