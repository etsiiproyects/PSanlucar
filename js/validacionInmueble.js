function validateForm() {
    var noValidation = document.getElementById("altaInmueble").novalidate;

    if (!noValidation) {

        var error1 = nameValidation();

        //var error2 = passwordConfirmation();

        //var error3 = fechaValidation();

        return (error1.length == 0);
    } else
        return true;
}

function fechaValidation() {


    var fecha = document.getElementById("fechaNacimiento").value;
    var fechaS = fecha.split("-");

    var date = new Date(fechaS[0], fechaS[1] - 1, fechaS[2]);
    var fechaMin = new Date();
    fechaMin.setFullYear(fechaMin.getFullYear - 21);

    if (date > fechaMin) var error = "You must be over 21 years old.";
    if (fecha) var error = "";

    fecha.setCustomValidity(error);

    return error;
}

function nameValidation() {
    var name = document.getElementById("id_inmueble");
    var nombre = name.value;
    var valid = true;


    valid = valid && (nombre.length == 4);


    var isValid = new RegExp("^\\d{2}\.\\d{2}|\\d[A-Z]");
    valid = valid && (isValid.test(nombre));


    if (!valid) {
        var error = "ID no valido.";
    } else {
        var error = "";
    }
    password.setCustomValidity(error);
    return error;
}