<?php 
require("conexion.php");
echo 'idLectura   = '.$_POST['idLectura'].'<br>';
echo 'juego   = '.$_POST['juego'].'<br>';
echo 'FragLectura   = '.$_POST['fragLectura'].'<br>';
echo 'nivel escritura '.$_POST['nivelEscritura'].'<br>';

foreach($_FILES["txtImg"]['tmp_name'] as $key => $tmp_name)
	{

$extension = pathinfo($_FILES['txtImg']['name'][$key], PATHINFO_EXTENSION);
$data = base64_encode(file_get_contents($_FILES['txtImg']['tmp_name'][$key]));

//echo $_FILES['txtImg']['name'][$key].' '.$extension.'<br><br>';

//echo 'imagen <div style="border:1px dashed red; width:400px; height:200px; word-wrap: break-word; overflow-y:scroll" >'.$data.'</div>';

}




if(!empty($_POST['juego'])){
 $sql1 = ("UPDATE atomolector SET gamificacion=:juego WHERE idLectura=:idLectura");
 $actualizarJuego = $dbConn->prepare($sql1);
 $actualizarJuego->bindParam(':idLectura',$_POST['idLectura'], PDO::PARAM_INT);
 $actualizarJuego->bindParam(':juego',$_POST['juego'], PDO::PARAM_STR);
$actualizarJuego->execute();
echo 'juego actualizado de manera correcta';	
}else{
	echo 'fragmento Lectura no se ingreso porque está vacio';
}



switch ($_POST['nivelEscritura']) {
	case 1:

		if(!empty($_POST['fragLectura']) && !empty($_POST['nivelEscritura'])){
	$sql2 = ("INSERT INTO emnivel1recursospaso0(idLectura,cuento) values(:idLectura,:cuento)");
	$insertarFragmento = $dbConn->prepare($sql2);
	$insertarFragmento->bindParam(':idLectura',$_POST['idLectura'], PDO::PARAM_INT);
	$insertarFragmento->bindParam(':cuento',$_POST['fragLectura'], PDO::PARAM_STR);
	$insertarFragmento->execute();

		}else{

	echo 'Fragmento escritura nivel 1, no se inserto por que es otro nivelEscritura';

}
		break;

	case 2: 
				
	
	$sql2 = ("INSERT INTO emnivel2recursospaso0 (idTexto,direccionImg) values(:idLectura,:imagen)");
	$insertarFragmento = $dbConn->prepare($sql2);
	$insertarFragmento->bindParam(':idLectura',$_POST['idLectura'], PDO::PARAM_INT);
	$insertarFragmento->bindParam(':imagen',$data, PDO::PARAM_STR);
	$insertarFragmento->execute();
	
	echo 'Imagen insertada de manera correcta, nivel escritura 2';


	break;	

	case 3: 
				
	
	echo '<br>Escritura madura nivel 3 sin recurso<br>';


	break;	
	
	default:
		# code...
		break;
}






