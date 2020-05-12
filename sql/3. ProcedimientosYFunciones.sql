
----------------------------------------Procedimientos

   CREATE OR REPLACE
PROCEDURE Inserta_Usuario(w_nombre VARCHAR2, w_apellidos VARCHAR2, w_email VARCHAR2,w_contraseña VARCHAR2,w_nick VARCHAR2)
IS

BEGIN
  INSERT INTO usuarios 
    VALUES (w_nombre,w_apellidos,w_email,w_contraseña,w_nick); 
END Inserta_Usuario;
/
------------RF-001-Inquilinos
CREATE OR REPLACE PROCEDURE inquilinos AS           -- creamos el procedimiento
    CURSOR C IS         -- y un cursor para crear un bucle
        SELECT nif_demandante as inquilinos from contratos where sysdate between inicioAlquiler and finAlquiler;        -- el cursor recorre los datos seleccionados con select
BEGIN
    FOR fila IN C LOOP      --para cada linea del cursor
        DBMS_OUTPUT.PUT_LINE('NIF:' || fila.inquilinos);        -- se imprime
    END LOOP;
END inquilinos;
/ 

------------RF-002-Inmuebles disponibles

CREATE OR REPLACE PROCEDURE inmueblesDisponibles AS
    CURSOR C IS
        SELECT id_inmueble as libres from inmuebles where id_inmueble not in (select id_inmueble 
        from ofertas natural join demandas natural join contratos where sysdate between inicioAlquiler and finAlquiler);
BEGIN
    FOR fila IN C LOOP
        DBMS_OUTPUT.PUT_LINE('ID:' || fila.libres);
    END LOOP;
END inmueblesDisponibles;
/ 


------------RF-003-Demandas de inmuebles disponibles

CREATE OR REPLACE PROCEDURE demandasInmueblesDisponibles AS
    CURSOR C IS
        SELECT oid_d as ldemandas from demandas natural join ofertas where id_inmueble not in 
        (select id_inmueble from ofertas natural join demandas natural join contratos where sysdate between inicioAlquiler and finAlquiler);
BEGIN
    FOR fila IN C LOOP
        DBMS_OUTPUT.PUT_LINE('ID:' || fila.ldemandas);
    END LOOP;
END demandasInmueblesDisponibles;
/ 


------------RF-004-Quejas de un inquilino

CREATE OR REPLACE PROCEDURE quejasInquilino (w_nif in quejas.nif_demandante%TYPE) AS
    CURSOR C IS
        SELECT descripcion as lquejas from quejas where nif_demandante=w_nif;
BEGIN
    FOR fila IN C LOOP
        DBMS_OUTPUT.PUT_LINE('Queja:' || fila.lquejas);
    END LOOP;
END quejasInquilino;
/ 


------------RF-005-Fin de contratos

CREATE OR REPLACE PROCEDURE finContratos AS
    CURSOR C IS
        SELECT oid_contrato, finAlquiler as fechas from contratos where sysdate between inicioAlquiler and finAlquiler;
BEGIN
    FOR fila IN C LOOP
        DBMS_OUTPUT.PUT_LINE('El contrato ' || fila.oid_contrato || ' expira el ' || fila.fechas);
    END LOOP;
END finContratos;
/ 


------------RF-007-Incidencias inquilino

CREATE OR REPLACE PROCEDURE incidenciaInquilino(w_nif in incidencias.nif_demandante%TYPE) AS
    CURSOR C IS
        SELECT descripcion as Inci from incidencias where w_nif=nif_demandante;
BEGIN
    FOR fila IN C LOOP
        DBMS_OUTPUT.PUT_LINE('Incidencia ' || fila.Inci);
    END LOOP;
END incidenciaInquilino;
/ 


------------------------------------------Funciones

------------RF-006-Precio de revision
CREATE OR REPLACE FUNCTION precioRevision       --creamos la funcion
    (w_oid IN revisiones.oid_r%TYPE)        -- parámetro de entrada
    RETURN NUMBER IS w_precio revisiones.horas_empleadas%TYPE;      --declaramos qué va a devolver la función y de qué tipo es
BEGIN
    select horas_empleadas*sueldo into w_precio from revisiones natural join mantenedores where w_oid=oid_r;    --asignamos el resultado a la variable
RETURN(w_precio);       --devolvemos la variable
END precioRevision;
/
    
------------RF-009-Ultima revision
CREATE OR REPLACE FUNCTION ultimaRevision 
    (w_id IN revisiones.id_inmueble%TYPE)
    RETURN DATE IS w_fecha revisiones.fecha%TYPE;
BEGIN
    select max(fecha) into w_fecha from revisiones where w_id=id_inmueble;
RETURN(w_fecha);
END ultimaRevision;
/
    

-----------RF-010-Numero de contratos vigentes
CREATE OR REPLACE FUNCTION num_contratos_vigentes
RETURN  NUMBER 
IS cont NUMBER;
BEGIN
    SELECT count(*) INTO cont FROM contratos WHERE sysdate BETWEEN inicioalquiler AND finalquiler;  
RETURN cont;
END num_contratos_vigentes;
/
