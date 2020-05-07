<?php

function alta_usuario($conexion,$usuario) {
	try{
	$resultado = true;
    // $fechaConFormatoOracle = date('d/m/Y', strtotime($usuario["fechaNacimiento"]));
	if(!consultarUsuario($conexion, $usuario)){
		$consulta = 'CALL INSERTA_USUARIO(:nombre,:apellidos,:email,:pass,:nick)';
		$stmt = $conexion->prepare($consulta);
	// $stmt->bindParam(':nif',$usuario["nif"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':apellidos',$usuario["apellidos"]);
		// $stmt->bindParam(':fecha',$fechaConFormatoOracle);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':pass',$usuario["contraseña"]);
        $stmt->bindParam(':nick',$usuario["nick"]);
		$stmt->execute();
	}else
		$resultado=false;
	return $resultado;
	}
	catch(PDOException $e){
		echo "error: ".$e->GetMessage();
	}
	
}

function consultarUsuario($conexion,$email, $pass) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND CONTRASEÑA=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}
?>