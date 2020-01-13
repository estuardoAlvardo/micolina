<?php 
session_start();
require("../../../conection/conexion.php");
$fecha_actual=date("d/m/Y");
 $hora_actual=date('h:i:s');
//obtener items

$sq1 = ("SELECT * FROM preguntaspersonajes JOIN quizpersonajes ON preguntaspersonajes.idquizpersonaje=quizpersonajes.idQuiz JOIN atomolector ON quizpersonajes.idLectura=atomolector.idLectura   WHERE atomolector.idLectura=:idLectura");
    $obtenerCuestionario = $dbConn->prepare($sq1);
     $obtenerCuestionario->bindparam(':idLectura',$_POST['idLecturaEnviado']);
    $obtenerCuestionario->execute();


//insertar quiz
 $sq2 = ("INSERT INTO   registropruebapersonajes(idLectura,idUsuario,tiempo,fechaRegistro,horaRegistro,rPregunta1,rPregunta2,rPregunta3, rPregunta4,rPregunta5,totalResultado) VALUES(:idLectura,:idUsuario,:tiempo,:fechaRegistro,:horaRegistro,:rPregunta1,:rPregunta2,:rPregunta3, :rPregunta4,:rPregunta5,:totalResultado)");
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

  echo $_POST['name'.$i];

}
*/

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

$insertarCuestionario->bindparam(':totalResultado',$total);


 $insertarCuestionario->execute();

header("location:../personajes.php?noLectura=".$_POST['idLecturaEnviado']."&idUsuario=".$_POST['idUsuario']);


?>