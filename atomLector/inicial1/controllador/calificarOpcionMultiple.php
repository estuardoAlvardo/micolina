<?php 
session_start();
require("../../../conection/conexion.php");

//obtener intento y le sumamos 1 
$sql3= ("SELECT intento  FROM registropruebacomprension where idLectura=:idLectura and idUsuario=:idUsuario");
    $obtenerIntento = $dbConn->prepare($sql3);
    $obtenerIntento->bindparam(':idUsuario',$_POST['idUsuario']);
    $obtenerIntento->bindparam(':idLectura',$_POST['idLecturaEnviado']);
    $obtenerIntento->execute();
    $intento=$obtenerIntento->rowCount();    
   $intento+=1;
   
  $intento;
    
//obtener items
$sq1 = ("SELECT *  FROM atomolector as lectura join cuestionario as cues on lectura.idLectura=cues.idLectura join itemopcionmultiple as item on item.idCuestionario=cues.idCuestionario where lectura.idLectura=:idLectura");
    $obtenerCuestionario = $dbConn->prepare($sq1);
     $obtenerCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado']);
    $obtenerCuestionario->execute();


//insertar cuestionario
 $sq2 = ("INSERT INTO registropruebacomprension(idLectura,idUsuario,tiempo,fechaRegistro,horaRegistro,rPregunta1,rPregunta2,rPregunta3, rPregunta4,rPregunta5,totalObtenido,intento) VALUES(:idLectura,:idUsuario,:tiempo,:fechaRegistro,:horaRegistro,:rPregunta1,:rPregunta2,:rPregunta3, :rPregunta4,:rPregunta5,:totalObtenido,:intento)");
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
    //echo $i;

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
      
    }
  }



if(empty($sumaCorrectas)){
  $sumaCorrectas=0;
}

@$sumaCorrectas;

$totalQuiz=$sumaCorrectas;


if($totalQuiz<=0){
  $totalPisa=0;
}

$insertarCuestionario->bindparam(':totalObtenido',$totalQuiz);
$insertarCuestionario->bindparam(':intento',$intento);


$insertarCuestionario->execute();
header("location:../resultado.php?idLectura=".$_POST['idLecturaEnviado']."&idUsuario=".$_POST['idUsuario']);

?>