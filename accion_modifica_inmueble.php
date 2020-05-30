<?php

	session_start();
	
	if(isset($_SESSION["inmueble"])) {
		$inmueble = $_SESSION["inmueble"];
		unset($_SESSION["inmueble"]);
		
		require_once("gestionBD.php");
		require_once("gestionarInmuebles.php");
		
		$conexion = crearConexionBD();
		$excepcion = modificar_inmueble($conexion, $inmueble);
		cerrarConexionBD($conexion);
		
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_inmuebles.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: paginaprincipal.php");		
	}
	else Header("Location: paginaprincipal.php");

?>