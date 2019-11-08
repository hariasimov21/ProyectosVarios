<?php
include '../includes/conectar.php';
$uid = $_SESSION['uid'];

$nom = htmlspecialchars($_POST['nom']);
$usu = htmlspecialchars($_POST['usu']);
$dir = htmlspecialchars($_POST['dir']);
$corr = htmlspecialchars($_POST['corr']);
$nombre = $_FILES['foto']['name'];
$archivo = $_FILES['foto']['tmp_name'];
$ruta = '../images';

$ruta = $ruta.'/'.$nombre;
move_uploaded_file($archivo,$ruta);
$ruta = 'images/'.$nombre;

$sql = "UPDATE usuario SET foto = '$ruta', nombre = '$nom', usuario = '$usu', direccion='$dir', email='$corr' WHERE id = $uid;";

if($con->query($sql)==true){
	$_SESSION['nom'] = $nom;
}

if($con->query($sql)){
	$_SESSION['success'] = 'Correcto : Se modificaron los datos de su usuario.';
}else{
	$_SESSION['error'] = 'Error : No se modificaron los datos de su usuario, verifique la informacion ingresada o intentelo mas tarde.';
}

header("location: ../detalle_adm.php");
?>