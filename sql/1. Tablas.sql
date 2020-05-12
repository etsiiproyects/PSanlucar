---------------------------------------------------------------------------------------Eliminacion de Tablas
drop table quejas;
drop table incidencias;
drop table empresas;
drop table autonomos;
drop table revisiones;
drop table mantenedores;
drop table pago_mensual;
drop table contratos;
drop table demandas;
drop table demandantes;
drop table ofertas;
drop table inmuebles;
drop table usuarios;
drop table incidencias;


----------------------------------------------------------------------------------------Creacion de Tablas
create table usuarios 
    (   nombre varchar2(30) not null,
        apellidos varchar2(100)  not null,
      --  fecha date not null,
        email varchar2(50) not null,
        contraseña varchar2(50) not null,
        nick varchar2(20),
        primary key (nick)
        );

        
create table inmuebles
    (   id_inmueble varchar2(10)     not null,          --Declaro nombre de la variable, su tipo y si puede ser null
        direccion varchar2(50)  not null,
        habitaciones integer,
        tipo varchar2(13) check (tipo in ('aislado','plurifamiliar','comercial'))   not null,   --definimos que es un tipo enumerado de los 3 casos posibles
        primary key (id_inmueble));     -- designa la clave primaria
        
create table ofertas
    (   oid_o integer   not null,
        precio number(9,2)  not null,
        fechainicio date    not null,
        id_inmueble varchar2(10)    not null,
        primary key (oid_o),
        foreign key (id_inmueble) references inmuebles on delete cascade);        -- designa la clave ajena
        
create table demandantes
    (   nif char(9)     not null,
        nombre varchar2(50) not null,
        apellidos varchar2(100)  not null,
        profesion varchar2(20),
        nomina number(9,2)  not null,
        nacimiento date not null,
        correoelectronico varchar2(50),
        movil integer   not null,
        primary key (nif));
        
create table demandas (   
        oid_d integer   not null,
        precioMax number(9,2)   not null,
        fechaDemanda date   not null,
        tipo varchar2(13) check (tipo in ('aislado','plurifamiliar','comercial'))   not null,
        num_mascota integer not null,
        habitacionesRequeridas integer  not null,
        nif_demandante char(9),
        oid_o integer,
        primary key (oid_d),
        foreign key (nif_demandante) references demandantes on delete cascade,
        foreign key (oid_o) references ofertas on delete cascade);
        
create table contratos (   
        oid_contrato integer    not null,
        inicioAlquiler date not null,
        finAlquiler date    not null,
        pagoMensual number(9,2) not null,
        fianza number(9,2)  not null,
        oid_d integer   not null,
        nif_demandante char(9) not null,
        primary key (oid_contrato),
        foreign key (oid_d) references demandas,
        foreign key (nif_demandante) references demandantes);

create table pago_mensual (
    oid_pago integer    not null,
    fecha date  not null,
    importe integer   not null,
    nif_demandante char(9)  not null,
    oid_contrato integer    not null,
    primary key (oid_pago),
    foreign key(nif_demandante) references demandantes on delete cascade,
    foreign key(oid_contrato) references contratos on delete cascade);
       
create table mantenedores (
    oid_mantenedor integer  not null,
    disponibilidad varchar2(100),
    sueldo integer  not null,
    tipo varchar2(30) check(tipo in ('limpieza','mantenimiento_tuberias','mantenimiento_inmueble')) not null,
    primary key(oid_mantenedor));
    
create table revisiones (
    oid_r integer  not null,
    fecha date not null,
    horas_empleadas integer not null,
    id_inmueble varchar2(10)    not null,
    oid_mantenedor integer  not null,
    primary key(oid_r),
    foreign key(id_inmueble) references inmuebles on delete cascade,
    foreign key(oid_mantenedor) references mantenedores);

create table autonomos (
    oid_mantenedor integer  not null,
    nif char(9) not null,
    nombre varchar2(30) not null,
    apellidos varchar2(50)  not null,
    primary key (oid_mantenedor),
    foreign key (oid_mantenedor) references mantenedores on delete cascade);

create table empresas (
    oid_mantenedor integer  not null,
    cif char(9) not null,
    nombre varchar2(30),
    num_trabajadores varchar2(30),
    primary key (oid_mantenedor),
    foreign key (oid_mantenedor) references mantenedores on delete cascade);

create table incidencias (
    oid_incidencia integer  not null,
    nif_demandante char(9)  not null,
    fecha date,
    descripcion varchar2(200)    not null,
    primary key(oid_incidencia),
    foreign key (nif_demandante) references demandantes on delete cascade);
    

create table quejas (
    oid_q integer   not null,
    fecha date  not null,
    descripcion varchar2(200)   not null,
    id_inmueble varchar2(10),
    nif_demandante char(9),
    foreign key (id_inmueble) references inmuebles on delete cascade,
    foreign key (nif_demandante) references demandantes);
    
        





