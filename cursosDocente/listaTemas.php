<?php 
session_start();
//curso 1
$curso="Comunicación y Lenguaje";

$tema1="La comunicación"; // varaiable dependera del uso en la base de datos
$tema2="El Verbo"; // varaiable dependera del uso en la base de datos


?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title>Docente | <?php echo $curso; ?> </title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    
    <link href="css/rol5FuncCursosCursoN.css" rel="stylesheet" media="screen">
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
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php';  $nivel=1; directoriosNiveles($nivel); ?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 
 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <br>
              <h5 class="text-left">1ro Secundaria / <?php echo $curso; ?></h5>             
              
         </div>
         <hr class="col-md-12 style13"><br>
<!-- TEMA 1 -->
         <div class="col-md-12">
            <div class="col-md-6">
               <h4 class="text-left">Tema: <strong>[  "<?php echo $tema1; ?>" ]</strong></h4>
            </div>
            <div class="col-md-6 ">
                    <button type="button" class="btn btnDescripcion" data-toggle="modal" data-target=".bs-example-modal-lg">Descripcion Curricular</button>

            </div>
           <div class="col-md-12 alert alert-info">
             <a href="activarPresaberesindex.php"><div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/presaber.png">
                  </div> 
                  <strong><p class="txt-fuente">Activar Presaberes</p></strong>
             </div></a>
             <a href="misCursosCursoNContenido.php"><div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/contenido.png">
                  </div> 
                  <strong><p class="txt-fuente">Contenido</p></strong>
             </div></a>
             <div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/actividades.png">
                  </div> 
                  <strong><p class="txt-fuente">Actividades</p></strong>
             </div>
             <div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/evaluacion.png">
                  </div> 
                  <strong><p class="txt-fuente">Evaluación (objetivas)</p></strong> <!-- cambiar icono por juego-->
             </div>
             <div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/refuerzo.png">
                  </div> 
                  <strong><p class="txt-fuente">Refuerzo</p></strong>
             </div>
             <div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="img/cursos/compehabili.png">
                  </div> 
                  <strong><p class="txt-fuente">Medición de Habilidades</p></strong> <!-- Informe final del tema con graficos de la evaluacion-->

             </div>
           </div>  



         </div>

<!-- TEMA 1 -->
<!-- DESCRIPCION DEL TEMA 1-->
         <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">

                <h4 class="tituloMod col-md-6">Descripción Curricular del Tema</h4>  
                 <button type="button" class="btn btn-info btn1 col-md-6 cerrarModal" data-dismiss="modal">Cerrar</button> <br>                            
                <hr class="col-md-11">
                <div class="cajaTabla text-left">
                  <table class="table border">
                    <thead class="border">
                        <tr>
                            <th>Competencia</th>
                            <th>Indicador de logro</th>
                            <th>Contenido Declarativo</th>
                            <th>Contenido Procedimentales</th>
                            <th>Contenido Actitudinales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Formula preguntas y respuestas con relación a un hecho real o imaginario según el contexto en el que se encuentre.</td>
                            <td>Pregunta y responde, y pregunta con el tono, timbre, e intensidad y haciendo las pausas adecuadas, cuando interactúa oralmente y por escrito con las y los demás.</td>
                            <td>La comunicación</td>
                            <td>Formulación de preguntas y respuestas en diferentes situaciones comunicativas.</td>
                            <td>Respeto a la opinión propia y ajena al interactuar oralmente.</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Participación en diferentes tipos de situaciones en las que se hace necesario utilizar diferentes formas de comunicación (diálogo, conversación, argumentación, entre otros).</td>
                            <td>Valoración de la comunicación como un medio para resolver conflictos de su entorno.</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>dentificación de los elementos que intervienen en un acto comunicativo.</td>
                            <td></td>
                        </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Establecimiento de las diferencias entre las funciones del lenguaje.</td>
                            <td></td>
                        </tr>
                        
                    </tbody>
                </table>
                </div>

                
              </div>
            </div>
          </div>

<!-- DESCRIPCION DEL TEMA 1-->

          
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../static/lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>