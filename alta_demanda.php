<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionarDemandas.php");

    if(isset($_SESSION["demanda"])) {
        $nuevaDemanda=$_SESSION["demanda"];
        $_SESSION["demanda"] = null;
		$_SESSION["errores"] = null;
    }else Header("Location: formularioDemandas.php");

    $conexion=crearConexionBD();

    if(alta_inmueble($conexion, $nuevaDemanda)){
        Header("Location: consulta_demandas.php");
    }else{
        $_SESSION["excepcion"] = "La demanda ya existe en la base de datos.";
        $_SESSION["destino"] = "formularioDemandas.php";
        Header("Location: excepcion.php");
    }
    

 ?>