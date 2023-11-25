<?php

function obtenerAlumnoID($id){
    require ("conexionBD.php");

    $query = "SELECT * FROM alumno WHERE id = :id";
    $stmt =  $base_de_datos -> prepare($query);
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();
    $alumno = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $alumno;
}

function modificarUsuario($id, $nombre, $apellidos, $password, $telefono, $email, $sexo, $fecha_nacimiento){
    require ("conexionBD.php");

    $alumnoEditar = obtenerAlumnoID($id);

    if(!$alumnoEditar){
        return null;
    }

    $nombre = !empty($nombre) ? $nombre : $alumnoEditar['nombre'];
    $apellidos = !empty($apellidos) ? $apellidos : $alumnoEditar['apellidos'];
    $password = !empty($password) ? $password : $alumnoEditar['password'];
    $telefono = !empty($telefono) ? $telefono : $alumnoEditar['telefono'];
    $email = !empty($email) ? $email : $alumnoEditar['email'];
    $sexo = !empty($sexo) ? $sexo : $alumnoEditar['sexo'];
    $fecha_nacimiento = !empty($fecha_nacimiento) ? $fecha_nacimiento : $alumnoEditar['fecha_nacimiento'];

    $queryEditar = "UPDATE alumno SET nombre = :nombre, apellidos = :apellidos, password = :password, telefono = :telefono, email = :email, sexo = :sexo, fecha_nacimiento = :fecha_nacimiento WHERE id = :id";
    $stmtEditar = $base_de_datos->prepare($queryEditar);
    $stmtEditar->bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmtEditar->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
    $stmtEditar->bindParam(':password', $password, PDO::PARAM_STR);
    $stmtEditar->bindParam(':telefono', $telefono, PDO::PARAM_INT);
    $stmtEditar->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtEditar->bindParam(':sexo', $sexo, PDO::PARAM_STR);
    $stmtEditar->bindParam(':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
    $stmtEditar->bindParam(':id', $id, PDO::PARAM_INT);
    $stmtEditar->execute();

    $alumnoEditado = obtenerAlumnoID($id);

    return $alumnoEditado;
}

$respuesta = array(
    'success' => false,
    'message' => '',
    'data' => null
);

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $alumnoEditado = modificarUsuario($id, $_POST['nombre'], $_POST['apellidos'], $_POST['password'], $_POST['telefono'], $_POST['email'], $_POST['sexo'], $_POST['fecha_nacimiento']);

    if($alumnoEditado){
        $respuesta['success'] = true;
        $respuesta['message'] = 'Alumno modificado correctamente';
        $respuesta['data'] = $alumnoEditado;
    }else{
        $respuesta['message'] = 'El alumno no se modifico';
    }
}else{
    $respuesta['message'] = 'No se proporciono un ID';
}


echo json_encode($respuesta, JSON_PRETTY_PRINT);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <header>
        <div id="contenedorNav"></div>
    </header>
    <br>
    <main>
        <div>
            <form class="formulario" method="post" action="">
                <fieldset>
                    <legend>Datos personales</legend>
                    <div>
                        <label>Nombre</label>
                        <input type="text" id="nombre" name="nombre">
                        <br>
                        <label>Apellidos</label>
                        <input type="text" id="apellidos" name="apellidos"> 
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Datos secundarios</legend>
                    <div>
                        <label>Contraseña</label>
                        <input type="password" id="password" name="password">
                        <br>
                        <label>Teléfono</label>
                        <input type="number" id="telefono" name="telefono">
                        <br>
                        <label>Email</label>
                        <input type="email" id="email" name="email">
                        <label>Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
                    </div>
                    <div>
                        <label>Sexo</label>
                        <div>
                            <label>
                                <input type="radio" name="sexo" value="Hombre">Hombre
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="sexo" value="Mujer">Mujer
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="sexo" value="Otro">Otro
                            </label>
                            <br>
                            <label>
                                <input type="radio" name="sexo" value="Mileurista">Mileurista
                            </label>
                        </div>
                    </div>
                </fieldset>
                <button>Enviar formulario</button>
            </form>
        </div>
    </main>
    <footer>
        <p>©COPYRIGHT Todos los derechos reservados</p>
    </footer>
</body>
</html>