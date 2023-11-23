<?php

function borrarAlumnos($id){
    require ("conexionBD.php");
    $query = "DELETE FROM alumno WHERE id = :id";
    $stmt = $base_de_datos -> prepare($query);
    $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
    $stmt -> execute();

    return $stmt -> rowCount();
}

$respuesta = array(
    'success' => false,
    'message' => '',
    'data' => null
);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $alumnoBorrado = borrarAlumnos($id);

    if($alumnoBorrado = 1){
        $respuesta['success'] = true;
        $respuesta['message'] = 'Alumno borrado correctamente';
    } else{
        $respuesta['message'] = 'No se pudo borrar al alumno';
    }
}else{
    $respuesta['message'] = 'No se encontro un ID';
}

echo json_encode($respuesta, JSON_PRETTY_PRINT);

?>