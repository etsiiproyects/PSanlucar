<?php
    session_start();

    require_once("gestionBD.php");

  if(!isset($_SESSION["demanda"]) && isset($_SESSION["inmueble"])) {
        $demanda['PRECIOMAX']="";
        $demanda['FECHADEMANDA']= date('Y-m-d');
        $demanda['NUM_MASCOTA']="";
        $demanda['NIF']="";
        $inmueble = $_SESSION["inmueble"];
        $demanda['ID_INMUEBLE']= $inmueble["ID_INMUEBLE"];

        $_SESSION['demanda']=$demanda;
    }else $demanda=$_SESSION["demanda"];

    if (isset($_SESSION["errores"])){
        $errores=$_SESSION["errores"];
        unset($_SESSION["errores"]);
    }

    $conexion=crearConexionBD();
 ?>

 <!DOCTYPE html>
 <html lang="en">
     <head>
        <meta charset="utf-8">
        <title>Gestion Promociones Sanlucar: Alta Demandas</title>
        <link rel="stylesheet" type="text/css" href="css/formularios.css" />
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

     	    <a href="index.php"><img class="img-registro" src="images/logo.png" alt="Promociones Sanlúcar" /></a>

            <form id="altaDemanda" action="validacion_demanda.php" method="get">
                 <label for="precio_max">Precio Maximo: </label>
    			 <input class="input-group" id="precio_max" name="precio_max" min="0" type="number" value="<?php echo $demanda['PRECIOMAX'];?>" required />
    			<br/>

                <label for="fecha_demanda">Fecha de la damanda: </label>
                <input class="input-group" id="fecha_demanda" name="fecha_demanda" type="date" value="<?php echo date('Y-m-d');?>" required />
                <br />

                <label for="numMascotas">Número de mascotas: </label>
    			<input class="input-group" type="number" id="numMascotas" min="0" max="4" name="numMascotas" value="<?php echo $demanda['NUM_MASCOTA'];?>" required />
                <br />

                <label for="img">NIF: </label>
    			<input class="input-group" id="nif" name="nif" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos y una letra mayúscula" value="<?php echo $demanda['NIF'];?>" required />
                <br />

				<label for="id_inmueble">ID del inmueble: </label>
				<input class="input-group" id="id_inmueble" name="id_inmueble" type="text" value="<?php echo $demanda['ID_INMUEBLE'];?>"/>
             <input class="boton" type="submit" value="Confirmar" />
             </form>

        </div>

     </body>
 </html>
