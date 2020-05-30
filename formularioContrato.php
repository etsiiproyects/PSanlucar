<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['contrato']) && isset($_SESSION["demanda"])) {
		$demanda = $_SESSION["demanda"];
		echo $demanda["PRECIOMAX"];
		$contrato['inicioAlquiler'] = $demanda["FECHADEMANDA"];
		$contrato['finalAlquiler'] = "";
		$contrato['pagoMensual'] = $demanda["PRECIOMAX"];
		$contrato['fianza'] = $demanda["PRECIOMAX"];
		$contrato['oid_demanda'] = $demanda["OID_DEMANDA"];

		$_SESSION['contrato'] = $contrato;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$contrato = $_SESSION['contrato'];


	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
		unset($_SESSION["errores"]);
?>

 <!DOCTYPE html>
 <html lang="en">
     <head>
        <meta charset="utf-8">
        <title>Gestion Promociones Sanlucar: Alta Inmueble</title>
        <link rel="stylesheet" type="text/css" href="css/formularios.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/validacionInmueble.js" type="text/javascript"></script>
     </head>
     <body>
	<script>
	$(document).ready(function() {
			$("#contratoAlta").on("submit", function() {
				return validateContrato();
			});
		});
	</script>
		<?php
		if (isset($errores) && count($errores)>0) {
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error;
    		echo "</div>";
  		}
	?>
	<div class="iniciosesion">

		<a href="index.php"><img class="img-registro" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>

		<form id="contratoAlta" method="get" action="validacionContratos.php">

		  		<label for="inicioAlquiler">Inicio del alquiler: </label>
				<input class="input-group" type="date" id="inicioAlquiler" name="inicioAlquiler" value="<?php echo $contrato['inicioAlquiler'];?>" required />
				<br />

				<label for="finalAlquiler">Final del alquiler: </label>
				<input class="input-group" type="date" id="finalAlquiler" name="finalAlquiler" value="<?php echo $contrato['finalAlquiler'];?>" required />
				<br />

				<label for="pagoMensual">Pago Mensual: </label>
				<input class="input-group" id="pagoMensual" name="pagoMensual" type="number" size="5" value="<?php echo $contrato['pagoMensual'];?>" readonly />
				<br />

				<label for="fianza">Importe de la fianza: </label>
				<input class="input-group" id="fianza" name="fianza" type="number" size="5" value="<?php echo $contrato['fianza'];?>" readonly />
				<br />

				<label for="oid">OID: </label>
				<input class="input-group" id="oid" name="oid_demanda" type="text" size="5" value="<?php echo $contrato['oid_demanda'];?>"  readonly />
				<br />

			<br>
			<input class="boton" type="submit" value="Confirmar" />
		</form>
	</div>

	<?php include_once("footer.php") ?>

</body>
</html>
