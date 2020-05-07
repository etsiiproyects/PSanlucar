function validateForm() {
    var error1 = validateControl1();
    var erorr2 = validateControl2();
    return (erro.length == 0) && (error2.length == 0);
}

function validateControl1() {
    var control1 = document.getElementById("control1");
    var valor = control1.nodeValue;
    var valido = true;

    valido = valido && (valor.length < 5);

    if (!valido) {
        var error = "Mensaje de error";
    } else {
        var error = "";
    }
    control1.setCustomValidity(error);
    return error;
}