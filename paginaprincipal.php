<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarInmuebles.php");
	require_once("gestionDemandas.php");
	require_once("gestionContratos.php");
	require_once("paginacion_consulta.php");


?>


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promociones Sanlucar: Lista de inmuebles</title>

	<link rel="stylesheet" type="text/css" href="css/menuNav.css">
	<link rel="stylesheet" type="text/css" href="css/contratos.css">
	<link rel="stylesheet" type="text/css" href="css/demandas.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

  <script src="js/toggle.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
     	$(document).ready(function() {
     		var trigger =$('#nav ul li a'),
     			container=$('#content');

     		trigger.on('click', function() {
     			var $this=$(this)
     				target=$this.data('target');
     		container.load(target + '.php');

     		return false;

     	});
     });
      </script>
</head>

<body>

	<nav id="nav" class="menuNav">
		<div class="logo"> <a href="index.php"> <img width="100px" src="images/logo.png"> </a> </div>
		<ul class="nav-links">
			<li><a href="#" data-target="prueba">Prueba</a></li>
			<?php if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){ ?>
				<li class="nav"> <a href="formularioUsuario.php"> Registrate </a></li>
				<li class="nav"> <a href="login.php"> Iniciar Sesion </a> </li>
			<?php } else{ ?>
				<li class="navL"><a href="#" data-target="consulta_inmuebles"> Inmuebles </a></li>
				<?php if(isset($_SESSION["loginEmpleado"])){ ?>
					<li class="navL"><a href="#" data-target="consulta_demandas"> Demandas </a></li>
					<li class="navL"><a href="#" data-target="consulta_contratos"> Contratos </a></li>
				<?php} else if(isset($_SESSION["login"])){  ?>
			    <li class="navL"><a href="#" data-target="usuario"> Usuario </a></li>
				<?php } ?>
		 		<li class="navL"><a href="desconectar.php"> Cerrar Sesion </a> </li>
			<?php } ?>
		</ul>
	</nav>

	<div id="content">
		<?php include('consulta_contratos.php'); ?>
	</div>

</body>
</html>
