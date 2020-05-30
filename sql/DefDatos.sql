-----------------------------------------Drops
DROP SEQUENCE SEC_CONTRATOS_OID;
DROP SEQUENCE SEC_DEMANDAS_OID;
DROP SEQUENCE SEC_EMPLEADOS_OID;

DROP TABLE CONTRATOS;
DROP TABLE DEMANDAS;
DROP TABLE USUARIOS;
DROP TABLE INMUEBLES;
DROP TABLE EMPLEADO;


-----------------------------------------Tablas
CREATE TABLE EMPLEADO (
	NOMBRE VARCHAR2(25) NOT NULL,
	PASS VARCHAR2(75) NOT NULL,
	OID_EMPLEADO INTEGER NOT NULL,
	PRIMARY KEY (OID_EMPLEADO) );

create table INMUEBLES (
    ID_INMUEBLE VARCHAR2(10)   NOT NULL,
    DIRECCION VARCHAR2(50) NOT NULL,
    HABITACIONES INTEGER,
    IMG VARCHAR2(300),
    TIPO VARCHAR2(13) CHECK (TIPO in ('aislado','plurifamiliar','comercial'))   NOT NULL,
    PRIMARY key (ID_INMUEBLE));

create table usuarios (
    nif char(9) not null,
    nombre varchar2(30) not null,
    apellidos varchar2(100)  not null,
    email varchar2(50) not null,
    pass varchar2(50) not null,
    primary key (nif));

CREATE TABLE DEMANDAS (
    OID_DEMANDA INTEGER NOT NULL,
    PRECIOMAX NUMBER(9,2) NOT NULL,
    FECHADEMANDA DATE  NOT NULL,
    NUM_MASCOTA INTEGER NOT NULL,
    NIF CHAR(9),
    ID_INMUEBLE VARCHAR(10) NOT NULL,
    PRIMARY KEY (OID_DEMANDA),
    FOREIGN KEY (NIF) REFERENCES USUARIOS ON DELETE CASCADE,
    FOREIGN KEY (ID_INMUEBLE) REFERENCES INMUEBLES ON DELETE CASCADE);

CREATE TABLE CONTRATOS (
    OID_CONTRATO INTEGER NOT NULL,
    INICIOALQUILER DATE NOT NULL,
    FINALQUILER DATE NOT NULL,
    PAGOMENSUAL NUMBER(9,2) NOT NULL,
    FIANZA NUMBER(9,2) NOT NULL,
    OID_DEMANDA INTEGER NOT NULL,
    PRIMARY KEY (OID_CONTRATO),
    FOREIGN KEY (OID_DEMANDA) REFERENCES DEMANDAS ON DELETE CASCADE);

-----------------------------------------Secuencias
CREATE SEQUENCE SEC_EMPLEADOS_OID
START WITH 1 INCREMENT BY 1 NOMAXVALUE;

CREATE SEQUENCE SEC_DEMANDAS_OID
START WITH 1 INCREMENT BY 1 NOMAXVALUE;

CREATE SEQUENCE SEC_CONTRATOS_OID
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

CREATE OR REPLACE TRIGGER INSERTAR_DEMANDA_OID
BEFORE INSERT ON DEMANDAS
REFERENCING NEW AS NEW
FOR EACH ROW
BEGIN
  SELECT SEC_DEMANDAS_OID.NEXTVAL INTO :NEW.OID_DEMANDA FROM DUAL;
END;
/

create or replace TRIGGER INSERTAR_CONTRATO_OID
BEFORE INSERT ON CONTRATOS
FOR EACH ROW
BEGIN
    SELECT SEC_CONTRATOS_OID.NEXTVAL INTO :NEW.OID_CONTRATO FROM DUAL;
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
   P_IMG IN inmuebles.img%TYPE,
   P_TIPO IN inmuebles.tipo%TYPE) IS
BEGIN
  INSERT INTO inmuebles(id_inmueble,direccion,habitaciones, img, tipo) VALUES (P_ID,P_DIR,P_HAB,P_IMG,P_TIPO);
END;
/

CREATE OR REPLACE PROCEDURE Insertar_Usuario
	(w_nombre IN usuarios.nombre%TYPE,
	w_apellidos IN usuarios.apellidos%TYPE,
	w_email IN usuarios.email%TYPE,
	w_pass IN usuarios.pass%TYPE,
	w_nif IN usuarios.nif%TYPE) IS
