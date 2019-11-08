<?php
include '../includes/conectar.php';
include '../includes/billetera.php';
$tot = 0;
$din = 0;
$dir = htmlspecialchars($_POST['dir']);
$tpago = $_POST['tpago'];
$tpago = str_replace(' ', '', $tpago);
$des = $_POST['des'];
$tot = $_POST['tot'];
$din = $_POST['din'];
$mesa = $_POST['mesa'];

	$sql = "INSERT INTO orden (usuario, tipopago, direccion, total, detalle, mesa) VALUES ($uid, '$tpago', '$dir', $tot, '$des', $mesa)";
	if ($con->query($sql) === TRUE){
		$oid =  $con->insert_id;
		foreach ($_POST as $key => $value)
		{
			if(is_numeric($key)){
				$result = mysqli_query($con, "SELECT * FROM productos WHERE id = $key;");
				
				while($row = mysqli_fetch_array($result))
				{
					$pre = $row['precio'];
				}
					$pre = $value*$pre;
				$sql = "INSERT INTO ordendetalle(orden, producto, cantidad, precio) VALUES ($oid, $key, $value, $pre);";
				$con->query($sql) === TRUE;		
			}
		}

		if ($din != "") {
			$sql = "UPDATE billeteradetalle SET dinero = $din WHERE billetera = $bid;";
			$con->query($sql) === TRUE;		
		}
		
			$sql = "UPDATE mesa SET disponibilidad = 1 WHERE id = $mesa;";
			$con->query($sql) === TRUE;				

		header("location: ../ordenes.php");
	}

?>	