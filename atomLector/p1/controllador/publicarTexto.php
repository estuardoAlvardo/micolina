<?php 
session_start();
require("../../../conection/conexion.php");
$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

$sql1 = ("INSERT INTO publictexto(idUsuario,idLectura,autor,tematica,titulo,texto,fecha,hora) VALUES (:idUsuario,:idLectura,:autor,:tematica,:titulo,:texto,:fecha,:hora)");

$publicarTexto = $dbConn->prepare($sql1);


foreach($_POST as $nombre_campo => $valor){ 

   $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 


   if($nombre_campo=='idUsuario'){
   	//echo 'encontre IdUsuario '.$valor;
   	$_SESSION['idUsuario_g']=$valor;
   	$publicarTexto->bindParam(':idUsuario', $_SESSION['idUsuario_g'], PDO::PARAM_INT);

   }
   if($nombre_campo=='idLectura'){
   	//echo 'encontre idLectura '.$valor;
   	$_SESSION['idLectura_g']=$valor;
   	$publicarTexto->bindParam(':idLectura',	$_SESSION['idLectura_g'], PDO::PARAM_INT);
   }
   
   if($nombre_campo=='titulo'){
   	//echo 'encontre titulo '.$valor;
   	$_SESSION['titulo_g']=$valor;
   	$publicarTexto->bindParam(':titulo',	$_SESSION['titulo_g'], PDO::PARAM_STR);
   }
   if($nombre_campo=='autor'){
   	//echo 'encontre autor '.$valor;
   	$_SESSION['autor_g']=$valor;
   	$publicarTexto->bindParam(':autor',	$_SESSION['autor_g'], PDO::PARAM_STR);
   }
   if($nombre_campo=='tematica'){
   	//echo 'encontre tematica '.$valor;
   	$_SESSION['tematica_g']=$valor;
   	$publicarTexto->bindParam(':tematica',	$_SESSION['tematica_g'], PDO::PARAM_STR);
   }

   if(strpos($nombre_campo, 'campo')!== false){
     

        
   	$texto=$valor.'<br>';

      $textoCompleto[]=$texto;

      $arrayStringTexto = implode("<br>", $textoCompleto);
   	
     // $_SESSION['textoCompleto']=$texto;
   	




      
   }



}
echo $arrayStringTexto;
$publicarTexto->bindParam(':texto', $arrayStringTexto, PDO::PARAM_STR);
$publicarTexto->bindParam(':fecha', $fecha_actual, PDO::PARAM_STR);
$publicarTexto->bindParam(':hora', $hora_actual, PDO::PARAM_STR);
$publicarTexto->execute();
header("location:../mostrarLect1.php?idLectura=".$_SESSION['idLectura_g']);


?>