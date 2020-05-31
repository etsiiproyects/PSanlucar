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
        <a href="#" class="btn-toggle"><b> DEMANDA <?php echo $fila["ID_INMUEBLE"]; ?></b></a>
            <div class="toggle">
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
						<button type="submit" name="contratar">Crear contrato </button>
                    </form>
                </div>
            </div>
        </div>
		<?php } ?>
	</div>
</section>


<script>
		$(document).ready(function(){
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
		});

	function alertaBorrar() {

		if (confirm('¿Estas seguro de borrar?')) {
			document.getElementById("formDemanda").submit()
		}

	}

</script>
