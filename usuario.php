<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("gestionUsuarios.php");

	if(!isset($_SESSION["login"])) {
		header("Location: login.php");
    }

    $login = $_SESSION["login"];

    $conexion = crearConexionBD();

    $contratos = consultarContratosUsuario($conexion, $login['usuario'], $login['pass']);
    $datos = consultarDatosUsuario($conexion, $login['usuario'], $login['pass']);
	cerrarConexionBD($conexion);

?>


    <div class="contenidoU">
        <div class="bloqueU">
            <div class="mC">
                <h1> Mis contratos </h1>
            </div>
            <div class="contratosU">
            	<?php if(!$contratos) { ?>
                		<div class="contratoU">
                			<h3>No tiene ningún contrato</h3>
	                	</div>         		
            		<?php } foreach($contratos as $contrato) { ?>
                		<div class="contratoU">
                		<a href="#" class="btn-toggleU"><b> CONTRATO <?php echo $contrato["OID_CONTRATO"]; ?></b></a>
                    		<div class="toggleU">
	                        <div class="wrap">
	                            <p>Inicio del contrato: <b><?php echo $contrato["INICIOALQUILER"]; ?></b></p>
	                            <p>Fin del contrato: <b><?php echo $contrato["FINALQUILER"]; ?></b></p>
	                            <p>Pago mensual: <b><?php echo $contrato["PAGOMENSUAL"]; ?></b></p>
	                            <p>NIF cliente: <b><?php echo $contrato["NIF"]; ?></b></p>
	                            <p>Mascotas: <b><?php echo $contrato["NUM_MASCOTA"]; ?></b></p>
	                            <p>Pago mensual: <b><?php echo $contrato["PAGOMENSUAL"]; ?></b></p>
	                            <p>Fianza: <b><?php echo $contrato["FIANZA"]; ?></b></p>
	                        </div>
	                    </div>
	                </div>
	            <?php } ?>
	        
            </div>
        </div>
        <div class="bloqueU">

            <h1> Mis datos </h1>
            <div id="datosU" class="contratosU">
                <div class="contratoU">
                	<p>Nombre: <b><?php echo $datos["NOMBRE"]; ?></b></p>
                	<p>Apellidos: <b><?php echo $datos["APELLIDOS"]; ?></b></p>
                	<p>E-mail: <b><?php echo $datos["EMAIL"]; ?></b></p>
                	<p>NIF: <b><?php echo $datos["NIF"]; ?></b></p>
                	<form method="post" action="controladorUsuario.php">
                		<input id="NOMBRE" name="NOMBRE" type="hidden" value="<?php echo $datos["NOMBRE"]; ?>"/>
                		<input id="APELLIDOS" name="APELLIDOS" type="hidden" value="<?php echo $datos["APELLIDOS"]; ?>"/>
                		<input id="EMAIL" name="EMAIL" type="hidden" value="<?php echo $datos["EMAIL"]; ?>"/>
                		<input id="NIF" name="NIF" type="hidden" value="<?php echo $datos["NIF"]; ?>"/>
                		<input id="PASS" name="PASS" type="hidden" value="<?php echo $datos["PASS"]; ?>"/>
                		<button class="botonU" id="editar" name="editar" type="submit">
                			Editar perfil
                		</button>
                	</form>

                </div>
            </div>
        </div>


    </div>

<script>

	$(document).ready(function(){
				let botones = document.querySelectorAll('.btn-toggleU');
				let toggles = document.querySelectorAll('.toggleU');
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
</script>
