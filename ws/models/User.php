<?php

class User{
    private $nombre;
    private $apellidos;
    private $password;
    private $telefono;
    private $email;
    private $sexo;

    //Constructor
    public function __contruct(){
        $this->nombre="";
        $this->apellidos="";
        $this->password="";
        $this->telefono=123456789;
        $this->email="";
        $this->sexo="";
    }

    //Setters y Getters
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function setSexo($sexo){
        $this->sexo=$sexo;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }

    public function getPassword(){
        return $this->password;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSexo(){
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
}   

?>