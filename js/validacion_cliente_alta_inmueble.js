function validateForm() {
    var noValidation = document.getElementById("#altaUsuario").novalidate;

    if (!noValidation) {
        // Comprobar que la longitud de la contraseña es >=8, que contiene letras mayúsculas y minúsculas y números
        var error1 = idValidation();

        return (error1.length == 0);
    } else
        return true;
}

function idValidation() {
    var id_i = document.getElementById("id_inmueble");
    var id = id_i.value;
    var valid = true;
    valid = valid && (id.length == 5);

    var hasPunto = id.split(".");
    var hasNumber = /\d/;

    valid = valid && (hasNumber.test(id)) && hasPunto.length >= 2;

    if (!valid) {
        var error = "Por favor introduce una Id correcta, recuerda que es del formato 00.0A"
    } else {
        var error = "";
    }
    id_i.setCustomValidity(error);
    return error;

}