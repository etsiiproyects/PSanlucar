<?php

unset($_SESSION["loginEmpleado"]);
unset($_SESSION["login"]);
unset($_SESSION["contrato"]);
unset($_SESSION["inmueble"]);
unset($_SESSION["formulario"]);
unset($_SESSION["errores"]);
Header("Location: paginaprincipal.php");

?>
    
