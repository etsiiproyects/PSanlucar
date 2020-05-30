<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarInmuebles.php");
	require_once("paginacion_consulta.php");

	if(!isset($_SESSION['login']) && !isset($_SESSION['loginEmpleado'])) {
		header("Location: login.php");
	} else {
		if(isset($_SESSION["inmueble"])) {
			$inmueble = $_SESSION["inmueble"];
			unset($_SESSION["inmueble"]);
		}
    }
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promociones Sanlucar: Lista de inmuebles</title>
  <link rel="stylesheet" type="text/css" href="css/inmuebles.css">
  <link rel="stylesheet" type="text/css" href="css/paginacion.css">
  <link rel="stylesheet" type="text/css" href="css/menuNav.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/inmuebles.js" type="text/javascript"></script>
  <script src="js/responsive.js" type="text/javascript"></script>
</head>

<body>


<?php
	include_once("cabeceraNew.php");
?>





<?php
	include_once("footer.php");
?>

<script type="text/javascript">

	navSlide();

</script>

</body>
</html>