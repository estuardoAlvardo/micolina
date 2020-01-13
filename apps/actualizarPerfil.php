<?php 
session_start();
require("../conection/conexion.php");

(string)$_SESSION["idUsuario"];
(string)$_SESSION['nombre'];

@$_POST['nombreActualizar'];
@$_POST['apellidoActualizar'];

(string)$foto=$_FILES['fotoPerfilUsuario']['name'];
(string)$ruta=$_FILES['fotoPerfilUsuario']['tmp_name']; 
$directorio= "imgPerfil/".$_SESSION["idUsuario"];
$destino= "imgPerfil/".$_SESSION["idUsuario"]."/".$foto;


if(!empty(@$_POST['nombreActualizar'])){
  $q3=$dbConn->prepare("UPDATE usuarios SET nombre=:nombreActualizar WHERE idUsuario=:idUsuario");
  $q3->bindParam(':nombreActualizar', @$_POST['nombreActualizar'], PDO::PARAM_STR);
  $q3->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
  $q3->execute();
  $_SESSION["nombre"]=@$_POST['nombreActualizar'];
}


if(!empty(@$_POST['apellidoActualizar'])){
  $q2=$dbConn->prepare("UPDATE usuarios SET apellido=:apellidoActualizar WHERE idUsuario=:idUsuario");
  $q2->bindParam(':apellidoActualizar', @$_POST['apellidoActualizar'], PDO::PARAM_STR);
  $q2->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
  $q2->execute();
  $_SESSION["apellido"]=@$_POST['apellidoActualizar'];
}





if (!file_exists($directorio)){
    mkdir($directorio, 0777, true);

if (!empty($foto)){
  copy($ruta,$destino);



$q1 = $dbConn->prepare("UPDATE usuarios SET fotoPerfil=:fotoPerfil WHERE idUsuario=:idUsuario");

$q1->bindParam(':fotoPerfil', $destino, PDO::PARAM_STR);
$q1->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
$q1->execute();

$_SESSION["imgPerfil"]=$destino;
  }

  }

      if (!empty($foto)){
    
    copy($ruta,$destino);

    $q1 = $dbConn->prepare("UPDATE usuarios SET fotoPerfil=:fotoPerfil WHERE idUsuario=:idUsuario");

 $q1->bindParam(':fotoPerfil', $destino, PDO::PARAM_STR);
$q1->bindParam(':idUsuario',$_SESSION["idUsuario"], PDO::PARAM_INT);
$q1->execute();

   $_SESSION["imgPerfil"]=$destino;
    }

  
  
    
header("location:editarPerfil.php");




?>