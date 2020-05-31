<?php
    session_start();

	if(isset($_SESSION['contrato'])) {

		$nuevoContrato["inicioAlquiler"] = $_REQUEST["inicioAlquiler"];
		$nuevoContrato["finalAlquiler"] = $_REQUEST["finalAlquiler"];
		$nuevoContrato["pagoMensual"] = $_REQUEST["pagoMensual"];
    $nuevoContrato["fianza"] = $_REQUEST["fianza"];
		$nuevoContrato["oid_demanda"] = $_REQUEST["oid_demanda"];
	}
	else
		Header("Location: excepcion.php");


	$_SESSION["contrato"] = $nuevoContrato;
	$errores = validarDatosContrato($nuevoContrato);


	if (count($errores)>0) {

		$_SESSION["errores"] = $errores;
		Header('Location: formularioContrato.php');
	} else

		Header('Location: alta_contrato.php');



	function validarDatosContrato($nuevoContrato){

		if($nuevoContrato["pagoMensual"]=="")
			$errores[] = "<p> El pago mensual debe ser fijado</p>";


		if($nuevoContrato["fianza"]=="")
			$errores[] = "<p> La fianza debe ser fijada</p>";

		return $errores;

	}

?>
