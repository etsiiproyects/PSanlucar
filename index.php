<?php
Header("Location: paginaprincipal.php");
?>
<!-- <?php

	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$pass = $_POST['pass'];

		$conexion = crearConexionBD();
		$funct = consultarUsuario($conexion,$email,$pass);
		cerrarConexionBD($conexion);
		if(!$funct){
			$login["usuario"] = $email;
			$login["pass"] = $pass;
		}
		else{
			$_SESSION["login"] = $email;
			Header("Location: index.php");
		}
    }

?>
    <div class="bloque">
		<h2> Descripcion: </h2>
		<p> Aquí se mostraria informacion general sobre la empresa, asi como los inmuebles existentes. </p>
	</div> -->
