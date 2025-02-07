<?php
// aqui van los headers
header("Content-Type: applitation/json");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Accept-Charset: UTF-8");

$data = "Conf/tienda.json";

function getData(){
    global $data
    if (!file_exists($data)){
        echo "Nope";
    }
}
#Almacenado de metodos en una variable
$request = $_SERVER["REQUEST_METHOD"];

switch($request){
    case 'GET':
        echo json_encode($data, JSON_PRETTY_PRINT);
        break;
    case 'POST':
        echo "metodo post";
        break;
    case 'PUT':
        echo "metodo put";
        break;
    case 'DELETE':
        echo "metodo delete";
        break;
    default:
     echo "nada papu"
     break;
}
?>
