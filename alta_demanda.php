<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionDemandas.php");

    if(isset($_SESSION["demanda"])) {
        $nuevaDemanda=$_SESSION["demanda"];
        $_SESSION["demanda"] = null;
		$_SESSION["errores"] = null;
    }else Header("Location: formularioDemandas.php");

    $conexion=crearConexionBD();

    if(alta_demanda($conexion, $nuevaDemanda)){
        Header("Location: paginaprincipal.php");
    }else{
        $_SESSION["excepcion"] = "Tenemos un contrato activo para este inmueble.".$nuevaDemanda["FECHADEMANDA"];
        $_SESSION["destino"] = "paginaprincipal.php";
        Header("Location: excepcion.php");
    }


 ?>
