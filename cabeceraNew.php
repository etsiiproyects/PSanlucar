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
	} else{
    ?>
        <nav class="menuNav">
        <div class="logo">
            <a href="index.php"> <img width="100px" src="images/logo.png"> </a>
        </div>
        <ul class="nav-links">
        <?php if(isset($_SESSION["loginEmpleado"])){ ?>
        
            <li id="btn-demandas" class="navL">
                <a href="#" data-target="consulta_demandas"> Demandas </a>
            </li>
            <li class="navL">
                <a href="#" data-target="consulta_contratos"> Contratos </a>
            </li>

        <?php } ?>

            <li id="btn-inmuebles" class="navL">
                <a href="#" data-target="consulta_inmuebles"> Inmuebles </a>
            </li>

        <?php if(isset($_SESSION["login"])){  ?>

            <li class="navL">
                <a href="#" data-target="usuario"> Usuario </a>
            </li>

        <?php } ?>

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
        
        
    
	<?php }  ?>




   