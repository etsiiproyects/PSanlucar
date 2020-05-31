<?php

	session_start();
		
	if (isset($_REQUEST["OID_CONTRATO"])) {
		$contrato["INICIOALQUILER"] = $_REQUEST["INICIOALQUILER"];
		$contrato["FINALQUILER"] = $_REQUEST["FINALQUILER"];
		$contrato["PAGOMENSUAL"] = $_REQUEST["PAGOMENSUAL"];
		$contrato["NIF"] = $_REQUEST["NIF"];
		$contrato["OID_CONTRATO"] = $_REQUEST["OID_CONTRATO"];
		
		$_SESSION["contrato"] = $contrato;
		Header("Location: accion_borrar_contrato.php"); 
	}else{
		Header("Location: consulta_contratos.php");
	}
?>