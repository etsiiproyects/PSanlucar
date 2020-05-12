---------------RN - 001 - Mínimos del cliente 

create or replace trigger renta_minima      --creamos el trigger
before insert on demandas       --antes de añadir en la tabla de demandas
for each row        --para cada fila
declare     
importe_alquiler number(9,2);       --declaramos las variables que vamos a utilizar
sueldo number(9,2);
begin
    select precio into importe_alquiler from ofertas where :new.oid_o=oid_o;    --asignamos a la variable que queramos el resultado que nos convenga
    select nomina into sueldo from demandantes where :new.nif_demandante=nif;
    
    if(sueldo <= 3 * importe_alquiler)      --realizamos la restricción
        then raise_application_error(-20603, 'No cumple el requisito de renta minima');     --lanzamos un error si se da la restriccion
        end if;
end;
/

---------------RN - 002 - alquiler_piso

create or replace trigger alquier_piso
before insert on contratos
for each row
declare
fecha_fin date;
diferencia integer;
begin
    select max(finAlquiler) into fecha_fin from contratos natural join demandas natural join ofertas natural join inmuebles where oid_d=:new.oid_d;
    select :new.inicioAlquiler-fecha_fin into diferencia from dual;
    if(diferencia<=7)
        then raise_application_error(-20604, 'Hay que esperar una semana para volver a arrendar el inmueble');
    end if;
end;
/


-------------RN – 003 – Tipo de pago
create or replace trigger pago_incompleto
after insert on pago_mensual
for each row 
declare
    total number(9,2);
begin 
    select pagoMensual into total from contratos  where oid_contrato=:new.oid_contrato;

    if(:new.importe < total)
        then
        insert into incidencias(nif_demandante, fecha, descripcion) values (:new.nif_demandante,:new.fecha, 'El pago del ' || :new.fecha ||  ' no esta completo');
        end if;
end;
/

--------------RN-005-Fecha pago
create or replace trigger pago_tardio
after insert on pago_mensual
for each row
declare
    dia_pago integer;
    mes_pago integer;
begin
    select extract(day from :new.fecha) into dia_pago from dual;
    select extract(month from :new.fecha) into mes_pago from dual;
    
    if(dia_pago>10)
         then
           insert into incidencias(nif_demandante, fecha, descripcion) values (:new.nif_demandante,:new.fecha, 'El pago del mes ' || mes_pago || ' se ha realizado tarde, exactamente el dia '
         || dia_pago);
    end if;
end;
/

---------------RN-006-Edad del cliente
create or replace trigger edad
before insert on demandantes
for each row
declare
    anyo_nacimiento integer;
    anyo_actual integer;
begin 
    select extract(year from sysdate) into anyo_actual from dual;
    select extract(year from :new.nacimiento) into anyo_nacimiento from dual;

    if(anyo_actual-anyo_nacimiento<23)
        then raise_application_error(-20602, 'Solo se permite alquilar a personas mayores de 23 años');
    end if;
end;
/

----------RN-007-Numero de mascotas
create or replace trigger mascota
before insert on demandas
for each row
begin
    if(:NEW.num_mascota >1 and :NEW.tipo = 'plurifamiliar')
        then raise_application_error(-20600, 'Un piso no puede tener mas de una mascota');
    end if;
    if(:NEW.num_mascota >2 and :NEW.tipo = 'aislado')
        then raise_application_error(-20601, 'Un chalet no puede tener mas de dos mascota');
    end if;
end;
/
