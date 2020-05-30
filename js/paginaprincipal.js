const navSlide = () => {
    const botones = document.querySelectorAll('.btn-toggle');
    const toggles = document.querySelectorAll('.toggle');
    for (var i = 0; i < botones.length; i++) {
        const boton = botones[i];
        const toggle = toggles[i];
        console.log(typeof(boton));
        boton.addEventListener('click', (e) => {

            console.log(toggle);
            toggle.classList.toggle("active");
        });
        console.log("funciona");
    };

    const botonesD = document.querySelectorAll('.btn-toggleD');
    const togglesD = document.querySelectorAll('.toggleD');
    for (var i = 0; i < botonesD.length; i++) {
        const botonD = botonesD[i];
        const toggleD = togglesD[i];
        console.log(typeof(botonD));
        botonD.addEventListener('click', (e) => {

            console.log(toggleD);
            toggleD.classList.toggle("active");
        });
        console.log("funciona");
    };
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

    const burguer = document.querySelector('.burguer');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burguer.addEventListener('click', () => {
        nav.classList.toggle('nav-active');
    });
}