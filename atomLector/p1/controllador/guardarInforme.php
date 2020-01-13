<?php 
session_start();
require("../../../conection/conexion.php");

echo $_SESSION["idUsuario"]."<br>";
echo "No NoLectura: ".$_POST['lectura']."<br>";
echo "Intento: ".$_POST['intento']."<br>";
echo "Tiempo: ".$_POST['tiempo']."<br>";
echo "Palabras por Minuto: ".$_POST['velocidad']."<br>";
echo "Fluidez: ".$_POST['fluidez']."<br>";
echo 'lecturaNo'.$_POST['numLect'];


$sql1 = ("INSERT INTO atomolectorvelocidad(idUsuario,noLectura,intento,tiempoSeg,velocidadLectora,fluidez) VALUES (:idUsuario,:noLectura,:intento,:tiempoSeg,:velocidadLectora,:fluidez)");

$insertarVelocidadLectora = $dbConn->prepare($sql1);
$insertarVelocidadLectora->bindParam(':idUsuario', $_SESSION["idUsuario"], PDO::PARAM_INT); 
$insertarVelocidadLectora->bindParam(':noLectura', $_POST['lectura'], PDO::PARAM_INT);
$insertarVelocidadLectora->bindParam(':intento',$_POST['intento'], PDO::PARAM_INT);
$insertarVelocidadLectora->bindParam(':tiempoSeg',$_POST['tiempo'], PDO::PARAM_INT);
$insertarVelocidadLectora->bindParam(':velocidadLectora',$_POST['velocidad'], PDO::PARAM_INT);
$insertarVelocidadLectora->bindParam(':fluidez', $_POST['fluidez'], PDO::PARAM_STR);
$insertarVelocidadLectora->execute();


$sql2 = ("UPDATE  velocidadlectora SET intentos=:intentos where idLectura=:idLectura");
$actualizarLeido = $dbConn->prepare($sql2);
$actualizarLeido->bindParam(':intentos',$_POST['intento'], PDO::PARAM_INT); 
$actualizarLeido->bindParam(':idLectura',$_POST['lectura'], PDO::PARAM_INT); 
$actualizarLeido->execute();



header("location:../velocidad1p.php?idLectura=".$_POST['lectura']."&numeroLectura=".$_POST['numLect']."&gradoB=".$_POST['gradoBB']);



 ?>