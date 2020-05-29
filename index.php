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
		if(!$funct){
			$login["usuario"] = $email;
			$login["pass"] = $pass;
		}
		else{
			$_SESSION["login"] = $email;
			Header("Location: index.php");
		}
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Promociones Sanlucar Web</title>
<link rel="stylesheet" type="text/css" href="css/excepcion.css">
<link rel="stylesheet" type="text/css" href="css/menuNav.css">
<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
<script src="js/responsive.js" type="text/javascript"></script>
</head>
<body>

<?php include_once("cabecera.php"); ?>

    <div class="bloque">
		<h2> Descripcion: </h2>
		<p> Aquí se mostraria informacion general sobre la empresa, asi como los inmuebles existentes. </p>
	</div>

<?php include_once("footer.php") ?>

<script type="text/javascript">
	navSlide();
</script>
</body>
</html>
