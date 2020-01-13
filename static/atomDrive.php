<?php 
session_start();
//curso 1
$curso="Matemáticas";
$curso="";
$leccionRealizada=1; // varaiable dependera del uso en la base de datos
$leccionPendiente=4; // variable dependera del uso en la bd 

$_SESSION["idUsuario"];

require("../conection/conexion.php");

$_SESSION['idUsuario'];



//$sql1 = ("SELECT * FROM registrocl2p2 where idIntento=:idIntento");
//$obtenerMatriz=$dbConn->prepare($sql1);
//$obtenerMatriz->bindParam(':idIntento', $_GET['idIntento'], PDO::PARAM_INT); 
//$obtenerMatriz->execute();

//variables de niveles
$nivelPrimaria=1;
$nivelBasico=2;
$nivelDiver=3;

//Buscar todos los cursos de este usuario primaria

$q1 = ("SELECT * FROM cursos where idDocente=:idUsuario and nivel=:nivel");
$cursosPrimaria=$dbConn->prepare($q1);
$cursosPrimaria->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':nivel',$nivelPrimaria, PDO::PARAM_INT); 
$cursosPrimaria->execute();

//Buscar todos los cursos de este usuario Basicos

$q2= ("SELECT * FROM cursos where idDocente=:idUsuario and nivel=:nivel");
$cursoBasico=$dbConn->prepare($q2);
$cursoBasico->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$cursoBasico->bindParam(':nivel',$nivelBasico, PDO::PARAM_INT); 
$cursoBasico->execute();


//Buscar todos los cursos de este usuario Diversificado

$q3 = ("SELECT * FROM cursos where idDocente=:idUsuario and nivel=:nivel");
$cursoDiver=$dbConn->prepare($q3);
$cursoDiver->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$cursoDiver->bindParam(':nivel',$nivelDiver, PDO::PARAM_INT); 
$cursoDiver->execute();



//funcion encargada de asignar imagen segun primer letra del nombre del curso

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include 'nav.php'; ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include 'lat-izquierdo.php'; ?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
.botonAgg {
  background: #fff;
  border-radius: 10px;
  display: inline-block;
  margin: 1rem;
  position: relative;
  
}
.botonAgg-1 {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.botonAgg-1:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.sombra{
   box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

 </style>

 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center">AtomDrive</h3>
         </div>

         <div style="margin-left: -85%;">
            <div class="dropdown botonAgg botonAgg-1" >
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: rgb(54, 171, 203); color: white; border:white;"><img src="img/plus.png" width="30" height="30" style="margin-left: 5px; margin-right: 10px;">NUEVO
              
              <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left: 50%;">
              <li><a href="#">Subir Archivo</a></li>
              <li><a href="#">Crear Carpeta</a></li>
              <li><a href="#">Subir Carpeta</a></li>              
            </ul>
          </div>
        </div>
        <br>
        <h4 class="text-left col-md-3 botonAgg-1 "  style="background-color: #e67e22; color: white; border-radius: 50px;">Mis Documentos <i class="glyphicon glyphicon-cloud"></i></h4><br><br><hr>
        <div>
                       <table class="table table-hover">
                <thead>
                  <tr>
                   
                    <th scope="col">Nombre</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <tr>                    
                    <td>texto-comunicacion-y-lenguaje-1er_grado.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #e67e22; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>150 Kb</td>
                  </tr>
                  <tr>                    
                    <td>Orden_Pago_Jéssica-Morales.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #e67e22; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>663 Kb</td>
                  </tr>
                  
                </tbody>
              </table>
        </div><br>

         <h4 class="text-left col-md-4 botonAgg-1" style="background-color: #8e44ad; color:white; border-radius: 50px;">Compartido Conmigo <i class="glyphicon glyphicon-gift"></i> </h4><br><br><hr>
        <div>
                  <table class="table table-hover">
                <thead>
                  <tr>
                   
                    <th scope="col">Nombre</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <tr>                    
                    <td>texto-comunicacion-y-lenguaje-1er_grado.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #8e44ad; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>150 Kb</td>
                  </tr>
                  <tr>                    
                    <td>Orden_Pago_Jéssica-Morales.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #8e44ad; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>663 Kb</td>
                  </tr>
                  
                </tbody>
              </table>
        </div><br>

        <h4 class="text-left col-md-3 botonAgg-1" style="background-color: #16a085; color: white; border-radius: 50px;">Coordinación <i class="glyphicon glyphicon-transfer"></i></h4><br><br><hr>
        <div>
                 <table class="table table-hover">
                <thead>
                  <tr>
                   
                    <th scope="col">Nombre</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <tr>                    
                    <td>texto-comunicacion-y-lenguaje-1er_grado.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #16a085; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>150 Kb</td>
                  </tr>
                  <tr>                    
                    <td>Orden_Pago_Jéssica-Morales.pdf
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #16a085; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#">Compartir</a></li>
                          <li><a href="#">Mover</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td>663 Kb</td>
                  </tr>
                  
                </tbody>
              </table>
        </div><br>

         <h4 class="text-left col-md-3 botonAgg-1" style="background-color: #16a085; color: white; border-radius: 50px;">Orientación <i class="glyphicon glyphicon-transfer"></i></h4><br><br><hr>
         <div>
         Ningun archivo compartidos con orientacion.
        </div><br>

         <h4 class="text-left col-md-3 botonAgg-1" style="background-color: #16a085; color: white; border-radius: 50px;">Secretaria <i class="glyphicon glyphicon-transfer"></i></h4><br><br><hr>
         <div>
         Ningun archivo compartidos con Secretaria
        </div><br>

        



          
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include 'lat-derecho.php'; ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>