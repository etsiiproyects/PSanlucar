<?php
	session_start();
	
	require_once("gestionBD.php");
	require_once("gestionDemandas.php");

	if(!isset($_SESSION['loginEmpleado'])) {
		header("Location: loginEmpleados.php");
	} else {
		if(isset($_SESSION["demanda"])) {
			$demanda = $_SESSION["demanda"];
			unset($_SESSION["demanda"]);
		}
	}

	$conexion = crearConexionBD();
	$filas = consultarTodasDemandas($conexion);
	cerrarConexionBD($conexion);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  	<title>Promociones Sanlucar: Lista de demandas</title>
  	<link rel="stylesheet" type="text/css" href="css/contratos.css">
  	<link rel="stylesheet" type="text/css" href="css/menuNav.css">
  	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  	<script src="js/responsive.js" type="text/javascript"></script>

</head>

<body>

<?php
	include_once("cabecera.php");
?>
<section class="contenido">
	<h1>Lista de Demandas: </h1>
	<div class="contratos">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="contrato">
        <a href="#" class="btn-toggle"><b> DEMANDA <?php echo $fila["OID_DEMANDA"]; ?></b></a>
            <div class="toggle">
                <div class="wrap">		
					<p>Precio maximo: <b><?php echo $fila["PRECIOMAX"]; ?></b></p>
                    <p>Fecha de la demanda: <b><?php echo $fila["FECHADEMANDA"]; ?></b></p>
                    <p>Numero de mascotas: <b><?php echo $fila["NUM_MASCOTA"]; ?></b></p>
                    <p>NIF demandante: <b><?php echo $fila["NIF"]; ?></b></p>
					<p>ID del inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></p>
                    <form id="formDemanda" method="post" action="controladorDemanda.php">
                    	<input id="PRECIOMAX" name="PRECIOMAX" type="hidden" value="<?php echo $fila["PRECIOMAX"]; ?>" />
                    	<input id="FECHADEMANDA" name="FECHADEMANDA" type="hidden" value="<?php echo $fila["FECHADEMANDA"]; ?>" />
                    	<input id="NUM_MASCOTA" name="NUM_MASCOTA" type="NUM_MASCOTA" value="<?php echo $fila["NUM_MASCOTA"]; ?>" />
                    	<input id="NIF" name="NIF" type="hidden" value="<?php echo $fila["NIF"]; ?>" />
                    	<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>" />
                    	<input id="OID_DEMANDA" name="OID_DEMANDA" type="hidden" value="<?php echo $fila["OID_DEMANDA"]; ?>" />

						<button class="botonInm" id="editar" name="editar" type="submit" >
							Modificar
						</button>

						<input  id="borrar" name="borrar" type="hidden" value=""/>
						<button class="botonInm" type="button" onclick="alertaBorrar()" >
							Borrar
						</button>
                    </form>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
</section>						


<?php
	include_once("footer.php");
?>

<script>
let botones = document.querySelectorAll('.btn-toggle');
let toggles = document.querySelectorAll('.toggle');
for(var i = 0; i<botones.length; i++){

	let boton = botones[i];
	let toggle = toggles[i];
	console.log(typeof(boton));
	boton.addEventListener('click', (e) => {

		console.log(toggle);
		toggle.classList.toggle("active");
	});


	console.log("funciona");
  };

	function alertaBorrar() {

		if (confirm('¿Estas seguro de borrar?')) {
			document.getElementById("formDemanda").submit()
		}

	}

  navSlide();
</script>

</body>
</html>
