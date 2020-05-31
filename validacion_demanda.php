<?php
	session_start();

	if(isset($_SESSION["demanda"])) {
		$nuevaDemanda["PRECIOMAX"] = $_REQUEST["precio_max"];
		$nuevaDemanda["FECHADEMANDA"] = $_REQUEST["fecha_demanda"];
		$nuevaDemanda["NUM_MASCOTA"] = $_REQUEST["numMascotas"];
		$nuevaDemanda["NIF"] = $_REQUEST["nif"];
		$nuevaDemanda["ID_INMUEBLE"] = $_REQUEST["id_inmueble"];
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
        if($nuevaDemanda["ID_INMUEBLE"]=="") {
            $errores[] = "<p>El ID del inmueble no puede estar vacío</p>";
        } else if(strlen($nuevaDemanda["ID_INMUEBLE"])!=5) {
            $errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
        }

		if($nuevaDemanda["NIF"]=="") 
			$errores[] = "<p>El NIF no puede estar vacío</p>";
		else if(!preg_match("/^[0-9]{8}[A-Z]$/", $nuevaDemanda["NIF"])){
			$errores[] = "<p>El NIF debe contener 8 números y una letra mayúscula: " . $nuevaDemanda["NIF"]. "</p>";
		}

		if($nuevaDemanda["NUM_MASCOTA"]=="")
			$errores[] = "<p>El numero de mascotas debe indicarlo</p>";

		if($nuevaDemanda["PRECIOMAX"]=="")
			$errores[] = "<p>El precio maximo debe indicarlo</p>";

        return $errores;

    }

?>
