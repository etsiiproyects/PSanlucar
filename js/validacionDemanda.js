function validateForm() {
    var noValidation = document.getElementById("altaDemanda").novalidate;

    if (!noValidation) {

        var error1 = nameValidation();

        var error2 = numMascotasValidation();

        return (error1.length == 0) && (error2.length == 0);
    } else
        return true;
}

function nameValidation() {
    var name = document.getElementById("id_inmueble");
    var nombre = name.value;
    var valid = true;

    valid = valid && (nombre.length == 5);

    var isValid = /^[0-9]{2}\.[0-9][A-Z0-9]/;

    valid = valid && (isValid.test(nombre));

    if (!valid) {
        var error = "ID no valido.";
    } else {
        var error = "";
    }
    name.setCustomValidity(error);
    return error;
}

function numMascotasValidation(){
	var mascotas = document.getElementById("numMascotas"); 
	var vmascotas = mascotas.value;
	var valid = true;
	
	valid = valid && (vmascotas < 4);
	
	if (!valid) {
		var error = "Numero de mascotas no permitido";
	} else {
		var error = "";
	}
	mascotas.setCustomValidity(error);
	return error;
}
