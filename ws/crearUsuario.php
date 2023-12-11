<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include('models/User.php');

    $nombre = isset($_POST['nombre'])? $_POST['nombre'] : 'nombre';
    $apellidos = isset($_POST['apellidos'])? $_POST['apellidos'] : 'apellidos';
    $password = isset($_POST['password'])? $_POST['password'] : 'password';
    $telefono = isset($_POST['telefono'])? $_POST['telefono'] : 'telefono';
    $email = isset($_POST['email'])? $_POST['email'] : 'email';
    $sexo = isset($_POST['sexo'])? $_POST['sexo'] : 'sexo';

    $user = new User();
    $user -> setNombre($nombre);
    $user -> setApellidos($apellidos);
    $user -> setPassword($password);
    $user -> setTelefono($telefono);
    $user -> setEmail($email);
    $user -> setSexo($sexo);

    $archivo = fopen("usuarios.txt", "a");

    if($archivo){
        $usuarioJson = $user -> toJson();
        fwrite($archivo,"Nombre: " . $user->getNombre() . "\n");
        fwrite($archivo,"Apellidos: " . $user->getApellidos() . "\n");
        fwrite($archivo,"Contraseña: " . $user->getPassword() . "\n");
        fwrite($archivo,"Telefono: " . $user->getTelefono() . "\n");
        fwrite($archivo,"Email: " . $user->getEmail() . "\n");
        fwrite($archivo,"Sexo: " . $user->getSexo() . "\n");
        fwrite($archivo, "/-----------------------/\n");
        fclose($archivo);
    }

    echo $user -> toJson();
}
?>