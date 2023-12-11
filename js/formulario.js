window.addEventListener('load', function(){

    const formulario = document.getElementById('fomulario');
    formulario.addEventListener("submit", function(event){
        event.preventDefault();
        enviarFormulario();
    });

});

function enviarFormulario(){

    const nombre = document.getElementsByName("nombre")[0].value;
    const apellidos = document.getElementsByName("apellidos")[0].value;
    const password = document.getElementsByName("password")[0].value;
    const telefono = document.getElementsByName("telefono")[0].value;
    const email = document.getElementsByName("email")[0].value;
    const sexo = document.getElementsByName("sexo")[0].value;
    const fecha_nacimiento = document.getElementsByName("fecha_nacimiento")[0].value;

    const formData = new FormData();
    formData.append("nombre", nombre);
    formData.append("apellidos", apellidos);
    formData.append("password", password);
    formData.append("telefono", telefono);
    formData.append("email", email);
    formData.append("sexo", sexo);
    formData.append("fecha_nacimiento", fecha_nacimiento);
    

    console.log("Nombre:", nombre);
    console.log("Apellidos:", apellidos);
    console.log("Password:", password);
    console.log("Teléfono:", telefono);
    console.log("Email:", email);
    console.log("Sexo:", sexo);


    Swal.fire({
        title : '¿Deseas crear el usuario?',
        text : 'Una vez aceptado esta acción es irreversible',
        icon : 'question',
        showCancelButton : true,
        confirmButtonText : 'Si, crear usuario',
        cancelButtonText : 'Cancelar'
    }).then((result) => {
        if(result.isConfirmed){
            fetch('ws/crearUsuario2.php',{
                method : 'POST',
                body : formData
            }).then((response) => response.json()).then((json) => comprobarJson(json));
        }
    });
}

function comprobarJson(json){
    if(json.success == true){
        Swal.fire(
            'EXITO',
            'El usuario se ha creado correctamente',
            'success'
        );
    }else if(json.success == false){
        Swal.fire('ERROR', `${json.message}`, "error");
    }
}