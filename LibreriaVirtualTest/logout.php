<?php
	include "basededatos.php";
	session_start();
	unset ($_SESSION["Id_Admin"]);
	unset ($_SESSION["Id_Usuario"]);
	session_destroy();
	echo "<script>window.open('in_lector_login.php','_self')</script>";
?>