<?php 
session_start();
require("../../../conection/conexion.php");
$_POST['intento'];
$fundamento='cnb';
$fecha_actual=date("d/m/Y");
 $hora_actual=date('h:i:s');
 $total=0;
//obtener items

$sq1 = ("SELECT *  FROM atomolector as lectura join cuestionario as cues on lectura.idLectura=cues.idLectura join itemopcionmultiple as item on item.idCuestionario=cues.idCuestionario where lectura.idLectura=:idLectura AND fundamento=:fundamento");
    $obtenerCuestionario = $dbConn->prepare($sq1);
     $obtenerCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado'],PDO::PARAM_INT);
     $obtenerCuestionario->bindparam(':fundamento', $fundamento,PDO::PARAM_STR);
    $obtenerCuestionario->execute();


//insertar quiz
 $sq2 = ("INSERT INTO   registropruebacomprension(idLectura,idUsuario,tiempo,fechaRegistro,horaRegistro,rPregunta1,rPregunta2,rPregunta3, rPregunta4,rPregunta5,rPregunta6,rPregunta7,rPregunta8,rPregunta9,rPregunta10,totalObtenido,intento) VALUES(:idLectura,:idUsuario,:tiempo,:fechaRegistro,:horaRegistro,:rPregunta1,:rPregunta2,:rPregunta3, :rPregunta4,:rPregunta5,:rPregunta6,:rPregunta7,:rPregunta8,:rPregunta9,:rPregunta10,:totalObtenido,:intento)");
     $insertarCuestionario = $dbConn->prepare($sq2);
/*
//datos recibidos
echo $_POST['idLecturaEnviado']."<br>";
echo $_POST['idUsuario']."<br>";
echo $_POST['cantidadPreguntas']."<br>";
echo $_POST['tiempo']."<br>";
echo $fecha_actual=date("d/m/Y")."<br>";
echo $hora_actual=date('h:i:s')."<br>";
//respuestas obtenidas del cuestionario
for($i=1; $i<=$_POST['cantidadPreguntas']; $i++){

  echo $_POST['name'.$i]."<br>";

}
*/

$insertarCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado']);
$insertarCuestionario->bindparam(':idUsuario',$_POST['idUsuario']);
$insertarCuestionario->bindparam(':tiempo',$_POST['tiempo']);
$insertarCuestionario->bindparam(':fechaRegistro',$fecha_actual);
$insertarCuestionario->bindparam(':horaRegistro',$hora_actual);
$insertarCuestionario->bindparam(':intento',$_POST['intento']);




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

 
      
      @$sumaIncorrectas+=$punteo;
    }
  }



if(empty($sumaCorrectas)){
  $sumaCorrectas=0;
}

if(empty($sumaIncorrectas)){
$sumaIncorrectas=0;

}



@$sumaCorrectas;
@$sumaIncorrectas;
$total=$sumaCorrectas-$sumaIncorrectas;


if($total<=0){
  $total=0;
}

$insertarCuestionario->bindparam(':totalObtenido',$total);


 $insertarCuestionario->execute();

header("location:../resultadoCnb.php?idLectura=".$_POST['idLecturaEnviado']."&idUsuario=".$_POST['idUsuario']."&intento=".$_POST['intento']);


?>