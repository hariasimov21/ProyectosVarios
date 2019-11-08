<?php
include '../includes/conectar.php';

$nom = $_POST['nom'];
$usu = $_POST['usu'];
$contra = $_POST['contra'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$dir = $_POST['dir'];
$nombre = $_FILES['foto']['name'];
$archivo = $_FILES['foto']['tmp_name'];
$ruta = '../images';

$ruta = $ruta.'/'.$nombre;
move_uploaded_file($archivo,$ruta);
$ruta = 'images/'.$nombre;

function number($length) {
    $res = '';
    for($i = 0; $i < $length; $i++) {
        $res .= mt_rand(0, 9);
    }
    return $res;
}

if ($tip != "") {

	$sql = "INSERT INTO usuario(nombre, usuario, contrasena, contacto, email, direccion, foto, tipo) VALUES ('$nom', '$usu', '$contra', $tel, '$email',  '$dir', '$ruta', 'Administrador');";

	if($con->query($sql)==true){
		$uid =  $con->insert_id;
		$sql = "INSERT INTO billetera(usuario) VALUES ($uid);";
		
			if($con->query($sql)==true){
				$bid =  $con->insert_id;
				$cc = number(16);
				$cvv = number(3);
				$sql = "INSERT INTO billeteradetalle(billetera, numerotargeta, cvv) VALUES ($bid, $cc, $cvv);";
				$con->query($sql);

		$_SESSION['success'] = 'Correcto : Se registro un nuevo Administrador: <strong>'.$usu.'</strong>.';
	
			}	
	}else{

		$_SESSION['error'] = 'Error : No se registro un nuevo administrador.';

	};

header("location: ../usuarios.php");

} else {

	$sql = "INSERT INTO usuario(nombre, usuario, contrasena, contacto, email, direccion, foto) VALUES ('$nom', '$usu', '$contra', $tel, '$email',  '$dir', '$ruta');";

	if($con->query($sql)==true){
		$uid =  $con->insert_id;
		$sql = "INSERT INTO billetera(usuario) VALUES ($uid);";
		
			if($con->query($sql)==true){
				$bid =  $con->insert_id;
				$cc = number(16);
				$cvv = number(3);
				$sql = "INSERT INTO billeteradetalle(billetera, numerotargeta, cvv) VALUES ($bid, $cc, $cvv);";
				$con->query($sql);

				$_SESSION['success'] = 'Correcto : Se registro como nuevo usuario: <strong>'.$usu.'</strong>. Ahora podra ingresar logueandose aqui. ';

			}else{
				$_SESSION['error'] = 'Error : Hubo un error en el registro.';
			}
	}
header("location: ../login.php");

}
?>