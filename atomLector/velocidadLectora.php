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
    
  if(empty($_GET['curso'])){

  }else{
    switch ($_GET['curso']) {
      case '7':
        $_SESSION['curso']="Lecturas estándarizadas";
        break;
      
      default:
        # code...
        break;
    }
  }
  


    $tituloGrad="1ero Primaria";
    if(empty($_SESSION['grado'])){
      $gradoBuscar=$_GET['gradoB'];
    }else{
      $gradoBuscar=$_SESSION['grado'];
    }

  



    $q2 = ("SELECT * FROM velocidadlectora where grado=:grado");
    $mostrarVelocidadLectora=$dbConn->prepare($q2);
    $mostrarVelocidadLectora->bindParam(':grado',$gradoBuscar, PDO::PARAM_STR); 
    $mostrarVelocidadLectora->execute();
    $lecturasEncontradas=$mostrarVelocidadLectora->rowCount();

    //ver si las lecturas ya fueron leidas y resuelto el cuestionario

      $q3= ("SELECT * FROM velocidadlectora AS velocidad JOIN atomolectorvelocidad AS registro ON velocidad.idLectura=registro.noLectura WHERE registro.idUsuario=:idUsuario");
      $hizoCuestionario=$dbConn->prepare($q3);
      $hizoCuestionario->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $hizoCuestionario->execute();
      $hayRegistroCuestionario=$hizoCuestionario->rowCount();



//semana prueba 
$semanaPrueba=1;
//verificar la semana 

$noSemanaActual = date("W"); //produccion




   
 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]." ".$_SESSION['apellido']; ?> | Programa Comprensión Lectora</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
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
   
 </style>


 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center"><?php echo $_SESSION['curso'];?></h3>
              
         </div>
        

<!-- AQUI VERIFICAMOS SI YA REALIZO ALGUNA LECTURA Y CAMBIAMOS ESTILOS TARJETAS -->

        <input id="cantidadIteracion" type="text" name="cantidadRealizada" value="<?php echo $hayRegistroCuestionario; ?>" style="display: none;">
        <?php while(@$row5=$hizoCuestionario->fetch(PDO::FETCH_ASSOC)){ @$m+=1; ?>

          <input id="<?php echo "cambiar".$m; ?>" type="text" name="cambiarcolor" value="<?php echo "id".$row5['idLectura']; ?>" style="display: none;">
        <?php } ?> 

<!-- AQUI VERIFICAMOS SI YA REALIZO ALGUNA LECTURA  Y CAMBIAMOS ESTILOS TARJETAS -->






         <div class="col-md-12" style="margin-top:40px;">
              <h4 class="text-left">Velocidad y Fluidez Lectora</h4><hr>
         </div>

         <div class="row" style="margin-bottom: 50px;">

              <?php 
                             while(@$row2=$mostrarVelocidadLectora->fetch(PDO::FETCH_ASSOC)){
                @$i+=1;//semana
                
                //tratamos las extenciones para mostra
                

             if($_SESSION['tipoUsuario']==1){   
                if($i==$semanaPrueba){
                  $activo='activo';
                  $activoOjo='glyphicon glyphicon-eye-open';
                  $estiloActivo=' ';
                }else{
                  $activo='inactivo';
                  $activoOjo='glyphicon glyphicon-eye-close';
                  $estiloActivo='cursor: not-allowed;  pointer-events: none; -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%); filter: grayscale(100%);';
                }
}
               ?> 
                <a href="p1/velocidad1p.php?idLectura=<?php echo $row2['idLectura'];?>&numeroLectura=<?php echo $i;?>&gradoB=<?php echo $gradoBuscar; ?>" style="<?php echo $estiloActivo;?>"><div class="col-md-5 estiloProducto" style="min-height:150px; margin-left: 10px; margin-left: 20px; margin-bottom: 20px;">
                <div class="row" style="background-image:linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%); ">

                  <div class="col-md-5" style=" min-height:150px; 
                  background-image: url(<?php echo $_SESSION['uri'].$row2['fichero']; ?>); background-size: 70%; background-repeat:no-repeat; ">                                  
                  </div>
                  <div class="col-md-7" style=" min-height: 175px; color: black;">

                    <h4><?php echo '"'.$row2['nombreLectura'].'"' ?></h4>
                    <h5 style="text-align: left;"><?php echo "<strong>Genero:</strong> ".$row2['genero']; ?></h5>
                    <h5 style="text-align: left;"><?php echo "<strong>Descripción:</strong> ".$row2['descripcion']; ?></h5>
                    <h5 style="text-align: left;"><?php echo "<strong>Edad:</strong> ".$row2['edadLectura']; ?></h5>
                    <h4 style="text-align: left;"><span class="label label-primary" style="position:absolute;"><?php echo 'Semana '.$i; ?></span></h4>
                    <span style="margin-left:50px;" class="<?php echo $activoOjo; ?>"></span>                                  
                  
                    <img id="<?php echo 'envi1'.$row2['idLectura']; ?>" src="enviado1.png" style="width: 40px; height: 40px; position:absolute; margin-top: -18px; margin-left:10%;">
                  
                    <img src="leido1.png" id="<?php echo 'lei1'.$row2['idLectura']; ?>" style="display:none; width: 40px; height: 40px; position:absolute; margin-top: -17%; margin-left:68%;">

                  </div>

                </div>
                 
               </div></a>

             
             <?php   } ?>

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


                    /* acordion css*/
  
                    .estiloProducto{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }

                    .estiloProducto:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    }


                  </style>


                    
                 
            


      
