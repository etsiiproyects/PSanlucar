<?php
    session_start();

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["nombre"] = $_REQUEST["nombre"];
		$nuevoUsuario["apellidos"] = $_REQUEST["apellidos"];
		$nuevoUsuario["email"] = $_REQUEST["email"];
		$nuevoUsuario["fechaNacimiento"] = $_REQUEST["fechaNacimiento"];
		$nuevoUsuario["nick"] = $_REQUEST["nick"];
		$nuevoUsuario["pass"] = $_REQUEST["pass"];
		$nuevoUsuario["confirmar"] = $_REQUEST["confirmar"];
	}
	else // En caso contrario, vamos al formulario
		Header("Location: registroWeb.php");

	// Guardar la variable local con los datos del formulario en la sesión.
	$_SESSION["formulario"] = $nuevoUsuario;

	// Validamos el formulario en servidor
	$errores = validarDatosUsuario($nuevoUsuario);

	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: registroWeb.php');
	} else
		// Si todo va bien, vamos a la página de éxito (inserción del usuario en la base de datos)
		Header('Location: alta_usuario.php');


	///////////////////////////////////////////////////////////
	// Validación en servidor del formulario de alta de usuario
	///////////////////////////////////////////////////////////
	function validarDatosUsuario($nuevoUsuario){

		// Validación del Nombre
		if($nuevoUsuario["nombre"]=="")
			$errores[] = "<p>El nombre no puede estar vacío</p>";

		// Validación del email
		if($nuevoUsuario["email"]==""){
			$errores[] = "<p>El email no puede estar vacío</p>";
		}else if(!filter_var($nuevoUsuario["email"], FILTER_VALIDATE_EMAIL)){
			$errores[] = $error . "<p>El email es incorrecto: " . $nuevoUsuario["email"]. "</p>";
		}

		// Validación de la fecha de nacimiento

		//Validacion usuario
		if(strlen($nuevoUsuario["nick"])>15){
			$errores[] = "<p>El nombre de usuario es demasiado largo. Maximo 15 caracteres.</p>";
		}

		// Validación de la contraseña
		if(!isset($nuevoUsuario["pass"]) || strlen($nuevoUsuario["pass"])<8){
			$errores [] = "<p>Contraseña no válida: debe tener al menos 8 caracteres</p>";
		}else if(!preg_match("/[a-z]+/", $nuevoUsuario["pass"]) ||
			!preg_match("/[A-Z]+/", $nuevoUsuario["contraseña"]) || !preg_match("/[0-9]+/", $nuevoUsuario["contraseña"])){
			$errores[] = "<p>Contraseña no válida: debe contener letras mayúsculas y minúsculas y dígitos</p>";
		}else if($nuevoUsuario["pass"] != $nuevoUsuario["confirmar"]){
			$errores[] = "<p>La confirmación de contraseña no coincide con la contraseña</p>";
		}
		return $errores;

	}

?>
