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
    $contratos = consultarTodosContratos($conexion);
	cerrarConexionBD($conexion);

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Promociones Sanlucar Web</title>
<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>
<body>

<?php include_once("cabecera.php"); ?>

    <div class="contenido">
        <div class="bloque">
            <div class="mC">
                <h1> Mis contratos </h1>
            </div>  
            <div class="contratos">
                <?php
                    foreach($contratos as $fila) {
                ?>
                <div class="contrato">
                <a href="#" class="btn-toggle"><b> CONTRATO <?php echo $fila["OID_CONTRATO"]; ?></b></a>
                    <div class="toggle">
                        <div class="wrap">
                            <p>Inicio del contrato: <b><?php echo $fila["INICIOALQUILER"]; ?></b></p>
                            <p>Fin del contrato: <b><?php echo $fila["FINALQUILER"]; ?></b></p>
                            <p>Pago mensual: <b><?php echo $fila["PAGOMENSUAL"]; ?></b></p>
                            <p>NIF cliente: <b><?php echo $fila["NIF"]; ?></b></p>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="bloque">
        
            <h1> Mis datos </h1>
            <div class="contratos">
                <div class="contrato">
                            <p>Nombre: <b><?php echo $datos["NOMBRE"]; ?></b></p>
                            <p>Apellidos: <b><?php echo $datos["APELLIDOS"]; ?></b></p>
                            <p>E-mail: <b><?php echo $datos["EMAIL"]; ?></b></p>
                            <p>Nick: <b><?php echo $datos["NICK"]; ?></b></p>
            
                </div>
            </div>
        </div>
        
        
    </div>            


<?php include_once("footer.php") ?>

<script>
    let botones = document.querySelectorAll('.btn-toggle');
    let toggles = document.querySelectorAll('.toggle');
    for (var i = 0; i < botones.length; i++) {

    let boton = botones[i];
    let toggle = toggles[i];
    console.log(typeof(boton));
    boton.addEventListener('click', (e) => {

        console.log(toggle);
        toggle.classList.toggle("active");
    });


    console.log("funciona");
};
</script>
</body>
</html>