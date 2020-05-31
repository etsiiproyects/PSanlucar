<?php

	session_start();
	
	if(isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
	}
	else Header("Location: paginaprincipal.php");
	
	if(isset($_SESSION["errores"])) $errores = $_SESSION["errores"]; unset ($_SESSION["errores"]);
		
?>


<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar usuario</title>
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
	
	<div class="modificaU">
		<a href="index.php"><img class="img-registro" src="images/logo1.png" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="validacionModificaUsuario.php">
			<label for="nombre">Nombre: </label>
			<input class="input-group" id="nombre" name="nombreA" type="text" value="<?php echo $usuario["nombre"] ?>" />
			<br />
			<label for="apellidos">Apellidos: </label>
			<input class="input-group" id="apellidos" name="apellidosA" type="text" value="<?php echo $usuario["apellidos"] ?>" />
			<br />
			<label for="email">Email: </label>
			<input class="input-group" id="email" name="emailA" type="email" value="<?php echo $usuario["email"] ?>" />
			<br />
			<label for="email">Contraseña: </label>
			<input class="input-group" id="email" name="passA" type="pass" value="<?php echo $usuario["pass"] ?>" />
			<br />
			<label for="email">Confirma contraseña: </label>
			<input class="input-group" id="email" name="confirmPassA" type="pass" value="<?php echo $usuario["confirmPass"] ?>" />
			<br />
			<label for="nif">NIF: </label>
			<input class="input-group" id="nif" name="nifA" type="text" size="30" value="<?php echo $usuario["nif"] ?>" readonly/>
			<br />
			<input class="boton" type="submit" value="Confirmar cambios" />
		</form>
	</div>
</body>
