<?php

function consultarEmpleado($conexion,$usuario,$pass) {
 	$consulta = "SELECT COUNT(*)  FROM EMPLEADO WHERE NOMBRE=:nombre AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':nombre',$usuario);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}
?>
