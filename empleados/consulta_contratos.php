<?php
	session_start();

	require_once("../gestionBD.php");
	require_once("gestionarInmuebles.php");
	
	if(!isset($_SESSION['login'])) {
		header("Location: loginEmpleados.php");
	} else {
		if(isset($_SESSION["contrato"])) {
			$inmueble = $_SESSION["contrato"];
			unset($_SESSION["contrato"]);
		}
	}
	
	$conexion = crearConexionBD();
	$filas = consultarTodosContratos($conexion);
	cerrarConexionBD($conexion);
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Promociones Sanlucar: Lista de inmuebles</title>
  <link rel="stylesheet" type="text/css" href="../css/pruebacontratos.css">
</head>

<body>

<?php
	include_once("../cabecera.php");
?>
	<!-- <img class="iinmueble"  src="../images/inmueble.png" width="400px"> -->
<section class="contenido">
	<h1>Lista de Contratos: </h1>
	<div class="contratos">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="contrato">	
        <a href="#" id="btn-toggle" class="btn-toggle"><b> CONTRATO <?php echo $fila["OID_CONTRATO"]; ?></b></a>
            <div class="toggle">
                <div class="wrap">
                    <p>Inicio del contrato: <b><?php echo $fila["INICIOALQUILER"]; ?></b></p>
                    <p>Fin del contrato: <b><?php echo $fila["FINALQUILER"]; ?></b></p>
                    <p>Pago mensual: <b><?php echo $fila["PAGOMENSUAL"]; ?></b></p>
                    <p>NIF cliente: <b><?php echo $fila["NIF_DEMANDANTE"]; ?></b></p>
                    <button> Eliminar </button>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
</section>


<?php
	include_once("../footer.php");
?>

<script>
let contrato = document.querySelector('.btn-toggle')
  contrato.addEventListener('click', (e) => {
    document.querySelector('.toggle').classList.toggle('active');
	document.querySelector('.wrap').classList.toggle('activetog');
	console.log("funciona");
  });
</script>

</body>
</html>