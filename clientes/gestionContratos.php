<?php

	function consultarContrato($conexion, $contrato)  {
		$dni = $contrato["dni"];
		$consulta = "SELECT COUNT(*) AS TOTAL FROM CONTRATOS WHERE DNI=:dni";
		$stmt = $conexion->prepara($consulta);
		$stmt->bindParam(':dni', $dni);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	
	function alta_contrato($conexion, $contrato) {
		try {
			$resultado = true;
			if(!consultarContrato($conexion, $contrato)) {
				$consulta = 'CALL INSERTA_CONTRATO(:inicio, :final, :pago, :fianza, :nif)';
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':inicio', $contrato["inicioAlquiler"]);
				$stmt->bindParam(':final', $contrato["finalAlquiler"]);
				$stmt->bindParam(':pago', $contrato["pagoMensual"]);
				$stmt->bindParam(':fianza', $contrato["fianza"]);
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


?>