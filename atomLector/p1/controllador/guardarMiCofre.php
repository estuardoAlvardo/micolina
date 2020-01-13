<?php 
session_start();
require("../../../conection/conexion.php");
$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');


echo $_POST["idUsuario"]."<br>";
echo $_POST["idLectura"]."<br>";
echo $_POST["palabra"]."<br>";
echo $_POST["definicion"]."<br>";
echo $fecha_actual."<br>";
echo $hora_actual."<br>";



$sql1 = ("INSERT INTO micofre(idLectura,idUsuario,palabra,definicion,fecha,hora) VALUES (:idLectura,:idUsuario,:palabra,:definicion,:fecha,:hora)");

$insertarPalabra = $dbConn->prepare($sql1);
$insertarPalabra->bindParam(':idLectura', $_POST['idLectura'], PDO::PARAM_INT); 
$insertarPalabra->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':palabra',$_POST['palabra'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':definicion',$_POST['definicion'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':fecha', $fecha_actual, PDO::PARAM_INT);
$insertarPalabra->bindParam(':hora', $hora_actual, PDO::PARAM_STR);
$insertarPalabra->execute();




header("location:../miCofre.php?idLectura=".$_POST['idLectura']);


 ?>