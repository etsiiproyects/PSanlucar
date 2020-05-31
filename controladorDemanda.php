<?php

	session_start();
	
	if (isset($_REQUEST["OID_DEMANDA"])){
		$demanda["PRECIOMAX"] = $_REQUEST["PRECIOMAX"];
		$demanda["FECHADEMANDA"] = $_REQUEST["FECHADEMANDA"];
		$demanda["NUM_MASCOTA"] = $_REQUEST["NUM_MASCOTA"];
		$demanda["NIF"] = $_REQUEST["NIF"];
		$demanda["ID_INMUEBLE"] = $_REQUEST["ID_INMUEBLE"];
		$demanda["OID_DEMANDA"] = $_REQUEST["OID_DEMANDA"];
		
		$_SESSION["demanda"] = $demanda;
			
		if (isset($_REQUEST["contratar"])) Header("Location: formularioContrato.php"); 
		else  if (isset($_REQUEST["borrar"]))  Header("Location: accion_borrar_demanda.php"); 
	}else {
		Header("Location: consulta_demandas.php");	
	}
		


?>