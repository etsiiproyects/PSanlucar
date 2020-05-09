<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$formulario['inicioAlquiler'] = "";
		$formulario['finalAlquiler'] = "";
		$formulario['pagoMensual'] = "";
		$formulario['fianza'] = "";
		$formulario['nif'] = "";
	
		$_SESSION['formulario'] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION['formulario'];


	// Si hay errores de validación, hay que mostrarlos y marcar los campos (El estilo viene dado y ya se explicará)
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];
?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
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
	<div class="contratos">

		<a href="../index.php"><img class="img-registro" src="../images/logo1.PNG" alt="Promociones Sanlúcar" /></a>

		<form id="registro" method="get" action="validacionContratos.php" onsubmit="return validateForm()">

				<legend>
					Datos del contrato
				</legend>
				<br />

		  		<label for="inicioAlquiler">Inicio del alquiler: </label>
				<input class="input-group" type="date" id="inicioAlquiler" name="inicioAlquiler" value="<?php echo $formulario['inicioAlquiler'];?>" required />
				<br />
				
				<label for="finalAlquiler">Final del alquiler: </label>
				<input class="input-group" type="date" id="finalAlquiler" name="finalAlquiler" value="<?php echo $formulario['finalAlquiler'];?>" required />
				<br />
				
				<label for="pagoMensual">Pago Mensual: </label>
				<input class="input-group" id="pagoMensual" name="pagoMensual" type="text" size="5" value="<?php echo $formulario['pagoMensual'];?>" required />
				<br />
				
				<label for="fianza">Importe de la fianza: </label>
				<input class="input-group" id="fianza" name="fianza" type="text" size="5" value="<?php echo $formulario['fianza'];?>" required />
				<br />
				
				<label for="nif"><em>*</em>NIF: </label>
				<input class="input-group" id="nif" name="nif" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos y una letra mayúscula" value="<?php echo $formulario['nif'];?>" required />
				<br />
				
			<!-- </fieldset>  -->
			<br>
			<input class="boton" type="submit" value="Confirmar" />
		</form>
	</div>

	<?php include_once("../footer.php") ?>

</body>
</html>