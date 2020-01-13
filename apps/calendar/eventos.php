<?php 

//header('Content-type: aplication/json');

$databaseHost = 'localhost';
$databaseName = 'atom1';
$databaseUsername = 'root';
$databasePassword = 'Admin11!';

 
try {
    // http://php.net/manual/en/pdo.connections.php
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword);
    
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
} catch(PDOException $e) {
    echo $e->getMessage();
}


		$accion= (isset($_GET['accion']))?$_GET['accion']:'leer';

		switch ($accion) {
			case 'agregar':	
					$sql11 = "INSERT INTO evento(title,descripcion,color,textcolor,start,final,visible) VALUES (:title,:descripcion,:color,:textcolor,:start,:final,:visible)";
					$insertarEvento = $dbConn->prepare($sql11);
					$insertarEvento->bindparam(':title',$_POST['title'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':descripcion', $_POST['descripcion'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':color', $_POST['color'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':textcolor',$_POST['textColor'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':start', $_POST['start'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':final', $_POST['end'], PDO::PARAM_STR);
					$insertarEvento->bindparam(':visible', $_POST['visible'], PDO::PARAM_INT);
					$insertarEvento->execute();
					$respuesta= true;
					echo json_encode($respuesta);
				
				break;
			case 'eliminar':

				 $respuesta=false;
				 if(isset($_POST['id'])){
				 	$sql3= "DELETE FROM evento WHERE id=:id";
				 	$eliminarEvento= $dbConn->prepare($sql3);
				 	$eliminarEvento->bindparam(':id',$_POST['id'],PDO::PARAM_INT);
				 	$eliminarEvento->execute();
				 	$respuesta=true;
				 }
				 echo json_encode($respuesta);	
				break;


			case 'modificar':
					
					$sql4= "UPDATE  evento SET
					title=:title,
					descripcion=:descripcion,
					color=:color,
					textcolor=:textColor,
					start=:start,
					final=:final,
					visible=:visible
					WHERE id=:id";
					$modificarEvento= $dbConn->prepare($sql4);
					$modificarEvento->bindparam(':title',$_POST['title'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':descripcion',$_POST['descripcion'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':color',$_POST['color'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':textColor',$_POST['textColor'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':start',$_POST['start'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':final',$_POST['final'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':visible',$_POST['visible'],PDO::PARAM_STR);
					$modificarEvento->bindparam(':id',$_POST['id'],PDO::PARAM_INT);
					$modificarEvento->execute();
					$respuesta=true;
					echo json_encode($respuesta);


				break;		
			
			default:
						$query1= $dbConn->prepare("SELECT * FROM evento");
						$query1->execute();
						$resultado= $query1->fetchAll(PDO::FETCH_ASSOC);
						echo json_encode($resultado);
				break;
		}

		











?>