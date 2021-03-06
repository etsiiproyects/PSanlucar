<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("gestionUsuarios.php");

	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$pass = $_POST['pass'];

		$conexion = crearConexionBD();
		$funct = consultarUsuario($conexion,$email,$pass);
		cerrarConexionBD($conexion);

		if($funct>0){
			$login["usuario"] = $email;
			$login["pass"] = $pass;
			$_SESSION["login"] = $login;
			Header("Location: paginaprincipal.php");
		}
		else{
			$login["usuario"] = $email;
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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
  <title>Promociones SanLucar: Login</title>
</head>

<body>

<main>

	<?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}
	?>

	<div class="contenidoF">
	<div class="iniciosesion">
		<a href="index.php"><img class="img-login" src="images/logo1.PNG" alt="Promociones Sanlúcar" /></a>
		<form class="formLR" action="login.php" method="post">
			<div class="input-group"><label for="email">Email: </label>
			<input type="email" name="email" id="email" /></div>
			<div class="input-group"><label for="pass">Contraseña: </label>
			<input type="password" name="pass" id="pass" /></div>
			<input class="boton" type="submit" name="submit" value="Iniciar Sesion" />
		</form>

		<p>¿No estás registrado? <a href="formularioUsuario.php">¡Registrate!</a></p>
		<p><a href="loginEmpleados.php"> Empleados </a></p>
	</div>
	</div>
</main>
</body>
</html>
