SET SERVEROUTPUT ON;

DECLARE             --Declaramos las variables que vamos a utilizar
oid_o_1 INTEGER;
oid_o_2 INTEGER;
oid_o_3 INTEGER;
oid_o_4 INTEGER;
oid_o_5 INTEGER;
oid_o_6 INTEGER;
oid_o_7 INTEGER;
oid_o_8 INTEGER;
oid_o_9 INTEGER;
oid_d_1 INTEGER;
oid_d_2 INTEGER;
oid_d_3 INTEGER;
oid_d_4 INTEGER;
oid_d_5 INTEGER;
oid_d_6 INTEGER;
oid_d_7 INTEGER;
oid_c_1 INTEGER;
oid_c_6 INTEGER;
oid_p_1 INTEGER;
oid_p_2 INTEGER;
oid_r_2 INTEGER;
oid_r_3 INTEGER;
oid_i_1 INTEGER;
oid_i_2 INTEGER;
oid_e_1 INTEGER;
oid_e_2 INTEGER;
oid_a_1 INTEGER;
oid_a_2 INTEGER;
oid_a_3 INTEGER;
oid_q_1 INTEGER;
oid_q_2 INTEGER;



BEGIN 


--------------------------------------------------------------------------^Pruebas Inmuebles
PCK_Inmuebles.Inicializar;      --Inicializamos
PCK_Inmuebles.Insertar('Insertar inmueble', '01.00','C/ San Juan de la Cruz',4, 'aislado', TRUE);      
PCK_Inmuebles.Insertar('Insertar inmueble', '02.1A','C/ Cristobal Colon',2, 'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '02.1B','C/ Cristobal Colon',2,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.00','C/ San Bartolome',0,'comercial', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.0A','C/ San Bartolome',2,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.1A','C/ San Bartolome',1,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.1B','C/ San Bartolome',1,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.1C','C/ San Bartolome',1,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '03.1D','C/ San Bartolome',2,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble', '04.1B','C/ Zambullón',2,'plurifamiliar', TRUE);
PCK_Inmuebles.Insertar('Insertar inmueble con error de tipo', '04.1B','C/ Zambullón',2,'piso', FALSE);
PCK_Inmuebles.Insertar('Insertar inmueble repitiendo ID', '04.1B','C/ Arroyo',4,'plurifamiliar', FALSE);

PCK_Inmuebles.Actualizar('Actualizar inmueble', '03.1A','C/ San Bartolome 3',2,'plurifamiliar', TRUE);
PCK_Inmuebles.Actualizar('Actualizar inmueble', '04.1B','C/ Zambullón',8,'plurifamiliar', TRUE);
PCK_Inmuebles.Actualizar('Actualizar inmueble inexistente', '05.1D','C/ Sierra',2,'aislado', FALSE);



------------------------------------------------Pruebas Ofertas

PCK_Ofertas.Inicializar;

PCK_Ofertas.Insertar('Insertar oferta',600, '01/01/2020','01.00', TRUE);
oid_o_1:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',375, '01/01/2020','02.1A', TRUE);
oid_o_2:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',375, '01/01/2020','02.1B', TRUE);
oid_o_3:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',500, '01/01/2020','03.00', TRUE);
oid_o_4:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',375, '01/01/2020','03.0A', TRUE);
oid_o_5:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',350, '01/01/2020','03.1A', TRUE);
oid_o_6:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',350, '01/01/2020','03.1B', TRUE);
oid_o_7:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',350, '01/01/2020','03.1C', TRUE);
oid_o_8:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta',375, '01/01/2020','04.1B', TRUE);
oid_o_9:=sec_ofertas.currval;
PCK_Ofertas.Insertar('Insertar oferta de inmueble inexistente', 400, '01/01/2020', '06.5H', FALSE);

PCK_Ofertas.Actualizar('Actualizar oferta', oid_o_1, 650, '01/01/2020','01.00', TRUE);
PCK_Ofertas.Actualizar('Actualizar oferta', 10, 400, '01/01/2020','03.1B', FALSE);


PCK_Ofertas.Eliminar('Eliminar oferta', oid_o_9, TRUE);




---------------------------------------------------------------------------Tabla Demandantes

PCK_Demandantes.Inicializar;

PCK_Demandantes.Insertar('Insertar demandante', '08375498D', 'María del Pilar', 'Manchado Iglesias', 'Juez', 2100, '23/02/1985', 'mpilarmi1@gmail.com', 755893233, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '56735678A', 'Roberto', 'García Vázquez', 'Profesor', 2000,  '10/08/1970','gvazquez@gmail.com', 600734562, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '13455678A', 'Raúl', 'Lopez Cortés', 'Informatico', 1500, '07/09/1990','raullp@gmail.com', 645679012, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '80432304E', 'Carmen', 'González Luis', 'Empresario', 2500, '18/12/1978','carmengonzluis@gmail.com', 644021984, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '98554032F', 'Diego', 'Marquez Miranda', 'Limpiador', 1200, '03/06/1963','dmmiranda01@gmail.com', 633887642, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '84573645R', 'Jorge', 'Rodrgiuez Viena', 'Albañil', 1200, '05/06/1990','jrv@gmail.com', 647354644, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '33467323A', 'Silvia', 'Perez Perez', 'Comercial', 2000, '01/04/1993','spp@gmail.com', 754832215, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '98843234T', 'Berta', 'Valdes Romero', 'Policía', 1000, '19/10/1969','bervr@gmail.com', 654788991, TRUE);
PCK_Demandantes.Insertar('Insertar demandante', '20032134H', 'Gonzalo', 'Valle Morales', 'Abogado', 3000, '22/09/1991','gonvm@gmail.com', 664378293, TRUE);
PCK_Demandantes.Insertar('Insertar demandante incumpliendo minimo edad', '12345678A', 'Pablo', 'Gonzalez Moncalvillo', 'Estudiante', 500, '03/06/2000','pgm@gmail.com', 639753498, FALSE);

PCK_Demandantes.Actualizar('Actualizar email de demandante', '98554032F', 'Diego', 'Marquez Miranda', 'Limpiador', 1000, '03/06/1963','mirandadm2@gmail.com', 633887642, TRUE);
PCK_Demandantes.Actualizar('Actualizar nomina y telefono de demandante', '98554032F', 'Diego', 'Marquez Miranda', 'Limpiador', 1200, '03/06/1963','mirandadm2@gmail.com', 644487642, TRUE);
PCK_Demandantes.Actualizar('Actualizar demandante inexistente', '11111112F', 'Andres', 'Sierra Gonzalez', 'Profesor', 1000, '03/06/1963','asg@gmail.com', 654773823, FALSE);

PCK_Demandantes.Eliminar('Eliminar demandante', '20032134H', TRUE);


------------------------------------------------Pruebas Demandas

PCK_Demandas.Inicializar;

PCK_Demandas.Insertar('Insertar demanda',650,'02/01/2020','aislado',1,3,'08375498D',oid_o_1, TRUE);
oid_d_1:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',400,'02/01/2020','plurifamiliar',0,1,'56735678A',oid_o_2, TRUE);
oid_d_2:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',375,'02/01/2020','plurifamiliar',1,2,'13455678A',oid_o_3, TRUE);
oid_d_3:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',450,'02/01/2020','plurifamiliar',0,3,'80432304E',oid_o_4, TRUE);
oid_d_4:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',475,'02/01/2020','plurifamiliar',1,1,'98554032F',oid_o_5, TRUE);
oid_d_5:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',400,'02/01/2020','plurifamiliar',0,1,'84573645R',oid_o_6, TRUE);
oid_d_6:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda',375,'02/01/2020','plurifamiliar',1,2,'33467323A',oid_o_7, TRUE);
oid_d_7:=sec_demandas.currval;
PCK_Demandas.Insertar('Insertar demanda sin tener renta minima',450,'01/02/2020','plurifamiliar',0,3,'98843234T',oid_o_8, FALSE);
PCK_Demandas.Insertar('Insertar demanda con demasiadas mascotas en chalet',450,'01/02/2020','plurifamiliar',4,3,'33467323A',oid_o_8, FALSE);
PCK_Demandas.Insertar('Insertar demanda con demasiadas mascotas en piso',450,'01/02/2020','plurifamiliar',3,3,'33467323A',oid_o_8, FALSE);

PCK_Demandas.Actualizar('Actualizar demanda',oid_d_1 ,650,'01/02/2020','aislado',2,3,'08375498D',oid_o_1, TRUE);

PCK_Demandas.Eliminar('Eliminar demanda', oid_d_7, TRUE);




------------------------------------------------Pruebas Contratos

PCK_Contratos.Inicializar;

PCK_Contratos.Insertar('Insertar contrato','03/01/2020','01/03/2021',650,650,oid_d_1,'08375498D', TRUE);
oid_c_1:=sec_contratos.currval;
PCK_Contratos.Insertar('Insertar contrato','03/01/2020','02/03/2021',375,375,oid_d_2,'56735678A', TRUE);
PCK_Contratos.Insertar('Insertar contrato','03/01/2020','01/03/2021',375,375,oid_d_3,'13455678A', TRUE);
PCK_Contratos.Insertar('Insertar contrato','03/01/2020','01/03/2021',500,500,oid_d_4,'80432304E', TRUE);
PCK_Contratos.Insertar('Insertar contrato','03/01/2020','01/03/2021',375,375,oid_d_5,'98554032F', TRUE);
PCK_Contratos.Insertar('Insertar contrato','03/01/2020','01/03/2021',350,350,oid_d_6,'84573645R', TRUE);
oid_c_6:=sec_contratos.currval;
PCK_Contratos.Insertar('Insertar contrato con fecha no valida','02/03/2021','01/03/2022',350,350,oid_d_6,'84573645R', FALSE);

PCK_Contratos.Actualizar('Actualizar contrato', oid_c_1,'01/03/2020','01/03/2021',600,650,oid_d_1,'08375498D', TRUE);

PCK_Contratos.Eliminar('Eliminar contrato', oid_c_6, TRUE);


------------------------------------------------Pruebas Pago Mensual

PCK_PagoMensual.Inicializar;

PCK_PagoMensual.Insertar('Insertar pago', '05/03/2020', 600, '08375498D', oid_c_1, TRUE);
oid_p_1:=sec_pago.currval;
PCK_PagoMensual.Insertar('Insertar pago', '05/04/2020', 600, '08375498D', oid_c_1, TRUE);
oid_p_2:=sec_pago.currval;
PCK_PagoMensual.Insertar('Insertar pago tarde', '11/05/2020', 600, '08375498D', oid_c_1, FALSE);
PCK_PagoMensual.Insertar('Insertar pago incompleto', '06/07/2020', 550, '08375498D', oid_c_1, FALSE);


PCK_PagoMensual.Actualizar('Actualizar pago', oid_p_1, '06/03/2020', 600, '08375498D', oid_c_1, TRUE);

PCK_PagoMensual.Eliminar('Eliminar pago', oid_p_2, TRUE);



------------------------------------------------Pruebas Empresas

PCK_Empresas.Inicializar;

PCK_Empresas.Insertar('Insertar empresa', 'B90188327','Disan', 2, '7:00-15:00', 9, 'limpieza', TRUE);
oid_e_1:=sec_mantenedor.currval;
PCK_Empresas.Insertar('Insertar empresa', 'B90294018','Mancolim', 1, '7:30-14:00', 12, 'mantenimiento_tuberias',TRUE);
oid_e_2:=sec_mantenedor.currval;

PCK_Empresas.Actualizar('Actualizar empresa', oid_e_1, 'B90188327','Disan', 2, '7:00-15:00', 10, 'limpieza', TRUE);

PCK_Empresas.Eliminar('Eliminar empresa', oid_e_2, TRUE);


------------------------------------------------Pruebas Autonomos

PCK_Autonomos.Inicializar;

PCK_Autonomos.Insertar('Insertar autonomo', '45673465J', 'Julio', 'Rodriguez Gomez', '8:00-20:00', 10, 'mantenimiento_inmueble', TRUE);
oid_a_1:=sec_mantenedor.currval;
PCK_Autonomos.Insertar('Insertar autonomo', '86346534J', 'Rafael', 'Morales Sánchez', null, 9, 'limpieza', TRUE);
oid_a_2:=sec_mantenedor.currval;
PCK_Autonomos.Insertar('Insertar autonomo', '75446534E', 'Carmen', 'Gutiérrez Avilés', null, 12, 'limpieza', TRUE);
oid_a_3:=sec_mantenedor.currval;

PCK_Autonomos.Actualizar('Actualizar autonomo', oid_a_3, '75446534E', 'Carmen', 'Gutiérrez Avilés', '07:30-16:00', 12, 'limpieza', TRUE);
PCK_Autonomos.Eliminar('Eliminar autonomo', oid_a_2, TRUE);


------------------------------------------------Pruebas Revisiones

PCK_Revisiones.Inicializar;

PCK_Revisiones.Insertar('Insertar revision','06/01/2020',2, '01.00', oid_a_1, TRUE);
PCK_Revisiones.Insertar('Insertar revision','07/01/2020',1, '01.00', oid_a_1, TRUE);
oid_r_2:=sec_revisiones.currval;
PCK_Revisiones.Insertar('Insertar revision','08/01/2020',1, '01.00', oid_a_3, TRUE);
oid_r_3:=sec_revisiones.currval;

PCK_Revisiones.Actualizar('Actualizar revision',oid_r_3,'08/01/2020',1, '02.1B', oid_a_3, TRUE);

PCK_Revisiones.Eliminar('Eliminar revision', oid_r_2,TRUE);

------------------------------------------------Pruebas Incidencia

PCK_Incidencias.Inicializar;

PCK_Incidencias.Insertar('Insertar incidencia', '08375498D', '11/01/2020','El pago se ha realizado fuera de plazo', TRUE);
oid_i_1:=sec_incidencia.currval;
PCK_Incidencias.Insertar('Insertar incidencia', '08375498D', '06/01/2020','El pago no se ha realizado completo', TRUE);
oid_i_2:=sec_incidencia.currval;

PCK_Incidencias.Actualizar('Actualizar incidencia', oid_i_1, '08375498D', '15/01/2020','El pago se ha realizado fuera de plazo', TRUE);
PCK_Incidencias.Eliminar('Eliminar incidencia', oid_i_2, TRUE);

------------------------------------------------Pruebas Quejas

PCK_Quejas.Inicializar;

PCK_Quejas.Insertar('Insertar queja', '05/01/2020', 'El termo no funciona', '01.00', '08375498D', TRUE);
oid_q_1:=sec_quejas.currval;
PCK_Quejas.Insertar('Insertar queja', '05/01/2020', 'La lavadora suelta agua', '01.00', '08375498D', TRUE);
oid_q_2:=sec_quejas.currval;

PCK_Quejas.Actualizar('Actualizar queja',oid_q_2, '05/01/2020', 'La lavadora suena raro', '01.00', '08375498D', TRUE);

PCK_Quejas.Eliminar('Eliminar queja', oid_q_1, TRUE);




--------------------------------------------------------------------------Pruebas Usuarios
pck_usuarios.inicializar;      --Inicializamos
pck_usuarios.insertar('Insertar usuario', 'Pablo', 'Gonzalez Rodriguez', 'pablom@gmail.com' ,'AsDf1234','moncalvillo3', TRUE);    
pck_usuarios.insertar('Insertar usuario', 'Roberto', 'Muñoz Garcia', 'robertito@gmail.com' ,'claveBuena123','robertuxi2', TRUE); 
pck_usuarios.insertar('Insertar usuario',  'Carlos', 'Rodriguez Garcia','carlitros@gmail.com' ,'Contraseña123','carlos123', TRUE);
pck_usuarios.actualizar('Actualizar usuario', 'Pablo', 'Gonzalez Moncalvillo','pablitoemail@gmail.com' ,'AsDf1234','moncalvillo3', TRUE);
pck_usuarios.eliminar('Eliminar usuario', 'moncalvillo3', TRUE);

--Inserta_Usuario('Pablo', 'Gonzalez Rodriguez', 'pablom@gmail.com' ,'AsDf1234','moncalvillo3');
PCK_Inmuebles.Eliminar('Eliminar inmueble', '01.00', TRUE);
END;
/
