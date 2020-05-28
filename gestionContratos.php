<?php

	function consultarContrato($conexion, $contrato)  {
		$nif = $contrato["nif"];
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
		$consulta = "SELECT * FROM CONTRATO WHERE NIF=:nif";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif', $nif);
		$stmt->execute();
		return $stmt->fetch();
	}
	
	function alta_contrato($conexion, $contrato) {
		try {
			$resultado = true;
			if(!consultarContrato($conexion, $contrato)) {
				$consulta = 'CALL INSERTA_CONTRATO(:inicio, :final, :pago, :fianza, :oid, :nif)';
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':inicio', $contrato["inicioAlquiler"]);
				$stmt->bindParam(':final', $contrato["finalAlquiler"]);
				$stmt->bindParam(':pago', $contrato["pagoMensual"]);
				$stmt->bindParam(':fianza', $contrato["fianza"]);
				$stmt->bindParam(':oid', $contrato["oid"]);
				$stmt->bindParam(':nif', $contrato["nif"]);
				$stmt->execute();
			} else {
				$resultado = false;
			}
			return $resultado;
		} catch(PDOException $e) {
			echo "error: " . $e->GetMessage();
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


?>