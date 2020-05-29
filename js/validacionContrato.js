function validateContrato() {
    var noValidation = document.getElementById("#contratoAlta").novalidate;

    if (!noValidation) {

        var error1 = inicioAlquiler();

        //var error2 = finAlquiler();


        return (error1.length == 0); // && (error2.length == 0) && (error3.length == 0);
    } else
        return true;
}


function inicioAlquiler() {
    var fechaIni = document.getElementById("inicioAlquiler").value.split("-");
    var date = new Date(fechaIni[0], fechaIni[1] - 1, fechaIni[2]);
    var today = new Date();

    if (date > today) {
        var error = "";
    } else {
        var error = "El inicio de alquiler debe ser para una fecha futura.";
    }

    return error;
}
