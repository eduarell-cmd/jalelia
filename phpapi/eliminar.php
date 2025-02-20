<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Accept-Charset: UTF-8");

#importar el archivo
require 'conn.php';
#Almacenado de metodos en una variable
$request = $_SERVER['REQUEST_METHOD'];
$matricula = $_POST['matricula'];
        $queryDelete = "DELETE FROM students WHERE matricula = :matricula";
        $res = $conn -> prepare($queryDelete);
        $res-> execute([':matricula' => $matricula]);
        header("Location: mostrar.php");
    
?>