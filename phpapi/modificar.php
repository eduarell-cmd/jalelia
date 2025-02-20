<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Accept-Charset: UTF-8");

#importar el archivo
require 'conn.php';
#Almacenado de metodos en una variable
$request = $_SERVER['REQUEST_METHOD'];

$matricula = $_POST['matricula'];
    $age = $_POST['age'];
    $queryUpdate = "UPDATE students SET age=:age WHERE matricula = :matricula";
    $res = $conn -> prepare($queryUpdate);
    $res-> execute([':matricula' => $matricula, ':age' => $age]);
    header("Location: mostrar.php");
?>