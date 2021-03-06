<?php
    session_start();

    require_once("gestionBD.php");
    require_once("gestionUsuarios.php");

  if(!isset($_SESSION["demanda"]) && isset($_SESSION["inmueble"])) {
        $demanda['precio']="";
        $demanda['fecha']= "";
        $demanda['mascota']="";
        $demanda['nif']= "";
        $demanda['id']= $_SESSION["inmueble"]["ID_INMUEBLE"];

        $_SESSION["demanda"] = $demanda;
    }else if($_SESSION["demanda"]["id"]!=$_SESSION["inmueble"]["ID_INMUEBLE"]){
        $demanda = $_SESSION["demanda"];
        $demanda['ID_INMUEBLE']= $_SESSION["inmueble"]["ID_INMUEBLE"];

    }else $demanda=$_SESSION["demanda"];

    if (isset($_SESSION["errores"])){
        $errores=$_SESSION["errores"];
        unset($_SESSION["errores"]);
    }

    $login = $_SESSION['login'];

    $conexion = crearConexionBD();
    $datos = consultarDatosUsuario($conexion, $login['usuario'], $login['pass']);
    cerrarConexionBD($conexion);

 ?>

 <!DOCTYPE html>
 <html lang="en">
     <head>
        <meta charset="utf-8">
        <title>Gestion Promociones Sanlucar: Alta Demandas</title>
        <link rel="stylesheet" type="text/css" href="css/formularios.css" />
        <link rel="stylesheet" type="text/css" href="css/responsive.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/validacionDemanda.js" type="text/javascript"></script>
     </head>
	 <body>

         <script type="text/javascript">
             $(document).ready(function() {
                 $("#altaDemanda").on("submit", function() {
                     return validateForm();
                 });
             });
         </script>

         <?php

 		if (isset($errores) && count($errores)>0) {
 	    	echo "<div id=\"div_errores\" class=\"error\">";
 			echo "<h4> Errores en el formulario:</h4>";
     		foreach($errores as $error){
     			echo $error;
 			}
     		echo "</div>";
   		}
 	     ?>

         <div class="iniciosesion">

     	    <a href="index.php"><img class="img-login" src="images/logo.png" alt="Promociones Sanlúcar" /></a>

            <form id="altaDemanda" action="validacion_demanda.php" method="get">
                 <label for="precio">Precio Maximo: </label>
    			 <input class="input-group" id="precio" name="precio" min="100" type="number" value="<?php echo $demanda['precio'];?>" required />
    			<br/>

                <label for="fecha">Fecha de la demanda: </label>
                <strong> <?php echo date('Y-m-d');?> </strong>
                <input class="input-group" id="fecha" name="fecha" type="date" hidden value="<?php echo date('Y-m-d') ?>"required />
                <br />

                <label for="mascota">Número de mascotas: </label>
    			<input class="input-group" type="number" id="mascota" min="0" max="4" name="mascota" value="<?php echo $demanda['mascota'];?>" required />
                <br />

                <label for="img">NIF: </label>
                <strong> <?php echo $datos['NIF'];?> </strong>
    			<input class="input-group" id="nif" name="nif" type="text" hidden placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos y una letra mayúscula" value="<?php echo $datos['NIF'];?>" required />
                <br />

				<label for="id">ID del inmueble: </label>
                <strong> <?php echo $demanda['id'];?> </strong>
				<input class="input-group" id="id" name="id" type="text"   hidden value="<?php echo $demanda['id'];?>"/>
             <input class="boton" type="submit" value="Confirmar" />
             </form>

        </div>

     </body>
 </html>
