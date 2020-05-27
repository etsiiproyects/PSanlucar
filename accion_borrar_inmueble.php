<?php

	session_start();
	
	if(isset($_SESSION["inmueble"])) {
		$inmueble = $_SESSION["inmueble"];
		$id = $inmueble["ID_INMUEBLE"];
		unset($_SESSION["inmueble"]);
		
		require_once("gestionBD.php");
		require_once("gestionarInmuebles.php");
		
		$conexion = crearConexionBD();
		$excepcion = quitar_inmueble($conexion, $id);
		cerrarConexionBD($conexion);
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_inmuebles.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_inmuebles.php");
	} 
	else header("Location: consulta_inmuebles.php");
?>