<?php
include '../includes/conectar.php';
include '../includes/billetera.php';
$tot = 0;
$din = 0;
$tpago = $_POST['tpago'];
// $des = $_POST['des'];
$tot = $_POST['tot'];
$din = $_POST['din'];
$oid = $_POST['pid'];
$nuevot = $_POST['nuevot'];
$aco = 0;

		foreach ($_POST as $key => $value)
		{
			if(is_numeric($key)){
				$result = mysqli_query($con, "SELECT * FROM productos WHERE id = $key;");
				
				while($row = mysqli_fetch_array($result))
				{
					$aco++;
					$pre = $row['precio'];
				}
					$pre = $value*$pre;
				$sql = "INSERT INTO ordendetalle(orden, producto, cantidad, precio) VALUES ($oid, $key, $value, $pre);";
				$con->query($sql) === TRUE;

			}
		}

		$sql = "UPDATE orden SET total = $nuevot WHERE id = $oid;";

		if($con->query($sql) === TRUE){
			$_SESSION['success'] = '<strong>Conrrecto !!</strong> Se añadieron nuevos productos a la orden <strong>'.$oid.'</strong>';
		}else{
			$_SESSION['error'] = 'Error al añadir productos';
		}


		if ($din != "") {
			$sql = "UPDATE billeteradetalle SET dinero = $din WHERE billetera = $bid;";
			$con->query($sql) === TRUE;		
		}


		header("location: ../ordenes.php");

?>	