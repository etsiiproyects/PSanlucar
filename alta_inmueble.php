<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionarInmuebles.php");

    if(isset($_SESSION["inmueble"])) {
        $nuevoInmueble=$_SESSION["inmueble"];
        $_SESSION["inmueble"] = null;
		$_SESSION["errores"] = null;
    }else Header("Location: registroInmueble.php");

    $conexion=crearConexionBD();

    if(alta_inmueble($conexion, $nuevoInmueble)){
        Header("Location: consulta_inmuebles.php");
    }else{
        $_SESSION["excepcion"] = "El inmueble ya existe en la base de datos.";
        $_SESSION["destino"] = "registroInmueble.php";
        Header("Location: excepcion.php");
    }
    

 ?>

