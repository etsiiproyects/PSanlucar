<?php
	session_start();

	require_once("gestionBD.php");
	require_once("gestionarInmuebles.php");
	require_once("paginacion_consulta.php");

	if(!isset($_SESSION['login']) && !isset($_SESSION['loginEmpleado'])) {
		header("Location: login.php");
	} else {
		if(isset($_SESSION["inmueble"])) {
			$inmueble = $_SESSION["inmueble"];
			unset($_SESSION["inmueble"]);
		}
	}

	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];

	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam < 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	$query = 'SELECT * FROM INMUEBLES';


	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion, $query);
	$total_paginas = (int)($total_registros / $pag_tam);

	if ($total_registros % $pag_tam > 0)		$total_paginas++;

	if ($pagina_seleccionada > $total_paginas)		$pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion, $query, $pagina_seleccionada, $pag_tam);

	$queryC= 'SELECT * FROM INMUEBLES WHERE ID_INMUEBLE NOT IN (SELECT ID_INMUEBLE FROM OFERTAS NATURAL JOIN DEMANDAS NATURAL JOIN CONTRATOS WHERE SYSDATE BETWEEN INICIOALQUILER AND FINALQUILER);'

	$total_registrosC = total_consulta($conexion, $queryC);
	$total_paginasC = (int)($total_registrosC / $pag_tamC);

	if ($total_registrosC % $pag_tamC > 0)		$total_paginasC++;

	if ($pagina_seleccionadaC > $total_paginasC)		$pagina_seleccionadaC = $total_paginasC;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacionC["PAG_NUM"] = $pagina_seleccionadaC;
	$paginacionC["PAG_TAM"] = $pag_tamC;
	$_SESSION["paginacionC"] = $paginacionC;

	$filasC = consulta_paginadaC($conexion, $queryC, $pagina_seleccionadaC, $pag_tamC);

	//$filas = consultarTodosInmuebles($conexion);
	cerrarConexionBD($conexion);

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Promociones Sanlucar: Lista de inmuebles</title>
  <link rel="stylesheet" type="text/css" href="css/prueba.css">
  <link rel="stylesheet" type="text/css" href="css/paginacion.css">
</head>

<body>

<?php
	include_once("cabecera.php");
?>

	<nav class="pag">
		<div id="enlaces">
			<?php
				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )
					if ( $pagina == $pagina_seleccionada) { 	?>
						<span class="current"><?php echo $pagina; ?></span>
			<?php }	else { ?>
						<a href="consulta_inmuebles.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>
			<?php } ?>
		</div>

		<form method="get" action="consulta_inmuebles.php">
			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando
			<input id="PAG_TAM" name="PAG_TAM" type="number"
				min="1" max="<?php echo $total_registros; ?>"
				value="<?php echo $pag_tam?>" autofocus="autofocus" />
			entradas de <?php echo $total_registros?>
			<input type="submit" value="Cambiar">
		</form>

	</nav>

	<nav class="pagC">
		<div id="enlaces">
			<?php
				for( $paginaC = 1; $paginaC <= $total_paginasC; $paginaC++ )
					if ( $paginaC == $pagina_seleccionadaC) { 	?>
						<span class="current"><?php echo $paginaC; ?></span>
			<?php }	else { ?>
						<a href="consulta_inmuebles.php?PAG_NUM=<?php echo $paginaC; ?>&PAG_TAMC=<?php echo $pag_tamC; ?>"><?php echo $paginaC; ?></a>
			<?php } ?>
		</div>

		<form method="get" action="consulta_inmuebles.php">
			<input id="PAG_NUMC" name="PAG_NUMC" type="hidden" value="<?php echo $pagina_seleccionada?>"/>
			Mostrando
			<input id="PAG_TAMC" name="PAG_TAMC" type="number"
				min="1" max="<?php echo $total_registrosC; ?>"
				value="<?php echo $pag_tamC?>" autofocus="autofocus" />
			entradas de <?php echo $total_registrosC?>
			<input type="submit" value="Cambiar">
		</form>

	</nav>
	<!-- <img class="iinmueble"  src="../images/inmueble.png" width="400px"> -->
