<?php
	
	function consultarDemanda($conexion, $demanda)  {
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
				$consulta = 'CALL INSERTA_DEMANDA(:preciomax, :fechademanda, :num_mascota, :nif, :id_inmueble)';
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':preciomax', $demanda["PRECIOMAX"]);
				$stmt->bindParam(':fechademanda', $demanda["FECHADEMANDA"]);
				$stmt->bindParam(':num_mascota', $demanda["NUM_MASCOTA"]);
				$stmt->bindParam(':nif', $demanda["NIF"]);
				$stmt->bindParam(':id_inmueble', $demanda["ID_INMUEBLE"]);
				$stmt->execute();
			} else {
				$resultado = false;
			}
			return $resultado;
		} catch(PDOException $e) {
			echo "error: " . $e->GetMessage();
		}
	}

	function quitar_demanda($conexion, $oidDemanda){
		try{
			$stmt=$conexion -> prepare('CALL QUITAR_DEMANDA(:OID_DEMANDA)');
			$stmt->bindParam(':OID_DEMANDA', $oidDemanda);
			$stmt->execute();
			return "";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}

?>