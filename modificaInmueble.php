<?php

	session_start();
	
	if(isset($_SESSION["inmueble"])) {
        $inmueble = $_SESSION["inmueble"];
	}
	else Header("Location: paginaprincipal.php");
	
	if(isset($_SESSION["errores"])) $errores = $_SESSION["errores"];

?>

<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar inmueble</title>
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
		<a href="index.php"><img class="img-registro" src="images/logo1.png" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="validacionModificaInmueble.php">
			<label for="id_inmueble">ID inmueble: </label>
			<input class="input-group" id="id_inmueble" name="id_inmuebleA" type="text" value="<?php echo $inmueble["ID_INMUEBLE"] ?>" />
			<br />
			<label for="direccion">Dirección: </label>
			<input class="input-group" id="direccion" name="direccionA" type="text" value="<?php echo $inmueble["DIRECCION"] ?>" />
			<br />
			<label for="habitaciones">Habitaciones: </label>
			<input class="input-group" id="habitaciones" name="habitacionesA" type="number" value="<?php echo $inmueble["HABITACIONES"] ?>" />
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
			<input class="input-group" id="imagen" name="imagenA" type="text" size="40" value="<?php echo $inmueble["IMG"] ?>" />
			<br />
			<input class="boton" type="submit" value="Confirmar cambios" />
		</form>
	</div>
</body>
