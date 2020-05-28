<?php
	session_start();

	include_once("gestionBD.php");
 
	if (!isset($_SESSION['formulario'])) {
		$formulario['nombre'] = "";
		$formulario['apellidos'] = "";
		$formulario['fechaNacimiento'] = "";
		$formulario['email'] = "";
		$formulario['pass'] = "";
		$formulario['confirmar'] = "";
		$formulario['nick'] = "";

		$_SESSION['formulario'] = $formulario;
	}else
		$formulario = $_SESSION['formulario'];
		
	if (isset($_SESSION["errores"]))
		$errores = $_SESSION["errores"];

	$conexion = crearConexionBD();
?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/validacionRegistro.js" type="text/javascript"></script>
</head>

<body>
<script>
		// Inicialización de elementos y eventos cuando el documento se carga completamente
		$(document).ready(function() {
			$("#registro").on("submit", function() {
				return validateForm();
			});

			// EJERCICIO 2: Manejador de evento para copiar automáticamente el email como nick del usuario
			$("#email").on("input", function(){
				$("#nick").val($(this).val());
			});

			// EJERCICIO 3: Manejador de evento del color de la contraseña
			$("#pass").on("keyup", function() {
				// Calculo el color
				passwordColor();
			});
		});
	</script>

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

		<form id="registro" method="get" action="validacion_formulario.php">

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

				<label for="nick">Nombre de usuario: </label>
				<input class="input-group" id="nick" name="nick" type="text" size="30" required value="<?php echo $formulario['nick'];?>" />
				<br />

				<label for="pass">Contraseña: </label>
				<input class="input-group" type="password" name="pass" id="pass" placeholder="Mínimo 8 caracteres" required oninput="passwordValidation(); " />
				<br />

				<label for="confirmar">Confirmar contraseña: </label>
				<input class="input-group" type="password" name="confirmar" id="confirmar" placeholder="Confirmación de contraseña" oninput="passwordConfirmation();" required />
				<br />
			<br>
			<input class="boton" type="submit" value="Confirmar" />
		</form>
	</div>

	<?php include_once("footer.php") ?>

</body>
</html>
