function alertaBorrar() {

    if (confirm('¿Estas seguro de borrar?')) {
        document.getElementById("formInmueble").submit()
    }

}

function visibility() {

    let all = document.getElementById("inmuebles");
    let free = document.getElementById("freeInmuebles");
    let botonI = document.getElementById("botonI");

    console.log(all);
    console.log(free);
    if (all.style.display == "flex") {
        botonI.innerText = "Mostrar todos los Inmuebles";
        botonI.style.backgroundColor = "white";
        botonI.style.color = "#ff7e34";
        all.style.display = "none";
        free.style.display = "flex";
        return;
    }
    botonI.innerText = "Mostrar inmuebles libres";
    botonI.style.backgroundColor = "#ff7e34";
    botonI.style.color = "white";
    all.style.display = "flex";
    free.style.display = "none";
    return;
}