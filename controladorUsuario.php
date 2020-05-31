<?php

	session_start();
	
	if(isset($_REQUEST["NIF"])) {
		$usuario["NIF"] = $_REQUEST["NIF"];
		$usuario["NOMBRE"] = $_REQUEST["NOMBRE"];
		$usuario["APELLIDOS"] = $_REQUEST["APELLIDOS"];
		$usuario["EMAIL"] = $_REQUEST["EMAIL"];
		$usuario["PASS"] = $_REQUEST["PASS"];
		
		$_SESSION["usuario"] = $usuario;
		
		Header("Location: modificaUsuario.php");
	} else {
		Header("Location: usuario.php");
	}

?>