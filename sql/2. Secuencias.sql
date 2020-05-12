
----------------------------------------------------------------------------------Creacion de secuencias
DROP SEQUENCE sec_demandas;         -- creamos secuencia para definir el oid
CREATE SEQUENCE sec_demandas INCREMENT BY 1 START WITH 1;       -- que empieza por 1 y aumenta de 1 en 1

DROP SEQUENCE sec_contratos;  
CREATE SEQUENCE sec_contratos INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_ofertas;  
CREATE SEQUENCE sec_ofertas INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_revisiones;  
CREATE SEQUENCE sec_revisiones INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_mantenedor;  
CREATE SEQUENCE sec_mantenedor INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_pago;  
CREATE SEQUENCE sec_pago INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_incidencia;  
CREATE SEQUENCE sec_incidencia INCREMENT BY 1 START WITH 1;

DROP SEQUENCE sec_quejas;  
CREATE SEQUENCE sec_quejas INCREMENT BY 1 START WITH 1;


