---------------Procedimientos

execute inquilinos();
execute inmueblesdisponibles();
execute demandasInmueblesDisponibles();
execute quejasInquilino('08375498D');
execute fincontratos();
execute incidenciainquilino('08375498D');



----------------Funciones
SET SERVEROUTPUT ON;

BEGIN
	
    DBMS_OUTPUT.PUT_LINE('El precio de la revision es ' ||precioRevision(1));
    DBMS_OUTPUT.PUT_LINE('La ultima revicion del inmueble fue el ' ||ultimaRevision('01.00'));
    DBMS_OUTPUT.PUT_LINE('El numero de contratos vigentes es: ' || num_contratos_vigentes);
    
END;

