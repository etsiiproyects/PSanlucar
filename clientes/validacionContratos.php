<?php
    session_start();

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["formulario"])) {
		// Recogemos los datos del formulario
		$nuevoContrato["inicioAlquiler"] = $_REQUEST["inicioAlquiler"];
		$nuevoContrato["finalAlquiler"] = $_REQUEST["finalAlquiler"];
		$nuevoContrato["pagoMensual"] = $_REQUEST["pagoMensual"];
		$nuevoContrato["fianza"] = $_REQUEST["fianza"];
		$nuevoContrato["nif"] = $_REQUEST["nif"];
	}
	else // En caso contrario, vamos al formulario
		Header("Location: formularioContratos.php");
	
	// Guardar la variable local con los datos del formulario en la sesión.
	$_SESSION["formulario"] = $nuevoContrato;

	// Validamos el formulario en servidor 
	$errores = validarDatosContrato($nuevoContrato);
	
	// Si se han detectado errores
	if (count($errores)>0) {
		// Guardo en la sesión los mensajes de error y volvemos al formulario
		$_SESSION["errores"] = $errores;
		Header('Location: formularioContratos.php');
	} else
		// Si todo va bien, vamos a la página de éxito (inserción del usuario en la base de datos)
		Header('Location: alta_contrato.php');
		
	
	///////////////////////////////////////////////////////////
	// Validación en servidor del formulario de alta de contrato
	///////////////////////////////////////////////////////////
	function validarDatosContrato($nuevoContrato){

			// Validación del NIF 
		if($nuevoContrato["nif"]==""){
			$errores[] = "<p> El NIF no puede estar vacio</p>";
		}else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
			$errores[] = "<p>El NIF debe contener 8 numeros y una letra</p>";
		}
		
			//Validación del Pago Mensual
		if($nuevoContrato["pagoMensual"]=="")
			$errores[] = "<p> El pago mensual debe ser fijado</p>";		

			//Validación de la fianza
		if($nuevoContrato["fianza"]=="")
			$errores[] = "<p> La fianza debe ser fijada</p>";

			//Validación del inicio del alquiler
			
			//Validación del final del alquiler		
		return $errores;
		
	}
	
?>