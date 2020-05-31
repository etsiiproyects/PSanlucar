<?php

function alta_usuario($conexion,$usuario) {
	try{
	$resultado = true;
	$email = $usuario["email"];
	$pass = $usuario["pass"];
  	$fechaConFormatoOracle = date('d/m/Y', strtotime($usuario["fechaNacimiento"]));
	if(!consultarUsuario($conexion, $email, $pass)) {
		$consulta = 'CALL INSERTAR_USUARIO(:nombre,:apellidos,:email,:pass,:nif, :fecha)';
		$stmt = $conexion->prepare($consulta);
		$stmt->bindParam(':nif',$usuario["nif"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':apellidos',$usuario["apellidos"]);
		$stmt->bindParam(':fecha',$fechaConFormatoOracle);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':pass',$usuario["pass"]);
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
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}

function consultarContratosUsuario($conexion,$email, $pass){
	$consulta = "SELECT * FROM USUARIOS NATURAL JOIN DEMANDAS NATURAL JOIN CONTRATOS WHERE EMAIL=:email AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchAll();
}

function consultarDatosUsuario($conexion,$email, $pass){
	$consulta = "SELECT * FROM USUARIOS WHERE EMAIL=:email AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetch();
}

function quitar_usuario($conexion, $nick){
	try{
			$stmt=$conexion->prepare('CALL QUITAR_USUARIO(:nick)');
			$stmt->bindParam(':nick', $nick);
			$stmt->execute();
			return 0;
		}catch(PDOException $e) {
			return $e->getMessage();
		}
}

function modificar_usuario($conexion, $usuario) {
	try{
			$stmt = $conexion->prepare('CALL MODIFICAR_USUARIO(:nif, :nombre, :apellidos, :email, :pass)');
			$stmt->bindParam(':nif', $usuario["nif"]);
			$stmt->bindParam(':nombre', $usuario["nombre"]);
			$stmt->bindParam(':apellidos', $usuario["apellidos"]);
			$stmt->bindParam(':email', $usuario["email"]);
			$stmt->bindParam(':pass',$usuario["pass"]);
			$stmt->execute();
			return "";
		} catch(PDOException $e) {
			return $e->getMessage();
		}
	}


?>
