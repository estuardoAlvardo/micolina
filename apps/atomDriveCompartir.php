<?php 
session_start();
require("../conection/conexion.php");
@$_POST['correo'];
@$_POST['idArchivoEnviar'];
$_SESSION['idUsuario'];


$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');


//obtenemos datos del archivo 
$q1 = ("SELECT * FROM atomodrive where idArchivo=:idArchivoEnviar");
$misDocumentos=$dbConn->prepare($q1);
$misDocumentos->bindParam(':idArchivoEnviar',@$_POST['idArchivoEnviar'], PDO::PARAM_INT); 
$misDocumentos->execute();

while($row1=$misDocumentos->fetch(PDO::FETCH_ASSOC)){                
 $_SESSION['idArchivoCompartir']=$row1['idArchivo'];
 


}

//obtenemos datos del archivo 

$q2 = ("SELECT * FROM usuarios where correo=:correoObtenido");
$compartirCon=$dbConn->prepare($q2);
$compartirCon->bindParam(':correoObtenido',@$_POST['correo'], PDO::PARAM_STR); 
$compartirCon->execute();
$consulta=$compartirCon->rowCount();



if($consulta==0){
	echo "El correo no existe crear un modal indicandole que el usuario no funciona";
}else{


while($row2=$compartirCon->fetch(PDO::FETCH_ASSOC)){                

$_SESSION['idUsuarioCompartir']=$row2['idUsuario'];
 

	}
}

//insertar datos a la base de datos atomoDriveCompartir 

$q3 = ("INSERT INTO  atomodrivecompartir (idarchivo,idUsuarioPropietario,idUsuarioCompartir,fechaCompartir,horaCompartir) VALUES (:idarchivo,:idUsuarioPropietario,:idUsuarioCompartir,:fechaCompartir,:horaCompartir)");
$compartirArchivo=$dbConn->prepare($q3);
$compartirArchivo->bindParam(':idarchivo',$_SESSION['idArchivoCompartir'], PDO::PARAM_INT); 
$compartirArchivo->bindParam(':idUsuarioPropietario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$compartirArchivo->bindParam(':idUsuarioCompartir',$_SESSION['idUsuarioCompartir'], PDO::PARAM_INT); 
$compartirArchivo->bindParam(':fechaCompartir',$fecha_actual, PDO::PARAM_STR); 
$compartirArchivo->bindParam(':horaCompartir',$hora_actual, PDO::PARAM_STR); 
$compartirArchivo->execute();

header("location:atomDrive.php");



?>



