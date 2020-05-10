<?php
	session_start();

	require_once("../gestionBD.php");
	require_once("gestionarInmuebles.php");
	
	
	if (isset($_SESSION["formulario"])) {
		$nuevoInmueble = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: registroInmueble.php");	
	$conexion = crearConexionBD(); 
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promociones Sanlucar: Alta de inmueble</title>
</head>

<body>
	<?php
		include_once("../cabecera.php");
	?>

	<main>
		<?php

			if(alta_inmueble($conexion, $nuevoInmueble)) {
		?>
			<h1>El inmueble con ID <?php echo $nuevoInmueble["id_inmueble"]; ?> registrado con éxito</h1>
			<div >	
				Pulsa <a href="consulta_inmuebles.php">aquí</a> para acceder a la lista de los inmuebles.
			</div>
		<?php } else { ?>
			<h1>El inmueble ya existe en la base de datos.</h1>
			<div >	
				Pulsa <a href="registroInmueble.php">aquí</a> para volver al formulario.
			</div>
		<?php } ?>

	</main>

	<?php
		include_once("../footer.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>