<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionarInmuebles.php");

    if(isset($_SESSION["formulario"])) {
        $nuevoInmueble=$_SESSION["formulario"];
        $_SESSION["formulario"] = null;
		$_SESSION["errores"] = null;
    }else Header("Location: registroInmueble.php");

    $conexion=crearConexionBD();

 ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Gestion Promociones Sanlucar: Alta Inmueble realizada con exito</title>
    </head>
    <body>
        <main>
		<?php
			if(alta_inmueble($conexion, $nuevoInmueble)) Header("Location: consulta_inmuebles.php");
		 else { ?>
			<h1>El inmueble ya existe en la base de datos.</h1>
			<div >
				Pulsa <a href="registroInmueble.php">aquí</a> para volver al formulario.
			</div>
		<?php } ?>

	</main>
    </body>
</html>
