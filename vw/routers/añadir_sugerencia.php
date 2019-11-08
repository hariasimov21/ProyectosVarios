<?php
include '../includes/conectar.php';
$asu = htmlspecialchars($_POST['asu']);
$des =  htmlspecialchars($_POST['des']);
$tip = $_POST['tip'];
$uid = $_POST['uid'];
if($tip != ''){
	$sql = "INSERT INTO sugerencia (usuario, asunto, descripcion, tipo) VALUES ($uid, '$asu', '$des', '$tip')";
	if ($con->query($sql) === TRUE){
		$sid =  $con->insert_id;
		$sql = "INSERT INTO sugerenciadetalle (sugerencia, usuario, descripcion) VALUES ($sid, $uid, '$des')";
		$con->query($sql);
	}
}
header("location: ../sugerencias.php");
?>