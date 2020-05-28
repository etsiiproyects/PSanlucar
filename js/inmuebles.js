function alertaBorrar() {

    if (confirm('¿Estas seguro de borrar?')) {
        document.getElementById("formInmueble").submit()
    }

}