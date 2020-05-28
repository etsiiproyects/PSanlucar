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
		<a href="index.php"><img class="img-registro" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="accion_modificar_contrato.php"></form>
		<label for="INICIOALQUILER">Inicio alquiler: </label>
		<input class="input-group" id="INICIOALQUILER" name="INICIOALQUILER" type="date" />
		<?php $inicio= $contrato['INICIOALQUILER'] ?>

		<br />
		<label for="FINALQUILER">Fin alquiler: </label>
		<input class="input-group" id="FINALQUILER" name="FINALQUILER" type="text" value="<?php echo $contrato['FINALQUILER'] ?>" />
		<br />
		<label for="PAGOMENSUAL">Pago mensual: </label>
		<input class="input-group" id="PAGOMENSUAL" name="PAGOMENSUAL" type="text" value="<?php echo $contrato['PAGOMENSUAL'] ?>" />
		<br />
		<label for="NIF">NIF: </label>
		<input class="input-group" id="NIF" name="NIF" type="text" value="<?php echo $contrato['NIF'] ?>" />
		<br />
		<input class="boton" type="submit" value="Confirmar cambios" />
	</div>

	<script>
		$(document).ready(function() {
			let ia1 = "<?php $inicio ?>";
			ia1.split("/");
			let ia = document.getElementById("INICIOALQUILER");
			let fecha="20" + ia1[2] + "-" + ia1[1] + "-" + ia1[0];
			ia.value = fecha;
		})
	</script>

</body>
