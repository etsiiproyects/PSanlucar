<?php

	session_start();
	
	if (isset($_REQUEST["demanda"])){
		$demanda["PRECIOMAX"] = $_REQUEST["PRECIOMAX"];
		$demanda["FECHADEMANDA"] = $_REQUEST["FECHADEMANDA"];
		$demanda["NUM_MASCOTA"] = $_REQUEST["NUM_MASCOTA"];
		$demanda["NIF"] = $_REQUEST["NIF"];
		$demanda["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		
		$_SESSION["demanda"] = $demanda;
			
		if (isset($_REQUEST["editar"])) Header("Location: modificaDemanda.php"); 
		else  if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_demanda.php"); 
	}else {
		Header("Location: consulta_demandas.php");	
	}
		


?>