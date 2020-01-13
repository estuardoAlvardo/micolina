<?php 
session_start();
//curso 1

require("../../../conection/conexion.php");

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
    <link href="../../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
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
 <?php include '../../../static/lat-izquierdo.php';  $nivel=3; directoriosNiveles($nivel); ?>
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
              <h3 class="text-center"><?php
               if($_GET['curso']==1){
                echo $_SESSION['curso']="Comunicación y Lenguaje L1";
              }

              




                ?></h3>
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

                  </style>

                  <div class="col-md-11">
                     <h3 class="text-left" style="">Nuestros Fundamentos</h3><hr>
                    <div class="row">
                      
                      <div class="col-md-2 cajaCards" onclick="metodologiaActiva();" style="margin-left: 30px;">
                        <p>Metodologia Activa</p>
                      </div>                                                      
                     
                      <div class="col-md-1"></div>
                      <div class="col-md-2 cajaCards" style="" onclick="estilosAprendizaje();">
                      <p>Estilos de aprendizaje de Kolb</p>   
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-2 cajaCards" style="">
                      <p>Teoría de Edad Cognitiva de jean peaget</p>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-md-2 cajaCards" style="">
                      <p>Taxonomía de Bloom</p>
                      </div>
                      <div class="col-md-5"></div>
                       
                       <div class="col-md-2 cajaCards" style="">
                         <p>Servicio Cognitivo I.A</p>                        
                      </div>
                  </div>
                  <div class="col-md-11">
                    <img src="../../../img/task/dormida.gif" width="200" height="200" id="dormida" onclick="ejecucion();">
                    <img id="despierta" src="../../../img/task/wave.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="habla" src="../../../img/task/hablando.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="saluda" src="../../../img/task/wave.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="enamorada" src="../../../img/task/enamorada.gif" width="200" height="200" style="display:none; margin-left:240px;">
                    <img id="llorar" src="../../../img/task/llorar.gif" width="200" height="200" style="display:none; margin-left:240px;">

                    <div class="row" style="display: none;" id="siAprendi">
                    <div class="col-md-4"></div>
                    <button class="col-md-2 btn btn-success" onclick="siAprendi();">Si Aprendi</button>
                    <div class="col-md-1"></div>
                    <button class="col-md-2 btn btn-danger" onclick="noAprendi();">No Aprendi</button>
                     <div class="col-md-3"></div>
                    </div>
                    </div>

                    
                   

                  
                </div>


<div class="col-md-11" style="margin-bottom: 100px;"><br><br>
  <h3 class="text-left" style="">¿Que grado quieres Observar?</h3><hr>
  <div class="col-md-12 cajaGrado" style="min-height: 200px;">
    <p>Primaria</p>
  <div class="row" style="padding-left: 40px;">
    
    <a href="indice.php" style="color: white;"><div class="col-md-2 btnGrado">1ero Primaria</div></a>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" >2do Primaria</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado">3ero Primaria</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" >4to Primaria</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" >5to Primaria</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" ">6to Primaria</div>
  </div>
     <p>Básicos</p>
  <div class="row" style="padding-left: 40px;">
    
    <div class="col-md-2 btnGrado" >1ero Básicos</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" >2do Básicos</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado">3ero Básicos</div>
   
  </div>
       <p>Diversificado</p>
  <div class="row" style="padding-left: 40px;">
    
    <div class="col-md-2 btnGrado" >4to Diver</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado" >5to Diver</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btnGrado">6to Diver</div>
   
  </div>

  </div>

</div>






      
<script type="text/javascript">
    
        function ejecucion(){
          startArtyom();
          artyom.say("Hola Miss Yesy, buenos días, soy tu asistente, estoy para ayudarte, y me da mucho gusto que estés aquí, te dare algunas sugerencias didácticas y algunos tips, para apoyar a tus alumnos y explotar lo mejor de ellos.");
          document.getElementById("dormida").style.display="none";
          document.getElementById("despierta").style.display="block";
          
        }


        function metodologiaActiva(){
          startArtyom();
          artyom.say("Hola!! Te dare el concepto de Metodologia Activa, la cual usamos para la enseñanza aprendizaje en atomo(LMS), La enseñanza basada en metodologías activas es una enseñanza centrada en el estudiante, en su capacitación en competencias propias del saber de la disciplina. Estas estrategias conciben el aprendizaje como un proceso constructivo y no receptivo. La psicología cognitiva ha mostrado consistentemente, que una de las estructuras más importantes de la memoria es su estructura asociativa. El conocimiento está estructurado en redes de conceptos relacionados que se denominan redes semánticas. La nueva información se acopla a la red ya existente. Dependiendo de cómo se realice esta conexión la nueva información puede ser utilizada o no, para resolver problemas o reconocer situaciones (Glaser 1991). Esto implica la concepción del aprendizaje como proceso y no únicamente como una recepción y acumulación de información. ¿Quiero saber si aprendiste, por favor?, haz click en el botónn que se encuentra debajo de mi.");
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block";
          document.getElementById("siAprendi").style.display="block";
          stopArtyom();         
 

        }

        function estilosAprendizaje(){
          startArtyom();
          artyom.say("La teoría sobre los estilos de aprendizaje fue desarrollada por Peter Honey y Alan Mumford, basándose en un trabajo previo de Kolb; ellos identificaron cuatro distintos tipos de aprendizaje o preferencias: el activo, el teórico, el pragmático y el reflexivo. Estos son los métodos de aprendizaje por los que cada individuo opta de manera natural y recomiendan que, para optimizar su propio aprendizaje personal, cada alumno debería: Comprender su estilo de aprendizaje. Buscar oportunidades para aprender utilizando ese estilo. ¿Quiero saber si aprendiste, por favor?, haz click en el botónn que se encuentra debajo de mi.");
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
        artyom.say("Bravo, me encanta que aprendamos juntos. Si quieres aprender otro de nuestros fundamentos da click en cualquiera de los fundamentos que se encuentra arriba de mí.");
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