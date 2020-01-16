<?php
 session_start();
include("conexion.php");

$_SESSION['uri']='https://micolina.atomolector.com/';
//datos recibido del usuario 

$_POST["txtUsuario"];
$_POST["txtPassword"];


$sql1 = ("SELECT * FROM usuarios where usuario=:usuario");
$obtenerUsuario = $dbConn->prepare($sql1);
$obtenerUsuario->bindParam(':usuario', $_POST['txtUsuario'], PDO::PARAM_INT); 
$obtenerUsuario->execute();

$sql2 = ("SELECT * FROM atomobullying");
$buscarBullying = $dbConn->prepare($sql2);
$buscarBullying->execute();
$total=$buscarBullying->rowCount();

if($total>0){

	$_SESSION['reporteBullying1']=$total;
}elseif($total==null){
$_SESSION['reporteBullying1']=0;
}




while ($row=$obtenerUsuario->fetch(PDO::FETCH_ASSOC)){
	$_SESSION["idUsuario"]=(int)$row['idUsuario'];
	$_SESSION["nombre"]=$row['nombre'];
	$_SESSION["apellido"]=$row['apellido'];
	$_SESSION["grado"]=$row['grado'];
	$_SESSION["seccion"]=$row['seccion'];
	$_SESSION["tipoUsuario"]=$row['tipoUsuario'];
	$_SESSION["correo"]=$row['correo'];

	$_SESSION["usuario"]=$row['usuario'];
	$_SESSION["password"]=$row['password'];
	$_SESSION["imgPerfil"]=$row['fotoPerfil'];
	$_SESSION["grados"]=$row['grados'];

}



if(strcmp($_SESSION["usuario"], $_POST["txtUsuario"])==0 &&  strcmp($_SESSION["password"], $_POST["txtPassword"])==0){

	//indicamos el grado en un string

	switch ($_SESSION["grado"]) {
		case 1:
			$_SESSION['nombreGrado']="1ro";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 2:
			$_SESSION['nombreGrado']="2do ";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 3:
			$_SESSION['nombreGrado']="3ro ";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 4:
			$_SESSION['nombreGrado']="4to";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 5:
			$_SESSION['nombreGrado']="5to";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 6:
			$_SESSION['nombreGrado']="6to";
			$_SESSION['nivel']="Primaria";
			$_SESSION['rol']="Estudiante";
			break;
		case 7:
			$_SESSION['nombreGrado']="1ro";
			$_SESSION['nivel']="Básico";
			$_SESSION['rol']="Estudiante";
			break;
		case 8:
			$_SESSION['nombreGrado']="2do";
			$_SESSION['nivel']="Básico";
			$_SESSION['rol']="Estudiante";
			break;
		case 9:
			$_SESSION['nombreGrado']="3ro";
			$_SESSION['nivel']="Básico";
			$_SESSION['rol']="Estudiante";
			break;
		case 10:
			$_SESSION['nombreGrado']="4to";
			$_SESSION['nivel']="Diversificado";
			$_SESSION['rol']="Estudiante";
			break;
		case 11:
			$_SESSION['nombreGrado']="5to";
			$_SESSION['nivel']="Diversificado";
			$_SESSION['rol']="Estudiante";
			break;	
		case 12:
			$_SESSION['nombreGrado']="6to";
			$_SESSION['nivel']="Diversificado";
			$_SESSION['rol']="Estudiante";
			break;
		case 13:
			$_SESSION['nombreGrado']="Prekinder";
			$_SESSION['nivel']="Preescolar";
			$_SESSION['rol']="Estudiante";
			break;	
		case 14:
			$_SESSION['nombreGrado']="kinder";
			$_SESSION['nivel']="Prescolar";
			$_SESSION['rol']="Estudiante";
			break;
		case 15:
			$_SESSION['nombreGrado']="Prepa";
			$_SESSION['nivel']="Diversificado";
			$_SESSION['rol']="Estudiante";
			break;			
		
		default:
			$_SESSION['rol']="";
			$_SESSION['nombreGrado']="";
			break;
	}

//creamos variables de sesion para 

	switch ($_SESSION['tipoUsuario']) {
		case 1:
			$_SESSION['rol']="Estudiante";
			break;
		case 2:
			$_SESSION['rol']="Docente";
			break;
		case 4:
			$_SESSION['rol']="Familia";
			break;
		
		default:
			# code...
			break;
	}


//indicamos que pasa cuando no hay seccion si ubiese solo se setea el mismo
switch ($_SESSION["seccion"]) {
	case '':
		$_SESSION["seccionNew"]="Sin Seccion";
		break;
	
	default:
		$_SESSION["seccionNew"]=$_SESSION["seccion"];
		break;
}


	//redireccionamos segun el tipo de usuario y le mandamos los datos 
switch ($_SESSION["tipoUsuario"]) {
	case 1:
		switch ($_SESSION["grado"]) {
			case 1:
				header("location:../cursosAlumno/misCursos.php");
				break;

			case 2:
				header("location:../cursosAlumno/misCursos.php");
				break;

			case 3:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 4:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 5:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 6:
				header("location:../cursosAlumno/misCursos.php");
				break;
			
			case 7:
				header("location:../cursosAlumno/misCursos.php");
				break;

			case 8:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 9:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 10:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 11:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 12:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 13:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 14:
				header("location:../cursosAlumno/misCursos.php");
				break;
			case 15:
				header("location:../cursosAlumno/misCursos.php");
				break;
			
			default:
				header("location:../index.php");
				break;
		}

		break;

	case 2:
		header("location:../cursosDocente/misCursos.php");
		break;
	case 3:
		header("location:../cursosCoordinacion/misCursos.php");	
		break;
	case 4:
		header("location:../cursosFamilia/misCursos.php");	
		break;
	
	default:
		header("location:../cursosPadres/misCursos.php");
		break;
}



}else{

	header("location:../index.html");
}
// en la base de datos el tipo de usuario se toma como 1=alumno 2=profesor 3=coordinador



