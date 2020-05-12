
-----------------------------------------Drops
DROP SEQUENCE SEC_OFERTAS_OID;
DROP SEQUENCE SEC_EMPLEADOS_OID;
DROP TABLE USUARIOS;
DROP TABLE OFERTAS;
DROP TABLE INMUEBLES;
DROP TABLE EMPLEADO;

-----------------------------------------Tablas
CREATE TABLE EMPLEADO (
	NOMBRE VARCHAR2(25) NOT NULL,
	PASS VARCHAR2(75) NOT NULL,
	OID_EMPLEADO INTEGER NOT NULL,
	PRIMARY KEY (OID_EMPLEADO) );

create table inmuebles (
    id_inmueble varchar2(10)   not null,
    direccion varchar2(50)  not null,
    habitaciones integer,
    tipo varchar2(13) check (tipo in ('aislado','plurifamiliar','comercial'))   not null,
    primary key (id_inmueble));

create table ofertas (
    oid_o integer   not null,
    precio number(9,2)  not null,
    fechaInicio date    not null,
    id_inmueble varchar2(10)    not null,
    primary key (oid_o),
    foreign key (id_inmueble) references inmuebles);

create table usuarios (
    nombre varchar2(30) not null,
    apellidos varchar2(100)  not null,
    --  fecha date not null,
    email varchar2(50) not null,
    pass varchar2(50) not null,
    nick varchar2(20),
    primary key (nick)
    );
-----------------------------------------Secuencias
CREATE SEQUENCE SEC_EMPLEADOS_OID
START WITH 1 INCREMENT BY 1 NOMAXVALUE;

CREATE SEQUENCE SEC_OFERTAS_OID
START WITH 1 INCREMENT BY 1 NOMAXVALUE;

-----------------------------------------Triggers OIDs
CREATE OR REPLACE TRIGGER INSERTAR_EMPLEADO_OID
BEFORE INSERT ON EMPLEADO
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT SEC_EMPLEADOS_OID.NEXTVAL INTO :NEW.OID_EMPLEADO FROM DUAL;
END;
/

create or replace TRIGGER INSERTAR_OFERTA_OID
BEFORE INSERT ON ofertas
FOR EACH ROW
BEGIN
    SELECT sec_ofertas_oid.NEXTVAL INTO :NEW.oid_o FROM DUAL;
END;
/

-----------------------------------------Procedimientos de Insertar
CREATE OR REPLACE PROCEDURE INSERTAR_EMPLEADO
  (P_NOM IN EMPLEADO.NOMBRE%TYPE,
   P_PASS IN EMPLEADO.PASS%TYPE) IS
BEGIN
  INSERT INTO EMPLEADO(NOMBRE,PASS) VALUES (P_NOM,P_PASS);
END;
/

CREATE OR REPLACE PROCEDURE INSERTAR_INMUEBLE
  (P_ID IN inmuebles.id_inmueble%TYPE,
   P_DIR IN inmuebles.direccion%TYPE,
   P_HAB IN inmuebles.habitaciones%TYPE,
   P_TIPO IN inmuebles.tipo%TYPE) IS
BEGIN
  INSERT INTO inmuebles(id_inmueble,direccion,habitaciones,tipo) VALUES (P_ID,P_DIR,P_HAB,P_TIPO);
END;
/

CREATE OR REPLACE PROCEDURE Insertar_Usuario
	(w_nombre IN usuarios.nombre%TYPE,
	w_apellidos IN usuarios.apellidos%TYPE,
	w_email IN usuarios.email%TYPE,
	w_pass IN usuarios.pass%TYPE,
	w_nick IN usuarios.nick%TYPE) IS
BEGIN
INSERT INTO usuarios(nombre, apellidos, email, pass, nick) VALUES (w_nombre,w_apellidos,w_email,w_pass,w_nick);
END;
/

CREATE OR REPLACE PROCEDURE insertar_oferta
	(w_precio IN ofertas.precio%TYPE,
	w_fechaI IN ofertas.fechaInicio%TYPE,
	w_idInmueble IN ofertas.id_inmueble%TYPE) IS
BEGIN
 INSERT INTO ofertas(precio,fechaInicio,id_inmueble) VALUES (w_precio,w_fechaI,w_idInmueble);
END;
/


-----------------------------------------Procedimientos de Eliminar

CREATE OR REPLACE PROCEDURE QUITAR_EMPLEADO(b_oid in empleado.OID_EMPLEADO%TYPE) IS
BEGIN
	DELETE FROM EMPLEADO WHERE OID_EMPLEADO=b_oid;
END;
/

CREATE OR REPLACE PROCEDURE QUITAR_INMUEBLE(b_id in inmuebles.id_inmueble%TYPE) IS
BEGIN
    DELETE FROM INMUEBLES WHERE ID_INMUEBLE=b_id;
END;
/

CREATE OR REPLACE PROCEDURE QUITAR_USUARIO(b_nick in usuarios.nick%TYPE) IS
begin
	DELETE FROM USUARIOS WHERE  nick=b_nick;
end;
/

CREATE OR REPLACE PROCEDURE quitar_oferta (b_oid IN ofertas.oid_o%TYPE) IS
BEGIN
    DELETE FROM ofertas WHERE b_oid=oid_o;
END;
/


SELECT COUNT(*) FROM EMPLEADO WHERE NOMBRE='Admin1' AND PASS='123456As';
SELECT COUNT(*) FROM USUARIOS WHERE EMAIL='josecr@gmail.com' AND PASS='Qwerty12';

