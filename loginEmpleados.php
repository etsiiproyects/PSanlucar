<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("gestionarEmpleados.php");


	if (isset($_POST['submit'])) {
		$nombre= $_POST['usuario'];
		$pass = $_POST['pass'];

		$conexion = crearConexionBD();
		$funct = consultarEmpleado($conexion,$nombre,$pass);
		cerrarConexionBD($conexion);
		if($funct>0) {
			$_SESSION["loginEmpleado"] = $nombre;
			Header("Location: paginaprincipal.php");
		}
		else {
			$login["usuario"] = $nombre;
			$login["pass"] = $pass;

		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="css/formularios.css" />
  <link rel="stylesheet" type="text/css" href="css/responsive.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
  <title>Login Empleados</title>
</head>

<body>
	<main>

		<?php
			if (isset($login)) {
		    	echo "<div class=\"error\">";
				echo "Error en la contraseña o no existe el empleado</h4>";
	    		echo "</div>";
	  		}
		?>
	<div class="contenidoF">
	<div class="iniciosesion">

		<a href="index.php"><img class="img-login" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>
		<form class="formLR" method="post" action="loginEmpleados.php">
			<div class="input-group"><label for="usuario">Nombre: </label>
			<input type="text" name="usuario" id="usuario" /></div>
			<div class="input-group"><label for="pass">Contraseña: </label>
			<input type="password" name="pass" id="pass" /></div>
			<input class="boton" type="submit" name="submit" value="Iniciar Sesion" />
		</form>

	</div>
	</div>
</body>
</html>
