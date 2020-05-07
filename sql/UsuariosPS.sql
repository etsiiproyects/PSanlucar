drop table usuarios;

create table usuarios 
    (   nombre varchar2(30) not null,
        apellidos varchar2(100)  not null,
      --  fecha date not null,
        email varchar2(50) not null,
        contraseña varchar2(50) not null,
        nick varchar2(20),
        primary key (nick)
        );
        
        CREATE OR REPLACE
PROCEDURE Inserta_Usuario(w_nombre VARCHAR2, w_apellidos VARCHAR2, w_email VARCHAR2,w_contraseña VARCHAR2,w_nick VARCHAR2)
IS

BEGIN
  INSERT INTO usuarios 
    VALUES (w_nombre,w_apellidos,w_email,w_contraseña,w_nick); 
END Inserta_Usuario;
/

BEGIN
Inserta_Usuario('Pablo', 'Gonzalez Rodriguez', 'pablom@gmail.com' ,'AsDf1234','moncalvillo3');

END;
/
--INSERT INTO usuarios VALUES ('Pablo', 'Gonzalez Rodriguez', '18/12/1978', 'pablom@gmail.com' ,'AsDf1234','C/ San Juan de la Cruz', 'Granada','moncalvillo3');