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
	
	$_SESSION["UsuarioModificado"] = $actuUsuario;
	
	$errores = validarDatosUsuarioAct($conexion, $actuUsuario);
	
	if(count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: modificaUsuario.php');
	} else {
		Header('Location: accion_modifica_usuario.php');
	}
	
	function validarDatosUsuarioAct($conexion, $actuUsuario) {
		$errores=array();
		if($actuUsuario["nombre"]=="")
			$errores[] = "<p>El nombre no puede estar vacío</p>";
		
		if($actuUsuario["nif"]=="") 
			$errores[] = "<p>El NIF no puede estar vacío</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $actuUsuario["nif"])){
			$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $actuUsuario["nif"]. "</p>";
		}

		if($actuUsuario["email"]==""){
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($actuUsuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $actuUsuario["email"]. "</p>";
		}

		if(!isset($actuUsuario["pass"]) || strlen($actuUsuario["pass"])<8){
			$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres\n</p>";
		}else if(!preg_match("/[a-z]+/", $actuUsuario["pass"]) ||
			!preg_match("/[A-Z]+/", $actuUsuario["pass"]) || !preg_match("/[0-9]+/", $actuUsuario["pass"])){
			$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos\n</p>";
		}else if($actuUsuario["pass"] != $actuUsuario["confirmPass"]){
			$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
		}
		return $errores;

	}

?>