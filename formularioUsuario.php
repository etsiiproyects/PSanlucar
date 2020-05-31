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
		$formulario['nif'] = "";

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
	<title>Promociones Sanlucar: Registro</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/validacionRegistro.js" type="text/javascript"></script>
</head>

<body>
<script>
		
			$("#registro").on("submit", function() {
				return validateForm();
			});

			
			$("#email").on("input", function(){
				$("#nick").val($(this).val());
			});

			
			$("#pass").on("keyup", function() {
				passwordColor();
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

		<a href="index.php"><img class="img-login" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>

		<form class="formLR" id="registro" method="get" action="validacion_formulario.php">

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

				<label for="nick">NIF: </label>
				<input class="input-group" id="nif" name="nif" type="text" size="30" required value="<?php echo $formulario['nif'];?>" />
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


</body>
</html>
