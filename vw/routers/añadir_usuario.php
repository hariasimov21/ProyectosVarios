<?php
include '../includes/conectar.php';

function number($length) {
    $res = '';
    for($i = 0; $i < $length; $i++) {
        $res .= mt_rand(0, 9); }
    return $res;
}

$usu = $_POST['usu'];
$contra = $_POST['contra'];
$nom = $_POST['nom'];
$corr = $_POST['corr'];
$cont = $_POST['tel'];
$dir = $_POST['dir'];
$tip = $_POST['tip'];
$ver = $_POST['ver'];
$ecu = $_POST['ecu'];
$sql = "INSERT INTO usuario (usuario, contrasena, nombre, email, contacto, direccion, tipo, verificado, estadocuenta) VALUES ('$usu', '$contra', '$nom', '$corr', $cont, '$dir', '$tip', $ver, $ecu)";

if($con->query($sql)==true){
	$uid =  $con->iid;
	$sql = "INSERT INTO billetera(usuario) VALUES ($uid)";

if($con->query($sql)==true){
	$bid =  $con->iid;
	$cc = number(16);
	$cvv = number(3);
	$sql = "INSERT INTO billeteradetalle(billetera, numerotargeta, cvv) VALUES ($bid, $cc, $cvv)";
	$con->query($sql);
	}	
}

header("location: ../usuarios.php");
?>s