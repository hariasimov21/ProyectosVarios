<?php
include '../includes/conectar.php';
	foreach ($_POST as $key => $value)
	{
		if(preg_match("/[0-9]+_nombre/",$key)){
			if($value != ''){
			$key = strtok($key, '_');
			$value = htmlspecialchars($value);
			$sql = "UPDATE productos SET nombre = '$value' WHERE id = $key;";
			$con->query($sql);
			}
		}
		if(preg_match("/[0-9]+_precio/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET precio = '$value' WHERE id = $key;";
			$con->query($sql);
		}

		if(preg_match("/[0-9]+_imagen/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET imagen = '$value' WHERE id = $key;";
			$con->query($sql);
		}	

		if(preg_match("/[0-9]+_desc/",$key)){
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET descripcion = '$value' WHERE id = $key;";
			$con->query($sql);
		}

		if(preg_match("/[0-9]+_hide/",$key)){
			if($_POST[$key] == 1){
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET disponibilidad = 0 WHERE id = $key;";
			$con->query($sql);
			} else{
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET disponibilidad = 1 WHERE id = $key;";
			$con->query($sql);			
			}
		}

		if(preg_match("/[0-9]+_cat/",$key)){	
			$key = strtok($key, '_');
			$sql = "UPDATE productos SET categoria = $value WHERE id = $key;";
			$con->query($sql);
		}
	}
	
header("location: ../pagina_adm.php");
?>