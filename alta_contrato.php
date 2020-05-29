<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionContratos.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	// Se recupera la variable de sesión y se anula
	if (isset($_SESSION["contrato"])) {
		$nuevoContrato = $_SESSION["contrato"];
		$_SESSION["contrato"] = null;
		$_SESSION["errores"] = null;
	}else Header("Location: formularioContrato.php");
	$conexion = crearConexionBD();

	if(alta_contrato($conexion, $nuevoContrato)){

        Header("Location: consulta_contratos.php");
    }else{
        $_SESSION["excepcion"] = "No se ha podido conectar con la base de datos";
        $_SESSION["destino"] = "formularioContrato.php";
        Header("Location: excepcion.php");
    }
?>
