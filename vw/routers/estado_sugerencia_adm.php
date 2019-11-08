<?php
include '../includes/conectar.php';
include '../includes/billetera.php';
$est = $_POST['est'];
$sid = $_POST['sid'];
$tip = $_POST['tip'];

$sql = "UPDATE sugerencia SET estado = '$est' WHERE id = $sid;";

if($est=="Abierto"){
	$_SESSION['success'] = '<label>Se abrio la sugerencia : </label> Presione en "Cerrar" para que la solicitud se cierre.';		
}else{
	$_SESSION['success'] = '<label>Se cerro la sugerencia :</label> Presione en "ReAbrir" para que la solicitud se reactive. No podra responder la solicitud hasta que un administrador o el usuario que realizo esta solicitud vuelva a abrirla.';
}		

$con->query($sql);

	header("location: ../ver_sugerencias_adm.php?id=".$sid);

?>