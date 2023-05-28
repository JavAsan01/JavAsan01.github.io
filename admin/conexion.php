<?php
//datos del servidor
$server = "localhost";
$user = "root";
$pass = "";
$db = "my_pet";
//Establecer la conexion
try{
    $conexion = new PDO("mysql:host=$server;dbname=$db",$user,$pass);
    // if ($conexion){echo"conectado";}
    // if ($conexion->$connect_errno){
    //     die("la conexion ha fallado".$conexion->$connect_errno);}
} catch(Exception $ex){
    echo $ex->getMessage();
}
?>