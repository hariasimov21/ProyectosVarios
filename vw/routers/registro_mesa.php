<?php
include '../includes/conectar.php';

$idm = $_POST['idm'];
$disponibilidad = $_POST['disponibilidad'];

$sql = "INSERT INTO mesa(id,disponibilidad) VALUES ($idm,$disponibilidad);";

	if($con->query($sql)==true){
		$_SESSION['success'] = 'Correcto : Se registro una nueva mesa: '.$mesa.' </strong>.';	
	}else{

		$_SESSION['error'] = 'Error : No se pudo registar la mesa.';
	};

header("location: ../registrar_cat.php");

?>