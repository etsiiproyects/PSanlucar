<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión
     * #	de libros de la capa de acceso a datos
     * #==========================================================#
     */
	function consultarTodosInmuebles($conexion) {
		$consulta = "SELECT id_inmueble, direccion, habitaciones, tipo FROM INMUEBLES";
    	return $conexion->query($consulta);
	}

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

	function alta_inmueble($conexion, $inmueble) {
		try {
			$resultado = true;
			$identificador = $inmueble["id_inmueble"];
			if(!consultarInmueble($conexion, $identificador)) {
				$consulta = 'CALL INSERTAR_INMUEBLE(:id_inmueble, :direccion, :habitaciones, :tipo)';
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':id_inmueble', $inmueble["id_inmueble"]);
				$stmt->bindParam(':direccion', $inmueble["direccion"]);
				$stmt->bindParam(':habitaciones', $inmueble["habitaciones"]);
				$stmt->bindParam(':tipo', $inmueble["tipo"]);
				$stmt->execute();
			} else {
				$resultado = false;
			}
			return $resultado;
		} catch(PDOException $e) {
			echo "error: " .$e->GetMessage();
		}
	}

	function quitar_inmueble($conexion, $idInmueble) {
		try{
			$stmt=$conexion->prepare('CALL QUITAR_INMUEBLE(:IdInmueble)');
			$stmt->bindParam(':IdInmueble', $IdInmueble);
			$stmt->execute();
			return"";
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}

?>
