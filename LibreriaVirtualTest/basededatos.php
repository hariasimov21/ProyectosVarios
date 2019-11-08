
<?php
	$db=new mysqli("localhost","root","","bvirtual");
	if(!$db)
	{
		echo"La base de datos no esta conectada";
	}
?>