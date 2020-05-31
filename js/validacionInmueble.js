function validateForm() {
    var noValidation = document.getElementById("#altaInmueble").novalidate;

    if (!noValidation) {

        var error1 = nameValidation();

        var error2 = URLValidation();

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
        var error = "ID no válido. Debe tener el formato 00.0X";
    } else {
        var error = "";
    }
    name.setCustomValidity(error);
    return error;
}

function URLValidation() {
    var name = document.getElementById("img");
    var nombre = name.value;
    var valid = true;


    var isValid = /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;

    valid = valid && (isValid.test(nombre));

    if (!valid) {
        var error = "URL no válida.";
    } else {
        var error = "";
    }
    name.setCustomValidity(error);
    return error;
}
