<?php
	
	function consultarDemanda($conexion, $demanda)  {
		$nif = $demanda["nif"];
		$consulta = "SELECT COUNT(*) AS TOTAL FROM DEMANDAS WHERE NIF=:nif";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif', $nif);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	
	function consultarTodasDemandas($conexion) {
		$consulta = "SELECT * FROM DEMANDAS";
		return $conexion->query($consulta);
  	}

	function consultarDemandasUsuario($conexion, $nif){
		$consulta = "SELECT * FROM DEMANDA WHERE NIF=:nif";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif', $nif);
		$stmt->execute();
		return $stmt->fetch();
	}
	
		function alta_demanda($conexion, $demanda) {
		try {
			$resultado = true;
			if(!consultarContrato($conexion, $demanda)) {
				$consulta = 'CALL INSERTA_CONTRATO(:preciomax, :fechademanda, :num_mascota, :nif, :id_inmueble)';
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':preciomax', $demanda["precioMax"]);
				$stmt->bindParam(':fechademanda', $demanda["fechaDemanda"]);
				$stmt->bindParam(':num_mascota', $demanda["numMascotas"]);
				$stmt->bindParam(':nif', $demanda["nif"]);
				$stmt->bindParam(':id_inmueble', $demanda["idInmueble"]);
				$stmt->execute();
			} else {
				$resultado = false;
			}
			return $resultado;
		} catch(PDOException $e) {
			echo "error: " . $e->GetMessage();
		}
	}

	function quitar_contrato($conexion, $oidDemanda){
		try{
			$stmt=$conexion -> prepare('CALL QUITAR_CONTRATO(:OID_DEMANDA)');
			$stmt->bindParam(':OID_DEMANDA', $oidDemanda);
			$stmt->execute();
			return "";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}

?>