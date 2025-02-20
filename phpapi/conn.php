<?php
$host = "localhost:3306";
$user = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$host;dbname=tidbis41m", $user, $password);
    
} catch (PDOException $e) {
    echo "error de conexion" . $e->getMessage();
}

?>