<?php

if(!isset($_SESSION["login"])){
	?>
	<nav>
        <ul>
            <li><a href="../Psanlucar/index.php"><strong>Home</strong></a></li>
			<li><a href="../Psanlucar/clientes/registroWeb.php">Registrate</a></li>
            <li><a href="../Psanlucar/clientes/login.php">Iniciar Sesion</a></li>
        </ul>
    </nav>
	<?php
	} else if($_SESSION['login']=='Admin1' || $_SESSION['login']=='Admin2') {
		?>
	<nav>
        <ul>
            <li><a href="../index.php"><strong>Home</strong></a></li>
			<li><a href="../Psanlucar/desconectar.php">Cerrar sesión</a></li>
            <li><a href="../Psanlucar/perfil.php">Usuario</a></li>
            <li><a href="../Psanlucar/empleados/consulta_inmuebles.php">Inmuebles</a></li>
            <li><a href="../Psanlucar/empleados/consulta_contratos.php">Contratos</a></li>
        </ul>
    </nav>
	<?php }else{    ?>
        

        <nav>
        <ul>
            <li><a href="../Psanlucar/empleados/consulta_inmuebles.php">Inmuebles</a></li>
            <li><a href="../Psanlucar/index.php"><strong>Home</strong></a></li>
            <li><a href="../Psanlucar/desconectar.php">Cerrar sesión</a></li>
            <li><a href="../Psanlucar/perfil.php">Usuario</a></li>
			
        </ul>
    </nav>

   <?php } ?>
