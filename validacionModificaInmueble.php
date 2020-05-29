<?php

	session_start();
	
	if(isset($_REQUEST["id_inmueble"])) {
		$nuevoInmueble["id_inmueble"] = $_REQUEST["ID_INMUEBLE"];
		$nuevoInmueble["direccion"] = $_REQUEST["DIRECCION"];
		$nuevoInmueble["habitaciones"] = $_REQUEST["HABITACIONES"];
		$nuevoInmueble["tipo"] = $_REQUEST["TIPO"];
		$nuevoInmueble["img"] = $_REQUEST["IMG"];
	} else Header("Location: modificaInmueble.php");
	
	$_SESSION["inmueble"] = $nuevoInmueble;
	
	$errores = validarDatosInmueble($nuevoInmueble);
	
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: modificaInmueble.php');
	} else
		Header('Location: accion_modificar_inmueble.php');
	
	function validarDatosInmueble($inmueble) {
        $errores=array();
        //validadion del id
        if($nuevoInmueble["id_inmueble"]=="") {
            $errores[] = "<p>El ID del inmueble no puede estar vacío</p>";
        } else if(strlen($nuevoInmueble["id_inmueble"])==4) {
            $errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
        }

        //validacion tipo
        if($nuevoInmueble["tipo"] != "PLURIFAMILIAR" &&
                $nuevoInmueble["tipo"] != "COMERCIAL" && $nuevoInmueble["tipo"]!= "AISLADO") {
            $errores[] = "<p>El tipo debe ser PLURIFAMILIAR, COMERCIAL o AISLADO</p>";
        }

        if($nuevoInmueble["direccion"]==""){
        $errores[] = "<p>La dirección no puede estar vacía</p>";

        return $errores;
    }
	}

?>