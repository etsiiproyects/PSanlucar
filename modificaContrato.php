<?php

	session_start();

	if(isset($_SESSION["contrato"])) {
		$contrato = $_SESSION["contrato"];
	}
	else header("Location: consulta_contratos.php");
	
	if (isset($_SESSION["errores"])) $errores = $_SESSION["errores"];

?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar contrato</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
</head>

<body>
	
	<?php
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) {
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error;
    		echo "</div>";
  		}
	?>

	<div class="iniciosesion">
		<a href="index.php"><img class="img-registro" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="validacionModificaContrato.php">
			<input type="text" name="oid" value=""<?php echo $contrato['OID_CONTRATO'] ?>"" hidden>
			<label for="inicioAlquiler">Inicio alquiler: </label>
			<input class="input-group" id="inicioAlquiler" name="inicioAlquiler" type="date" />
			<?php
				$inicio= $contrato['INICIOALQUILER'];
				$fin=$contrato['FINALQUILER'];
			 ?>

			<br />
			<label for="finAlquiler">Fin alquiler: </label>
			<input class="input-group" id="finAlquiler" name="finAlquiler" type="date" value="<?php echo $contrato['FINALQUILER'] ?>" />
			<br />
			<label for="pagoMensual">Pago mensual: </label>
			<input class="input-group" id="pagoMensual" name="pagoMensual" type="text" value="<?php echo $contrato['PAGOMENSUAL'] ?>" />
			<br />
			<label for="nif">NIF: </label>
			<input class="input-group" id="nif" name="nif" type="text" value="<?php echo $contrato['NIF'] ?>" />
			<br />
			<input class="boton" type="submit" value="Confirmar cambios" />
		</form>
	</div>

	<script>
		window.onload= function() {
			var ia1 = '<?php echo $inicio; ?>';
			var array=ia1.split("/");
			let ia = document.getElementById("inicioAlquiler");
			let fecha="20" + array[2] + "-" + array[1] + "-" + array[0];
			ia.value = fecha;

			var fa1 = '<?php echo $fin; ?>';
			var array1=fa1.split("/");
			let fa = document.getElementById("finAlquiler");
			let fecha1="20" + array1[2] + "-" + array1[1] + "-" + array1[0];
			fa.value = fecha1;
		};
	</script>

</body>
