<?php
include '../includes/conectar.php';

$nom = $_POST['nom'];
$pre = $_POST['pre'];
$ima = $_POST['ima'];
$descr = $_POST['descr'];
$catego = $_POST['catego'];
$sql = "INSERT INTO productos (nombre, precio, imagen, descripcion, categoria) VALUES ('$nom', $pre, '$ima', '$descr', $catego);";
$con->query($sql);

	if(!$con->query($sql)){
		$_SESSION['success'] = '<strong> NUEVO PRODUCTO REGISTRADO: Se registro '.$_POST['nom'].' como nuevo plato/producto,</strong> (Utilize la tabla de registros para habilitar el producto.)';
	}else{
		$_SESSION['error'] = 'ERROR!!: Error en el registro intentelo nuevamente.';
	}

header("location: ../pagina_adm.php");


?>