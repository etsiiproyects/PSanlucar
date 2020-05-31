<?php

	session_start();
	
	if(isset($_SESSION["UsuarioModificado"])) {
		$usuario = $_SESSION["UsuarioModificado"];
		unset($_SESSION["UsuarioModificado"]);
		
		require_once("gestionBD.php");
		require_once("gestionUsuarios.php");
		
		$conexion = crearConexionBD();
		$excepcion = modificar_usuario($conexion, $usuario);
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