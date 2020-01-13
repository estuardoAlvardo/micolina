<?php 
session_start();

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}




//curso 1
$curso="Matemáticas";
$curso="";
$leccionRealizada=1; // varaiable dependera del uso en la base de datos
$leccionPendiente=4; // variable dependera del uso en la bd 

require("../../conection/conexion.php");

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
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
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
<?php include '../nav.php'; $nivell=1; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel);?>
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
         <div class="col-md-12" style=" margin-bottom: 30px;">
              <h3 class="text-center">Atom Plataformas</h3>
         </div>
         
         <div class="col-md-12 sombra" style=" height: 500px; margin-bottom: 20px;">
       
          <div class="col-md-1 item"  data-toggle="modal" data-target="#progrentis">
              <div class="img-responsive sinfondo"> 
                <img class="img-fondo" src="img/progrentis.jpg" style="border-radius: 10px;">
              </div> 
              <strong><p class="txt-fuente">Progrentis</p></strong>
         </div>
        
         <div class="col-md-1 item" data-toggle="modal" data-target="#achive3000">
              <div class="img-responsive sinfondo"> 
                <img class="img-fondo" src="img/achive3000.png" style="border-radius: 10px;">
              </div> 
              <strong><p class="txt-fuente">Achive3000</p></strong>
         </div>
         <div class="col-md-1 item" data-toggle="modal" data-target="#lectopolis">
              <div class="img-responsive sinfondo"> 
                <img class="img-fondo" src="img/lectopolis.png" style="border-radius: 10px;">
              </div> 
              <strong><p class="txt-fuente">Lectopolis</p></strong>
         </div>
          
            
         </div>
         


         <div class="modal fade" id="progrentis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                       <div class="modal-header text-left">
                           Este es el encabezado
                       </div>
                       <div class="modal-body">
                           Contenido para las actividades
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-info btn1" data-dismiss="modal">Cerrar</button>
                       </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="achive3000" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                       <div class="modal-header text-left">
                           Este es el encabezado
                       </div>
                       <div class="modal-body">
                           Contenido para las actividades
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-info btn1" data-dismiss="modal">Cerrar</button>
                       </div>
                    </div>
                </div>
            </div>

             <div class="modal fade" id="lectopolis" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                       <div class="modal-header text-left">
                           Este es el encabezado
                       </div>
                       <div class="modal-body">
                           Contenido para las actividades
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-info btn1" data-dismiss="modal">Cerrar</button>
                       </div>
                    </div>
                </div>
            </div>
     
             
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>

  </body>
</html>