<?php
	session_start();

    if (isset($_SESSION['login']) || isset($_SESSION['loginEmpleado']))
        $_SESSION['login'] = null;
				$_SESSION['loginEmpleado'] = null;

    header("Location: index.php");
?>
