<?php

	session_start();
	
	if(isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
		$usuario["CONFIRMPASS"] = "";
	}
	else Header("Location: paginaprincipal.php");
	
	if(isset($_SESSION["errores"])) $errores = $_SESSION["errores"]; unset ($_SESSION["errores"]);
		
?>


<!DOCTYPE hmtl>
<html lang="es">
<head>
	<meta charset="UTF-8" />
	<title>Promociones Sanlucar: Modificar usuario</title>
	<link rel="stylesheet" type="text/css" href="css/formularios.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap" rel="stylesheet">
	<script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="js/validacionRegistro.js" type="text/javascript"></script>
</head>

<body>
	<script>

			$("#registro").on("submit", function() {
				return validateForm();
			});
			
			$("#pass").on("keyup", function() {
				passwordColor();
			});
		});
	</script>
	
	<?php
		if (isset($errores) && count($errores)>0) {
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error) echo $error;
    		echo "</div>";
  		}
	?>
	
	<div class="iniciosesion">
		<a href="index.php"><img class="img-login" src="images/logo1.png" alt="Promociones Sanlúcar" /></a>
		<form id="registro" method="get" action="validacionModificaUsuario.php">
			<label for="nombre">Nombre: </label>
			<input class="input-group" id="nombre" name="nombreA" type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]+" value="<?php echo $usuario["NOMBRE"] ?>" required/>
			<br />
			<label for="apellidos">Apellidos: </label>
			<input class="input-group" id="apellidos" name="apellidosA" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð '-]+" type="text" value="<?php echo $usuario["APELLIDOS"] ?>" required />
			<br />
			<label for="email">Email: </label>
			<input class="input-group" id="email" name="emailA" type="email" value="<?php echo $usuario["EMAIL"] ?>" required/>
			<br />
			<label for="pass">Contraseña: </label>
			<input class="input-group" id="pass" name="passA" type="password" value="<?php echo $usuario["PASS"] ?>" oninput="passwordValidation();" required/>
			<br />
			<label for="confirmar">Confirma contraseña: </label>
			<input class="input-group" id="confirmar" name="confirmPassA" type="password" value="<?php echo $usuario["CONFIRMPASS"] ?>" oninput="passwordConfirmation();" required/>
			<br />
			<label for="nif">NIF: </label>
			<input class="input-group" id="nif" name="nifA" type="text" size="30" value="<?php echo $usuario["NIF"] ?>" readonly/>
			<br />
			<input class="boton" type="submit" value="Confirmar cambios" />
		</form>
	</div>
</body>
