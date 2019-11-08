<?php
include '../includes/conectar.php';
include '../includes/billetera.php';

$sug = htmlspecialchars($_POST['sug']);
$sid = $_POST['sid'];
$tip = $_POST['tip'];

if($tip == 'Administrador'){
	$sql = "UPDATE sugerencia SET estado = 'Cerrado' WHERE id=$sid;";
	$con->query($sql);

}
else{
	$sql = "UPDATE sugerencia SET estado = 'Abierto' WHERE id=$sid;";
	$con->query($sql);	

}

if($sug != ''){
	$sql = "INSERT INTO sugerenciadetalle (sugerencia, usuario, descripcion) VALUES ($sid, $uid, '$sug')";
	$con->query($sql);

	$_SESSION['success'] = 'CORRECTO : <strong>Se registro una respuesta.</strong>';
}else{
	$_SESSION['error'] = 'ERROR : <strong>Debe rellenar todos los campos.</strong>';	
}

if ($tip=="Administrador") {
	header("location: ../ver_sugerencias_adm.php?id=".$sid);
} else {
	header("location: ../ver_sugerencias.php?id=".$sid);
}


?>