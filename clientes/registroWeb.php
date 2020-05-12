<?php
	session_start();

	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['formulario'])) {
		$formulario['nombre'] = "";
		$formulario['apellidos'] = "";
		$formulario['fechaNacimiento'] = "";
		$formulario['email'] = "";
		$formulario['pass'] = "";
		$formulario['confirmar'] = "";
		$formulario['nick'] = "";

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
	<div class="iniciosesion">

		<a href="../index.php"><img class="img-registro" src="../images/logo1.PNG" alt="Promociones Sanlúcar" /></a>

		<form id="registro" method="get" action="validacion_formulario.php" onsubmit="return validateForm()">
<!--
			<fieldset>
				<legend>
					Datos personales
				</legend>

				<label for="nif"><em>*</em>NIF: </label>
				<input class="input-group" id="nif" name="nif" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos y una letra mayúscula" value="<?php echo $formulario['nif'];?>" required />
				<br />
		  		-->
				<label for="nombre">Nombre: </label>
				<input class="input-group" id="nombre" name="nombre" type="text" size="30" value="<?php echo $formulario['nombre'];?>" required />
				<br />

				<label for="apellidos">Apellidos: </label>
				<input class="input-group" id="apellidos" name="apellidos" type="text" size="60" value="<?php echo $formulario['apellidos'];?>" required />
				<br />

				<label for="email">Email: </label>
				<input class="input-group" id="email" name="email" type="email" placeholder="usuario@dominio.extension" size="60" value="<?php echo $formulario['email'];?>" required />
				<br />

				<label for="fechaNacimiento">Fecha de nacimiento: </label>
				<input class="input-group" type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $formulario['fechaNacimiento'];?>" required />
				<br />
<!--
				<label for="tipo">Tipo de inmueble deseado: </label>
				<label>Comercial</label>
					<input name="tipo" type="checkbox" value="COMERCIAL" />
				<label>Plurifamiliar</label>
					<input name="tipo" type="checkbox" value="PLURIFAMILIAR"  />
				<label>Aislado</label>
					<input name="tipo" type="checkbox" value="AISLADO" />
			</fieldset>

			<fieldset>
				<legend>Dirección</legend>
				<label for="calle">Calle/Avenida: </label>
				<input class="input-group" id="calle" name="calle" type="text" size="60" value="<?php echo $formulario['calle'];?>" />
				<br />

				<label for="provincia">Provincia: </label>
				<input list="opcionesProvincias" name="provincia" id="provincia" value="<?php echo $formulario['provincia'];?>"/>
				<datalist id="opcionesProvincias">
					<option value="Cádiz">Cádiz</option>
					<option value="Sevilla">Sevilla</option>
					<option value="Málaga">Málaga</option>
					<option value="Huelva">Huelva</option>
					<option value="Jaén">Jaén</option>
					<option value="Córdoba">Córdoba</option>
					<option value="Almería">Almería</option>
					<option value="Granada">Granada</option>
					<option value="Otra">Otra</option>
				</datalist>
				<br />
			</fieldset>

			<fieldset>

				<legend>Datos de usuario</legend> 	-->


				<label for="nick">Nombre de usuario: </label>
				<input class="input-group" id="nick" name="nick" type="text" size="30" required value="<?php echo $formulario['nick'];?>" />
				<br />

				<label for="pass">Contraseña: </label>
				<input class="input-group" type="password" name="pass" id="contraseña" placeholder="Mínimo 8 caracteres" required="" />
				<br />

				<label for="confirmar">Confirmar contraseña: </label>
				<input class="input-group" type="password" name="confirmar" id="confirmar" placeholder="Confirmación de contraseña" required="" />
				<br />
			<!-- </fieldset>  -->
			<br>
			<input class="boton" type="submit" value="Confirmar" />
		</form>
	</div>

	<?php include_once("../footer.php") ?>

</body>
</html>
