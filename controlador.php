<?php

	session_start();
	


	if (isset($_REQUEST["ID_INMUEBLE"])){
		$inmueble["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		$inmueble["DIRECCION"] = $_REQUEST["DIRECCION"];
		$inmueble["HABITACIONES"] = $_REQUEST["HABITACIONES"];
		$inmueble["TIPO"] = $_REQUEST["TIPO"];
		$inmueble["IMG"] = $_REQUEST["IMG"];
		
		$_SESSION["inmueble"] = $inmueble;
			
		if (isset($_REQUEST["editar"])) Header("Location: consulta_inmuebles.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_inmueble.php");
		else  if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_inmueble.php"); 
	}
	else 
		Header("Location: index.php");




	// session_start();
//     
    // include_once("gestionBD.php");
    // include_once("gestionarInmuebles.php");
// 
	// if (isset($_REQUEST["ID_INMUEBLE"])){
		// $inmueble["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		// $inmueble["DIRECCION"] = $_REQUEST["DIRECCION"];
		// $inmueble["HABITACIONES"] = $_REQUEST["HABITACIONES"];
		// $inmueble["TIPO"] = $_REQUEST["TIPO"];
// 		
// 	
		// $_SESSION["inmueble"] = $inmueble;
// 			
		// if (isset($_REQUEST["editar"])) Header("Location: gestionarInmuebles.php"); 
		// else if (isset($_REQUEST["borrar"])){
// 
            // $conexion = crearConexionBD();
            // $funct = quitar_inmueble($conexion, $inmueble["ID_INMUEBLE"]);
            // if($funct<>0){
                // $_SESSION["excepcion"] = $funct;
                // $_SESSION["destino"] = "consulta_inmuebles.php";
                // Header("Location: excepcion.php");
            // }
            // else{
                // Header("Location: consulta_inmuebles.php");
            // } 
        // }
    // };
?>