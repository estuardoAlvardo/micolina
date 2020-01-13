<?php

require("conexion.php");

/**
 * Grabar audio obtenido del micrófono con JavaScript, seleccionando
 * un dispositivo de grabación de una lista; usando MediaRecorder
 * y getUserMedia
 *
 * Extra: no descargar el audio, sino enviarlo a un servidor con PHP y guardarlo en la nube
 * Recomendado:
 *
 */
# Si no hay archivos, salir inmediatamente
if (count($_FILES) <= 0 || empty($_FILES["audio"])) {
    exit("No hay archivos");
}
# De dónde viene el audio y en dónde lo ponemos
$rutaAudioSubido = $_FILES["audio"]["tmp_name"];
$nuevoNombre = uniqid() . ".webm";
$rutaDeGuardado = __DIR__ . "/" . $nuevoNombre;
$data = base64_encode(file_get_contents($_FILES['audio']['tmp_name']));
// Mover el archivo subido a la ruta de guardado
//move_uploaded_file($_FILES["audio"]["tmp_name"], $rutaDeGuardado);
// Imprimir el nombre para que la petición lo lea
//echo $nuevoNombre;



$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');

    $q1 = ("INSERT INTO practicaPreescolar(idUsuario,idFragmentoObjeto,fecha,hora,audio) values(:idUsuario,:idFragmentoObjeto,:fecha,:hora,:audio)");
      $guardarAudio=$dbConn->prepare($q1);
      $guardarAudio->bindParam(':idUsuario',$_POST['idUsuario'], PDO::PARAM_INT);
      $guardarAudio->bindParam(':idFragmentoObjeto',$_POST['idFrag1'], PDO::PARAM_INT); 
      $guardarAudio->bindParam(':fecha',$fecha_actual, PDO::PARAM_STR);
      $guardarAudio->bindParam(':hora',$hora_actual, PDO::PARAM_STR); 
      $guardarAudio->bindParam(':audio',$data, PDO::PARAM_STR); 

      $guardarAudio->execute();
   


?>