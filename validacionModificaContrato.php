<?php
    session_start();

    if(isset($_SESSION["formulario"])){
        $nuevoContrato["oid"]=$_REQUEST["oid"];
        $nuevoContrato["inicioAlquiler"] = $_REQUEST["inicioAlquiler"];
    		$nuevoContrato["finalAlquiler"] = $_REQUEST["finalAlquiler"];
    		$nuevoContrato["pagoMensual"] = $_REQUEST["pagoMensual"];
    		$nuevoContrato["nif"] = $_REQUEST["nif"];
    }else Header("Location: modificaContrato.php");

    $_SESSION["formulario"]=$nuevoContrato;
    $errores = validarDatosContrato($nuevoContrato);

	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: formularioContratos.php');
	} else
		Header('Location: accion_modificar_contrato.php');

	function validarDatosContrato($nuevoContrato){

		if($nuevoContrato["nif"]==""){
			$errores[] = "<p> El NIF no puede estar vacio</p>";
		}else if(preg_match("/^[0-9]{8}[A-Z]$/", $nuevoUsuario["nif"])){
			$errores[] = "<p>El NIF debe contener 8 numeros y una letra</p>";
		}

			//Validación del Pago Mensual
		if($nuevoContrato["pagoMensual"]=="")
			$errores[] = "<p> El pago mensual debe ser fijado</p>";

		return $errores;

	}

 ?>
