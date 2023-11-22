<?php

function obtenerAlumnos(){
    require ("conexionBD.php");

    $queryTodos = "SELECT * FROM alumno";
    $stmtTodos =  $base_de_datos -> prepare($queryTodos);
    $stmtTodos -> execute();
    $alumnos = $stmtTodos -> fetchAll(PDO::FETCH_ASSOC);
    
    return $alumnos;
}

function obtenerAlumnoID($id){
    require ("conexionBD.php");

    $query = "SELECT * FROM alumno WHERE id = :id";
    $stmt =  $base_de_datos -> prepare($query);
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();
    $alumno = $stmt -> fetch(PDO::FETCH_ASSOC);
    
    return $alumno;
}

$respuesta = array(
    'success' => false,
    'message' => '',
    'data' => null
);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $alumno = obtenerAlumnoID($id);

    if($alumno){
        $respuesta['success'] = true;
        $respuesta['message'] = 'Alumno encontrado';
        $respuesta['data'] = $alumno;

    }else{
        $respuesta['message'] = 'Alumno encontrado';
    }
}else{
    $alumnos = obtenerAlumnos();

    $respuesta['success'] = true;
    $respuesta['message'] = 'Todos los alumnos obtenidos';
    $respuesta['data'] = $alumnos;
}

echo json_encode($respuesta, JSON_PRETTY_PRINT);

?>