<?php 
session_start();
require("../conection/conexion.php");
$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');




if($_POST['tipoBullying']==1){
	//echo "Exclusion Social";
	$tipoBullying="Exclusion Social";
}

if($_POST['tipoBullying']==2){
	//echo "Agresion Verbal";
	$tipoBullying="Agresion Verbal";
}

if($_POST['tipoBullying']==3){
	//echo "Agresion Indirecta";
	$tipoBullying="Agresion Indirecta";
}
if($_POST['tipoBullying']==4){
	//echo "Agresion Fisica";
	$tipoBullying="Agresion Fisica";
}

if($_POST['tipoBullying']==5){
	//echo "Amenaza";
	$tipoBullying="Amenaza";
}
if($_POST['tipoBullying']==6){
	//echo "Ciberbullyng";
	$tipoBullying="Ciberbullyng";
}

/*
echo "tipoBullying : ".$tipoBullying."<br>";
echo "descripcion : ".$_POST['descripcion']."<br>";
echo "Nombre de la victima: ".$_POST['nombreCompanero']."<br>";
echo "Grado y seccion de la victima: ".$_POST['gradoSeccion1']."<br>";
echo "nombre del agresor : ".$_POST['nombreAgresor']."<br>";
echo "Grado y seccionn del agresor: ".$_POST['gradoSeccion2']."<br>";
echo "Fecha: ".$fecha_actual."<br>";
echo "Hora: ".$hora_actual."<br>";                                                                                              
*/

$sql1 = ("INSERT INTO atomobullying(tipoBullying,nombreVictima,gradoSeccionVictima,nombreAgresor,gradoSeccionAgresor,descripcion,fechaAlerta,horaAlerta) values(:tipoBullying,:nombreVictima,:gradoSeccionVictima,:nombreAgresor,:gradoSeccionAgresor,:descripcion,:fechaAlerta,:horaAlerta)");
	$insertarBullying = $dbConn->prepare($sql1);
	$insertarBullying->bindParam(':tipoBullying',$tipoBullying, PDO::PARAM_STR);
	$insertarBullying->bindParam(':nombreVictima',$_POST['nombreCompanero'], PDO::PARAM_STR);
	$insertarBullying->bindParam(':gradoSeccionVictima',$_POST['gradoSeccion1'], PDO::PARAM_STR);
	$insertarBullying->bindParam(':nombreAgresor',$_POST['nombreAgresor'], PDO::PARAM_STR);
	$insertarBullying->bindParam(':gradoSeccionAgresor',$_POST['gradoSeccion2'], PDO::PARAM_STR);
	$insertarBullying->bindParam(':descripcion',$_POST['descripcion'], PDO::PARAM_STR);
	$insertarBullying->bindParam(':fechaAlerta',$fecha_actual, PDO::PARAM_STR);
	$insertarBullying->bindParam(':horaAlerta',$hora_actual, PDO::PARAM_STR);
	$insertarBullying->execute();

header("location:bullying.php");

?>