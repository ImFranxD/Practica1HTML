<?php

function crearUsuario($nombre, $apellidos, $password, $telefono = null, $email = null, $sexo = null, $fecha_nacimiento){
    require ("conexionBD.php");

    $query = "INSERT INTO alumno (nombre, apellidos, password, telefono, email, sexo, fecha_nacimiento) VALUES (:nombre, :apellidos, :password, :telefono, :email, :sexo, :fecha_nacimiento)";

    $stmt = $base_de_datos -> prepare($query);
    $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
    $stmt -> bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
    $stmt -> bindParam(':password', $password, PDO::PARAM_STR);
    $stmt -> bindParam(':telefono', $telefono, PDO::PARAM_INT);
    $stmt -> bindParam(':email', $email, PDO::PARAM_STR);
    $stmt -> bindParam(':sexo', $sexo, PDO::PARAM_STR);
    $stmt -> bindParam(':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
    $stmt -> execute();

    $id_alumnoCreado = $base_de_datos -> lastInsertId();

    $queryObtener = "SELECT * FROM alumno  WHERE id = :id";
    $stmtObtener = $base_de_datos -> prepare($queryObtener);
    $stmtObtener -> bindParam(':id', $id_alumnoCreado, PDO::PARAM_INT);
    $stmtObtener ->execute();

    $alumnoCreado = $stmtObtener -> fetch(PDO::FETCH_ASSOC);

    return $alumnoCreado;
}

$respuesta = array(
    'success' => false,
    'message' => '',
    'data' => null
);

if(isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['password']) && isset($_POST['fecha_nacimiento'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $password = $_POST['password'];
    $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
    $fecha_nacimiento = $_POST['fecha_nacimiento'];;

    $alumnoCreado = crearUsuario($nombre, $apellidos, $password, $telefono, $email, $sexo, $fecha_nacimiento);

    if($alumnoCreado){
        $respuesta['success'] = true;
        $respuesta['message'] = 'Alumno creado correctamente';
        $respuesta['data'] = $alumnoCreado;
    }else{
        $respuesta['message'] = 'El alumno no se pudo crear';
    }
}else{
    $respuesta['message'] = 'Faltan parametros';
}

echo json_encode($respuesta, JSON_PRETTY_PRINT);

?>