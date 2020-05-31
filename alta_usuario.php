<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionUsuarios.php");

	
	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else
		Header("Location: formularioUsuario.php");
	$conexion = crearConexionBD();


	if(alta_usuario($conexion, $nuevoUsuario)){
        Header("Location: paginaprincipal.php");
    }else{
        $_SESSION["excepcion"] = "El usuario ya existe en la base de datos.";
        $_SESSION["destino"] = "formularioUsuario.php";
        Header("Location: excepcion.php");
    }
	cerrarConexionBD($conexion);
?>
