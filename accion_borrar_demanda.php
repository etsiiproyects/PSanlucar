<?php

	session_start();
	
	if(isset($_SESSION["demanda"])) {
		$demanda = $_SESSION["demanda"];
		$oidDemanda = $demanda["OID_DEMANDA"];
		unset($_SESSION["demanda"]);
		
		require_once("gestionBD.php");
		require_once("gestionDemandas.php");
		
		$conexion = crearConexionBD();
		$excepcion = quitar_demanda($conexion, $oidDemanda);
		cerrarConexionBD($conexion);
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "paginaprincipal.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: paginaprincipal.php");
	} 
	else header("Location: paginaprincipal.php");
?>