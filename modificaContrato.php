<?php

	session_start();
	
	if(isset($_REQUEST["OID_CONTRATO"])) {
		$contrato["INICIOALQUILER"] = $_REQUEST["INICIOALQUILER"];
		$contrato["FINALQUILER"] = $_REQUEST["FINALQUILER"];
		$contrato["PAGOMENSUAL"] = $_REQUEST["PAGOMENSUAL"];
		$contrato["NIF"] = $_REQUEST["NIF"];
		$contrato["OID_CONTRATO"] = $_REQUEST["OID_CONTRATO"];
		
		$_SESSION["contrato"] = $contrato;
	}
	else header("Location: consulta_contratos.php");

?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar contrato</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
</head>

<body>
	
	<div class="iniciosesion">
		<form id="registro" method="get" action="accion_modificar_contrato.php"></form>
		<label for="INICIOALQUILER">Inicio alquiler: </label>
		<input class="input-group" id="INICIOALQUILER" name="INICIOALQUILER" type="date" value="<?php echo $contrato['INICIOALQUILER'] ?>" />
	</div>
	
</body>