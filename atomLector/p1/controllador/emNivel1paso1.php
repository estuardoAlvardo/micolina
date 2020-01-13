<?php 
session_start();
require("../../../conection/conexion.php");

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

/*
echo "titulo: ".$_POST['tituloCuento']."<br>";
echo "cuento Sistema : ".$_POST['cuentoSistema']."<br>";
echo "cuento aslumno : ".$_POST['cuentoAlumno']."<br>";
echo "fecha Parrafos: ".$fecha_actual."<br>";
echo "hora Parrafos: ".$hora_actual."<br>";
echo "idUsuario Parrafos: ".$_POST['idUsuario']."<br>";
echo "idLectura Parrafos: ".$_POST['idTexto']."<br>";
*/


$textoCompleto= $_POST['cuentoSistema'].' <br><br>'.$_POST['cuentoAlumno'];



$sql1 = ("INSERT INTO emnivel1completopaso1(idUsuario,idTexto,titulo,CuentoCompleto,fecha,hora) VALUES (:idUsuario,:idTexto,:titulo,:CuentoCompleto,:fecha,:hora)");

$insertarPaso1nivel1= $dbConn->prepare($sql1);
$insertarPaso1nivel1->bindParam(':idUsuario', $_POST['idUsuario'], PDO::PARAM_INT);
$insertarPaso1nivel1->bindParam(':idTexto', $_POST['idTexto'], PDO::PARAM_INT);
$insertarPaso1nivel1->bindParam(':titulo', $_POST['tituloCuento'], PDO::PARAM_STR); 
$insertarPaso1nivel1->bindParam(':CuentoCompleto',$textoCompleto, PDO::PARAM_STR); 
$insertarPaso1nivel1->bindParam(':fecha', $fecha_actual, PDO::PARAM_STR); 
$insertarPaso1nivel1->bindParam(':hora', $hora_actual, PDO::PARAM_STR); 

$insertarPaso1nivel1->execute();


header("location:../mostrarLect1.php?idLectura=".$_POST['idTexto']."&gradoB=".$_POST['gradoB']);


?>