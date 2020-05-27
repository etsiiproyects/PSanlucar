<?php

	function consultarTodosContratos($conexion) {
  		$consulta = "SELECT * FROM CONTRATOS";
  		return $conexion->query($consulta);
	}

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

	function alta_inmueble($conexion, $inmueble) {
		try {
			$consulta='CALL insertar_inmueble(:id_inmueble, :direccion, :habitaciones, :tipo)';
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':id_inmueble', $inmueble["id_inmueble"]);
			$stmt->bindParam(':direccion', $inmueble["direccion"]);
			$stmt->bindParam(':habitaciones', $inmueble["habitaciones"]);
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

?>
