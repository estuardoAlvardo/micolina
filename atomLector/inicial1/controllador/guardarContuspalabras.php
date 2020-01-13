<?php 
session_start();
require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');
/*
echo "idUsuario ".$_POST['idUsuario']."<br>";
echo "texto a guardar: ".$_POST['textRecord']."<br>";
echo "idLectura".$_POST['idLectura']."<br>";
echo $fecha_actual;
echo $hora_actual;
*/

$sql3 = ("INSERT INTO  contuspalabras (idUsuario,idLectura,fecha,hora,grabacion) VALUES (:idUsuario,:idLectura,:fecha,:hora,:grabacion)");
$actualizar = $dbConn->prepare($sql3);
$actualizar->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_INT); 
$actualizar->bindParam(':idLectura',$_POST['idLectura'], PDO::PARAM_INT);
$actualizar->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR);
$actualizar->bindParam(':hora', $hora_actual, PDO::PARAM_STR);
$actualizar->bindParam(':grabacion',$_POST['textRecord'], PDO::PARAM_STR);
$actualizar->execute();

header("location:../cuentame.php?noLectura=".$_POST['idLectura']);


 ?>