<?php
include '../includes/conectar.php';
include '../includes/billetera.php';

$est = $_POST['est'];
$id = $_POST['id'];
$tpago = $_POST['tpago'];
$tot = $_POST['tot'];
$tot = $tot+$din;
$mes = "";

if ($est == "Orden Cancelada (usu)") {

$sql = "UPDATE orden SET estado='$est', revocar=1 WHERE id=$id;";
$con->query($sql);
$sql = mysqli_query($con, "SELECT * FROM orden where id = $id;");

	while($row1 = mysqli_fetch_array($sql)){
		$tot = $row1['total'];
		$mes = $row1['mesa'];
	}

	$sql = "UPDATE mesa SET disponibilidad = 0 WHERE id = $mes;";
	$con->query($sql) === TRUE;

	if (trim($tpago) == 'Billetera') {
		$din = $din+$tot;
		$sql = "UPDATE billeteradetalle SET dinero = $din WHERE billetera = $bid;";
		$con->query($sql);
	}

} elseif ($est == "Orden Finalizada") {

$sql = "UPDATE orden SET estado='$est', revocar=1 WHERE id=$id;";
$con->query($sql);
$sql = mysqli_query($con, "SELECT * FROM orden where id = $id;");

	while($row1 = mysqli_fetch_array($sql)){
		$tot = $row1['total'];
		$mes = $row1['mesa'];
	}

	$sql = "UPDATE mesa SET disponibilidad = 0 WHERE id = $mes;";
	if ($con->query($sql) === TRUE) {
		$_SESSION['success'] = 'CORRECTO : <strong>Se finalizo la orden correctamente.</strong>';
	} else {

	}


}

header("location: ../ordenes.php");

?>