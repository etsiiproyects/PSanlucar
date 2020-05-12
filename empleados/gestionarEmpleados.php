<?php

function consultarEmpleado($conexion,$usuario,$pass) {
 	$consulta = "SELECT COUNT(*)  FROM EMPLEADO WHERE NOMBRE=:usuario AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':usuario',$usuario);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}
?>
