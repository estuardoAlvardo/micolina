<?php 


require("conexion.php");

$_POST['idLectura'];




foreach($_FILES["txtImg"]['tmp_name'] as $key => $tmp_name)
	{

$extension = pathinfo($_FILES['txtImg']['name'][$key], PATHINFO_EXTENSION);
$data = base64_encode(file_get_contents($_FILES['txtImg']['tmp_name'][$key]));

echo $_FILES['txtImg']['name'][$key].' '.$extension.'<br><br>';

//echo 'tabla a almacenar: '.$_POST['tabla'].'<br>';
//echo 'descripcion: '.$_POST['txtdescripcion'].'<br>';
echo 'imagen <div style="border:1px dashed red; width:400px; height:200px; word-wrap: break-word; overflow-y:scroll" >'.$data.'</div>';


if($extension=='jpg'){

	echo '<a href="../subirPaginas.php"><img style="margin-left:700px; margin-top:-600px; margin-bottom:400px;" src="data:image/jpg;base64,'.$data.'" alt="Red dot" /></a>';
}

if($extension=='gif'){
	echo '<a href="../subirPaginas.php"><img style="margin-left:700px; margin-top:-600px;" src="data:image/gif;base64,'.$data.'" alt="Red dot" /></a>';

}

if($extension=='png'){
	echo '<a href="../subirPaginas.php"><img style="margin-left:700px; margin-top:-600px;" src="data:image/png;base64,'.$data.'" alt="Red dot" /></a>';
}
 

//este trozo de codigo se comenta para cuando queremos ver las portadas  de lo contrario podemos subir lecturas mucho mas rapido.

/*
 $sql1 = ("INSERT INTO paginas(idLectura,fichero) values(:idLectura,:fichero)");
	$insertarPaginas = $dbConn->prepare($sql1);
	$insertarPaginas->bindParam(':idLectura',$_POST['idLectura'], PDO::PARAM_INT);
	$insertarPaginas->bindParam(':fichero',$data, PDO::PARAM_STR);
	$insertarPaginas->execute();

*/
	
}





?>

