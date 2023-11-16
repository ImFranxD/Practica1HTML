window.onload = function(){
    fetch('nav.html').then(response => response.text()).then(data => {
        document.getElementById('contenedorNav').innerHTML = data;
    }).catch(error => console.error("Error al cargar el nav: ", error));
};