//obtener datos de conexion del cliente

$fechaActual = date('d-m-Y H:i:s');

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getBrowser($user_agent){

if(strpos($user_agent, 'MSIE') !== FALSE)
   return 'Internet explorer';
 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
   return 'Microsoft Edge';
 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
    return 'Internet explorer';
 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
   return "Opera Mini";
 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
   return "Opera";
 elseif(strpos($user_agent, 'Firefox') !== FALSE)
   return 'Mozilla Firefox';
 elseif(strpos($user_agent, 'Chrome') !== FALSE)
   return 'Google Chrome';
 elseif(strpos($user_agent, 'Safari') !== FALSE)
   return "Safari";
 else
   return 'No hemos podido detectar su navegador';

}


// datos para recoger datos de conexion del cliente

function getRealIP() {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            echo  $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            echo $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        $_SERVER['REMOTE_ADDR'];
}
 

$navegador = getBrowser($user_agent);
$ipEnviar= $_SERVER['REMOTE_ADDR'];


registroDeActividad($navegador,$fechaActual,$_SESSION['grado'],$_SESSION['seccion'],$_SESSION['rol'],$_SESSION['idUsuario'],$ipEnviar);


function registroDeActividad($navegador,$fechaActual,$grado,$seccion,$rol,$idUsuario,$ip){
	include("conexion.php");
	
	//echo $grado;

	$qr1 = ("SELECT * FROM registroAcceso where idUsuario=:idUsuario");
      $buscarRegistro=$dbConn->prepare($qr1);
      $buscarRegistro->bindParam(':idUsuario',$idUsuario, PDO::PARAM_INT); 
      $buscarRegistro->execute();
      $conteo=$buscarRegistro->rowCount();

      if($conteo>0){
      	$qr3 = ("UPDATE registroAcceso SET  fechaHora=:fechaHora,navegador=:navegador,ip=:ip WHERE idUsuario=:idUsuario");
      $actualizarRegistro=$dbConn->prepare($qr3);
      $actualizarRegistro->bindParam(':fechaHora',$fechaActual, PDO::PARAM_STR); 
      $actualizarRegistro->bindParam(':navegador',$navegador, PDO::PARAM_STR); 
      $actualizarRegistro->bindParam(':ip',$ip, PDO::PARAM_STR);  
      $actualizarRegistro->bindParam(':idUsuario',$idUsuario, PDO::PARAM_INT);
      $actualizarRegistro->execute();

      }

      if($conteo==0){
      	$qr2 = ("INSERT INTO registroAcceso(idUsuario,grado,seccion,fechaHora,navegador,ip,rol) VALUES (:idUsuario,:grado,:seccion,:fechaHora,:navegador,:ip,:rol)");
      $insertarRegistro=$dbConn->prepare($qr2);
      $insertarRegistro->bindParam(':idUsuario',$idUsuario, PDO::PARAM_INT);
      $insertarRegistro->bindParam(':grado',$grado, PDO::PARAM_INT); 
      $insertarRegistro->bindParam(':seccion',$seccion, PDO::PARAM_STR); 
      $insertarRegistro->bindParam(':fechaHora',$fechaActual, PDO::PARAM_STR); 
      $insertarRegistro->bindParam(':navegador',$navegador, PDO::PARAM_STR); 
      $insertarRegistro->bindParam(':ip',$ip, PDO::PARAM_STR);  
      $insertarRegistro->bindParam(':rol',$rol, PDO::PARAM_STR); 
      $insertarRegistro->execute();
      }




}








?>