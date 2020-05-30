<?php
	session_start();
	
	unset($_SESSION["errores"]);
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

<section class="bloqueC">
	<h1>Lista de Demandas: </h1>
	<div class="contratosC">
		<?php
			foreach($filas as $fila) {
		?>
		<div class="contratoC">
        <a href="#" class="btn-toggleD"><b> DEMANDA <?php echo $fila["ID_INMUEBLE"]; ?></b></a>
            <div class="toggleD">
                <div class="wrap">
					<p>Precio maximo: <b><?php echo $fila["PRECIOMAX"]; ?></b></p>
                    <p>Fecha de la demanda: <b><?php echo $fila["FECHADEMANDA"]; ?></b></p>
                    <p>Numero de mascotas: <b><?php echo $fila["NUM_MASCOTA"]; ?></b></p>
                    <p>NIF demandante: <b><?php echo $fila["NIF"]; ?></b></p>
					<p>ID del inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></p>
					<p>OID de la demanda: <b><?php echo $fila["OID_DEMANDA"]; ?></b></p>
                    <form id="formDemanda" method="post" action="controladorDemanda.php">
                    	<input id="PRECIOMAX" name="PRECIOMAX" type="hidden" value="<?php echo $fila["PRECIOMAX"]; ?>" />
                    	<input id="FECHADEMANDA" name="FECHADEMANDA" type="hidden" value="<?php echo $fila["FECHADEMANDA"]; ?>" />
                    	<input id="NUM_MASCOTA" name="NUM_MASCOTA" type="hidden" value="<?php echo $fila["NUM_MASCOTA"]; ?>" />
                    	<input id="NIF" name="NIF" type="hidden" value="<?php echo $fila["NIF"]; ?>" />
                    	<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>" />
                    	<input id="OID_DEMANDA" name="OID_DEMANDA" type="hidden" value="<?php echo $fila["OID_DEMANDA"]; ?>" />

						<input  id="borrar" name="borrar" type="hidden" value=""/>
						<button class="botonInm" type="button" onclick="alertaBorrar()" >
							Cancelar demanda
						</button>
						<input  id="contratar" name="contratar" type="hidden" value=""/>
						<button type="submit" name="submit">Crear contrato </button>
                    </form>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
</section>


<script>
let botonesD = document.querySelectorAll('.btn-toggleD');
let togglesD = document.querySelectorAll('.toggleD');
for(var i = 0; i<botonesD.length; i++){

	let botonD = botonesD[i];
	let toggleD = togglesD[i];
	console.log(typeof(botonD));
	botonD.addEventListener('click', (e) => {

		console.log(toggleD);
		toggleD.classList.toggle("active");
	});


	console.log("funciona");
  };

	function alertaBorrar() {

		if (confirm('¿Estas seguro de borrar?')) {
			document.getElementById("formDemanda").submit()
		}

	}

</script>