<section class="contenido">
	<?php if(isset($_SESSION['loginEmpleado'])){ ?>
		<div class="inserta">
			<h2><a href="registroInmueble.php"> INSERTAR INMUEBLE </a></h2>
		</div>
	<?php } ?>


	<h1>Lista de Inmuebles: </h1>
	<button type="button" name="button" onclick="visibility();"> Mostras inmuebles libres</button>

	<div id="inmuebles" class="inmuebles">
		<?php
			foreach($filas as $fila) {
		?>
		<form method="post" action="controlador.php">
		<div class="inmueble">
			<div class="nameBx">
				<img src="images/ritual.jpg" width="300px">
			</div>
			<div class="infoBx">
				<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>"/>
				<h2>Inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></h2>
				<input id="DIRECCION" name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"]; ?>"/>
				<p>Direccion: <b><?php echo $fila["DIRECCION"]; ?></b></p>
				<input id="HABITACIONES" name="HABITACIONES" type="hidden" value="<?php echo $fila["HABITACIONES"]; ?>"/>
				<p>Numero de habitaciones: <b><?php echo $fila["HABITACIONES"]; ?></b></p>
				<input id="TIPO" name="TIPO" type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
				<p>Tipo de inmueble: <b><?php echo $fila["TIPO"]; ?></b></p>

				<?php if(isset($_SESSION['loginEmpleado'])){ ?>

					<?php if (isset($inmueble) and ($inmueble["ID_INMUEBLE"] == $fila["ID_INMUEBLE"])) { ?>
						<button id="grabar" name="grabar" type="submit" >
							Guardar
						</button>
						<?php } else { ?>
						<button id="editar" name="editar" type="submit" >
							Modificar
						</button>
						<?php } ?>
						<form method="post" action="controlador.php">
							<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>" />
							<button id="borrar" name="borrar" type="submit">Borrar</button>
						</form>

					<?php } ?>
					</form>
			</div>
		</div>
		</form>
		<?php } ?>
	</div>

	<div id="freeInmuebles" class="inmueblesC">
		<?php
			foreach($filasC as $filaC) {
		?>
		<form method="post" action="controlador.php">
		<div class="inmueble">
			<div class="nameBx">
				<img src="images/ritual.jpg" width="300px">
			</div>
			<div class="infoBx">
				<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $filaC["ID_INMUEBLE"]; ?>"/>
				<h2>Inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></h2>
				<input id="DIRECCION" name="DIRECCION" type="hidden" value="<?php echo $filaC["DIRECCION"]; ?>"/>
				<p>Direccion: <b><?php echo $fila["DIRECCION"]; ?></b></p>
				<input id="HABITACIONES" name="HABITACIONES" type="hidden" value="<?php echo $filaC["HABITACIONES"]; ?>"/>
				<p>Numero de habitaciones: <b><?php echo $filaC["HABITACIONES"]; ?></b></p>
				<input id="TIPO" name="TIPO" type="hidden" value="<?php echo $filaC["TIPO"]; ?>"/>
				<p>Tipo de inmueble: <b><?php echo $filaC["TIPO"]; ?></b></p>

				<?php if(isset($_SESSION['loginEmpleado'])){ ?>

					<?php if (isset($inmueble) and ($inmueble["ID_INMUEBLE"] == $filaC["ID_INMUEBLE"])) { ?>
						<button id="grabar" name="grabar" type="submit" >
							Guardar
						</button>
						<?php } else { ?>
						<button id="editar" name="editar" type="submit" >
							Modificar
						</button>
						<?php } ?>
						<form method="post" action="controlador.php">
							<input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $filaC["ID_INMUEBLE"]; ?>" />
							<button id="borrar" name="borrar" type="submit">Borrar</button>
						</form>

					<?php } ?>
					</form>
			</div>
		</div>
		</form>
		<?php } ?>
	</div>


</section>


<?php
	include_once("footer.php");
?>

<script type="text/javascript">

	let all=document.getElementById("inmuebles");
	let free=document.getElementById("freeInmuebles");
	 function visibility(){
		 if(all.style.visibility=="visible"){
			 all.style.visibility=="hidden";
			 free.style.visibility=="visible";
			 return;
		 }
	 }
	funci
</script>

</body>
</html>
