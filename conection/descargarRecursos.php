<?php 

require("conexion.php");
	$_GET['frag'];
    $q1 = ("SELECT * FROM objetosPreescolar where idFragmentoObjeto=:idObjeto");
      $mostrarRecurso=$dbConn->prepare($q1);
      $mostrarRecurso->bindParam(':idObjeto',$_GET['frag'], PDO::PARAM_INT); 
      $mostrarRecurso->execute();
     


     // header('Content-Type:application/pdf');

        while(@$row2=$mostrarRecurso->fetch(PDO::FETCH_ASSOC)){ 
 			 
            header("Content-type: $mimetype");
        	$filename = 'random.pdf';
            $mimetype = 'application/pdf';
            $filedata = $row2['recurso'];  
            header("Content-length: strlen($filedata)");         
            header("Content-Disposition: attachment; filename=$filename"); //disposition of download forces a download
            echo $filedata; 
 			

        }
?>