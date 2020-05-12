---------------------------------------------------Funcion auxliar
create or replace
FUNCTION ASSERT_EQUALS (salida BOOLEAN, salida_esperada BOOLEAN) RETURN VARCHAR2 AS     --creamos la funcion con sus parámetros de entrada
BEGIN
	IF (salida = salida_esperada) THEN      --realizamos la restriccion
		RETURN 'EXITO';     --devolvemos en ese caso
	ELSE
		RETURN 'FALLO';     --devolvemos en cualquier otro caso
	END IF;
END ASSERT_EQUALS;
/

create or replace package PCK_Usuarios     --Creamos la cabecera del paquete con sus procedimientos y sus parámetros de entrada
IS
PROCEDURE Inicializar;     
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2,w_email VARCHAR2,w_contraseña VARCHAR2, w_nick VARCHAR2,  salidaEsperada BOOLEAN);
PROCEDURE actualizar (nombre_prueba VARCHAR2,w_nombre VARCHAR2, w_apellidos VARCHAR2,w_email VARCHAR2,w_contraseña VARCHAR2, w_nick VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_nick VARCHAR2, salidaEsperada BOOLEAN);
END;
/

----------------------Cabecera Inmueble
create or replace package PCK_Inmuebles     --Creamos la cabecera del paquete con sus procedimientos y sus parámetros de entrada
IS
PROCEDURE Inicializar;     
PROCEDURE insertar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, w_direccion VARCHAR2, w_habitaciones INTEGER,w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, w_direccion VARCHAR2, w_habitaciones INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, salidaEsperada BOOLEAN);
END;
/

----------------------Cabecera Ofertas
create or replace package PCK_Ofertas
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_precio NUMBER, w_fecha_inicio DATE, w_id_inmueble VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_precio NUMBER, w_fecha_inicio DATE, w_id_inmueble VARCHAR2,salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid VARCHAR2, salidaEsperada BOOLEAN);
END;
/

----------------------Cabecera Demandantes
create or replace package PCK_Demandantes
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2,w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_profesion VARCHAR2,w_nomina NUMBER, w_nacimiento DATE, w_correo VARCHAR2, w_movil INTEGER, salidaEsperada BOOLEAN);
PROCEDURE actualizar (nombre_prueba VARCHAR2,w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_profesion VARCHAR2,w_nomina NUMBER, w_nacimiento DATE, w_correo VARCHAR2, w_movil INTEGER, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_nif VARCHAR2, salidaEsperada BOOLEAN);
END;
/


----------------------Cabecera Demandas
create or replace package PCK_Demandas
IS
PROCEDURE Inicializar;
PROCEDURE insertar(nombre_prueba VARCHAR2, w_precioMax NUMBER, w_fechaDemanda DATE, w_tipo VARCHAR2, w_num_mascota INTEGER, w_habitaciones INTEGER, w_nif CHAR, w_oid_o INTEGER, salidaEsperada BOOLEAN);
PROCEDURE actualizar (nombre_prueba VARCHAR2, w_oid INTEGER, w_precioMax NUMBER, w_fechaDemanda DATE, w_tipo VARCHAR2, w_num_mascota INTEGER, w_habitaciones INTEGER, w_nif CHAR, w_oid_o INTEGER, salidaEsperada BOOLEAN);
PROCEDURE eliminar(nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/



----------------------Cabecera Contratos
create or replace package PCK_Contratos
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_inicioalquiler DATE, w_finalquiler DATE, w_pagomensual NUMBER, w_fianza NUMBER, w_oid_d INTEGER, w_nif CHAR, salidaEsperada BOOLEAN);
PROCEDURE actualizar (nombre_prueba VARCHAR2,w_oid INTEGER, w_inicioalquiler DATE, w_finalquiler DATE, w_pagomensual NUMBER, w_fianza NUMBER, w_oid_d INTEGER, w_nif CHAR, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/

----------------------Cabecera PagoMensual
create or replace package PCK_PagoMensual
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_importe INTEGER, w_nif CHAR, w_oid_contrato INTEGER,salidaEsperada BOOLEAN);
PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_fecha DATE, w_importe INTEGER, w_nif CHAR, w_oid_contrato INTEGER,salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/


