<?php 
session_start();

require("../../../conection/conexion.php");

$_SESSION['idUsuario'];

$tema1="La Oración";




 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
    <script src='../../../js/jquery.min.js'></script>
    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  
  <script src="../../../js/artyom/jquery-3.1.1.js"></script>
  <script src="../../../js/artyom/artyom.min.js"></script>
  <script src="../../../js/artyom/artyom.window.js"></script>
  <script src="../../../js/artyom/artyomCommands.js"></script>

 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../../../static/nav.php';$nivell=3; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../../../static/lat-izquierdo.php'; $nivel=3; directoriosNiveles($nivel); ?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
   
   .cursoN{

 background-size: 160px;

 background-repeat: no-repeat;
  height: 178px;
  margin-left: 50px;
  border-radius: 15px;
   -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition:.2s ease-in-out;
    transition: .2s ease-in-out;
  margin-bottom: 40px;

}

.cursoN:hover{

  -webkit-box-shadow: 0px 3px 30px 0px rgba(0,0,0,0.75);
}


.pieCurso{ 
  width:181px;
  height:56px;
  margin-left: -15px;
  margin-top: 123px;
  padding-top: 20px;
  padding-left: 5px;
  border-radius: 0px 0px 15px 15px;
   -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition:.2s ease-in-out;
    transition: .2s ease-in-out;
    overflow: hidden;
    background-color: rgba(10,38,64,0.5);
    color: white;
    
}
.pieCurso:hover{
background-color: rgba(10,38,64,0.7);
height:178px;
margin-top: 0px;
border-radius:15px;
color:white;
padding-top: -13px;
width: 181px;
}

.contenedorCurso{
  background-color:white;
    margin-top: 40px;
    height:200px;
    margin-left: 2%;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
    padding: 0px;

 -webkit-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -moz-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -ms-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -o-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);



  -webkit-transition: 0.3s ease;
  -moz-transition: 0.3s ease;
  -ms-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
   
    
    }


.contenedorCurso:hover{
-moz-box-shadow: 0px 3px 8px #000000;
-webkit-box-shadow: 0px 3px 8px #000000;
box-shadow: 0px 3px 8px #000000;
 }
    
.pieCurso2{
  background-color: #36abcb;
  height: 60px;
  top: 116px;
padding-top: -30px;
  }
.pieCurso2 h4{
   text-align: center;
   color: white;
   padding-top: -5%;
   margin-top:120px;
}


 .contenedorCurso p{
  padding:3px;
  color: #36abcb;
 }



 </style>


 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center">Lección </h3>
         </div>

 
                  <style type="text/css">
                    .cajaCards{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                      border-radius: 5px;
                      height: 100px; 
                      margin-bottom: 20px;
                      padding-top: 10px;
                    }

                    .cajaCards:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 10px;
                      cursor: pointer;

                    }

                    .cajaGrado{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 5px;


                    }

                    .btnGrado{
                       box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                       transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                       height:50px; padding-top: 20px; background-color:#2980b9;
                       margin-bottom: 20px;
                       border-radius: 10px;

                    }
                    .btnGrado:hover{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                      cursor: pointer;
                    }

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

                        .sombra11 {
                          box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
                          transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
                        }

                    /* acordion css*/
                </style>

<div class="col-md-12" style="margin-top: 110px;">
    <div class="col-md-6">
               <h4 class="text-left">Tema: <strong>[  "<?php echo $tema1; ?>" ]</strong></h4>
            </div>
            <div class="col-md-6 ">
                    <button type="button" class="btn btnDescripcion botonAgg botonAgg-1" data-toggle="modal" data-target=".bs-example-modal-lg" style="background-color: rgb(54, 171, 203); color: white; border:white; margin-left: 70%;">Planificación</button>
                 

            </div>
           <div class="col-md-12 alert alert-info sombra11 " style="min-height:250px;">
             <a href="activarPresaberesindex.php"><div class="col-md-1 item">
                  <div class="img-responsive sinfondo"> 
                    <img class="img-fondo" src="../../../img/cursos/presaber.png">
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

 </div><!--- END COL --> 
                    
                 
     



<!-- DESCRIPCION DEL TEMA 1-->
         <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">

                <h4 class="tituloMod col-md-6">Descripción Curricular del Tema</h4>  
                 <button type="button" class="btn btn-info  btn1 botonAgg botonAgg-1 col-md-1 cerrarModal" data-dismiss="modal" style="background-color: rgb(54, 171, 203); color: white; border:white; margin-left: 300px;">Cerrar</button> <br>                            
                <hr class="col-md-11">
                <div class="cajaTabla text-left">
                  <table class="table border" style="border:3px dashed pink">
                    <thead class="border">
                        <tr style="border:3px dashed pink">
                            <th>Competencia</th>
                            <th>Indicador de logro</th>
                            <th>Contenido Declarativo</th>
                            <th>Contenido Procedimentales</th>
                            <th>Contenido Actitudinales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="border:3px dashed pink">
                            <td>Formula preguntas y respuestas con relación a un hecho real o imaginario según el contexto en el que se encuentre.</td>
                            <td>Pregunta y responde, y pregunta con el tono, timbre, e intensidad y haciendo las pausas adecuadas, cuando interactúa oralmente y por escrito con las y los demás.</td>
                            <td>La comunicación</td>
                            <td>Formulación de preguntas y respuestas en diferentes situaciones comunicativas.</td>
                            <td>Respeto a la opinión propia y ajena al interactuar oralmente.</td>
                        </tr>
                        <tr style="border:3px dashed pink">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Participación en diferentes tipos de situaciones en las que se hace necesario utilizar diferentes formas de comunicación (diálogo, conversación, argumentación, entre otros).</td>
                            <td>Valoración de la comunicación como un medio para resolver conflictos de su entorno.</td>
                        </tr>
                        <tr style="border:3px dashed pink">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>dentificación de los elementos que intervienen en un acto comunicativo.</td>
                            <td></td>
                        </tr>
                          <tr style="border:3px dashed pink">
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


      


        
          
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../../../static/lat-derecho.php'; $nivelll=3; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../../../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../../js/bootstrap.min.js"></script>
  </body>
</html>