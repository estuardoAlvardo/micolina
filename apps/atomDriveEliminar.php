<?php 
session_start();

require("../conection/conexion.php");

echo $_POST['idArchivoEliminar']."<br>";
echo $_GET['primaryTable']."<br>";









//si el valor obtenido en get es 1 entonces eliminaremos de la tabla padre si es 2 eliminaremos de la tabla hijo

if($_GET['primaryTable']==1){

$q2 = ("SELECT * FROM atomodrive WHERE idArchivo=:idEliminar");
$buscarNombreArchivo=$dbConn->prepare($q2);
$buscarNombreArchivo->bindParam(':idEliminar',$_POST['idArchivoEliminar'], PDO::PARAM_INT); 
$buscarNombreArchivo->execute();


$q1 = ("DELETE FROM atomodrive WHERE idArchivo=:idEliminar");
$eliminarArchivo=$dbConn->prepare($q1);
$eliminarArchivo->bindParam(':idEliminar',$_POST['idArchivoEliminar'], PDO::PARAM_INT); 
$eliminarArchivo->execute();

while($row1=$buscarNombreArchivo->fetch(PDO::FETCH_ASSOC)){

 unlink($row1['direccion']);

}
header("location:atomDrive.php");

}else if($_GET['primaryTable']==2){

  
$q1 = ("DELETE FROM atomodrivecompartir WHERE idArchivo=:idEliminar");
$eliminarArchivo=$dbConn->prepare($q1);
$eliminarArchivo->bindParam(':idEliminar',$_POST['idArchivoEliminar'], PDO::PARAM_INT); 
$eliminarArchivo->execute();

header("location:atomDrive.php");

}




?>



