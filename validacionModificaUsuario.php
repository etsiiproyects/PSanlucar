<?php

	session_start();
	
	if(isset($_SESSION["usuario"])) {
		$actuUsuario["nif"] = $_REQUEST["nifA"];
		$actuUsuario["nombre"] = $_REQUEST["nombreA"];
		$actuUsuario["apellidos"] = $_REQUEST["apellidosA"];
		$actuUsuario["email"] = $_REQUEST["emailA"];
		$actuUsuario["pass"] = $_REQUEST["passA"];
		$actuUsuario["confirmPass"] = $_REQUEST["confirmPassA"];
	} else Header("Location: paginaprincipal.php");
	
	$_SESSION["usuario"] = $actuUsuario;
	
	$errores = validarDatosInmuebleAct($conexion, $actuUsuario);
	
	if(count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: modificaUsuario.php');
	} else {
		Header('Location: accion_modifica_usuario.php');
	}
	
	function validarDatosUsuario($usuario) {
		if($usuario["nombre"]=="")
			$errores[] = "<p>El nombre no puede estar vacío</p>";
		
		if($usuario["nif"]=="") 
			$errores[] = "<p>El NIF no puede estar vacío</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $usuario["nif"])){
			$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $usuario["nif"]. "</p>";
		}

		if($usuario["email"]==""){
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($usuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $usuario["email"]. "</p>";
		}

		if(!isset($usuario["pass"]) || strlen($usuario["pass"])<8){
			$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres\n</p>";
		}else if(!preg_match("/[a-z]+/", $usuario["pass"]) ||
			!preg_match("/[A-Z]+/", $usuario["pass"]) || !preg_match("/[0-9]+/", $usuario["pass"])){
			$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos\n</p>";
		}else if($usuario["pass"] != $usuario["confirmar"]){
			$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
		}
		return $errores;

	}

?>