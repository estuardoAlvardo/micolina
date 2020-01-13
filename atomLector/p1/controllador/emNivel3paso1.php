<?php 
session_start();
require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');
/*
echo "Tema a desarrollar: ".$_POST['tematica']."<br>";
echo "Titulo del texto: ".$_POST['titulo']."<br>";
echo "cantidad Parrafos: ".$_POST['cantidadP']."<br>";
*/


$sql1 = ("INSERT INTO emnivel4paso1(idTexto,idLectura,idUsuario,parrafo,fecha,hora) VALUES (:idTexto,:idLectura,:idUsuario,:parrafo,:fecha,:hora)");

$insertarPaso1 = $dbConn->prepare($sql1);
$insertarPaso1->bindParam(':idTexto', $_POST['idLectura'], PDO::PARAM_INT);
$insertarPaso1->bindParam(':idLectura', $_POST['idLectura'], PDO::PARAM_INT);
$insertarPaso1->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_STR); 
$insertarPaso1->bindParam(':parrafo',$_POST['parrafo'], PDO::PARAM_STR); 
$insertarPaso1->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR); 
$insertarPaso1->bindParam(':hora',$hora_actual, PDO::PARAM_STR);  
$insertarPaso1->execute();
$hayRegistro= $insertarPaso1->rowCount();

header("location:../lmNivel3CrearTexto.php?idLectura=".$_POST['idLectura']);


?>