<script type="text/javascript">

  //fraccion de codigo para cambiar de color las cards --> inicio
  var iteracion = $('#cantidadIteracion').val();
  
  for(var i=1; i<=iteracion; i++ ){


     var cardCambiar= $('#cambiar'+i).val(); //obtenemos el id como no puede ser numero le agregamos una palabra
     var idModificar= cardCambiar.substring(2,10); // quitamos la palabra y nos queda el id modificar
  
      $('#envi1'+idModificar).css('display','none');
       $('#lei1'+idModificar).css('display','block');
  }
//fraccion de codigo para cambiar de color las cards --> fin








        function ejecucion(){
          startArtyom();
          artyom.say("Hola, buenos días, soy tu asistente, estoy para ayudarte, y me da mucho gusto que estés aquí, te dare algunas sugerencias didácticas y algunos tips, para apoyar a tus alumnos y explotar lo mejor de ellos.");
          document.getElementById("dormida").style.display="none";
          document.getElementById("despierta").style.display="block";
          
        }


        function metodologiaActiva(){
          startArtyom();
          artyom.say("Hola!! Te dare el concepto de Metodologia Activa, la cual usamos para la enseñanza aprendizaje en átomo lector, La enseñanza basada en metodologías activas es una enseñanza centrada en el estudiante, en su capacitación en competencias propias del saber de la disciplina. Estas estrategias conciben el aprendizaje como un proceso constructivo y no receptivo. La psicología cognitiva ha mostrado consistentemente, que una de las estructuras más importantes de la memoria es su estructura asociativa. El conocimiento está estructurado en redes de conceptos relacionados que se denominan redes semánticas. La nueva información se acopla a la red ya existente. Dependiendo de cómo se realice esta conexión la nueva información puede ser utilizada o no, para resolver problemas o reconocer situaciones (Glaser 1991). Esto implica la concepción del aprendizaje como proceso y no únicamente como una recepción y acumulación de información. ¿Quiero saber si aprendiste, responde si aprendí, o no aprendí, porfavor?");
          document.getElementById("despierta").style.display="none";
          document.getElementById("dormida").style.display="none";
          document.getElementById("saluda").style.display="block";         
 

        }

       
      artyom.addCommands([
      {
        indexes:['sí aprendi','no aprendi'],
        action: function(i){
          if (i==0) {
            artyom.say("Perfecto");
          }
          if (i==1) {
            artyom.say("te mostrare un video ahora.");
          }          
        }
      }]); 

     



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
		<?php include '../static/lat-derecho.php';  $nivelll=1; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>