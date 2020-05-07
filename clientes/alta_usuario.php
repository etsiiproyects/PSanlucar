<?php
	session_start();

	require_once("../gestionBD.php");
	require_once("gestionUsuarios.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	// Se recupera la variable de sesión y se anula
	if (isset($_SESSION["formulario"])) {
		$nuevoUsuario = $_SESSION["formulario"];
		$_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
		// Header("Location: login.php");
	}
	else 
		Header("Location: registroWeb.php");	
	$conexion = crearConexionBD(); 
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promociones SanLucar: Alta de Usuario realizada con éxito</title>
</head>

<body>
	<?php
		include_once("../cabecera.php");
	?>

	<main>
		<?php

			if(alta_usuario($conexion, $nuevoUsuario)){
		?>
			<h1>Hola <?php echo $nuevoUsuario["nombre"]; ?>, gracias por registrarte</h1>
			<div >	
				Pulsa <a href="index.php">aquí</a> para acceder a la gestión de biblioteca.
			</div>
		<?php } else { ?>
			<h1>El usuario ya existe en la base de datos.</h1>
			<div >	
				Pulsa <a href="registroWeb.php">aquí</a> para volver al formulario.
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