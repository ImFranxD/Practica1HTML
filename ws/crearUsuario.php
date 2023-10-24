<?php

include ("models/User.php");

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

echo $user -> toJson();

?>