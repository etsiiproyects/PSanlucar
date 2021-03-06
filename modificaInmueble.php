<?php

	session_start();
	
	if(isset($_SESSION["inmueble"])) {
        $inmueble = $_SESSION["inmueble"];
	}
	else Header("Location: paginaprincipal.php");
	
	if(isset($_SESSION["errores"])) $errores = $_SESSION["errores"]; unset ($_SESSION["errores"]);
		
?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar inmueble</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/validacionInmueble.js" type="text/javascript"></script>
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
		<a href="index.php"><img class="img-login" src="images/logo1.png" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="validacionModificaInmueble.php">
			<label for="id_inmueble">ID inmueble: </label>
			<input class="input-group" id="id_inmueble" name="id_inmuebleA" type="text" value="<?php echo $inmueble["ID_INMUEBLE"] ?>" oninput="nameValidation();" />
			<br />
			<label for="direccion">Dirección: </label>
			<input class="input-group" id="direccion" name="direccionA" type="text" value="<?php echo $inmueble["DIRECCION"] ?>" />
			<br />
			<label for="habitaciones">Habitaciones: </label>
			<input class="input-group" id="habitaciones" name="habitacionesA" min="0" max="10" type="number" value="<?php echo $inmueble["HABITACIONES"] ?>" />
			<br />
			<label>Tipo inmueble:</label>
				<label>
					<input name="tipoA" type="radio" value="aislado" <?php if($inmueble['TIPO']=='aislado') echo ' checked ';?>/>
				Aislado</label>
				<label>
					<input name="tipoA" type="radio" value="plurifamiliar" <?php if($inmueble['TIPO']=='plurifamiliar') echo ' checked ';?>/>
				Plurifamiliar</label>
				<label>
					<input name="tipoA" type="radio" value="comercial" <?php if($inmueble['TIPO']=='comercial') echo ' checked ';?>/>
				Comercial</label>
    			<br />
			<label for="imagen">URL imagen: </label>
			<input class="input-group" id="imagen" name="imagenA" type="url" size="40" value="<?php echo $inmueble["IMG"] ?>" oninput="URLValidation();" />
			<br />
			<input class="boton" type="submit" value="Confirmar cambios" />
		</form>
	</div>
</body>
</html>
