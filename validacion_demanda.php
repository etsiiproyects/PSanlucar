<?php
	session_start();

	if(isset($_SESSION["demanda"])) {
		$nuevaDemanda["precio"] = $_REQUEST["precio"];
		$nuevaDemanda["fecha"] = $_REQUEST["fecha"];
		$nuevaDemanda["mascota"] = $_REQUEST["mascota"];
		$nuevaDemanda["nif"] = $_REQUEST["nif"];
		$nuevaDemanda["id"] = $_REQUEST["id"];
	} else {
		Header("Location: excepcion.php");
	}


	$_SESSION["demanda"] = $nuevaDemanda;
	$errores = validarDatosDemanda($conexion, $nuevaDemanda);
	if(count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: formularioDemandas.php');
	} else {
		Header('Location: alta_demanda.php');
	}


	function validarDatosDemanda($conexion, $nuevaDemanda) {

        $errores=array();
        //validadion del id
        if($nuevaDemanda["id"]=="") {
            $errores[] = "<p>El ID del inmueble no puede estar vacío</p>";
        } else if(strlen($nuevaDemanda["id"])!=5) {
            $errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
        }

		if($nuevaDemanda["nif"]=="")
			$errores[] = "<p>El NIF no puede estar vacío</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevaDemanda["nif"])){
			$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $nuevaDemanda["nif"]. "</p>";
		}

		if($nuevaDemanda["mascota"]=="")
			$errores[] = "<p>El numero de mascotas debe indicarlo</p>";

		if($nuevaDemanda["precio"]=="")
			$errores[] = "<p>El precio maximo debe indicarlo</p>";

        return $errores;

    }

?>
