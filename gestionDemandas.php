<?php

	require_once("gestionContratos.php");

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

	function consultarContratoExistente($conexion, $id_inmueble){
		$consulta = "SELECT * FROM CONTRATOS NATURAL JOIN DEMANDAS WHERE ID_INMUEBLE=:id_i AND SYSDATE BETWEEN INICIOALQUILER AND FINALQUILER";
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':id_i',$id_inmueble);
		$stmt->execute();
		return $stmt->fetchColumn();
	}
	function alta_demanda($conexion, $demanda) {
		try {
			$resultado = true;
			$fechaConFormatoOracle = date('d/m/Y', strtotime($usuario["fecha"]));
			 if(!consultarContratoExistente($conexion, $demanda["ID_INMUEBLE"])) {
				$consulta = "CALL INSERTAR_DEMANDA(:preciomax, :fechademanda, :num_mascota, :nif, :id_inmueble)";
				$stmt = $conexion->prepare($consulta);
				$stmt->bindParam(':preciomax', $demanda["precio"]);
				$stmt->bindParam(':fechademanda', $fechaConFormatoOracle);
				$stmt->bindParam(':num_mascota', $demanda["mascota"]);
				$stmt->bindParam(':nif', $demanda["nif"]);
				$stmt->bindParam(':id_inmueble', $demanda["id"]);
				$stmt->execute();
			 } else {
			 	$resultado = true;
			 }
			return $resultado;
		} catch(PDOException $e) {
			return false;;
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