----------------------Cabecera Revisiones
create or replace package PCK_Revisiones
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_horas INTEGER, w_id VARCHAR2, w_oid_mantenedor INTEGER, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_oid INTEGER,w_fecha DATE, w_horas INTEGER, w_id VARCHAR2, w_oid_mantenedor INTEGER, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/

---------------------Cabecera Autonomos
create or replace package PCK_Autonomos
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2,w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_oid INTEGER, w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2,w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/


----------------------Cabecera Empresas
create or replace package PCK_Empresas
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_cif CHAR, w_nombre VARCHAR2, w_num_trabajadores INTEGER,w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_cif CHAR, w_nombre VARCHAR2, w_num_trabajadores INTEGER,w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/


----------------------Cabecera Incidencias
create or replace package PCK_Incidencias
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_nif CHAR, w_fecha DATE, w_descripcion VARCHAR2,salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_oid INTEGER, w_nif CHAR, w_fecha DATE, w_descripcion VARCHAR2,salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/

----------------------Cabecera Quejas
create or replace package PCK_Quejas
IS
PROCEDURE Inicializar;
PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_descripcion VARCHAR2, w_id VARCHAR2, w_nif CHAR, salidaEsperada BOOLEAN);
PROCEDURE actualizar(nombre_prueba VARCHAR2, w_oid INTEGER, w_fecha DATE, w_descripcion VARCHAR2, w_id VARCHAR2, w_nif CHAR, salidaEsperada BOOLEAN);
PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN);
END;
/



---------------------------------------------------Paquete Usuarios

