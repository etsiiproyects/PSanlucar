<?php

	function consultarInmueble($conexion, $identificador) {
		$consulta = "SELECT COUNT(*) AS TOTAL FROM INMUEBLES WHERE ID_INMUEBLE=:identificador";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':identificador', $identificador);
		$stmt->execute();
		return $stmt->fetchColumn();
	}

	function consultarTodosInmuebles($conexion) {
		$consulta = "SELECT * FROM INMUEBLES";
    	return $conexion->query($consulta);
	}

	function consultarTodosInmueblesLibres($conexion) {
		$consulta = "SELECT * FROM INMUEBLES WHERE ID_INMUEBLE NOT IN (SELECT ID_INMUEBLE FROM DEMANDAS NATURAL JOIN CONTRATOS WHERE SYSDATE BETWEEN INICIOALQUILER AND FINALQUILER)";
    	return $conexion->query($consulta);
	}

	function alta_inmueble($conexion, $inmueble) {
		try {
			$consulta='CALL insertar_inmueble(:id_inmueble, :direccion, :habitaciones, :img, :tipo)';
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':id_inmueble', $inmueble["id_inmueble"]);
			$stmt->bindParam(':direccion', $inmueble["direccion"]);
			$stmt->bindParam(':habitaciones', $inmueble["habitaciones"]);
			$stmt->bindParam(':img', $inmueble["img"]);
			$stmt->bindParam(':tipo', $inmueble["tipo"]);

			$stmt->execute();
			return true;
		}catch(PDOException $e) {
			return false;
		}
	}

	function quitar_inmueble($conexion, $idInmueble) {
		try{
			$stmt=$conexion->prepare('CALL QUITAR_INMUEBLE(:ID_INMUEBLE)');
			$stmt->bindParam(':ID_INMUEBLE', $idInmueble);
			$stmt->execute();
			return "";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}

	function modificar_inmueble($conexion, $inmueble) {
		try {
			$stmt = $conexion->prepare('CALL MODIFICAR_INMUEBLE(:id, :direccion, :hab, :img, :tipo)');
			$stmt->bindParam(':id', $inmueble["id_inmueble"]);
			$stmt->bindParam(':direccion', $inmueble["direccion"]);
			$stmt->bindParam(':hab', $inmueble["habitaciones"]);
			$stmt->bindParam(':img', $inmueble["img"]);
			$stmt->bindParam(':tipo',$inmueble["tipo"]);
			$stmt->execute();
			return "";
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}

?>
