<?php 
session_start();


//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}



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

$grados1=explode(',', $_SESSION['grados']);

//cuento cuantas variables hay
$iteracionesGrados=count($grados1);
 $iteracionesGrados;

$presco1='display:none;';
$presco2='display:none;';
$presco3='display:none;';


$primaria1='display:none;';
$primaria2='display:none;';
$primaria3='display:none;';
$primaria4='display:none;';
$primaria5='display:none;';
$primaria6='display:none;';

$basicos1='display:none;';
$basicos2='display:none;';
$basicos3='display:none;';

$diver1='display:none;';
$diver2='display:none;';
$diver3='display:none;';


for($j=0; $j<=$iteracionesGrados; $j++){

  //echo 'grados ='.(int)@$grados1[$j];

 switch (@$grados1[$j]) {
   case 13:
     $presco1='display:block;';
     break;
  case 14:
     $presco2='display:block;';
     break;
  case 15:
     $presco3='display:block;';
     break;

  case 1:
     $primaria1='display:block;';
     break;
    case 2:
     $primaria2='display:block;';
     break;

    case 3:
     $primaria3='display:block;';
     break;
       case 4:
     $primaria4='display:block;';
     break;
       case 5:
     $primaria5='display:block;';
     break;
       case 6:
     $primaria6='display:block;';
     break;

       case 7:
     $basicos1='display:block;';
     break;
       case 8:
     $basicos2='display:block;';
     break;
       case 9:
     $basicos3='display:block;';
     break;
       case 10:
     $diver1='display:block;';
     break;
       case 11:
     $diver2='display:block;';
     break;
       case 12:
     $diver3='display:block;';
     break;
   
   default:
     # code...
     break;
 }

}

//funcion encargada de asignar imagen segun primer letra del nombre del curso

 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Lecturas velocidad</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
    <script src='../js/jquery.min.js'></script>
    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  
  <script src="../js/artyom/jquery-3.1.1.js"></script>
  <script src="../js/artyom/artyom.min.js"></script>
  <script src="../js/artyom/artyom.window.js"></script>
  <script src="../js/artyom/artyomCommands.js"></script>

 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel);?>
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
         <div class="col-md-12" style="margin-top: 50px;">
              <h3 class="text-center"><?php
               if($_GET['curso']==7){
                echo $_SESSION['curso']="Átomo Lector - Medición de Fluidez y Velocidad";
              }            




                ?></h3>
         </div>
