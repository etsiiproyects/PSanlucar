<?php
  /*
     * #===========================================================#
     * #	Este fichero contiene las funciones de gestión     			 
     * #	de libros de la capa de acceso a datos 		
     * #==========================================================#
     */
function consultarTodosInmuebles($conexion) {
	$consulta = "SELECT id_inmueble, direccion, habitaciones, tipo FROM INMUEBLES";
    return $conexion->query($consulta);
}
function consultarTodosContratos($conexion){
  $consulta = "SELECT * FROM CONTRATOS";
  return $conexion->query($consulta);
}

?>