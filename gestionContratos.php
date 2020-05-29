<?php

	function consultarContrato($conexion, $contrato)  {
		$nif = $contrato["oid_contrato"];
		$consulta = "SELECT COUNT(*) AS TOTAL FROM CONTRATOS WHERE NIF=:nif";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif', $nif);
		$stmt->execute();
		return $stmt->fetchColumn();
	}

	function consultarTodosContratos($conexion) {
		$consulta = "SELECT * FROM CONTRATOS";
		return $conexion->query($consulta);
  	}


	function consultarContratosUsuario($conexion, $nif){
		$consulta = "SELECT * FROM CONTRATO  NATURAL JOIN DEMANDAS NATURAL JOIN INMUEBLES WHERE NIF=:nif";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif', $nif);
		$stmt->execute();
		return $stmt->fetch();
	}

	function alta_contrato($conexion, $contrato) {
		$fechaInicio=date('d/m/Y', strtotime($contrato["inicioAlquiler"]));
        $fechaFin=date('d/m/Y', strtotime($contrato["finalAlquiler"]));
		try {

			$consulta = 'CALL INSERTA_CONTRATO(:inicio, :final, :pago, :fianza, :oid)';
			$stmt = $conexion->prepare($consulta);
			$stmt->bindParam(':inicio', $fechaInicio);
			$stmt->bindParam(':final', $fechaFin);
			$stmt->bindParam(':pago', $contrato["pagoMensual"]);
			$stmt->bindParam(':fianza', $contrato["fianza"]);
			$stmt->bindParam(':oid', $contrato["oid_demanda"]);
			$stmt->execute();
			return true;
		} catch(PDOException $e) {
			return false;
		}
	}

	function quitar_contrato($conexion, $oidContrato){
		try{
			$stmt=$conexion -> prepare('CALL QUITAR_CONTRATO(:OID_CONTRATO)');
			$stmt->bindParam(':OID_CONTRATO', $oidContrato);
			$stmt->execute();
			return "";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}


	function modificar_contrato($conexion, $contrato){

		$fechaInicio=date('d/m/Y', strtotime($contrato["inicioAlquiler"]));
		$fechaFin=date('d/m/Y', strtotime($contrato["finalAlquiler"]));
		try{
			$stmt=$conexion ->prepare('CALL MODIFICAR_CONTRATO(:oidContrato, :inicio, :final, :pago, :nif)');
			$stmt->bindParam(':oidContrato', $contrato["oid"]);
			$stmt->bindParam(':inicio', $fechaInicio);
			$stmt->bindParam(':final', $fechaFin);
			$stmt->bindParam(':pago', $contrato["pagoMensual"]);
			$stmt->bindParam(':nif', $contrato["nif"]);
			$stmt->execute();
			return"";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}


?>
