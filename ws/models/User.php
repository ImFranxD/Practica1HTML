<?php

    $nombre;
    $apellidos;
    $password;
    $telefono;
    $email;
    $sexo;

    //Constructor
    function __contruct(){
        $this->nombre="";
        $this->apellidos="";
        $this->password="";
        $this->telefono=123456789;
        $this->email="";
        $this->sexo="";
    }

    //Setters y Getters
    function setNombre($nombre){
        $this->nombre=$nombre;
    }

    function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }

    function setPassword($password){
        $this->password=$password;
    }

    function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    function setEmail($email){
        $this->email=$email;
    }

    function setSexo($sexo){
        $this->sexo=$sexo;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function getPassword(){
        return $this->password;
    }
    function getTelefono(){
        return $this->telefono;
    }
    function getEmail(){
        return $this->email;
    }
    function getSexo(){
        return $this->sexo;
    }

    function toJson(){
        $datosFormulario = array(
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "password" => $this->password,
            "telefono" => $this->telefono,
            "email" => $this->email,
            "sexo" => $this->sexo
        );

        return json_encode($datosFormulario);
    }

?>