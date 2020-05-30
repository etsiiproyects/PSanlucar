<?php
	session_start();

  	include_once("gestionBD.php");
 	include_once("gestionUsuarios.php");
    include_once("gestionContratos.php");


	if(!isset($_SESSION['login'])) {
		header("Location: login.php");
    } 
    
    $login = $_SESSION['login'];

    $conexion = crearConexionBD();
    $datos = consultarDatosUsuario($conexion, $login['usuario'], $login['pass']);
	cerrarConexionBD($conexion);

?>


    <div class="contenidoU">
        <div class="bloqueU">
            <div class="mC">
                <h1> Mis contratos </h1>
            </div>  
            <div class="contratosU">
                <div class="contratoU">
                <a href="#" class="btn-toggle"><b> CONTRATO <?php echo $datos["OID_CONTRATO"]; ?></b></a>
                    <div class="toggle">
                        <div class="wrap">
                            <p>Inicio del contrato: <b><?php echo $datos["INICIOALQUILER"]; ?></b></p>
                            <p>Fin del contrato: <b><?php echo $datos["FINALQUILER"]; ?></b></p>
                            <p>Pago mensual: <b><?php echo $datos["PAGOMENSUAL"]; ?></b></p>
                            <p>NIF cliente: <b><?php echo $datos["NIF"]; ?></b></p>
                            <p>Mascotas: <b><?php echo $datos["NUM_MASCOTA"]; ?></b></p>
                            <p>Pago mensual: <b><?php echo $datos["PAGOMENSUAL"]; ?></b></p>
                            <p>Fianza: <b><?php echo $datos["FIANZA"]; ?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloqueU">
        
            <h1> Mis datos </h1>
            <div class="contratosU">
                <div class="contratoU">
                            <p>Nombre: <b><?php echo $datos["NOMBRE"]; ?></b></p>
                            <p>Apellidos: <b><?php echo $datos["APELLIDOS"]; ?></b></p>
                            <p>E-mail: <b><?php echo $datos["EMAIL"]; ?></b></p>
                            <p>NIF: <b><?php echo $datos["NIF"]; ?></b></p>
            
                </div>
            </div>
        </div>
        
        
    </div>            


<?php include_once("footer.php") ?>

<script>
    let botonesU = document.querySelectorAll('.btn-toggle');
    let togglesU = document.querySelectorAll('.toggle');
    for (var i = 0; i < botonesU.length; i++) {

    let botonU = botonesU[i];
    let toggleU = togglesU[i];
    console.log(typeof(botonU));
    botonU.addEventListener('click', (e) => {

        console.log(toggleU);
        toggleU.classList.toggle("active");
    });


    console.log("funciona");
};
</script>
