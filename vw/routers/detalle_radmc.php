
<?php
include '../includes/conectar.php';
$uid = $_SESSION['uid'];

$contra = htmlspecialchars($_POST['contra']);
$ncontra = htmlspecialchars($_POST['ncontra']);
$contra2 = htmlspecialchars($_POST['contra2']);
$nombre = $_FILES['foto']['name'];
$archivo = $_FILES['foto']['tmp_name'];
$ruta = '../images';

$ruta = $ruta.'/'.$nombre;
move_uploaded_file($archivo,$ruta);
$ruta = 'images/'.$nombre;

	if ($contra==$contra2) {

		$sql = "UPDATE usuario SET contrasena = '$ncontra' WHERE id = $uid;";

		if($con->query($sql)){
			$_SESSION['success'] = 'Correcto : Se correctamene su contraseña.';
		}else{
			$_SESSION['error'] = 'Error : No se modificaron las contraseñas de su usuario, verifique la informacion ingresada o intentelo mas tarde.';
		}
	} else {
		$_SESSION['error'] = 'Error : La contraseña ingresada no coincide.';
	}


header("location: ../detalle_adm.php");
?>
