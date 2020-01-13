<?php 
session_start();
require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');
/*
echo "idUsuario ".$_POST['idUsuario']."<br>";
echo "texto a guardar: ".$_POST['textRecord']."<br>";
echo "idGlosario".$_POST['idGlosario']."<br>";

*/

$sql2 = ("SELECT idPalabra from registroglosario where idPalabra=:idPalabra and idUsuario=:idUsuario");

$buscarRegistro = $dbConn->prepare($sql2);
$buscarRegistro->bindParam(':idPalabra', $_POST['idPalabra'], PDO::PARAM_INT);
$buscarRegistro->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_STR); 
$buscarRegistro->execute();
$hayRegistro= $buscarRegistro->rowCount();





if($hayRegistro>=1){


$sql3 = ("UPDATE registroglosario SET recordPalabra=:recordPalabra, fecha=:fecha, hora=:hora WHERE idPalabra=:idPalabra;");
$actualizar = $dbConn->prepare($sql3);
$actualizar->bindParam(':recordPalabra', $_POST['textRecord'], PDO::PARAM_STR); 
$actualizar->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR);
$actualizar->bindParam(':hora',$hora_actual, PDO::PARAM_STR);
$actualizar->bindParam(':idPalabra',$_POST['idPalabra'], PDO::PARAM_INT);
$actualizar->execute();
header("location:../glosario.php?noLectura=".$_POST['lectura']);

}


if($hayRegistro<1){


$sql4 = ("INSERT INTO registroglosario(recordPalabra,idGlosario,idUsuario,idPalabra,fecha,hora) VALUES (:recordPalabra,:idGlosario,:idUsuario,:idPalabra,:fecha,:hora)");
$insertarPalabra = $dbConn->prepare($sql4);
$insertarPalabra->bindParam(':recordPalabra', $_POST['textRecord'], PDO::PARAM_STR); 
$insertarPalabra->bindParam(':idGlosario', $_POST['idGlosario'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':idUsuario',$_POST['idUsuario'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':idPalabra',$_POST['idPalabra'], PDO::PARAM_INT);
$insertarPalabra->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR);
$insertarPalabra->bindParam(':hora',$hora_actual, PDO::PARAM_STR);


$insertarPalabra->execute();


header("location:../glosario.php?noLectura=".$_POST['lectura']);

}

 ?>