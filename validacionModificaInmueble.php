<?php

	session_start();
	
	if(isset($_REQUEST["ID_INMUEBLE"])) {
		$actuInmueble["id_inmueble"] = $_REQUEST["id_inmuebleA"];
		$actuInmueble["direccion"] = $_REQUEST["direccionA"];
		$actuInmueble["habitaciones"] = $_REQUEST["habitacionesA"];
		$actuInmueble["tipo"] = $_REQUEST["tipoA"];
		$actuInmueble["img"] = $_REQUEST["imagenA"];
	} else Header("Location: paginaprincipal.php");
	
	
	
	$errores = validarDatosInmuebleAct($actuInmueble);
	
	if (count($errores)>0) {
		$_SESSION["errores"] = $errores;
		Header('Location: modificaInmueble.php');
	} else{
		$_SESSION["inmuebleActualizado"] = $actuInmueble;
		Header('Location: accion_modifica_inmueble.php');
	}
	

	
	function validarDatosInmuebleAct($inmueble) {
        $errores=array();

        if($inmueble["id_inmueble"]=="") {
            $errores[] = "<p>El ID del inmueble no puede estar vacío</p>".$_REQUEST["id_inmuebleA"]."asd";
        } else if(strlen($inmueble["id_inmueble"])==4) {
            $errores[] = "<p>ID no válido: debe tener 5 caracteres</p>";
        }

        if($inmueble["tipo"] != "PLURIFAMILIAR" &&
                $inmueble["tipo"] != "COMERCIAL" && $inmueble["tipo"]!= "AISLADO") {
            $errores[] = "<p>El tipo debe ser PLURIFAMILIAR, COMERCIAL o AISLADO</p>".$actuInmueble["id_inmueble"]."asd";
        }

        if($inmueble["direccion"]==""){
        $errores[] = "<p>La dirección no puede estar vacía</p>";

        return $errores;
    }
	}

?>