<?php 
session_start();
require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

/*
echo "Tema a desarrollar: ".$_POST['tematica']."<br>";
echo "Titulo del texto: ".$_POST['titulo']."<br>";
echo "cantidad Parrafos: ".$_POST['cantidadP']."<br>";
echo "cantidad Parrafos: ".$_POST['objetivoTexto']."<br>";
echo "fecha Parrafos: ".$fecha_actual."<br>";
echo "hora Parrafos: ".$hora_actual."<br>";
echo "idUsuario Parrafos: ".$_POST['idUsuario']."<br>";
echo "idLectura Parrafos: ".$_POST['idLectura']."<br>";
*/


$sql1 = ("INSERT INTO emnivel4paso0(idLectura,idUsuario,tema,tituloTexto,objetivoTexto,cantidadParrafos,fecha,hora) VALUES (:idLectura,:idUsuario,:tema,:tituloTexto,:objetivoTexto,:cantidadParrafos,:fecha,:hora)");

$insertarPaso0 = $dbConn->prepare($sql1);
$insertarPaso0->bindParam(':idLectura', $_POST['idLectura'], PDO::PARAM_INT);
$insertarPaso0->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_INT);
$insertarPaso0->bindParam(':tema', $_POST['tematica'], PDO::PARAM_STR); 
$insertarPaso0->bindParam(':tituloTexto',$_POST['titulo'], PDO::PARAM_STR); 
$insertarPaso0->bindParam(':objetivoTexto',$_POST['objetivoTexto'], PDO::PARAM_STR); 
$insertarPaso0->bindParam(':cantidadParrafos',$_POST['cantidadP'], PDO::PARAM_INT);  
$insertarPaso0->bindParam(':fecha', $fecha_actual, PDO::PARAM_STR); 
$insertarPaso0->bindParam(':hora', $hora_actual, PDO::PARAM_STR); 
$insertarPaso0->execute();
$hayRegistro= $insertarPaso0->rowCount();

header("location:../lmNivel3CrearTexto.php?idLectura=".$_POST['idLectura']);


?>