<?php

	session_start();
	
	if(isset($_SESSION["contrato"])) {
		$contrato = $_SESSION["contrato"];
		$oid = $contrato["OID_CONTRATO"];
		unset($_SESSION["contrato"]);
		
		require_once("gestionBD.php");
		require_once("gestionContratos.php");
		
		$conexion = crearConexionBD();
		$excepcion = quitar_contrato($conexion, $oid);
		cerrarConexionBD($conexion);
		
		if($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "consulta_contratos.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: consulta_contratos.php");
	} 
	else header("Location: consulta_contratos.php");
?>