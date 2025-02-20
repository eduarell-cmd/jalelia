<?php
// aqui van los headers
header("Content-Type: applitation/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Accept-Charset: UTF-8");

#importar el archivo
include "conn.php";

function getData(){
    global $data;
    if (!file_exists($data)){
        echo "Nope";
    }
}
#Almacenado de metodos en una variable
$request = $_SERVER['REQUEST_METHOD'];

switch($request){
    case 'GET':
        $query = "SELECT * FROM students";
        $result = $conn->query($query);
        $data = [];
        foreach($result as $student){
            $data[] = $student;
        }
        echo json_encode($data);
    case 'POST':
                #POST
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
        break;
    case 'PUT':
        $matricula = $_POST['matricula'];
    $age = $_POST['age'];
    $queryUpdate = "UPDATE students SET age=:age WHERE matricula = :matricula";
    $res = $conn -> prepare($queryUpdate);
    $res-> execute([':matricula' => $matricula, ':age' => $age]);
        break;
    case 'DELETE':
        $matricula = $_POST['matricula'];
        $queryDelete = "DELETE FROM students WHERE matricula = :matricula";
        $res = $conn -> prepare($queryDelete);
        $res-> execute([':matricula' => $matricula]);
        echo "Estudiante eliminado"
        break;
    default:
     echo "nada papu";
     break;
}
?>
