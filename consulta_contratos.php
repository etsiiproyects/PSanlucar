<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionContratos.php");

	if(!isset($_SESSION['loginEmpleado'])) {
		header("Location: loginEmpleados.php");
	} else {
		if(isset($_SESSION["contrato"])) {
			$contrato = $_SESSION["contrato"];
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
  	<title>Promociones Sanlucar: Lista de contratos</title>
  	<link rel="stylesheet" type="text/css" href="css/contratos.css">
  	<link rel="stylesheet" type="text/css" href="css/menuNav.css">
  	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
  	<script src="js/responsive.js" type="text/javascript"></script>

</head>

<body>

<?php
	include_once("cabecera.php");
?>
<section class="bloque">
	<h1>Lista de Contratos: </h1>
	<div class="contratos">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="contrato">
        <a href="#" class="btn-toggle"><b> CONTRATO <?php echo $fila["OID_CONTRATO"]; ?></b></a>
            <div class="toggle">
                <div class="wrap">
                    <p>Inicio del contrato: <b><?php echo $fila["INICIOALQUILER"]; ?></b></p>
                    <p>Fin del contrato: <b><?php echo $fila["FINALQUILER"]; ?></b></p>
                    <p>Pago mensual: <b><?php echo $fila["PAGOMENSUAL"]; ?></b></p>
                    <p>NIF cliente: <b><?php echo $fila["NIF"]; ?></b></p>
                    <form id="formContrato" method="post" action="controladorContrato.php">
                    	<input id="INICIOALQUILER" name="INICIOALQUILER" type="hidden" value="<?php echo $fila["INICIOALQUILER"]; ?>" />
                    	<input id="FINALQUILER" name="FINALQUILER" type="hidden" value="<?php echo $fila["FINALQUILER"]; ?>" />
                    	<input id="PAGOMENSUAL" name="PAGOMENSUAL" type="hidden" value="<?php echo $fila["PAGOMENSUAL"]; ?>" />
                    	<input id="NIF" name="NIF" type="hidden" value="<?php echo $fila["NIF"]; ?>" />
                    	<input id="OID_CONTRATO" name="OID_CONTRATO" type="hidden" value="<?php echo $fila["OID_CONTRATO"]; ?>" />
                    	
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
			document.getElementById("formContrato").submit()
		}

	}

  navSlide();
</script>

</body>
</html>
