<?php
include '../includes/conectar.php';
$succ=false;

$usu = $_POST['usu'];
$contra = $_POST['contra'];

$res = mysqli_query($con, "SELECT * FROM usuario WHERE usuario='$usu' AND contrasena='$contra' AND tipo='Administrador' AND not estadocuenta;");
while($row = mysqli_fetch_array($res)) {
	$succ = true;
	$uid = $row['id'];
	$nom = $row['nombre'];
	$tip= $row['tipo'];
	$foto= $row['foto'];
	$escu= $row['estadocuenta'];
}

if($succ == true) {	
	session_start();
	$_SESSION['adminc']=session_id();
	$_SESSION['uid'] = $uid;
	$_SESSION['tip'] = $tip;
	$_SESSION['nom'] = $nom;
	$_SESSION['foto'] = $foto;
	$_SESSION['escu'] = $escu;

	header("location: ../pagina_adm.php");
}

else {
	$res = mysqli_query($con, "SELECT * FROM usuario WHERE usuario='$usu' AND contrasena='$contra' AND tipo='Usuario' AND not estadocuenta;");
	while($row = mysqli_fetch_array($res)) {
		$succ = true;
		$uid = $row['id'];
		$nom = $row['nombre'];
		$tip= $row['tipo'];
		$foto= $row['foto'];
		$escu= $row['estadocuenta'];

	}
	
	if($succ == true)
	{
		session_start();
		$_SESSION['usuarioc']=session_id();
		$_SESSION['uid'] = $uid;
		$_SESSION['tip'] = $tip;
		$_SESSION['nom'] = $nom;		
		$_SESSION['foto'] = $foto;
		$_SESSION['escu'] = $escu;
	
		header("location: ../index.php");
	}
	else
	{
		$_SESSION['error'] = 'Error al ingresar : <label>Usuario o Contraseña incorreta intentelo nuevamente.</label>';
		header("location: ../login.php");
	}
}
?>