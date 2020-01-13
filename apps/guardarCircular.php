a<?php 
session_start();
require("../conection/conexion.php");
$destinatario=0;

switch ($_POST['destinatario']) {
	case '@alumnos':
		@$destinatario=1;
		break;
	case '@docentes':
		@$destinatario=2;
		break;
	case '@padres':
		@$destinatario=3;
		break;
	case '@todos':
		@$destinatario=4;
		break;
	
	default:
		# code...
		break;
}



$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

/*

echo $_POST['destinatario']."-------Destinatario<br>";
echo $_POST['tituloCircular']."-------tituloCircular<br>";
echo $_POST['circular']."-------circular<br>";
echo $fecha_actual."-------Fecha actual<br>";
echo $hora_actual."-------Hora actual<br>";
echo $emisor."-------Emisor<br>";
*/


$q1 = ("INSERT INTO atomocircular (receptor,tituloCircular,cuerpoCircular,fechaCircular,horaCircular) VALUES(:receptor,:tituloCircular,:cuerpoCircular,:fechaCircular,:horaCircular)");
$insertarCircular=$dbConn->prepare($q1);
$insertarCircular->bindParam(':receptor',$destinatario, PDO::PARAM_STR); 
$insertarCircular->bindParam(':tituloCircular',$_POST['tituloCircular'], PDO::PARAM_STR);
$insertarCircular->bindParam(':cuerpoCircular',$_POST['circular'], PDO::PARAM_STR);
$insertarCircular->bindParam(':fechaCircular',$fecha_actual, PDO::PARAM_STR);
$insertarCircular->bindParam(':horaCircular',$hora_actual, PDO::PARAM_STR);
$insertarCircular->execute();


if($_SESSION['tipoUsuario']==2){
  header("location:../cursosDocente/misCursos.php");
}







?>