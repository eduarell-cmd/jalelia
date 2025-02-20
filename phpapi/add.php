<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Accept-Charset: UTF-8");

#importar el archivo
require 'conn.php';
#Almacenado de metodos en una variable
$request = $_SERVER['REQUEST_METHOD'];

$name = $_POST['name'];
    $lastname = $_POST['lastName'];
    $age = $_POST['age'];       
    $matricula = $_POST['matricula'];  
    
    $insert = "INSERT INTO students(name, lastName, age, matricula) VALUES (:name, :lastName, :age, :matricula)";
    $ress = $conn -> prepare($insert);
    $ress-> execute([':name' => $name, 
                    ':lastName' => $lastname, 
                    ':age' => $age, 
                    ':matricula' => $matricula]);
    header("Location: mostrar.php");
?>