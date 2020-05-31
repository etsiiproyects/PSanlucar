
<nav id="nav" class="menuNav">
  <div class="logo"> <a href="index.php" onclick="sessionStorage.clear();"> <img width="100px" src="images/logo.png"> </a> </div>
  <ul class="nav-links">
    <?php if(!isset($_SESSION["login"]) && !isset($_SESSION["loginEmpleado"])){ ?>
      <a href="formularioUsuario.php"><li class="nav">  Registrate </li></a>
      <a href="login.php"><li class="nav"> Iniciar Sesion </li></a>
    <?php } else{ ?>
      <li class="navL"><a href="consulta_inmuebles"> Inmuebles </a></li>
      <?php if(isset($_SESSION["loginEmpleado"])){ ?>
        <li class="navL"><a href="consulta_demandas"> Demandas </a></li>
        <li class="navL"><a href="consulta_contratos" > Contratos </a></li>
      <?php } if(isset($_SESSION["login"])) {  ?>
        <li class="navL"><a href="usuario"> Usuario </a></li>
      <?php } ?>
      <a href="desconectar.php"><li class="navL"> Cerrar Sesion</li> </a>
    <?php } ?>

  </ul>
  <div class="burguer">
    <div class="line1"></div>
    <div class="line2"></div>
    <div class="line3"></div>
      </div>
</nav>
