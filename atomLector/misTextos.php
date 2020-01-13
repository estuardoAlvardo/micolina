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
    

    $q1 = ("SELECT * FROM publictexto where idUsuario");
    $mostrarTexto=$dbConn->prepare($q1);
    $mostrarTexto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
    $mostrarTexto->execute();
    $hayTextos=$mostrarTexto->rowCount();


    //todos los textos nivel 3

    $q2 = ("SELECT * FROM publictexto");
    $mostrarTodosTextos=$dbConn->prepare($q2);
    $mostrarTodosTextos->execute();
    $hay1=$mostrarTodosTextos->rowCount();
    
    //todos los textos nivel 2
    $q3 = ("SELECT * FROM emnivel2completopaso1");
    $mostrarTextoN2=$dbConn->prepare($q3);
    $mostrarTextoN2->execute();
    $hay2=$mostrarTextoN2->rowCount();

    //todos los textos nivel 1

     $q4 = ("SELECT * FROM emnivel1completopaso1");
    $mostrarTextosN1=$dbConn->prepare($q4);
    $mostrarTextosN1->execute();
    $hay3=$mostrarTextosN1->rowCount();


  
 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]." ".$_SESSION['apellido']; ?> | Soy Creativo</title>
 
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
    .cajaDescripcion{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }
  .card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

 .card {
  display: inline-block;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  margin: 20px;
  position: relative;
  margin-bottom: 50px;
  transition: all .2s ease-in-out;
  text-decoration: none;
  color: black; 
}

.card:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.image {
  height: 150px;
  opacity: .7;
  overflow: hidden;
  transition: all .2s ease-in-out;
   background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
   background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.image:hover,
.card:hover .image {
  height: 150px;
  opacity: 1;
}

.text {
  background: #FFF;
  padding: 20px;
  min-height: 200px;
}

.text p {
  margin-bottom: 0px;
}

.fab {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  position: absolute;
  margin-top: -50px;
  right: 20px;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, .3);
  color: #fff;
  font-size: 48px;
  line-height: 48px;
  text-align: center;
  background: #0066A2;
  -webkit-transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
}

.fab:hover {
  background: #549D3C;
  cursor: pointer;
  -ms-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}


/*estilos para nav */
.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
        .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:20%; text-align:center;}
.card_new {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }


@media all and (max-width:724px){
.nav-tabs > li > a > span {display:none;} 
.nav-tabs > li > a {padding: 5px 5px;}
}

/*Estilos barra social*/


 </style>

 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center" style="margin-top: 60px;">Soy Creativo- Escritura Madura</h3><br>
              
         </div>


