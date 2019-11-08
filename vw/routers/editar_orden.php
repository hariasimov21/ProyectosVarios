<?php
include '../includes/conectar.php';
$est = $_POST['est'];
$id = $_POST['id'];
$bid = $_POST['bid'];
$uid = $_POST['uid'];
$ntotal = $_POST['ntotal'];
$tpago = $_POST['tpago'];
echo $ntotal;

if ($est == "Orden Entregada") {
	$sql = "UPDATE orden SET estado='$est', revocar=1 WHERE id=$id;";
		if($con->query($sql)){
			$_SESSION['success'] = 'Correcto : Se cambio el estado de la orden <strong>'.$id.'</strong> a <strong>'.$est.'</strong>.';
		}else{
			$_SESSION['error'] = 'Error : No se cambio el estado de la orden.';
		}
		
}elseif ($est == "Orden Cancelada (adm)") {
	$sql = "UPDATE orden SET estado='$est', revocar=1 WHERE id=$id;";
	$con->query($sql); 

	if (trim($tpago) == 'Billetera') {
		$sql = "UPDATE billeteradetalle SET dinero = $ntotal WHERE billetera = $bid;";
		if($con->query($sql)){
			$_SESSION['success'] = 'Correcto : Se cambio el estado de la orden <strong>'.$id.'</strong> a <strong>'.$est.'</strong>.';
		}else{
			$_SESSION['error'] = 'Error : No se cambio el estado de la orden.';
		}
	};

}else{
	$sql = "UPDATE orden SET estado='$est' WHERE id=$id;";
		if($con->query($sql)){
			$_SESSION['success'] = 'Correcto : Se cambio el estado de la orden <strong>'.$id.'</strong> a <strong>'.$est.'</strong>.';
		}else{
			$_SESSION['error'] = 'Error : No se cambio el estado de la orden.';
		}
}


header("location: ../ordenes_totales.php");
?>