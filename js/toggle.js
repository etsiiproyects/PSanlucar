let botones = document.querySelectorAll('.btn-toggle');
let toggles = document.querySelectorAll('.toggle');
for (var i = 0; i < botones.length; i++) {

    let boton = botones[i];
    let toggle = toggles[i];
    console.log(typeof(boton));
    boton.addEventListener('click', (e) => {

        console.log(toggle);
        toggle.classList.toggle("active");
    });


    console.log("funciona");
};