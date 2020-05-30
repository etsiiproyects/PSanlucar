<?php
	session_start();
	
	if(isset($_SESSION["demanda"])) {
		$nuevaDemanda["PRECIOMAX"] = $_REQUEST["PRECIOMAX"];
		$nuevaDemanda["FECHADEMANDA"] = $_REQUEST["FECHADEMANDA"];
		$nuevaDemanda["NUM_MASCOTA"] = $_REQUEST["NUM_MASCOTA"];
		$nuevaDemanda["NIF"] = $_REQUEST["NIF"];
		$nuevaDemanda["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
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


        if(!preg_match("/[0-9]+/", $nuevaDemanda["NIF"]) || !preg_match("/[A-Z]/", $nuevaDemanda["NIF"])){
        $errores[] = "<p>NIF no válido</p>";
		}else if(!isset($nuevaDemanda["NIF"]) || strlen($nuevaDemanda["NIF"])<9){
		$errores[] = "<p>NIF no válido</p>";	
		}
		
		if($nuevaDemanda["NUM_MASCOTA"]=="")
			$errores[] = "<p>El numero de mascotas debe indicarlo</p>";
		
		if($nuevaDemanda["PRECIOMAX"]=="")
			$errores[] = "<p>El precio maximo debe indicarlo</p>";
		
        return $errores;
		
    }
    


?>