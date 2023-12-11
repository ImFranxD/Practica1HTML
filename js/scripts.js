window.onload = function() {

    /*
    const usuarios = [
        {nombre : "Francisco Rafael", apellidos : "Mellado Martínez", email : "frmm345@gmail.com", tlf : 123456789},
        {nombre : "Juan", apellidos : "López Botella", email : "prueba@prueba.com", tlf : 123456789},
        {nombre : "Guillermo", apellidos : "Canales Albert", email : "prueba123@prueba123.com", tlf : 123456789},
        {nombre : "Samuel", apellidos : "Llanos Gilbert", email : "prueba456@prueba456.com", tlf : 123456789}
    ];*/

    cargarAlumnos();
    
    const cuerpoTabla = document.querySelector("table tbody");

    function rellenarTabla(alumnos){
        console.log("Entro a rellenar tabla");

        cuerpoTabla.innerHTML = "";
        if(Array.isArray(alumnos)){
            alumnos.forEach((alumno, index) => {
                const row = cuerpoTabla.insertRow();
                row.innerHTML = `<td>${alumno.nombre}</td><td>${alumno.apellidos}</td><td>${alumno.password}</td><td>${alumno.telefono}</td><td>${alumno.email}</td><td>${alumno.sexo}</td><td>${alumno.fecha_nacimiento}</td><td><button class="borrarUsuario" data-index="${index}">X</button><button class="editarUsuario" data-index="${index}" onclick="editarUsuario('${index}')">Editar</button></td>`;
            });
        }else{
            console.error("No es un array");
        }
        
    }

    /*Antiguo rellenarTabla
    function rellenarTabla(){
        cuerpoTabla.innerHTML = "";
        usuarios.forEach((usuario, index) => {
            const row = cuerpoTabla.insertRow();
            row.innerHTML = `<td>${usuario.nombre}</td><td>${usuario.apellidos}</td><td>${usuario.email}</td><td>${usuario.tlf}</td><td><button class="borrarUsuario" data-index="${index}">X</button><button class="editarUsuario" data-index="${index}" onclick="editarUsuario('${index}')">Editar</button></td>`;        });
    }*/

    function filtrarTabla(){
        const input = document.getElementById("filtro");
        const filtro = input.value.toLowerCase();
        const filas = cuerpoTabla.getElementsByTagName("tr");

        for(let i = 0; i < filas.length; i++){
            const nombre = filas[i].getElementsByTagName("td")[0].textContent.toLowerCase();
            const apellido = filas[i].getElementsByTagName("td")[1].textContent.toLowerCase();

            if(filtro.length < 3){
                filas[i].style.display = "";
            }else if(nombre.includes(filtro) || apellido.includes(filtro)){
                filas[i].style.display = "";
            }else{
                filas[i].style.display = "none";
            }
        }
    }

    /*Antiguo editarUsuario
    function editarUsuario(index){
        const usuario = usuarios[index];

        document.getElementById('FormEditarUsuario').style.display = 'block';
        document.getElementById('NombreEditado').value = usuario.nombre;
        document.getElementById('ApellidosEditado').value = usuario.apellidos;
        document.getElementById('EmailEditado').value = usuario.email;
        document.getElementById('TlfEditado').value = usuario.tlf;
        document.getElementById('FormEditarUsuario').setAttribute('data-edit-index', index);
    }
    */

    /*Anterior guardarEditUsuario
    function guardarEditUsuario(){
        const index = document.getElementById('FormEditarUsuario').getAttribute('data-edit-index')

        if(index !==null){
            usuarios[index].nombre = document.getElementById('NombreEditado').value;
            usuarios[index].apellido = document.getElementById('ApellidosEditado').value;
            usuarios[index].email = document.getElementById('EmailEditado').value;
            usuarios[index].tlf = document.getElementById('TlfEditado').value;

            rellenarTabla();

            document.getElementById('FormEditarUsuario').style.display = 'none';
        }
    }*/

    
    rellenarTabla();

    document.getElementById("filtro").addEventListener("input", function(){
        filtrarTabla();
    });

    /*Anterior borrar usuario de la tabla
    cuerpoTabla.addEventListener("click", function(event){
        if(event.target.classList.contains("borrarUsuario")){
            const index = event.target.getAttribute("data-index");
            cuerpoTabla.deleteRow(index);
        }else if(event.target.classList.contains("editarUsuario")){
            const index = event.target.getAttribute("data-index")
            editarUsuario(index);
        }
    });*/

    async function cargarAlumnos(){
        try{
            const response = await fetch('ws/getUsuario.php');
            const data = await response.json();
    
            console.log("Entro dentro de la funcion");
    
            if (data.success){
                console.log("He conseguido los datos");
                alumnos = data.data;
                rellenarTabla(alumnos);
            }
        }catch(error){
            console.error("Error en la solicitud: " + error.message);
        }
    }

    async function borrarUsuario(id){
        const response = await fetch(`ws/deleteUsuario.php?id=${id}`,{
            method : 'GET',
            headers : {}
        });
        const data = await response.json();

        Swal.fire({
            title : '¿Deseas borrar el usuario?',
            text : 'Una vez aceptado esta acción es irreversible',
            icon : 'question',
            showCancelButton : true,
            confirmButtonText : 'Si, borrar usuario',
            cancelButtonText : 'Cancelar'
        }).then((result) => {
            if(result.isConfirmed){
                if(data.success == true){
                    Swal.fire('Eliminado', 'El usuario ha sido eliminado con exito', 'success');
                    cargarAlumnos();
                }else{
                    Swal.fire('Error', 'No se pudo eliminar el usuario', 'error');
                }
            }
        });
    }

    cuerpoTabla.addEventListener('click', function(event){
        if(event.target.classList.contains('borrarUsuario')){
            const index = event.target.getAttribute('data-index');
            const id = alumnos[index].id;

            borrarUsuario(id);
        }
    });

};