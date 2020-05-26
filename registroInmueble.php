<?php
	session_start();
	if(!isset($_SESSION['loginEmpleado'])) header("Location: loginEmpleados.php");
	if(!isset($_SESSION['formulario'])) {
		$formulario['id_inmueble'] = "";
		$formulario['direccion'] = "";
		$formulario['habitaciones'] = "";
		$formulario['tipo'] = "AISLADO";

		$_SESSION['formulario'] = $formulario;

	} else {
		$formulario = $_SESSION['formulario'];
	}

	if (isset($_SESSION["errores"])) {
		$errores = $_SESSION["errores"];
	}

?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Registro inmueble</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" />
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

		<form id="registro" method="get" action="validacion_inmueble.php" onsubmit="return validateForm()">

				<label for="id_inmueble">Identificador: </label>
				<input class="input-group" id="id_inmueble" name="id_inmueble" type="text" placeholder="00.00" size="10" value="<?php echo $formulario['id_inmueble'];?>" required />
				<br />

				<label for="direccion">Direccion: </label>
				<input class="input-group" id="direccion" name="direccion" type="text" size="60" value="<?php echo $formulario['direccion'];?>" required />
				<br />

				<label>Tipo inmueble:</label>
				<label>
					<input name="tipo" type="radio" value="AISLADO" <?php if($formulario['tipo']=='AISLADO') echo ' checked ';?>/>
					Aislado</label>
				<label>
					<input name="tipo" type="radio" value="PLURIFAMILIAR" <?php if($formulario['tipo']=='PLURIFAMILIAR') echo ' checked ';?>/>
					Plurifamiliar</label>
				<label>
					<input name="tipo" type="radio" value="COMERCIAL" <?php if($formulario['tipo']=='COMERCIAL') echo ' checked ';?>/>
					Comercial</label>
				<br />

				<label for="habitaciones">Número de habitaciones: </label>
				<input class="input-group" type="number" id="habitaciones" name="habitaciones" min="1" max="7" value="<?php echo $formulario['habitaciones'];?>" required />
				<br />
			<br>
			<input class="boton" type="submit" value="Confirmar" />
		</form>
	</div>

	<?php include_once("footer.php") ?>

</body>
</html>