BEGIN
INSERT INTO usuarios(nombre, apellidos, email, pass, nif) VALUES (w_nombre,w_apellidos,w_email,w_pass,w_nif);
END;
/

CREATE OR REPLACE PROCEDURE INSERTAR_DEMANDA
    (W_PRECIO IN DEMANDAS.PRECIOMAX%TYPE,
    W_FECHA IN DEMANDAS.FECHADEMANDA%TYPE,
    W_NUMMASCOTA IN DEMANDAS.NUM_MASCOTA%TYPE,
    W_NIF IN DEMANDAS.NIF%TYPE,
    W_IDI IN DEMANDAS.ID_INMUEBLE%TYPE) IS
BEGIN
    INSERT INTO DEMANDAS(PRECIOMAX, FECHADEMANDA, NUM_MASCOTA, NIF, ID_INMUEBLE) VALUES  (W_PRECIO,W_FECHA,W_NUMMASCOTA,W_NIF, W_IDI);
END;
/

CREATE OR REPLACE PROCEDURE INSERTAR_CONTRATO
    (W_INICIO IN CONTRATOS.INICIOALQUILER%TYPE,
    W_FIN IN CONTRATOS.FINALQUILER%TYPE,
    W_PAGO IN CONTRATOS.PAGOMENSUAL%TYPE,
    W_FIANZA IN CONTRATOS.FIANZA%TYPE,
    w_OIDD IN CONTRATOS.OID_DEMANDA%TYPE) IS
BEGIN
    INSERT INTO CONTRATOS(INICIOALQUILER, FINALQUILER, PAGOMENSUAL, FIANZA, OID_DEMANDA) VALUES (W_INICIO,W_FIN,W_PAGO,W_FIANZA,W_OIDD);
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

CREATE OR REPLACE PROCEDURE QUITAR_USUARIO(b_nif in usuarios.nif%TYPE) IS
begin
	DELETE FROM USUARIOS WHERE  nif=b_nif;
end;
/

CREATE OR REPLACE PROCEDURE QUITAR_DEMANDA(B_OID in DEMANDAS.OID_DEMANDA%TYPE) IS
begin
	DELETE FROM DEMANDAS WHERE  OID_DEMANDA=B_OID;
end;
/

CREATE OR REPLACE PROCEDURE QUITAR_CONTRATO (B_OID IN CONTRATOS.OID_CONTRATO%TYPE) IS
BEGIN
    DELETE FROM CONTRATOS WHERE OID_CONTRATO=B_OID;
END;
/

-----------------------------------------Procedimientos de modificar

CREATE OR REPLACE PROCEDURE MODIFICAR_CONTRATO
(W_OID IN CONTRATOS.OID_CONTRATO%TYPE,
W_INICIO IN CONTRATOS.INICIOALQUILER%TYPE,
W_FIN IN CONTRATOS.FINALQUILER%TYPE,
W_PAGO IN CONTRATOS.PAGOMENSUAL%TYPE) IS
BEGIN
    UPDATE CONTRATOS
	SET INICIOALQUILER=W_INICIO,FINALQUILER=W_FIN, PAGOMENSUAL=W_PAGO
	WHERE OID_CONTRATO=W_OID;
END;
/

CREATE OR REPLACE PROCEDURE MODIFICAR_INMUEBLE
(W_ID IN INMUEBLES.ID_INMUEBLE%TYPE,
W_DIRECCION IN INMUEBLES.DIRECCION%TYPE,
W_HAB IN INMUEBLES.HABITACIONES%TYPE,
W_IMG IN INMUEBLES.IMG%TYPE,
W_TIPO IN INMUEBLES.TIPO%TYPE) IS
BEGIN
    UPDATE INMUEBLES
	SET DIRECCION=W_DIRECCION, HABITACIONES=W_HAB, IMG=W_IMG, TIPO=W_TIPO
	WHERE ID_INMUEBLE=W_ID;
END;
/

SELECT * FROM CONTRATOS NATURAL JOIN DEMANDAS;
SELECT * FROM USUARIOS NATURAL JOIN DEMANDAS NATURAL JOIN CONTRATOS WHERE EMAIL='pablom@gmail.com' AND PASS='AsDf1234'
