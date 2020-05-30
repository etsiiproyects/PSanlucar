const toggle = () => {
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
}
const toggleD = () => {
    let botonesD = document.querySelectorAll('.btn-toggleD');
    let togglesD = document.querySelectorAll('.toggleD');
    for (var i = 0; i < botonesD.length; i++) {
        let botonD = botonesD[i];
        let toggleD = togglesD[i];
        console.log(typeof(botonD));
        botonD.addEventListener('click', (e) => {

            console.log(toggleD);
            toggleD.classList.toggle("active");
        });
        console.log("funciona");
    };
}
const toggleU = () => {
    const botonesU = document.querySelectorAll('.btn-toggle');
    const togglesU = document.querySelectorAll('.toggle');
    for (var i = 0; i < botonesU.length; i++) {

        const botonU = botonesU[i];
        const toggleU = togglesU[i];
        console.log(typeof(botonU));
        botonU.addEventListener('click', (e) => {

            console.log(toggleU);
            toggleU.classList.toggle("active");
        });


        console.log("funciona");
    };
}

const navSlide = () => {
    const burguer = document.querySelector('.burguer');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burguer.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
    });
}