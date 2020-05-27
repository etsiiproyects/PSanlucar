<?php

	session_start();
	
		if (isset($_REQUEST["OID_CONTRATO"])) {
			$contrato["OID_CONTRATO"] = $_REQUEST["OID_CONTRATO"];
			
			$_SESSION["contrato"] = $contrato;
				
			Header("Location: accion_borrar_contrato.php");
		}
		else header("Location: consulta_contratos.php");	

?>