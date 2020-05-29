<?php

	session_start();
	


	if (isset($_REQUEST["ID_INMUEBLE"])){
		$inmueble["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		$inmueble["DIRECCION"] = $_REQUEST["DIRECCION"];
		$inmueble["HABITACIONES"] = $_REQUEST["HABITACIONES"];
		$inmueble["TIPO"] = $_REQUEST["TIPO"];
		$inmueble["IMG"] = $_REQUEST["IMG"];
		
		$_SESSION["inmueble"] = $inmueble;
			
		if (isset($_REQUEST["editar"])) Header("Location: modificaInmueble.php"); 
		else  if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_inmueble.php"); 
	}else {
		Header("Location: consulta_inmuebles.php");	
	}
		


	
		


?>