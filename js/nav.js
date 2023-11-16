//Uso windows.addEventListener porque en scripts.js tengo un windows.onload y eso causa un conflicto entre ambos archivos haciendo que uno de los 2 no funcione
window.addEventListener('load', function() {
    fetch('nav.html').then(response => response.text()).then(data => {
        document.getElementById('contenedorNav').innerHTML = data;
    }).catch(error => console.error("Error al cargar el nav: ", error));
});
    