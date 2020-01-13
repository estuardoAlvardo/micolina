<?php 
session_start();

require("../conection/conexion.php");

$_SESSION['idUsuario'];
$_SESSION['nombre'];

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');


 (string)$archivo=$_FILES['fotoPerfilUsuario']['name'];
 (string)$ruta=$_FILES['fotoPerfilUsuario']['tmp_name'];
		$tamano_archivo = $_FILES['fotoPerfilUsuario']['size']; 
		$directorio= "atomDrive/documentos/".$_SESSION["idUsuario"];
 		$destino= "atomDrive/documentos/".$_SESSION["idUsuario"]."/".$archivo;



//formatear tamaño de archivo 


     if ($tamano_archivo>= 1073741824) 
     { 
      $tamano_archivo = number_format($tamano_archivo/1073741824, 2) . ' GB'; 
     } 
     elseif ($tamano_archivo >= 1048576) 
     { 
      $tamano_archivo = number_format($tamano_archivo/1048576, 2) . ' MB'; 
     } 
     else if ($tamano_archivo >= 1024) 
     { 
      $tamano_archivo = number_format($tamano_archivo/1024, 2) . ' KB'; 
     } 
     elseif ($tamano_archivo > 1) 
     { 
      $tamano_archivo = $tamano_archivo . ' bytes'; 
     } 
     elseif ($tamano_archivo == 1) 
     { 
      $tamano_archivo = $tamano_archivo . ' byte'; 
     } 
     else 
     { 
      $tamano_archivo= '0 bytes'; 
     } 

 $tamano_archivo;
 



if (!file_exists($directorio)){
    mkdir($directorio, 0777, true);

if (!empty($archivo)){
  copy($ruta,$destino);



$q1 = $dbConn->prepare("INSERT INTO atomodrive(idUsuario,nombreArchivo,direccion,fecha,hora,peso) VALUES(:idUsuario,:nombreArchivo,:direccion,:fecha,:hora,:peso)");
$q1->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_STR);
$q1->bindParam(':nombreArchivo', $archivo, PDO::PARAM_STR);
$q1->bindParam(':direccion', $destino, PDO::PARAM_STR);
$q1->bindParam(':fecha', $fecha_actual, PDO::PARAM_STR);
$q1->bindParam(':hora', $hora_actual, PDO::PARAM_STR);
$q1->bindParam(':peso', $tamano_archivo, PDO::PARAM_STR);
$q1->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
$q1->execute();

  header("location:atomDrive.php");

  }

  }else if(!empty($archivo)){
  
    copy($ruta,$destino);


$q1 = $dbConn->prepare("INSERT INTO atomodrive(idUsuario,nombreArchivo,direccion,fecha,hora,peso) VALUES(:idUsuario,:nombreArchivo,:direccion,:fecha,:hora,:peso)");
$q1->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_STR);
$q1->bindParam(':nombreArchivo', $archivo, PDO::PARAM_STR);
$q1->bindParam(':direccion', $destino, PDO::PARAM_STR);
$q1->bindParam(':fecha', $fecha_actual, PDO::PARAM_STR);
$q1->bindParam(':hora', $hora_actual, PDO::PARAM_STR);
$q1->bindParam(':peso', $tamano_archivo, PDO::PARAM_STR);
$q1->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
$q1->execute();

  header("location:atomDrive.php");
    }


?>



