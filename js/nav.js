//Uso windows.addEventListener porque en scripts.js tengo un windows.onload y eso causa un conflicto entre ambos archivos haciendo que uno de los 2 no funcione
window.addEventListener('load', function() {

    var rutaActual = window.location.pathname;
    var contenedorNav = document.getElementById('contenedorNav');

    fetch('nav.html').then(response => response.text()).then(data => {
        document.getElementById('contenedorNav').innerHTML = data;

        var navLinks = contenedorNav.querySelectorAll('ul li a');

        navLinks.forEach(function(enlace){
            console.log(enlace.getAttribute('href'));
            if(rutaActual.includes(enlace.getAttribute('href'))){
                enlace.classList.add('active');
                console.log("Entro al if", enlace);
            }
        });
    }).catch(error => console.error("Error al cargar el nav: ", error));
});
    