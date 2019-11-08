<?php
include '../includes/conectar.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_role/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE usuario SET tipo = '$value' WHERE id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_verified/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE usuario SET verificado = '$value' WHERE id = $key;";
			$con->query($sql);
		}
		if(preg_match("/[0-9]+_deleted/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE usuario SET estadocuenta = '$value' WHERE id = $key;";
			$con->query($sql);
		}		
		if(preg_match("/[0-9]+_balance/",$key)){
			$key = strtok($key, '_');
			$result = mysqli_query($con,"SELECT * from billetera WHERE usuario = $key;");
			if($row = mysqli_fetch_array($result)){
				$bid = $row['id'];
				$sql = "UPDATE billeteradetalle SET dinero = '$value' WHERE billetera = $bid;";
				$con->query($sql);
			}
		}			
	}

	if($con->query($sql)){
		$_SESSION['success'] = 'CORRECTO!: <strong>Los registros del usuario se modificaron correctamente.</strong>';
	}
		
	else{
		$_SESSION['error'] = 'Something went wrong while adding';
	}

header("location: ../usuarios.php");
?>