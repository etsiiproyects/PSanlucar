<?php
	session_start();

	require_once("../gestionBD.php");
	require_once("gestionarInmuebles.php");
	
	if(!isset($_SESSION['login'])) {
		header("Location: ./clientes/login.php");
	} else {
		if(isset($_SESSION["inmueble"])) {
			$inmueble = $_SESSION["inmueble"];
			unset($_SESSION["inmueble"]);
		}
	}
	
	$conexion = crearConexionBD();
	$filas = consultarTodosInmuebles($conexion);
	cerrarConexionBD($conexion);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promociones Sanlucar: Lista de inmuebles</title>
  <link rel="stylesheet" type="text/css" href="../css/prueba.css">
</head>

<body>

<?php
	include_once("../cabecera.php");
?>
	<!-- <img class="iinmueble"  src="../images/inmueble.png" width="400px"> -->
<section class="contenido">
	<?php if($_SESSION["login"] == "Admin1" || $_SESSION["login"] == "Admin2"){ ?>
		<div class="inserta">
			<h2> INSERTAR INMUEBLE </h2>
		</div>
	<?php } ?>


	<h1>Lista de Inmuebles: </h1>
	
	<div class="inmuebles">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="inmueble">
			<div class="nameBx">
				<img src="../images/ritual.jpg" width="300px">
			</div>
			<div class="infoBx">	
				<h2>Inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></h2>
				<p>Direccion: <b><?php echo $fila["DIRECCION"]; ?></b></p>
				<p>Numero de habitaciones: <b><?php echo $fila["HABITACIONES"]; ?></b></p>
				<p>Tipo de inmueble: <b><?php echo $fila["TIPO"]; ?></b></p>

				<?php if($_SESSION["login"] == "Admin1" || $_SESSION["login"] == "Admin2"){ ?>

					<button> Eliminar </button>
					<button> Modificar </button>
					
				<?php } ?>
			</div>
		</div>
		<?php } ?>
	</div>


</section>


<?php
	include_once("../footer.php");
?>

</body>
</html>