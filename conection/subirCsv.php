<?php 
//conexion 
require("conexion.php");

///...........................................................nuevo


// validate to check uploaded file is a valid csv file
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
if(is_uploaded_file($_FILES['file']['tmp_name'])){
$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
//fgetcsv($csv_file);
// get data records from csv file
while(($data = fgetcsv($csv_file)) !== FALSE){
// Check if employee already exists with same email
//ralizamos consulta y la condicion en el where debe ser $data[] en la posicion que queremos buscar
// if employee already exist then update details otherwise insert new record

	@$i+=1;
	echo 'fila '.$i.' nombre---->'.$data[0].'<br>';
	echo 'fila '.$i.' apellido---->'.$data[1].'<br>';
	echo 'fila '.$i.' grado------->'.$data[2].'<br>';
	echo 'fila '.$i.' seccion------>'.$data[3].'<br>';
	echo 'fila '.$i.' usuario------->'.$data[4].'<br>';
	echo 'fila '.$i.' password---->'.$data[5].'<br>';
	echo 'fila '.$i.' tipoUsuario----->'.$data[6].'<br>';
	echo 'fila '.$i.' correo------>'.$data[7].'<br>';
	echo 'fila '.$i.' fotoPerfil----->'.@$data[8].'<br>';


	
	$sql1 = ("INSERT INTO usuarios(nombre,apellido,grado,seccion,usuario,password,tipoUsuario,correo,fotoPerfil) values(:nombre,:apellido,:grado,:seccion,:usuario,:password,:tipoUsuario,:correo,:fotoPerfil)");
	$insertarUsuario = $dbConn->prepare($sql1);
	$insertarUsuario->bindParam(':nombre',$data[0], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':apellido',$data[1], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':grado',$data[2], PDO::PARAM_INT);
	$insertarUsuario->bindParam(':seccion',$data[3], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':usuario',$data[4], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':password',$data[5], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':tipoUsuario',$data[6], PDO::PARAM_INT);
	$insertarUsuario->bindParam(':correo',$data[7], PDO::PARAM_STR);
	$insertarUsuario->bindParam(':fotoPerfil',$data[8], PDO::PARAM_STR);
	$insertarUsuario->execute();



}


fclose($csv_file);
$import_status = '?import_status=success';
} else {
$import_status = '?import_status=error';
}
} else {
$import_status = '?import_status=invalid_file';
}

header("Location: ../subirUsuarios.php".$import_status);








?>

