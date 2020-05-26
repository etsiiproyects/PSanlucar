<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionContratos.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	// Se recupera la variable de sesión y se anula
	if (isset($_SESSION["formulario"])) {
		$nuevoContrato = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
	}
	else 
		Header("Location: formularioContratos.php");	
	$conexion = crearConexionBD(); 
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promociones SanLucar: Contrato realizado con éxito</title>
</head>

<body>
	<?php
		include_once("cabecera.php");
	?>

	<main>
		<?php

			if(alta_contrato($conexion, $nuevoContrato)){
		?>
			<h1>El contrato en el que figura el DNI  <?php echo $nuevoContrato["nif"]; ?>, se ha realizado con exito</h1>
			<div >	
				Pulsa <a href="index.php">aquí</a> para acceder a la gestión de biblioteca.
			</div>
		<?php } else { ?>
			<h1>El contrato ya existe en la base de datos.</h1>
			<div >	
				Pulsa <a href="formularioContratos.php">aquí</a> para volver al formulario.
			</div>
		<?php } ?>

	</main>

	<?php
		include_once("footer.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>