create or replace
PACKAGE BODY PCK_Usuarios AS       --creamos el cuerpo del paquete

    ------------------------------Inicializar
    PROCEDURE inicializar AS        --Para inicializar borramos los datos
    BEGIN
        DELETE FROM usuarios;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2,w_email VARCHAR2,w_contraseña VARCHAR2, w_nick VARCHAR2,  salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;       --definimos variables
        usuario usuarios%ROWTYPE;
        
    BEGIN
    
        INSERT INTO usuarios VALUES (w_nombre,w_apellidos,w_email,w_contraseña, w_nick);      --realizamos la inserción
        
        SELECT * INTO usuario FROM usuarios WHERE nick=w_nick;      --seleccionamos el inmueble recien insertado
        IF(usuario.nombre<>w_nombre AND usuario.apellidos<>w_apellidos  AND usuario.email<>w_email AND
        usuario.contraseña<>w_contraseña AND usuario.nick<>w_nick) THEN    --comprobamos que se ha insertado correctamente
            salida:=false;
        END IF;
        COMMIT WORK;        
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));            --Imprimimos el resultado de la prueba
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar (nombre_prueba VARCHAR2, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_email VARCHAR2,
        w_contraseña VARCHAR2, w_nick VARCHAR2, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        usuario usuarios%ROWTYPE;
    
    BEGIN
        
        UPDATE usuarios SET nombre=w_nombre, apellidos=w_apellidos,email=w_email, contraseña = w_contraseña  WHERE nick=w_nick;       --Realizamos la actualizacion
        
        SELECT * INTO usuario FROM usuarios WHERE nick=w_nick;          --Comprobamos que se ha actualizado
        IF(usuario.nombre<>w_nombre AND usuario.apellidos<>w_apellidos AND usuario.email<>w_email AND
        usuario.contraseña<>w_contraseña AND usuario.nick<>w_nick) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
    
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_nick VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_usuarios INTEGER;
    BEGIN
    
        DELETE FROM usuarios WHERE nick=w_nick;      --Eliminamos
        
        SELECT COUNT(*) INTO n_usuarios FROM usuarios WHERE nick=w_nick;        --Comprobamos que se ha realizado la eliminacion
        IF(n_usuarios<>0) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
    
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/

---------------------------------------------------Paquete de Inmueble
create or replace
PACKAGE BODY PCK_INMUEBLES AS       --creamos el cuerpo del paquete

    ------------------------------Inicializar
    PROCEDURE inicializar AS        --Para inicializar borramos los datos
    BEGIN
        DELETE FROM inmuebles;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, w_direccion VARCHAR2, w_habitaciones INTEGER,  --para insertar
    w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;       --definimos variables
        inmueble inmuebles%ROWTYPE;
        
    BEGIN
    
        INSERT INTO inmuebles VALUES (w_id_inmueble, w_direccion, w_habitaciones, w_tipo);      --realizamos la inserción
        
        SELECT * INTO inmueble FROM inmuebles WHERE id_inmueble=w_id_inmueble;      --seleccionamos el inmueble recien insertado
        IF(inmueble.direccion<>w_direccion AND inmueble.habitaciones<>w_habitaciones AND inmueble.tipo<>w_tipo) THEN    --comprobamos que se ha insertado correctamente
            salida:=false;
        END IF;
        COMMIT WORK;        
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));            --Imprimimos el resultado de la prueba
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, w_direccion VARCHAR2, w_habitaciones INTEGER,
    w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        inmueble inmuebles%ROWTYPE;
    
    BEGIN
        
        UPDATE inmuebles SET direccion=w_direccion, habitaciones=w_habitaciones, tipo=w_tipo WHERE id_inmueble=w_id_inmueble;       --Realizamos la actualizacion
        
        SELECT * INTO inmueble FROM inmuebles WHERE id_inmueble=w_id_inmueble;          --Comprobamos que se ha actualizado
        IF(inmueble.direccion<>w_direccion AND inmueble.habitaciones<>w_habitaciones AND inmueble.tipo<>w_tipo) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
    
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_id_inmueble VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_inmuebles INTEGER;
    BEGIN
    
        DELETE FROM inmuebles WHERE id_inmueble=w_id_inmueble;      --Eliminamos
        
        SELECT COUNT(*) INTO n_inmuebles FROM inmuebles WHERE id_inmueble=w_id_inmueble;        --Comprobamos que se ha realizado la eliminacion
        IF(n_inmuebles<>0) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
    
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/

 ---------------------------------------------------Paquete de Ofertas
