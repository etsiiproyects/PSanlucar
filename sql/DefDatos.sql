DROP SEQUENCE SEC_EMPLEADOS_OID; 

DROP TABLE INMUEBLES;
DROP TABLE EMPLEADO;

CREATE TABLE EMPLEADO (
	NOMBRE VARCHAR2(25) NOT NULL,
	PASS VARCHAR2(75) NOT NULL,
	OID_EMPLEADO INTEGER NOT NULL,
	PRIMARY KEY (OID_EMPLEADO) );
    
create table inmuebles
    (   id_inmueble varchar2(10)     not null,          --Declaro nombre de la variable, su tipo y si puede ser null
        direccion varchar2(50)  not null,
        habitaciones integer,
        tipo varchar2(13) check (tipo in ('aislado','plurifamiliar','comercial'))   not null,   --definimos que es un tipo enumerado de los 3 casos posibles
        primary key (id_inmueble));     -- designa la clave primaria
        
CREATE SEQUENCE SEC_EMPLEADOS_OID
START WITH 1 INCREMENT BY 1 NOMAXVALUE;

CREATE OR REPLACE TRIGGER INSERTAR_EMPLEADO_OID
BEFORE INSERT ON EMPLEADO
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT SEC_EMPLEADOS_OID.NEXTVAL INTO :NEW.OID_EMPLEADO FROM DUAL;
END;
/

CREATE OR REPLACE PROCEDURE INSERTAR_EMPLEADO 
  (P_NOM IN EMPLEADO.NOMBRE%TYPE,
   P_PASS IN EMPLEADO.PASS%TYPE) IS
BEGIN
  INSERT INTO EMPLEADO(NOMBRE,PASS) 
  VALUES (P_NOM,P_PASS);
END;
/

CREATE OR REPLACE PROCEDURE INSERTAR_INMUEBLE 
  (P_ID IN inmuebles.id_inmueble%TYPE,
   P_DIR IN inmuebles.direccion%TYPE,
   P_HAB IN inmuebles.habitaciones%TYPE,
   P_TIPO IN inmuebles.tipo%TYPE) IS
BEGIN
  INSERT INTO inmuebles(id_inmueble,direccion,habitaciones,tipo) 
  VALUES (P_ID,P_DIR,P_HAB,P_TIPO);
END;
/