<input type="text" name="" id="userIa" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;"> 
                  <style type="text/css">
                    .cajaCards{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                      border-radius: 5px;
                      height: 120px; 
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

                  </style>

               

<div class="col-md-11" style="margin-bottom: 100px;"><br><br>
  <h3 class="text-left" style="">¿Qué grado quieres observar?</h3><hr>
  <div class="col-md-12 cajaGrado" style="min-height: 200px;">
    <p>Preescolar</p>
    <div class="row" style="padding-left: 40px;">
    
    <a href="inicial1/vocales.php?gradoB=13" style="color: white; <?php echo $presco1; ?>"><div class="col-md-2 btnGrado">Prekinder</div></a>
    <div class="col-md-1"></div>
   <a href="velocidadLectora.php?gradoB=14" style="color: white; <?php echo $presco2; ?>"> <div class="col-md-2 btnGrado" >Kinder</div></a>
    <div class="col-md-1"></div>
    <a href="velocidadLectora.php?gradoB=15" style="color: white; <?php echo $presco3; ?>"> <div class="col-md-2 btnGrado">Preparatoria</div></a>
    
    
  </div>

    <p>Primaria</p>
  <div class="row" style="padding-left: 40px;">
    
    <a href="velocidadLectora.php?gradoB=1" style="color: white; <?php echo $primaria1; ?>"><div class="col-md-2 btnGrado">1ero Primaria</div></a>
    <div class="col-md-1"></div>
   <a href="velocidadLectora.php?gradoB=2" style="color: white; <?php echo $primaria2; ?>"> <div class="col-md-2 btnGrado" >2do Primaria</div></a>
    <div class="col-md-1"></div>
    <a href="velocidadLectora.php?gradoB=3" style="color: white; <?php echo $primaria3; ?>"> <div class="col-md-2 btnGrado">3ero Primaria</div></a>
    <div class="col-md-1"></div>
    <a href="velocidadLectora.php?gradoB=4" style="color: white; <?php echo $primaria4; ?>"> <div class="col-md-2 btnGrado" >4to Primaria</div></a>
    <div class="col-md-1"></div>
     <a href="velocidadLectora.php?gradoB=5" style="color: white; <?php echo $primaria5; ?>"><div class="col-md-2 btnGrado" >5to Primaria</div></a>
    <div class="col-md-1"></div>
     <a href="velocidadLectora.php?gradoB=6" style="color: white; <?php echo $primaria6; ?>"><div class="col-md-2 btnGrado">6to Primaria</div></a>
  </div>
     <p>Básicos</p>
  <div class="row" style="padding-left: 40px;">
    
    <a href="velocidadLectora.php?gradoB=7" style="color: white; <?php echo $basicos1; ?>"><div class="col-md-2 btnGrado" >1ero Básicos</div></a>
    <div class="col-md-1"></div>
     <a href="velocidadLectora.php?gradoB=8" style="color: white; <?php echo $basicos2; ?>"><div class="col-md-2 btnGrado"  style="">2do Básicos</div></a>
    <div class="col-md-1"></div>
    <a href="velocidadLectora.php?gradoB=9" style="color: white; <?php echo $basicos3; ?>"> <div class="col-md-2 btnGrado">3ero Básicos</div></a>
   
  </div>
       <p>Diversificado</p>
  <div class="row" style="padding-left: 40px;">
    
    <a href="velocidadLectora.php?gradoB=10" style="color: white; <?php echo $diver1; ?>"> <div class="col-md-2 btnGrado" >4to Diver</div></a>
    <div class="col-md-1"></div>
     <a href="velocidadLectora.php?gradoB=11" style="color: white; <?php echo $diver2; ?>"><div class="col-md-2 btnGrado" style="" >5to Diver</div></a>
    <div class="col-md-1"></div>
     <a href="velocidadLectora.php?gradoB=12" style="color: white; <?php echo $diver3; ?>"><div class="col-md-2 btnGrado" style="">6to Diver</div></a>
   
  </div>

  </div>

</div>

   <div class="col-md-11">
                     <h3 class="text-left" style="">Nuestros Fundamentos Pedagógicos</h3><hr>
                    <div class="row">
                      
                      <div class="col-md-2 cajaCards" onclick="algoritmoR();" style="margin-left: 30px;">
                        <p style="padding-top: 20px;">Algoritmo de Reconocimiento de voz</p>
                      </div>                                                      
                     <div class="col-md-1" ></div>
                     <div class="col-md-2 cajaCards" onclick="fluidezR();" style="">
                      <p>Fluidez Verbal</p>
                      </div>                      
                      <div class="col-md-1"></div>
                      <div class="col-md-2 cajaCards" onclick="comparacionFonetica();" style="">
                      <p>Comparación a nivel fonético</p>
                      </div>
                       <div class="col-md-1"></div>
                      <div class="col-md-2 cajaCards" onclick="velocidadR();" style="">
                      <p>Práctica de velocidad lectora</p>
                      </div>
                      <div class="col-md-1"></div>
                                                                   
                     
                  </div>
                  <div class="col-md-11">
                    <img src="../img/task/dormida.gif" width="200" height="200" id="dormida" onclick="ejecucion();">
                    <img id="despierta" src="../img/task/wave.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="habla" src="../img/task/hablando.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="saluda" src="../img/task/wave.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="enamorada" src="../img/task/enamorada.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="llorar" src="../img/task/llorar.gif" width="200" height="200" style="display:none; margin-left:240px;">

                    <div class="row" style="display: none;" id="siAprendi">
                    <div class="col-md-4"></div>
                    <button class="col-md-2 btn btn-success" onclick="siAprendi();">Si Aprendí</button>
                    <div class="col-md-1"></div>
                    <button class="col-md-2 btn btn-danger" onclick="noAprendi();">No Aprendí</button>
                     <div class="col-md-3"></div>
                    </div>
                    </div>     
                   

                  
                </div>







      
<script type="text/javascript">
    var nombreUsuario= $('#userIa').text();
        function ejecucion(){
          startArtyom();
          artyom.say("Hola"+nombreUsuario+" soy tu asistente, estoy para ayudarte, y me da mucho gusto que estés aquí, arriba de mi se encuentran los fundamentos pedagógicos y tecnológicos que hace posible que el Átomo lector funcione. Si le das clic a las tarjetas te explicare cada fundamento, te pido de favor que presiones solo una a la vez, y que me indiques si aprendiste.");
          document.getElementById("dormida").style.display="none";
          document.getElementById("despierta").style.display="block";
          stopArtyom(); 
        }


        function algoritmoR(){
          startArtyom();
          artyom.say("Soy Lola y utilizo, el reconocimiento de voz para poder captar cuando el alumno lee en voz alta, y procesar el audio en texto, realizar comparativas para el análisis de la entonación, comparativas de velocidad y otras. Indícame si aprendiste");
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block";
          document.getElementById("siAprendi").style.display="block";
          stopArtyom();         
 

        }

        function fluidezR(){
          startArtyom();
          artyom.say("La fluidez verbal consiste en la competencia para emplear palabras de forma correcta, clara y concisa en el contexto adecuado, sin caer en tartamudeos, pausas no deseadas o pronunciación  incoherentes. Las lecturas están diseñadas bajo estándares que permiten el desarrollo de esta habilidad. Indícame si aprendiste");
           document.getElementById("enamorada").style.display="none";
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block"; 
           document.getElementById("siAprendi").style.display="block";  
           stopArtyom();      
        }

        function comparacionFonetica(){
          startArtyom();
          artyom.say("Soy tu asistente y te apoyo en la medición de la entonación de cada palabra o fonema que tus alumnos leen en voz alta, quiero que sepas que las lecturas están estandarizadas, el análisis que realizo es comparar lo que el alumno ha leído en voz alta con la lectura y en base a esto le damos un porcentaje en base a la exactitud en la lectura. Indícame si aprendiste");
           document.getElementById("enamorada").style.display="none";
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block"; 
           document.getElementById("siAprendi").style.display="block";  
           stopArtyom();      
        }

         function velocidadR(){
          startArtyom();
          artyom.say("Te apoyo también realizando el análisis de velocidad, comparando el tiempo que útilizo el alumno para dictar toda la lectura, luego muestro en gráficos los resultados.");
           document.getElementById("enamorada").style.display="none";
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block"; 
           document.getElementById("siAprendi").style.display="block";  
           stopArtyom();      
        }

           




       function siAprendi(){
        startArtyom();
        document.getElementById("saluda").style.display="none";
        document.getElementById("enamorada").style.display="block";
        artyom.say("Bravo, me encanta que aprendamos juntos. Si quieres aprender otro de nuestros fundamentos da click en cualquiera de los fundamentos, que se encuentra arriba de mí.");
        document.getElementById("siAprendi").style.display="none";
        stopArtyom(); 

       }

       function noAprendi(){
        startArtyom();
        document.getElementById("saluda").style.display="none";
        document.getElementById("llorar").style.display="block";
        artyom.say("Lo siento creo que no fui muy clara, ahora te daré mas información para que puedas entender mejor el tema.");
        document.getElementById("siAprendi").style.display="none";

        stopArtyom(); 


       }
       
           



    // Escribir lo que escucha.
    artyom.redirectRecognizedTextOutput(function(text,isFinal){
      var texto = $('#salida');
      if (isFinal) {
        texto.val(text);
      }else{
        
      }
    });


    //inicializamos la libreria Artyom
    function startArtyom(){

    artyom.initialize({
        lang: "es-ES",
        continuous:true,// Reconoce 1 solo comando y para de escuchar
              listen:true, // Iniciar !
              debug:true, // Muestra un informe en la consola
              speed:1 // Habla normalmente
      });
    };
    
    // Stop libreria;
    function stopArtyom(){
      artyom.fatality();// Detener cualquier instancia previa
    };

    // leer texto
    $('#btnLeer').click(function (e) {
            e.preventDefault();
            var btn = $('#btnLeer');
            if (artyom.speechSupported()){
                btn.addClass('disabled');
                btn.attr('disabled', 'disabled');

                var text = $('#leer').val();
                if (text) {
                    var lines = $("#leer").val().split("\n").filter(function (e) {
                        return e
                    });
                    var totalLines = lines.length - 1;

                    for (var c = 0; c < lines.length; c++) {
                        var line = lines[c];
                        if (totalLines == c) {
                            artyom.say(line, {
                                onEnd: function () {
                                    btn.removeAttr('disabled');
                                    btn.removeClass('disabled');
                                }
                            });
                        } else {
                            artyom.say(line);
                        }
                    }
                }
            } else {
                alert("Your browser cannot talk! ");
            }
        });

  // });


</script>  
          
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