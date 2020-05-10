<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("clientes/gestionUsuarios.php");


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
<title>Promociones Sanlucar Web</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<?php include_once("cabecera.php"); ?>

    <section class="contenido">
    <h2> Descripcion: </h2>
    <p> Aquí se mostraria informacion general sobre la empresa, asi como los inmuebles existentes. </p>
	</section>
	
<?php include_once("footer.php") ?>

</body>
</html>
