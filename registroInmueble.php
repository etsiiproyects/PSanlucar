<?php
    session_start();

    require_once("gestionBD.php");

    if(!isset($_SESSION["inmueble"])) {
        $inmueble['id_inmueble']="";
        $inmueble['direccion']="";
        $inmueble['habitaciones']="";
        $inmueble['img']="";
        $inmueble['tipo']="";

        $_SESSION['inmueble']=$inmueble;
    }else $inmueble=$_SESSION["inmueble"];

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
        <title>Gestion Promociones Sanlucar: Alta Inmueble</title>
        <link rel="stylesheet" type="text/css" href="css/formularios.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/validacionInmueble.js" type="text/javascript"></script>
     </head>
     <body>

         <script type="text/javascript">
             $(document).ready(function() {
                 $("#altaInmueble").on("submit", function() {
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

            <form id="altaInmueble" action="validacion_inmueble.php" method="post">
                 <label for="id_inmueble">Identificador: </label>
    			 <input class="input-group" id="id_inmueble" name="id_inmueble" type="text" placeholder="00.0A" title="Dos digitos, seguido de un punto un digito y otro digito o una letra" size="5" value="<?php echo $inmueble['id_inmueble'];?>" required />
    			<br/>

                <label for="direccion">Direccion: </label>
                <input class="input-group" id="direccion" name="direccion" type="text" size="60" value="<?php echo $inmueble['direccion'];?>" required />
                <br />

                <label for="habitaciones">Número de habitaciones: </label>
    			<input class="input-group" type="number" id="habitaciones" name="habitaciones" min="0" max="7" value="<?php echo $inmueble['habitaciones'];?>" required />
                <br />

                <label for="img">URL de la imagen: </label>
    			<input class="input-group" type="text" id="img" name="img" value="<?php echo $inmueble['img'];?>" required />
                <br />
                
                <label>Tipo inmueble:</label>
    				<label>
    					<input name="tipo" type="radio" value="aislado" <?php if($inmueble['tipo']=='aislado') echo ' checked ';?>/>
    					Aislado</label>
    				<label>
    					<input name="tipo" type="radio" value="plurifamiliar" <?php if($inmueble['tipo']=='plurifamiliar') echo ' checked ';?>/>
    					Plurifamiliar</label>
    				<label>
    					<input name="tipo" type="radio" value="comercial" <?php if($inmueble['tipo']=='comercial') echo ' checked ';?>/>
    					Comercial</label>
    				<br />

            <input class="boton" type="submit" value="Confirmar" />
             </form>

        </div>



     </body>
 </html>
