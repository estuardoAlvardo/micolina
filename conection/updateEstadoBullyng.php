<?php 
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

		$accion=$_GET['accion'];
		$idMod=$_GET['idMod'];
		

		switch ($accion) {			
			case 'activo':
				$cambio= 1;
				$sql4= "UPDATE  atomobullying SET resuelto=:cambio WHERE idBullyng=:id";
					$modificarEstado= $dbConn->prepare($sql4);
					$modificarEstado->bindparam(':cambio',$cambio,PDO::PARAM_INT);
					$modificarEstado->bindparam(':id',$idMod,PDO::PARAM_INT);
					$modificarEstado->execute();
					$respuesta='activo';
					echo json_encode($respuesta);
				break;
			case 'inactivo':
				$cambio= 2;
				$sql4= "UPDATE  atomobullying SET resuelto=:cambio WHERE idBullyng=:id";
					$modificarEstado= $dbConn->prepare($sql4);
					$modificarEstado->bindparam(':cambio',$cambio,PDO::PARAM_INT);
					$modificarEstado->bindparam(':id',$idMod,PDO::PARAM_INT);
					$modificarEstado->execute();
					$respuesta='inactivo';
					echo json_encode($respuesta);
				break;
			
			default:
				//nada
				break;
		}


?>