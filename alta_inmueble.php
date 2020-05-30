<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionarInmuebles.php");

    if(isset($_SESSION["inmueble"])) {
        $nuevoInmueble=$_SESSION["inmueble"];
        $_SESSION["inmueble"] = null;
		$_SESSION["errores"] = null;
    }else Header("Location: formularioInmueble.php");

    $conexion=crearConexionBD();

    if(alta_inmueble($conexion, $nuevoInmueble)){
        Header("Location: paginaprincipal.php");
    }else{
        $_SESSION["excepcion"] = "El inmueble ya existe en la base de datos.";
        $_SESSION["destino"] = "formularioInmueble.php";
        Header("Location: excepcion.php");
    }


 ?>
