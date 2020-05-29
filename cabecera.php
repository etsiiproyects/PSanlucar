<?php

if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){
    ?>
    <nav class="menuNav">
        <div class="logo">
            <a href="index.php"> <img width="100px" src="images/logo.png"> </a>
        </div>
        <ul class="nav-links">
            <li class="nav">
                <a href="formularioUsuario.php"> Registrate </a>
            </li>
            <li class="nav">
                <a href="login.php"> Iniciar Sesion </a>
            </li>
        </ul>
        <div class="burguer">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
	<?php
	} else if(isset($_SESSION["loginEmpleado"])) {
        ?>
    <nav class="menuNav">
        <div class="logo">
            <a href="index.php"> <img width="100px" src="images/logo.png"> </a>
        </div>
        <ul class="nav-links">
            <li class="navL">
                <a href="consulta_demandas.php"> Demandas </a>
            </li>
            <li class="navL">
                <a href="consulta_inmuebles.php"> Inmuebles </a>
            </li>
            <li class="navL">
                <a href="consulta_contratos.php"> Contratos </a>
            </li>
            <li class="navL">
                <a href="desconectar.php"> Cerrar Sesion </a>
            </li>
        </ul>
        <div class="burguer">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
	<?php }else{    ?>


    <nav class="menuNav">
        <div class="logo">
            <a href="index.php"> <img width="100px" src="images/logo.png"> </a>
        </div>
        <ul class="nav-links">
            <li class="nav">
                <a href="desconectar.php"> Cerrar Sesion </a>
            </li>
            <li class="nav">
                <a href="usuario.php"> Usuario </a>
            </li>
            <li class="nav">
                <a href="consulta_inmuebles.php"> Inmuebles </a>
            </li>
        </ul>
        <div class="burguer">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

   <?php } ?>



   