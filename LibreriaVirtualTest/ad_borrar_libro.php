<?php
	include "basededatos.php";
	$sql="DELETE from libro where IdLibro=".$_GET["IdLibro"];
	if($db->query($sql))
	{
		echo "<script>window.open('ad_ver_libros.php?mes=Libro borrado exitosamente!','_self')</script>";
	}else{
		echo "<script>window.open('ad_ver_libros.php','_self')</script>";
	}
?>
