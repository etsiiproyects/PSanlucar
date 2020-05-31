<?php

	session_start();
	
	if(isset($_SESSION["inmueble"])) {
		$actuInmueble["id_inmueble"] = $_REQUEST["id_inmuebleA"];
		$actuInmueble["direccion"] = $_REQUEST["direccionA"];
		$actuInmueble["habitaciones"] = $_REQUEST["habitacionesA"];
		$actuInmueble["tipo"] = $_REQUEST["tipoA"];
		$actuInmueble["img"] = $_REQUEST["imagenA"];
	} else Header("Location: paginaprincipal.php");
	
	
	$_SESSION["inmueble"] = $actuInmueble;
	$errores = validarDatosInmuebleAct($conexion, $actuInmueble);
	
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: modificaInmueble.php');
	} else{
		Header('Location: accion_modifica_inmueble.php');
	}
	

	
	function validarDatosInmuebleAct($conexion, $actuInmueble) {
        $errores=array();

        if($actuInmueble["id_inmueble"]=="") {
            $errores[] = "<p>El ID del inmueble no puede estar vacío</p>";
        } else if(strlen($actuInmueble["id_inmueble"])==4) {
            $errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
        }

        if($actuInmueble["tipo"] != "PLURIFAMILIAR" &&
                $actuInmueble["tipo"] != "COMERCIAL" && $actuInmueble["tipo"]!= "AISLADO") {
            $errores[] = "<p>El tipo debe ser PLURIFAMILIAR, COMERCIAL o AISLADO</p>".$actuInmueble["id_inmueble"]."asd";
        }

        if($actuInmueble["direccion"]==""){
        $errores[] = "<p>La dirección no puede estar vacía</p>";

        return $errores;
    }
	}

?>