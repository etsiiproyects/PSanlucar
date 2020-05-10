<?php

if(!isset($_SESSION["login"])){
	?>
	<nav class="naveg">
        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
			<li><a href="clientes/registroWeb.php">Registrate</a></li>
            <li><a href="clientes/login.php">Iniciar Sesion</a></li>
        </ul>
    </nav>
	<?php
	} else if($_SESSION['login']=='Admin1' || $_SESSION['login']=='Admin2') {
		?>
	<nav class="naveg">
        <ul>
            <li><a href="index.php"><strong>Home</strong></a></li>
			<li><a href="desconectar.php">Cerrar sesión</a></li>
            <li><a href="perfil.php">Usuario</a></li>
            <li><a href="consulta_inmuebles.php">Inmuebles</a></li>
            <li><a href="consulta_contratos.php">Contratos</a></li>
        </ul>
    </nav>
	<?php }else{    ?>


        <nav class="naveg">
        <ul>
            <li><a href="consulta_inmuebles.php">Inmuebles</a></li>
            <li><a href="index.php"><strong>Home</strong></a></li>
            <li><a href="desconectar.php">Cerrar sesión</a></li>
            <li><a href="perfil.php">Usuario</a></li>

        </ul>
    </nav>

   <?php } ?>
