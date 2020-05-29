function validateForm() {
    var noValidation = document.getElementById("#registro").novalidate;

    if (!noValidation) {

        var error1 = passwordValidation();

        var error2 = passwordConfirmation();

        var error3 = fechaValidation();

        return (error1.length == 0) && (error2.length == 0) && (error3.length == 0);
    } else
        return true;
}

function fechaValidation() {


    var fecha = document.getElementById("fechaNacimiento").value;
    var fechaS = fecha.split("-");

    var date = new Date(fechaS[0], fechaS[1] - 1, fechaS[2]);
    var fechaMin = new Date();
    fechaMin.setFullYear(fechaMin.getFullYear - 21);

    if (date > fechaMin) var error = "Debes tener mas de 21 años";
    if (fecha) var error = "";

    fecha.setCustomValidity(error);

    return error;
}

function passwordValidation() {
    var password = document.getElementById("pass");
    var pwd = password.value;
    var valid = true;


    valid = valid && (pwd.length >= 8);


    var hasNumber = /\d/;
    var hasUpperCases = /[A-Z]/;
    var hasLowerCases = /[a-z]/;
    valid = valid && (hasNumber.test(pwd)) && (hasUpperCases.test(pwd)) && (hasLowerCases.test(pwd));


    if (!valid) {
        var error = "Introduzca una contraseña correxta. Debe tener 8 o mas caracteres, algun letra minuscula, mayuscula y algun dígito";
    } else {
        var error = "";
    }
    password.setCustomValidity(error);
    return error;
}


function passwordConfirmation() {

    var password = document.getElementById("pass");
    var pwd = password.value;
    var passconfirm = document.getElementById("confirmar");
    var confirmation = passconfirm.value;

    if (pwd != confirmation) {
        var error = "Las cotraseñas no coinciden";
    } else {
        var error = "";
    }

    passconfirm.setCustomValidity(error);

    return error;
}

function passwordStrength(password) {
    var letters = {};

    var length = password.length;
    for (x = 0, length; x < length; x++) {
        var l = password.charAt(x);
        letters[l] = (isNaN(letters[l]) ? 1 : letters[l] + 1);
    }
    return Object.keys(letters).length / length;
}

function passwordColor() {
    var passField = document.getElementById("pass");
    var strength = passwordStrength(passField.value);

    if (!isNaN(strength)) {
        var type = "weakpass";
        if (passwordValidation() != "") {
            type = "weakpass";
        } else if (strength > 0.7) {
            type = "strongpass";
        } else if (strength > 0.4) {
            type = "middlepass";
        }
    } else {
        type = "nanpass";
    }
    passField.className = type;

    return type;
}
