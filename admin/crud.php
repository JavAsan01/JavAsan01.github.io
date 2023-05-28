<?php include("conexion.php");?>
<?php

$cedula = (isset($_POST['cedula']))?$_POST['cedula']:"";
$correo = (isset($_POST['correo']))?$_POST['correo']:"";
$celular = (isset($_POST['celular']))?$_POST['celular']:"";
$servicios = (isset($_POST['servicios']))?$_POST['servicios']:"";
$hora = (isset($_POST['hora']))?$_POST['hora']:"";
$dia = (isset($_POST['dia']))?$_POST['dia']:"";
// insertar datos
$sentenciaSQL = $conexion->prepare("INSERT INTO citas (cedula,correo,celular,servicio,hora,dia) VALUES (:cedula,:correo,:celular,:servicio,:hora,:dia)");
$sentenciaSQL->bindParam(':cedula',$cedula);
$sentenciaSQL->bindParam(':correo',$correo);
$sentenciaSQL->bindParam(':celular',$celular);
$sentenciaSQL->bindParam(':servicio',$servicios);
$sentenciaSQL->bindParam(':hora',$hora);
$sentenciaSQL->bindParam(':dia',$dia);
$sentenciaSQL ->execute();
header("location:../4_citas.php")
?>