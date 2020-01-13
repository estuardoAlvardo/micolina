<?php 
session_start();
require("../../../conection/conexion.php");
//obtener items
$nivelObtenido='';
$_POST['intento'];
$fundamento="pisa";


$sq1 = ("SELECT *  FROM atomolector as lectura join cuestionario as cues on lectura.idLectura=cues.idLectura join itemopcionmultiple as item on item.idCuestionario=cues.idCuestionario where lectura.idLectura=:idLectura AND fundamento=:fundamento");
    $obtenerCuestionario = $dbConn->prepare($sq1);
     $obtenerCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado'],PDO::PARAM_INT);
     $obtenerCuestionario->bindparam(':fundamento', $fundamento,PDO::PARAM_STR);
    $obtenerCuestionario->execute();

    
//insertar cuestionario
 $sq2 = ("INSERT INTO registropruebacomprension(idLectura,idUsuario,tiempo,fechaRegistro,horaRegistro,rPregunta1,rPregunta2,rPregunta3, rPregunta4,rPregunta5,rPregunta6,rPregunta7, rPregunta8, rPregunta9, rPregunta10,totalObtenido,intento) VALUES(:idLectura,:idUsuario,:tiempo,:fechaRegistro,:horaRegistro,:rPregunta1,:rPregunta2,:rPregunta3, :rPregunta4,:rPregunta5,:rPregunta6,:rPregunta7, :rPregunta8, :rPregunta9, :rPregunta10,:totalObtenido,:intento)");
     $insertarCuestionario = $dbConn->prepare($sq2);
//datos recibidos
$_POST['idLecturaEnviado'];
$_POST['idUsuario'];
$_POST['cantidadPreguntas'];
$_POST['tiempo'];
$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');
$insertarCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado']);
$insertarCuestionario->bindparam(':idUsuario',$_POST['idUsuario']);
$insertarCuestionario->bindparam(':tiempo',$_POST['tiempo']);
$insertarCuestionario->bindparam(':fechaRegistro',$fecha_actual);
$insertarCuestionario->bindparam(':horaRegistro',$hora_actual);
  while(@$row1=$obtenerCuestionario->fetch(PDO::FETCH_ASSOC)){
    @$i+=1;

   

  if(empty($_POST['name'.$i])){
        
        $preguntaIteracion=':rPregunta'.$i;
        $_POST['name'.$i]=0;
        $insertarCuestionario->bindparam($preguntaIteracion, $_POST['name'.$i]);
      }else{
      $preguntaIteracion=':rPregunta'.$i;
      $insertarCuestionario->bindparam($preguntaIteracion, $_POST['name'.$i]);
    }


    if($row1['respuestaCorrecta']==$_POST['name'.$i]){
   
     $_POST['name'.$i];
      
      @$sumaCorrectas+=$row1['punteoItem'];
    }else{
      $punteo=0;
      $_POST['name'.$i];
      
      @$sumaIncorrectas+=$row1['punteoItem'];
    }
  }

//---------------------------------------------------------------
if(empty($sumaCorrectas)){
  $sumaCorrectas=0;
}
if(empty($sumaIncorrectas)){
$sumaIncorrectas=0;
}
@$sumaCorrectas;
@$sumaIncorrectas;
$totalPisa=$sumaCorrectas-$sumaIncorrectas;
if($totalPisa<=0){
  $totalPisa=0;
}

echo 'total-------------'.$sumaCorrectas;
$insertarCuestionario->bindparam(':totalObtenido',$sumaCorrectas);



$nivelObtenido;
$insertarCuestionario->bindparam(':intento',$_POST['intento']);


 $insertarCuestionario->execute();
header("location:../resultado.php?idLectura=".$_POST['idLecturaEnviado']."&idUsuario=".$_POST['idUsuario']);
?>