<?php
    session_start();

	
	if (isset($_SESSION["formulario"])) {
	
		$nuevoContrato["inicioAlquiler"] = $_REQUEST["inicioAlquiler"];
		$nuevoContrato["finalAlquiler"] = $_REQUEST["finalAlquiler"];
		$nuevoContrato["pagoMensual"] = $_REQUEST["pagoMensual"];
		$nuevoContrato["fianza"] = $_REQUEST["fianza"];
		$nuevoContrato["nif"] = $_REQUEST["nif"];
	}
	else 
		Header("Location: formularioContratos.php");
	
	
	$_SESSION["formulario"] = $nuevoContrato;

	
	$errores = validarDatosContrato($nuevoContrato);
	
	
	if (count($errores)>0) {
		
		$_SESSION["errores"] = $errores;
		Header('Location: formularioContratos.php');
	} else
		
		Header('Location: alta_contrato.php');
		
	
	
	function validarDatosContrato($nuevoContrato){

			
		if($nuevoContrato["nif"]==""){
			$errores[] = "<p> El NIF no puede estar vacio</p>";
		}else if(preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
			$errores[] = "<p>El NIF debe contener 8 numeros y una letra</p>";
		}
		
			
		if($nuevoContrato["pagoMensual"]=="")
			$errores[] = "<p> El pago mensual debe ser fijado</p>";		

			
		if($nuevoContrato["fianza"]=="")
			$errores[] = "<p> La fianza debe ser fijada</p>";
	
		return $errores;
		
	}
	
?>