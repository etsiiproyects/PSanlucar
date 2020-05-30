<?php

	session_start();
	
	if (isset($_REQUEST["demanda"])){
		$inmueble["PRECIOMAX"] = $_REQUEST["PRECIOMAX"];
		$inmueble["FECHADEMANDA"] = $_REQUEST["FECHADEMANDA"];
		$inmueble["NUM_MASCOTA"] = $_REQUEST["NUM_MASCOTA"];
		$inmueble["NIF"] = $_REQUEST["NIF"];
		$inmueble["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		
		$_SESSION["demanda"] = $demanda;
			
		if (isset($_REQUEST["editar"])) Header("Location: modificaDemanda.php"); 
		else  if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_demanda.php"); 
	}else {
		Header("Location: consulta_demandas.php");	
	}
		


?>