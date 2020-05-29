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
        boton.innerText = "Mostrar todos los Inmuebles";
        boton.style.backgroundColor = "white";
        boton.style.color = "#ff7e34";
        pag.style.display = "none";
        freeP.style.display = "block";
        all.style.display = "none";
        free.style.display = "flex";
        return;
    }
    boton.innerText = "Mostrar inmuebles libres";
    boton.style.backgroundColor = "#ff7e34";
    boton.style.color = "white";
    pag.style.display = "block";
    freeP.style.display = "none";
    all.style.display = "flex";
    free.style.display = "none";
    return;
}