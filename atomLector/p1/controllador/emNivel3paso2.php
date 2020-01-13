<?php 
session_start();

require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

echo "idParrafoMod: ".$_POST['idParrafo_save']."<br>";
echo "idTexto: ".$_POST['idTexto_save']."<br>";
echo "idLectura: ".$_POST['idLectura_save']."<br>";
echo "idUsuario: ".$_POST['idUsuario_save']."<br>";
echo "parrafoNew: ".$_POST['parraNew_save']."<br>";
echo "fecha: ".$fecha_actual."<br>";
echo "hora: ".$hora_actual."<br>";




$sql1 = ("INSERT INTO emnivel4paso2(idTexto_mod,idLectura_mod,idUsuario,idParrafo,parrafo_mod,	fecha,hora) VALUES (:idTexto_mod,:idLectura_mod,:idUsuario,:idParrafo,:parrafo_mod,:fecha,:hora)");

$insertarPaso2 = $dbConn->prepare($sql1);
$insertarPaso2->bindParam(':idTexto_mod', $_POST['idTexto_save'], PDO::PARAM_INT);
$insertarPaso2->bindParam(':idLectura_mod', $_POST['idLectura_save'], PDO::PARAM_INT);
$insertarPaso2->bindParam(':idUsuario', $_POST['idUsuario_save'], PDO::PARAM_INT); 
$insertarPaso2->bindParam(':idParrafo',$_POST['idParrafo_save'], PDO::PARAM_INT); 
$insertarPaso2->bindParam(':parrafo_mod',$_POST['parraNew_save'], PDO::PARAM_STR);
$insertarPaso2->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR);  
$insertarPaso2->bindParam(':hora',$hora_actual, PDO::PARAM_STR);  
$insertarPaso2->execute();
$hayRegistro= $insertarPaso2->rowCount();

header("location:../lmNivel3CrearTexto.php?idLectura=".$_POST['idLectura_save']);


?>