create or replace
PACKAGE BODY PCK_OFERTAS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM ofertas;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_precio NUMBER, w_fecha_inicio DATE, w_id_inmueble VARCHAR2,
    salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        oferta ofertas%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO ofertas VALUES (sec_ofertas.nextval, w_precio, w_fecha_inicio, w_id_inmueble);
        
        
        w_oid:=sec_ofertas.currval;
        SELECT * INTO oferta FROM ofertas WHERE oid_o=w_oid;
        IF(oferta.precio<>w_precio AND oferta.fechaInicio<>w_fecha_inicio AND oferta.id_inmueble<>w_id_inmueble) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_precio NUMBER, w_fecha_inicio DATE, w_id_inmueble VARCHAR2,
    salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        oferta ofertas%ROWTYPE;
    
    BEGIN
        
        UPDATE ofertas SET precio=w_precio, fechaInicio=w_fecha_inicio, id_inmueble=w_id_inmueble WHERE oid_o=w_oid;
        
        SELECT * INTO oferta FROM ofertas WHERE oid_o=w_oid;
        IF(oferta.precio<>w_precio AND oferta.fechaInicio<>w_fecha_inicio AND oferta.id_inmueble<>w_id_inmueble) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_ofertas INTEGER;
    BEGIN
    
        DELETE FROM ofertas WHERE oid_o=w_oid;
        
        SELECT COUNT(*) INTO n_ofertas FROM ofertas WHERE oid_o=w_oid;
        IF(n_ofertas<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/   


---------------------------------------------------Paquete de Demandantes
create or replace
PACKAGE BODY PCK_DEMANDANTES AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM demandantes;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2,w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_profesion VARCHAR2,
    w_nomina NUMBER, w_nacimiento DATE, w_correo VARCHAR2, w_movil INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        demandante demandantes%ROWTYPE;
        
    BEGIN
    
        INSERT INTO demandantes VALUES (w_nif, w_nombre, w_apellidos, w_profesion, w_nomina, w_nacimiento, w_correo, w_movil);
        
        SELECT * INTO demandante FROM demandantes WHERE nif=w_nif;
        IF(demandante.nif<>w_nif AND demandante.nombre<>w_nombre AND demandante.apellidos<>w_apellidos AND
        demandante.profesion<>w_profesion AND demandante.nomina<>w_nomina AND demandante.nacimiento<>w_nacimiento
        AND demandante.correoelectronico<>w_correo AND demandante.movil<>w_movil) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar (nombre_prueba VARCHAR2,w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2, w_profesion VARCHAR2,
    w_nomina NUMBER, w_nacimiento DATE, w_correo VARCHAR2, w_movil INTEGER, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        demandante demandantes%ROWTYPE;
    
    BEGIN
        
        UPDATE demandantes SET nombre=w_nombre, apellidos=w_apellidos, profesion=w_profesion, nomina=w_nomina,
        nacimiento=w_nacimiento, correoelectronico=w_correo, movil=w_movil WHERE nif=w_nif;
        
        SELECT * INTO demandante FROM demandantes WHERE nif=w_nif;
        IF(demandante.nif<>w_nif AND demandante.nombre<>w_nombre AND demandante.apellidos<>w_apellidos AND
        demandante.profesion<>w_profesion AND demandante.nomina<>w_nomina AND demandante.nacimiento<>w_nacimiento
        AND demandante.correoelectronico<>w_correo AND demandante.movil<>w_movil) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_nif VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_demandantes INTEGER;
    BEGIN
    
        DELETE FROM demandantes WHERE nif=w_nif;
        
        SELECT COUNT(*) INTO n_demandantes FROM demandantes WHERE nif=w_nif;
        IF(n_demandantes<>0) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
    
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/


---------------------------------------------------Paquete de Demandas
create or replace
PACKAGE BODY PCK_DEMANDAS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM demandas;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_precioMax NUMBER, w_fechaDemanda DATE, w_tipo VARCHAR2, 
	w_num_mascota INTEGER, w_habitaciones INTEGER, w_nif CHAR, w_oid_o INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        demanda demandas%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO demandas VALUES (sec_demandas.nextval, w_precioMax, w_fechaDemanda, w_tipo, w_num_mascota, 
		w_habitaciones, w_nif, w_oid_o);
        
        
        w_oid:=sec_demandas.currval;
        SELECT * INTO demanda FROM demandas WHERE oid_d=w_oid;
        IF(demanda.precioMax<>w_precioMax AND demanda.fechaDemanda<>w_fechaDemanda AND demanda.tipo<>w_tipo AND
		demanda.num_mascota<>w_num_mascota AND demanda.habitacionesRequeridas<>w_habitaciones AND
		demanda.nif_demandante<>w_nif AND demanda.oid_o<>w_oid_o) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_precioMax NUMBER, w_fechaDemanda DATE, w_tipo VARCHAR2, 
	w_num_mascota INTEGER, w_habitaciones INTEGER, w_nif CHAR, w_oid_o INTEGER, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        demanda demandas%ROWTYPE;
    
    BEGIN
        
        UPDATE demandas SET precioMax=w_precioMax, fechaDemanda=w_fechaDemanda, tipo=w_tipo, num_mascota=w_num_mascota,
			habitacionesRequeridas=w_habitaciones, nif_demandante=w_nif, oid_o=w_oid_o WHERE oid_d=w_oid;
        
        SELECT * INTO demanda FROM demandas WHERE oid_d=w_oid;
        IF(demanda.precioMax<>w_precioMax AND demanda.fechaDemanda<>w_fechaDemanda AND demanda.tipo<>w_tipo AND
		demanda.num_mascota<>w_num_mascota AND demanda.habitacionesRequeridas<>w_habitaciones AND
		demanda.nif_demandante<>w_nif AND demanda.oid_o<>w_oid_o) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_demandas INTEGER;
    BEGIN
    
        DELETE FROM demandas WHERE oid_d=w_oid;
        
        SELECT COUNT(*) INTO n_demandas FROM demandas WHERE oid_d=w_oid;
        IF(n_demandas<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/   

 ---------------------------------------------------Paquete de Contratos
create or replace
PACKAGE BODY PCK_CONTRATOS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM contratos;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_inicioalquiler DATE, w_finalquiler DATE, w_pagomensual NUMBER, w_fianza NUMBER, w_oid_d INTEGER, w_nif CHAR,
    salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        contrato contratos%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO contratos VALUES (sec_contratos.nextval,w_inicioalquiler, w_finalquiler, w_pagomensual, w_fianza, w_oid_d, w_nif);
        
        w_oid:=sec_contratos.currval;
        SELECT * INTO contrato FROM contratos WHERE oid_contrato=w_oid;
        IF(contrato.inicioalquiler<>w_inicioalquiler AND contrato.finalquiler<>w_finalquiler AND 
        contrato.pagomensual<>w_pagomensual AND contrato.fianza<>w_fianza AND contrato.oid_d<>w_oid_d AND
        contrato.nif_demandante<>w_nif) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_inicioalquiler DATE, w_finalquiler DATE, w_pagomensual NUMBER, w_fianza NUMBER, w_oid_d INTEGER, w_nif CHAR,
    salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        contrato contratos%ROWTYPE;
    
    BEGIN
        
        UPDATE contratos SET inicioalquiler=w_inicioalquiler, finalquiler=w_finalquiler, pagomensual=w_pagomensual,
        fianza=w_fianza, oid_d=w_oid_d,nif_demandante=w_nif WHERE oid_contrato=w_oid;
        
        SELECT * INTO contrato FROM contratos WHERE oid_contrato=w_oid;
        IF(contrato.inicioalquiler<>w_inicioalquiler AND contrato.finalquiler<>w_finalquiler AND 
        contrato.pagomensual<>w_pagomensual AND contrato.fianza<>w_fianza AND contrato.oid_d<>w_oid_d AND
        contrato.nif_demandante<>w_nif) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_contratos INTEGER;
    BEGIN
    
        DELETE FROM contratos WHERE oid_contrato=w_oid;
        
        SELECT COUNT(*) INTO n_contratos FROM contratos WHERE oid_contrato=w_oid;
        IF(n_contratos<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/   


 ---------------------------------------------------Paquete de PagoMensual
create or replace
PACKAGE BODY PCK_PAGOMENSUAL AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM pago_mensual;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_importe INTEGER, w_nif CHAR, w_oid_contrato INTEGER,
    salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        pago pago_mensual%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO pago_mensual VALUES (sec_pago.nextval, w_fecha, w_importe, w_nif, w_oid_contrato);
        
        
        w_oid:=sec_pago.currval;
        SELECT * INTO pago FROM pago_mensual WHERE oid_pago=w_oid;
        IF(pago.fecha<>w_fecha AND pago.importe<>w_importe AND pago.nif_demandante<>w_nif AND
		pago.oid_contrato<>w_oid_contrato) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_fecha DATE, w_importe INTEGER, w_nif CHAR, w_oid_contrato INTEGER,
    				salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        pago pago_mensual%ROWTYPE;
    
    BEGIN
        
        UPDATE pago_mensual SET fecha=w_fecha, importe=w_importe, nif_demandante=w_nif, oid_contrato=w_oid_contrato WHERE oid_pago=w_oid;
        
        SELECT * INTO pago FROM pago_mensual WHERE oid_pago=w_oid;
        IF(pago.fecha<>w_fecha AND pago.importe<>w_importe AND pago.nif_demandante<>w_nif AND
		pago.oid_contrato<>w_oid_contrato) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_pagos INTEGER;
    BEGIN
    
        DELETE FROM pago_mensual WHERE oid_pago=w_oid;
        
        SELECT COUNT(*) INTO n_pagos FROM pago_mensual WHERE oid_pago=w_oid;
        IF(n_pagos<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/ 


---------------------------------------------------Paquete de Revisiones
create or replace
PACKAGE BODY PCK_REVISIONES AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM revisiones;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_horas INTEGER, w_id VARCHAR2, 
	w_oid_mantenedor INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        revision revisiones%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO revisiones VALUES (sec_revisiones.nextval, w_fecha, w_horas, w_id, w_oid_mantenedor);
        
        
        w_oid:=sec_revisiones.currval;
        SELECT * INTO revision FROM revisiones WHERE oid_r=w_oid;
        IF(revision.fecha<>w_fecha AND revision.horas_empleadas<>w_horas AND revision.id_inmueble<>w_id AND
		revision.oid_mantenedor<>w_oid_mantenedor) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2,w_oid INTEGER, w_fecha DATE, w_horas INTEGER, w_id VARCHAR2, 
	w_oid_mantenedor INTEGER, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        revision revisiones%ROWTYPE;
    
    BEGIN
        
        UPDATE revisiones SET fecha=w_fecha, horas_empleadas=w_horas, id_inmueble=w_id, oid_mantenedor=w_oid_mantenedor where
        oid_r=w_oid;
        
        SELECT * INTO revision FROM revisiones WHERE oid_r=w_oid;
        IF(revision.fecha<>w_fecha AND revision.horas_empleadas<>w_horas AND revision.id_inmueble<>w_id AND
		revision.oid_mantenedor<>w_oid_mantenedor) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_revisiones INTEGER;
    BEGIN
    
        DELETE FROM revisiones WHERE oid_r=w_oid;
        
        SELECT COUNT(*) INTO n_revisiones FROM revisiones WHERE oid_r=w_oid;
        IF(n_revisiones<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/   


---------------------------------------------------Paquete de Autonomos
create or replace
PACKAGE BODY PCK_AUTONOMOS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM mantenedores;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2,
    w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        autonomo autonomos%ROWTYPE;
        mantenedor mantenedores%ROWTYPE;
        w_oid INTEGER;
    BEGIN
        INSERT INTO mantenedores VALUES (sec_mantenedor.nextval, w_disponibilidad, w_sueldo, w_tipo);
        INSERT INTO autonomos VALUES (sec_mantenedor.currval, w_nif, w_nombre, w_apellidos);
        
        
        
        w_oid:=sec_mantenedor.currval;
        SELECT * INTO mantenedor FROM mantenedores WHERE oid_mantenedor=w_oid;
        SELECT * INTO autonomo FROM autonomos WHERE oid_mantenedor=w_oid;
        
        IF(mantenedor.disponibilidad<>w_disponibilidad  AND mantenedor.sueldo<>w_sueldo AND mantenedor.tipo<>w_tipo AND
        autonomo.nif<>w_nif AND autonomo.nombre<>w_nombre AND autonomo.apellidos<>w_apellidos) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_nif CHAR, w_nombre VARCHAR2, w_apellidos VARCHAR2,
    w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        autonomo autonomos%ROWTYPE;
        mantenedor mantenedores%ROWTYPE;
    
    BEGIN
        
        UPDATE mantenedores SET disponibilidad=w_disponibilidad, sueldo=w_sueldo, tipo=w_tipo where w_oid=oid_mantenedor;
        UPDATE autonomos SET nif=w_nif, nombre=w_nombre, apellidos=w_apellidos where w_oid=oid_mantenedor;
        
        SELECT * INTO mantenedor FROM mantenedores WHERE oid_mantenedor=w_oid;
        SELECT * INTO autonomo FROM autonomos WHERE oid_mantenedor=w_oid;
        
        IF(mantenedor.disponibilidad<>w_disponibilidad  AND mantenedor.sueldo<>w_sueldo AND mantenedor.tipo<>w_tipo AND
        autonomo.nif<>w_nif AND autonomo.nombre<>w_nombre AND autonomo.apellidos<>w_apellidos) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_autonomos INTEGER;
    BEGIN
    
        DELETE FROM mantenedores WHERE oid_mantenedor=w_oid;
        
        SELECT COUNT(*) INTO n_autonomos FROM mantenedores WHERE oid_mantenedor=w_oid;
        IF(n_autonomos<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/




---------------------------------------------------Paquete de Empresas
create or replace
PACKAGE BODY PCK_EMPRESAS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM mantenedores;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_cif CHAR, w_nombre VARCHAR2, w_num_trabajadores INTEGER,
    w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        empresa empresas%ROWTYPE;
        mantenedor mantenedores%ROWTYPE;
        w_oid INTEGER;
    BEGIN
        INSERT INTO mantenedores VALUES (sec_mantenedor.nextval, w_disponibilidad, w_sueldo, w_tipo);
        INSERT INTO empresas VALUES (sec_mantenedor.currval, w_cif, w_nombre, w_num_trabajadores);
        
        
        
        w_oid:=sec_mantenedor.currval;
        SELECT * INTO mantenedor FROM mantenedores WHERE oid_mantenedor=w_oid;
        SELECT * INTO empresa FROM empresas WHERE oid_mantenedor=w_oid;
        
        IF(mantenedor.disponibilidad<>w_disponibilidad  AND mantenedor.sueldo<>w_sueldo AND mantenedor.tipo<>w_tipo AND
        empresa.cif<>w_cif AND empresa.nombre<>w_nombre AND empresa.num_trabajadores<>w_num_trabajadores) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_cif CHAR, w_nombre VARCHAR2, w_num_trabajadores INTEGER,
    w_disponibilidad VARCHAR2, w_sueldo INTEGER, w_tipo VARCHAR2, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        empresa empresas%ROWTYPE;
        mantenedor mantenedores%ROWTYPE;
    
    BEGIN
        
        UPDATE mantenedores SET disponibilidad=w_disponibilidad, sueldo=w_sueldo, tipo=w_tipo where w_oid=oid_mantenedor;
        UPDATE empresas SET cif=w_cif, nombre=w_nombre, num_trabajadores=w_num_trabajadores where w_oid=oid_mantenedor;
        
        SELECT * INTO mantenedor FROM mantenedores WHERE oid_mantenedor=w_oid;
        SELECT * INTO empresa FROM empresas WHERE oid_mantenedor=w_oid;
        
        IF(mantenedor.disponibilidad<>w_disponibilidad  AND mantenedor.sueldo<>w_sueldo AND mantenedor.tipo<>w_tipo AND
        empresa.cif<>w_cif AND empresa.nombre<>w_nombre AND empresa.num_trabajadores<>w_num_trabajadores) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_empresas INTEGER;
    BEGIN
    
        DELETE FROM mantenedores WHERE oid_mantenedor=w_oid;
        
        SELECT COUNT(*) INTO n_empresas FROM mantenedores WHERE oid_mantenedor=w_oid;
        IF(n_empresas<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/   


 ---------------------------------------------------Paquete de Incidencias
create or replace
PACKAGE BODY PCK_INCIDENCIAS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM incidencias;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_nif CHAR, w_fecha DATE, w_descripcion VARCHAR2, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        incidencia incidencias%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO incidencias VALUES (sec_incidencia.nextval, w_nif, w_fecha, w_descripcion);
        
        
        w_oid:=sec_incidencia.currval;
        SELECT * INTO incidencia FROM incidencias WHERE oid_incidencia=w_oid;
        IF(incidencia.nif_demandante<>w_nif AND incidencia.fecha<>w_fecha AND incidencia.descripcion<>w_descripcion) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_nif CHAR, w_fecha DATE, w_descripcion VARCHAR2,
    				salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        incidencia incidencias%ROWTYPE;
    
    BEGIN
        
        UPDATE incidencias SET nif_demandante=w_nif, fecha=w_fecha, descripcion=w_descripcion WHERE oid_incidencia=w_oid;
        
        SELECT * INTO incidencia FROM incidencias WHERE oid_incidencia=w_oid;
        IF(incidencia.nif_demandante<>w_nif AND incidencia.fecha<>w_fecha AND incidencia.descripcion<>w_descripcion) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_incidencia INTEGER;
    BEGIN
    
        DELETE FROM incidencias WHERE oid_incidencia=w_oid;
        
        SELECT COUNT(*) INTO n_incidencia FROM incidencias WHERE oid_incidencia=w_oid;
        IF(n_incidencia<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/ 



 ---------------------------------------------------Paquete de Quejas
create or replace
PACKAGE BODY PCK_QUEJAS AS

    ------------------------------Inicializar
    PROCEDURE inicializar AS
    BEGIN
        DELETE FROM quejas;
    END inicializar;
    
    ------------------------------Insertar
    PROCEDURE insertar (nombre_prueba VARCHAR2, w_fecha DATE, w_descripcion VARCHAR2, w_id VARCHAR2, 
	w_nif CHAR, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        queja quejas%ROWTYPE;
        w_oid INTEGER;
    BEGIN
    
        INSERT INTO quejas VALUES (sec_quejas.nextval, w_fecha, w_descripcion, w_id, w_nif);
        
        
        w_oid:=sec_quejas.currval;
        SELECT * INTO queja FROM quejas WHERE oid_q=w_oid;
        IF(queja.fecha<>w_fecha AND queja.descripcion<>w_descripcion AND queja.id_inmueble<>w_id AND
		queja.nif_demandante<>w_nif) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END insertar;
    
    ------------------------------Actualizar
    PROCEDURE actualizar  (nombre_prueba VARCHAR2, w_oid INTEGER, w_fecha DATE, w_descripcion VARCHAR2, 
			w_id VARCHAR2, w_nif CHAR, salidaEsperada BOOLEAN) AS
        
        salida BOOLEAN := true;
        queja quejas%ROWTYPE;
    
    BEGIN
        
        UPDATE quejas SET fecha=w_fecha, descripcion=w_descripcion, id_inmueble=w_id, nif_demandante=w_nif;
        
        SELECT * INTO queja FROM quejas WHERE oid_q=w_oid;
        IF(queja.fecha<>w_fecha AND queja.descripcion<>w_descripcion AND queja.id_inmueble<>w_id AND
		queja.nif_demandante<>w_nif) THEN
            salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END actualizar;
    
    ------------------------------Eliminar
    PROCEDURE eliminar (nombre_prueba VARCHAR2, w_oid INTEGER, salidaEsperada BOOLEAN) AS
        salida BOOLEAN:=true;
        n_quejas INTEGER;
    BEGIN
    
        DELETE FROM quejas WHERE oid_q=w_oid;
        
        SELECT COUNT(*) INTO n_quejas FROM quejas WHERE oid_q=w_oid;
        IF(n_quejas<>0) THEN
           salida:=false;
        END IF;
        COMMIT WORK;
        
        DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(salida, salidaEsperada));
        
        EXCEPTION
        WHEN OTHERS THEN
            DBMS_OUTPUT.put_line(nombre_prueba || ':' || ASSERT_EQUALS(false, salidaEsperada));
            ROLLBACK;
    END eliminar;
END;
/  
    
    