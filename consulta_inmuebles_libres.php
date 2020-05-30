
<?php
	$conexion = crearConexionBD();
	$filas = consultarTodosInmuebles();
	cerrarConexionBD($conexion);
?>
<div id="freeInmuebles" class="inmuebles">
    <?php
        foreach($filas as $fila) {
    ?>
    <form method="post" action="controlador.php">
    <div class="inmueble">
        <div class="nameBx">
            <input id="IMG" name="IMG" type="hidden" value="<?php echo $fila["IMG"]; ?>"/>
            <img src="<?php echo $fila["IMG"]; ?>" width="300px">
        </div>
        <div class="infoBx">
            <input id="ID_INMUEBLE" name="ID_INMUEBLE" type="hidden" value="<?php echo $fila["ID_INMUEBLE"]; ?>"/>
            <h2>Inmueble: <b><?php echo $fila["ID_INMUEBLE"]; ?></b></h2>
            <input id="DIRECCION" name="DIRECCION" type="hidden" value="<?php echo $fila["DIRECCION"]; ?>"/>
            <p>Direccion: <b><?php echo $fila["DIRECCION"]; ?></b></p>
            <input id="HABITACIONES" name="HABITACIONES" type="hidden" value="<?php echo $fila["HABITACIONES"]; ?>"/>
            <p>Numero de habitaciones: <b><?php echo $fila["HABITACIONES"]; ?></b></p>
            <input id="TIPO" name="TIPO" type="hidden" value="<?php echo $fila["TIPO"]; ?>"/>
            <p>Tipo de inmueble: <b><?php echo $fila["TIPO"]; ?></b></p>

            <?php if(isset($_SESSION['loginEmpleado'])){ ?>

                <?php if (isset($inmueble) and ($inmueble["ID_INMUEBLE"] == $fila["ID_INMUEBLE"])) { ?>
                    <button id="grabar" name="grabar" type="submit" >
                        Guardar
                    </button>
                    <?php } else { ?>
                    <button id="editar" name="editar" type="submit">
                        Modificar
                    </button>
                    <?php } ?>
                    <input id="borrar" name="borrar" type="hidden" value=""/>
                    <button type="button" onclick="alertaBorrar()" >
                        Borrar
                    </button>

                <?php } ?>
                </form>
        </div>
    </div>
    </form>
    <?php } ?>
</div>
