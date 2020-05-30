<?php

	session_start();
	
	if(isset($_SESSION["inmuebleActualizado"])) {
		$inmueble = $_SESSION["inmuebleActualizado"];
		unset($_SESSION["inmuebleActualizado"]);
		
		require_once("gestionBD.php");
		require_once("gestionarInmuebles.php");
		
		$conexion = crearConexionBD();
		$excepcion = modificar_inmueble($conexion, $inmueble);
		cerrarConexionBD($conexion);
		
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "paginaprincipal.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: paginaprincipal.php");		
	}
	else Header("Location: paginaprincipal.php");

?>