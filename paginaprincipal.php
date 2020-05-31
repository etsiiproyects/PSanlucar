<?php
	session_start();


	require_once("gestionarInmuebles.php");


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

	
	<link rel="stylesheet" type="text/css" href="css/inmuebles.css">
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
	<link rel="stylesheet" type="text/css" href="css/paginacion.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	  <script src="js/inmuebles.js"></script>
	  <script src="js/responsive.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
		 		$(document).ready(function() {
					var lastPath=sessionStorage.getItem('path');
					$('#content').load(lastPath + '.php');

					$('#nav ul li a').click(function() {
							var page=$(this).attr('href');
							$('#content').load(page + '.php');
							sessionStorage.setItem("path", page);
							return false;
					});
				});
      </script>
</head>

<body onload="inicio();">

	<nav id="nav" class="menuNav">
		<div class="logo"> <a href="index.php" onclick="sessionStorage.clear();"> <img width="100px" src="images/logo.png"> </a> </div>
		<ul class="nav-links">
			<?php if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){ ?>
				<a href="formularioUsuario.php"><li class="navL">  Registrate </li></a>
				<a href="login.php"><li class="navL"> Iniciar Sesion </li></a>
			<?php } else{ ?>
				<li class="navL"><a href="consulta_inmuebles"> INMUEBLES </a></li>
				<?php if(isset($_SESSION["loginEmpleado"])){ ?>
					<li class="navL"><a href="consulta_demandas"> DEMANDAS </a></li>
					<li class="navL"><a href="consulta_contratos" > CONTRATOS </a></li>
				<?php } if(isset($_SESSION["login"])) {  ?>
			    <li class="navL"><a href="usuario"> USUARIO </a></li>
				<?php } ?>
		 		<a href="desconectar.php" onclick="sessionStorage.clear();"><li class="navL"> <img width="50px" height="40px" src="images/salir.png"></li> </a>
			<?php } ?>

		</ul>
		<div class="burguer">
			<div class="line1"></div>
			<div class="line2"></div>
			<div class="line3"></div>
        </div>
	</nav>

	<div id="content">
		<div class="bloqueI">
			<h2> Bienvenidos a la web de Promociones Sanlucar. </h2>
			<?php if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){ ?>
				<p>En la barra de navegacion de la parte superior podeis ir a iniciar sesion o registrarse para poder acceder a la informacion de nuestra pagina.</p>
			<?php } else{  if(isset($_SESSION["loginEmpleado"])){ ?>
				<p>Aqui dejamos un poco de informacion de como navegar por la web estando con una cuenta de empleado:</p>
				<p>Desde la barra de navegación se puede acceder a la informacion de nuestros inmuebles, contratos y demandas, ademas de un enlace para desconectarse de la sesion como empleado.</p>
				<p>En el apartado de inmueble arriba tenemos un boton que nos redirige a una pagina para insertar un inmueble, justo abajo de este boton a la derecha hay otro boton con el que podemos filtrar los inmuebles para ver solo los que no tienen un contrato activo ahora mismo.Para ver la informacion de los inmuebles debes pinchar en la imagen del inmueble correspondiente, ademas tendremos boton para borrar el inmueble de la base de datos, y otro para modificar la informacion sobre el inmueble correspondiente. </p>
				<p>En el apartado de contratos, podemos ver botones con los contratos con el id del inmueble correspondiente, si pinchamos podremos ver su informacion, ademas tenemos un boton para borrarlo</p>
				<p>El apartado de demandas funciona de manera similar al apartado de contratos, pero ademas poseemos un boton para realizar un contrato de la demanda correspondiente.</p>
			<?php } if(isset($_SESSION["login"])) { ?>
				<p>Os dejamos un poco de informacion de como navegar por nuestra web.: </p>
				<p>Desde la barra de navegacion que teneis en la parte superior de la pagina, podeis pinchar en inmuebles o usuario para ver su contenido o pinchar en desconectar para salir de vuestra cuenta</p>
				<p>En el apartado inmueble podreis ver imagenes de ellos que si pinchais podeis ver su informacion y un boton que os redirige a otra pagina para realizar un demanda por el correspondiente inmueble. Ademas arriba a la derecha teneis un boton para filtrar los inmuebles y solo ver los que tenemos libres en este momento.</p>
				<p>En el apartado de usuario teneis la informacion relacionada a vuestra cuenta y vuestros contratos y/o demandas. Tambien hay un boton con el que podreis modificar informacion ed vuestra cuenta.</p>
				<?php } ?>
			<?php } ?>
		</div>
	</div>

	<script>
		navSlide();
	</script>
</body>
</html>
