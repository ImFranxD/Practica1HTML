<?php
    $host='localhost';
	$username='root';
	$nombreBD='colegio';
	$password='';
	try{
		$base_de_datos=new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8;port=3306", $username, $password);
	}catch(PDOException $e){
		echo "Ocurrio un error con la base de datos: ".$e->getMessage();
	}
	return $base_de_datos;
?>