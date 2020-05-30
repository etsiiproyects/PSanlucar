<?php
    session_start();

    if(isset($_SESSION["contrato"])) {
        $contrato=$_SESSION["contrato"];
        unset($_SESSION["contrato"]);

        require_once("gestionBD.php");
        require_once("gestionContratos.php");
		
        $conexion=crearConexionBD();
        $excepcion=modificar_contrato($conexion, $contrato);
        cerrarConexionBD($conexion);

		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "paginaprincipal.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: paginaprincipal.php");
	}
	else Header("Location: paginaprincipal.php");
 ?>
