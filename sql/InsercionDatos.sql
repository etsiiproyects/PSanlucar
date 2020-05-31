begin
insertar_empleado('Admin1','123456As');
insertar_empleado('Admin2','123456Sa');
insertar_empleado('Admin3','Sa1234As');
quitar_empleado(3);

Insertar_Usuario('Pablo', 'Gonzalez Rodriguez', 'pablom@gmail.com' ,'AsDf1234','12345678A','01/01/2000' );
Insertar_Usuario('Jose Carlos', 'Morales Borreguero', 'josecb@gmail.com', 'Qwerty12', '87654321A','01/01/2000' );
Insertar_Usuario('Jose Carlos', 'Romero Pozo', 'josecr@gmail.com', 'Qwerty12', '87654321B','01/01/2000' );
Insertar_Usuario('Fernando', 'Valdes Navarro', 'fernandov@gmail.com', 'Qwerty12', '12345678B','01/01/2000' );
Quitar_Usuario('87654321A');

insertar_inmueble('01.00','C/ San Juan de la Cruz',4, 'https://i.imgur.com/sCxrLFG.jpg', 'aislado');
insertar_inmueble('02.1A','C/ Cristobal Colon',2, 'https://i.imgur.com/UJfas3B.jpg', 'plurifamiliar');
insertar_inmueble('02.1B','C/ Cristobal Colon',2, 'https://i.imgur.com/b0PR69t.jpg','plurifamiliar');
insertar_inmueble('03.00','C/ San Bartolome',0, 'https://i.imgur.com/ZoE5dWy.jpg','comercial');
insertar_inmueble('03.0A','C/ San Bartolome',2, 'https://i.imgur.com/JkISzCS.jpg','plurifamiliar');
insertar_inmueble('03.1A','C/ San Bartolome',1, 'https://i.imgur.com/ZvUlPj3.jpg','plurifamiliar');
insertar_inmueble('03.1B','C/ San Bartolome',1, 'https://i.imgur.com/Gdqkog2.jpg','plurifamiliar');
insertar_inmueble('03.1C','C/ San Bartolome',1, 'https://i.imgur.com/9oqIdYF.jpg','plurifamiliar');
insertar_inmueble('03.1D','C/ San Bartolome',2, 'https://i.imgur.com/wyQW7rf.jpg','plurifamiliar');
insertar_inmueble('04.1B','C/ Zambullon',2, 'https://i.imgur.com/XGTkakZ.jpg','plurifamiliar');
modificar_inmueble('04.1B', 'C/ Zambullon', 4, 'https://i.imgur.com/XGTkakZ.jpg', 'plurifamiliar');
quitar_inmueble('03.1D');

INSERTAR_DEMANDA(650,'02/01/2020',1,'12345678A','01.00');
INSERTAR_DEMANDA(400,'02/01/2020',1,'87654321B','02.1A');
INSERTAR_DEMANDA(375,'02/01/2020',2,'12345678B','02.1B');
INSERTAR_DEMANDA(450,'02/01/2020',3,'12345678A','03.00');
INSERTAR_DEMANDA(475,'02/01/2020',1,'87654321B','03.0A');
INSERTAR_DEMANDA(400,'02/01/2020',1,'12345678B','03.1B');
INSERTAR_DEMANDA(375,'02/01/2020',2,'12345678A','03.1C');
QUITAR_DEMANDA(7);

INSERTAR_CONTRATO('03/01/2020','01/03/2021',650,650,1);
INSERTAR_CONTRATO('03/01/2020','02/03/2021',375,375,2);
INSERTAR_CONTRATO('03/01/2020','01/03/2021',375,375,3);
INSERTAR_CONTRATO('03/01/2020','01/03/2021',500,500,4);
INSERTAR_CONTRATO('03/01/2020','01/03/2021',375,375,5);
INSERTAR_CONTRATO('03/01/2020','01/03/2021',350,350,6);
MODIFICAR_CONTRATO(1, '03/06/2020','01/03/2021',1000);
QUITAR_CONTRATO(6);


end;
/
