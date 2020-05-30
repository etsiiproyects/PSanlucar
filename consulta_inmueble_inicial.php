<?php

	session_start();

	require_once("gestionBD.php");
    if(!isset($_SESSION['login']) && !isset($_SESSION['loginEmpleado'])) {
		header("Location: login.php");
	} else {
		if(isset($_SESSION["inmueble"])) {
			$inmueble = $_SESSION["inmueble"];
			unset($_SESSION["inmueble"]);
		}
	}

    $conexion = crearConexionBD();
	$filas = consultarTodosInmuebles();
    cerrarConexionBD($conexion);
?>

<?php if(isset($_SESSION['loginEmpleado'])){ ?>
    <a href="formularioInmueble.php"><div class="inserta">
        <h2> INSERTAR INMUEBLE </h2>
    </div></a>
<?php } ?>

<button  id="boton" type="button" name="button" onclick="visibility();"> Mostrar inmuebles libres</button>

<h1>Lista de Inmuebles: </h1>

<div id="content_inmueble">
    <?php include_once("consulta_inmuebles.php") ?>
</div>
