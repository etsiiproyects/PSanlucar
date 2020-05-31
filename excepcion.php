
<?php
	session_start();
	$excepcion="";
	if(isset($_SESSION["excepcion"])){
	$excepcion = $_SESSION["excepcion"];
	unset($_SESSION["excepcion"]);
	}
	if (isset ($_SESSION["destino"])) {
		$destino = $_SESSION["destino"];
		unset($_SESSION["destino"]);
	} else
		$destino = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/excepcion.css" />
  <link rel="stylesheet" type="text/css" href="css/menuNav.css" />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
  <title>Promociones Sanlucar: ¡Se ha producido un problema!</title>
</head>
<body>

<nav id="nav" class="menuNav">
  <div class="logo"> <a href="index.php" onclick="sessionStorage.clear();"> <img width="100px" src="images/logo.png"> </a> </div>
  <ul class="nav-links">
    <?php if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){ ?>
      <a href="formularioUsuario.php"><li class="navL">  Registrate </li></a>
      <a href="login.php"><li class="navL"> Iniciar Sesion </li></a>
    <?php } else{ ?>
      <li class="navL"><a href="paginaprincipal.php" onclick="sessionStorage.setItem('path', 'consulta_inmuebles');"> Inmuebles </a></li>
      <?php if(isset($_SESSION["loginEmpleado"])){ ?>
        <li class="navL"><a href="paginaprincipal.php" onclick="sessionStorage.setItem('path', 'consulta_demandas');"> Demandas </a></li>
        <li class="navL"><a href="paginaprincipal.php" onclick="sessionStorage.setItem('path', 'consulta_contratos');"> Contratos </a></li>
      <?php } if(isset($_SESSION["login"])) {  ?>
        <li class="navL"><a href="usuario" onclick="sessionStorage.setItem('path', 'usuario');"> Usuario </a></li>
      <?php } ?>
      <a href="desconectar.php" onclick="sessionStorage.clear();"><li class="navL"> Cerrar Sesion</li> </a>
    <?php } ?>

  </ul>
  <div class="burguer">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
      </div>
</nav>

<div class="bloqueI">
	<div>
		<h2>Ups!</h2>
		<?php if ($destino<>"") { ?>
		<p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="<?php echo $destino ?>">aquí</a> para volver.</p>
		<?php } else { ?>
		<p>Ocurrió un problema para acceder a la base de datos.  </p>
		<?php } ?>
	</div>

	<div class='excepcion'>
		<?php echo "Información relativa al problema: $excepcion;" ?>
	</div>

</div>
<?php
	include_once("footer.php");
?>

</body>
</html>
