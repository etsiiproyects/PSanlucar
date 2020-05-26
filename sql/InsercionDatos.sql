begin
insertar_empleado('Admin1','123456As');
insertar_empleado('Admin2','123456Sa');
insertar_empleado('Admin3','Sa1234As');
quitar_empleado(3);

Insertar_Usuario('Pablo', 'Gonzalez Rodriguez', 'pablom@gmail.com' ,'AsDf1234','moncalvillo3');
Insertar_Usuario('Jose Carlos', 'Morales Borreguero', 'josecb@gmail.com', 'Qwerty12', 'morales');
Insertar_Usuario('Jose Carlos', 'Romero Pozo', 'josecr@gmail.com', 'Qwerty12', 'romero');
Insertar_Usuario('Fernando', 'Valdes Navarro', 'fernandov@gmail.com', 'Qwerty12', 'valdes');
Quitar_Usuario('morales');
Quitar_Usuario('valdes');

insertar_inmueble('01.00','C/ San Juan de la Cruz',4, 'aislado');
insertar_inmueble('02.1A','C/ Cristobal Colon',2, 'plurifamiliar');
insertar_inmueble('02.1B','C/ Cristobal Colon',2,'plurifamiliar');
insertar_inmueble('03.00','C/ San Bartolome',0,'comercial');
insertar_inmueble('03.0A','C/ San Bartolome',2,'plurifamiliar');
insertar_inmueble('03.1A','C/ San Bartolome',1,'plurifamiliar');
insertar_inmueble('03.1B','C/ San Bartolome',1,'plurifamiliar');
insertar_inmueble('03.1C','C/ San Bartolome',1,'plurifamiliar');
insertar_inmueble('03.1D','C/ San Bartolome',2,'plurifamiliar');
insertar_inmueble('04.1B','C/ Zambullon',2,'plurifamiliar');
quitar_inmueble('03.1D');

Insertar_oferta(600, sysdate,'01.00');
Insertar_oferta(375, sysdate,'02.1A');
Insertar_oferta(375, sysdate,'02.1B');
Insertar_oferta(500, sysdate,'03.00');
Insertar_oferta(375, sysdate,'03.0A');
Insertar_oferta(350, sysdate,'03.1A');
Insertar_oferta(350, sysdate,'03.1B');
Insertar_oferta(350, sysdate,'03.1C');
Insertar_oferta(375, sysdate,'04.1B');
quitar_oferta(9);

INSERTAR_DEMANDA(650,'02/01/2020','aislado',1,3,'moncalvillo3',1);
INSERTAR_DEMANDA(400,'02/01/2020','plurifamiliar',0,1,'moncalvillo3',2);
INSERTAR_DEMANDA(375,'02/01/2020','plurifamiliar',1,2,'moncalvillo3',3);
INSERTAR_DEMANDA(450,'02/01/2020','plurifamiliar',0,3,'moncalvillo3',4);
INSERTAR_DEMANDA(475,'02/01/2020','plurifamiliar',1,1,'moncalvillo3',5);
INSERTAR_DEMANDA(400,'02/01/2020','plurifamiliar',0,1,'moncalvillo3',6);
INSERTAR_DEMANDA(375,'02/01/2020','plurifamiliar',1,2,'moncalvillo3',7);
QUITAR_DEMANDA(7);

INSERTAR_CONTRATO('03/01/2020','01/03/2021',650,650,1,'moncalvillo3');
INSERTAR_CONTRATO('03/01/2020','02/03/2021',375,375,2,'moncalvillo3');
INSERTAR_CONTRATO('03/01/2020','01/03/2021',375,375,3,'moncalvillo3');
INSERTAR_CONTRATO('03/01/2020','01/03/2021',500,500,4,'moncalvillo3');
INSERTAR_CONTRATO('03/01/2020','01/03/2021',375,375,5,'moncalvillo3');
INSERTAR_CONTRATO('03/01/2020','01/03/2021',350,350,6,'moncalvillo3');
QUITAR_CONTRATO(6);


end;
/
