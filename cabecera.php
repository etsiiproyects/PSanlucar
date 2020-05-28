<?php

if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){
	?>
	<nav class="naveg">
        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
			<li><a href="registroWeb.php">Registrate</a></li>
            <li><a href="login.php">Iniciar Sesion</a></li>
        </ul>
    </nav>
	<?php
	} else if(isset($_SESSION["loginEmpleado"])) {
		?>
	<nav class="naveg">
        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
						<li><a href="desconectar.php">Cerrar sesión</a></li>
            <li><a href="consulta_inmuebles.php">Inmuebles</a></li>
            <li><a href="consulta_contratos.php">Contratos</a></li>
        </ul>
    </nav>
	<?php }else{    ?>


        <nav class="naveg">
        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
            <li><a href="desconectar.php">Cerrar sesión</a></li>
            <li><a href="usuario.php">Usuario</a></li>
            <li><a href="consulta_inmuebles.php">Inmuebles</a></li>

        </ul>
    </nav>

   <?php } ?>