<div class="container" style="">
  <div class="row">
    <div class="col-md-9"> 
      <!-- Nav tabs -->
      <div class="card_new"  style="margin-top: 60px;">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Nivel 3</span></a></li>

          <li role="presentation" ><a href="#n2" aria-controls="n2" role="tab" data-toggle="tab"><i class="fa fa-n2"></i>  <span>Nivel 2</span></a></li>

          <li role="presentation" ><a href="#n1" aria-controls="n1" role="tab" data-toggle="tab"><i class="fa fa-n1"></i>  <span>Nivel 1</span></a></li>

          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-user"></i>  <span>Mis Publicaciones</span></a></li>
          
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
           
          <div role="tabpanel" class="tab-pane active" id="home">
            <h3>Textos creados a criterio de los alumnos. Grados 3ero Básico hasta 6to Diversificado</h3>
            <?php if($hayTextos==0){ ?>
              <h3>un no hay ningún texto.</h3>


            <?php }else{ while(@$row2=$mostrarTodosTextos->fetch(PDO::FETCH_ASSOC)){ ?>

               <div class="card">
                      <div class="image" style="background-image: url('../img/flatWall1.png');" >
                         <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;"><?php echo $row2['titulo']; ?></h1>
                       </div>

                      <div class="text" style="text-align: left;">
                         <h3><?php echo $row2['texto']; ?></h3>                    
                      </div>

                        <div style=" margin-left: 65%;">
                              <h5 style="text-align: left;">Tematica: <?php echo $row2['tematica']; ?> </h5>
                              <h5 style="text-align: left;">Autor:<?php echo $row2['autor']; ?></h5>
                              <h5 style="text-align: left;">Publicado:<?php echo $row2['fecha'].' '.$row2['hora']; ?></h5>
                              </div> 
                              
                              <img src="../img/aunoLike.png" style="width: 40px; height: 40px; margin-top: -50px; margin-left:-90%;"><h4 style="margin-top: -40px; margin-left:-83%; margin-bottom: 50px; color: #E21D2D; font-weight: 16px;">0</h4>       



                    </div>

                <?php }}  ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="n2">
            <h3>Textos creados a criterio de los alumnos. Grados: 5to primaria a 2do básico. </h3>
            <?php if($hay2==0){ ?>
              <h3>Aún no hay ningún texto..</h3>
            <?php }else{ while(@$row2=$mostrarTextoN2->fetch(PDO::FETCH_ASSOC)){ ?>

               <div class="card">

                      <div class="image" style="background-image: url('../img/flatWall1.png');" >
                         <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;"><?php echo $row2['titulo']; ?></h1>
                       </div>

                      <div class="text" style="text-align: left;">
                         <h3><?php echo $row2['cuento']; ?></h3>                    
                      </div>

                        <div style=" margin-left: 65%;">
                              
                              <h5 style="text-align: left;">Publicado:<?php echo $row2['fecha'].' '.$row2['hora']; ?></h5>
                              </div> 
                    </div>

                <?php } } ?>

          </div>

          <div role="tabpanel" class="tab-pane" id="n1">
              <h3>Textos creados a criterio de los alumnos. Grados: 1ero primaria a 4to primaria. </h3>
              <?php if($hay2==0){ ?>
                <h3>Aún no hay Textos.</h3>

              <?php }else{ while(@$row3=$mostrarTextosN1->fetch(PDO::FETCH_ASSOC)){ ?>

               <div class="card">

                      <div class="image" style="background-image: url('../img/flatWall1.png');" >
                         <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;"><?php echo $row3['titulo']; ?></h1>
                       </div>

                      <div class="text" style="text-align: left;">
                         <h3><?php echo $row3['CuentoCompleto']; ?></h3>                    
                      </div>

                        <div style=" margin-left: 65%;">
                              
                              <h5 style="text-align: left;">Publicado:<?php echo $row3['fecha'].' '.$row3['hora']; ?></h5>
                              </div> 
                    </div>

                <?php } } ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="profile">

           <?php while(@$row1=$mostrarTexto->fetch(PDO::FETCH_ASSOC)){ ?>

               <div class="card">

                      <div class="image" style="background-image: url('../img/flatWall1.png');" >
                         <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;"><?php echo $row1['titulo']; ?></h1>
                       </div>

                      <div class="text" style="text-align: left;">
                         <h3><?php echo $row1['texto']; ?></h3>                    
                      </div>

                        <div style=" margin-left: 65%;">
                              <h5 style="text-align: left;">Tematica: <?php echo $row1['tematica']; ?> </h5>
                              <h5 style="text-align: left;">Autor:<?php echo $row1['autor']; ?></h5>
                              <h5 style="text-align: left;">Publicado:<?php echo $row1['fecha'].' '.$row1['hora']; ?></h5>
                              </div> 
                    </div>

                <?php } ?>


          </div>   
          
        </div>
      </div>
    </div>
  </div>
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
          artyom.say("Hola!! Te dare el concepto de Metodologia Activa, la cual usamos para la enseñanza aprendizaje en atomo(LMS), La enseñanza basada en metodologías activas es una enseñanza centrada en el estudiante, en su capacitación en competencias propias del saber de la disciplina. Estas estrategias conciben el aprendizaje como un proceso constructivo y no receptivo. La psicología cognitiva ha mostrado consistentemente, que una de las estructuras más importantes de la memoria es su estructura asociativa. El conocimiento está estructurado en redes de conceptos relacionados que se denominan redes semánticas. La nueva información se acopla a la red ya existente. Dependiendo de cómo se realice esta conexión la nueva información puede ser utilizada o no, para resolver problemas o reconocer situaciones (Glaser 1991). Esto implica la concepción del aprendizaje como proceso y no únicamente como una recepción y acumulación de información. ¿Quiero saber si aprendiste, responde si aprendí, o no aprendí, porfavor?");
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