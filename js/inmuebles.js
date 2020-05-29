function alertaBorrar() {

    if (confirm('¿Estas seguro de borrar?')) {
        document.getElementById("formInmueble").submit()
    }

}

function visibility() {

    let all = document.getElementById("inmuebles");
    let free = document.getElementById("freeInmuebles");
    let pag = document.getElementById("paginacion");
    let freeP = document.getElementById("freePaginacion");
    let boton = document.getElementById("boton");

    console.log(all);
    console.log(free);
    if (all.style.display == "flex") {
        boton.innerText = "Mostras todos los Inmuebles";
        pag.style.display = "none";
        freeP.style.display = "block";
        all.style.display = "none";
        free.style.display = "flex";
        return;
    }
    boton.innerText = "Mostras inmuebles libres";
    pag.style.display = "block";
    freeP.style.display = "none";
    all.style.display = "flex";
    free.style.display = "none";
    return;
}