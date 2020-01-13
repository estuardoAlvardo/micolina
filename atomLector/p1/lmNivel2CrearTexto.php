<?php 
session_start();


//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../../index.html');
}


require("../../conection/conexion.php");
    
    //buscar Recursos CompletarHistoria
    $q1 = ("SELECT direccionImg FROM emnivel2recursospaso0 where idTexto=:idLectura");
      $mostrarRecursosNivel2=$dbConn->prepare($q1);
      $mostrarRecursosNivel2->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT); 
      $mostrarRecursosNivel2->execute();
      $hayonohay=$mostrarRecursosNivel2->rowCount();

      //verificar si ya realizo el cuento 

    $q2= ("SELECT * FROM emnivel2completopaso1 where idUsuario=:idUsuario and idTexto=:idLectura");
      $yaRealizo=$dbConn->prepare($q2);
      $yaRealizo->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $yaRealizo->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $yaRealizo->execute();
      $hayRegistros=$yaRealizo->rowCount();


 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
   <script src='../../js/jquery.min.js'></script>

    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  

  <script src="../../js/artyom/artyom.min.js"></script>
  <script src="../../js/artyom/artyom.window.js"></script>
  <script src="../../js/artyom/artyomCommands.js"></script>

 <script type="text/javascript" src="../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../extras/modernizr.2.5.3.min.js"></script>


 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../../static/nav.php'; $nivell=2; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../../static/lat-izquierdo.php'; $nivel=2; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->

<style type="text/css">

body{
  overflow-x: none;
}
.cardGlosario {
 
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  margin: 20px;
  
  margin-bottom: 50px;
  transition: all .2s ease-in-out;
  text-decoration: none;
  color: black; 
  border-radius:5px;
}

.cardGlosario:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.recodinggN {
 
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;
}

.recodinggN:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}


/*estilos para cards*/
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



/*estilos input*/
/* Estrutura */
.input-container,.input-container2,.input-container3,.input-container4,.input-container5,.input-container6,.input-container7, .input-container20 {
position: relative;

}
.input1,.input2,.input3,.input4,.input5,.input6,.input7,.input20  {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;
}



.label1,.label2,.label3,.label4,.label5,.label6,.label7,.label20 {
  top: 0;
  left: 0; right: 0;
  color: #616161;
  display: flex;
  align-items: center;
  position: absolute;
  font-size: 1rem;
  cursor: text;
  transition: .2s ease-in-out;
  box-sizing: border-box;
}

.input1,
.label1 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input2,
.label2 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input3,
.label3 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}


.input4,
.label4 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input5,
.label5 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input6,
.label6 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input7,
.label7 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input20,
.label20 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}



/* Interation */
.input1:valid,
.input1:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input2:valid,
.input2:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input3:valid,
.input3:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input4:valid,
.input4:focus {
  border-bottom: 2px solid #26a69a;  
 background-color:#ffffff;
}
.input5:valid,
.input5:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}
.input6:valid,
.input6:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input7:valid,
.input7:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input20:valid,
.input20:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
} 



.input1:valid + .label1,
.input1:focus + .label1 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input2:valid + .label2,
.input2:focus + .label2 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}


.input3:valid + .label3,
.input3:focus + .label3 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}
.input4:valid + .label4,
.input4:focus + .label4 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input5:valid + .label5,
.input5:focus + .label5 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input6:valid + .label6,
.input6:focus + .label6 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}


.input7:valid + .label7,
.input7:focus + .label7 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:#ffffff;
}

.input20:valid + .label20,
.input20:focus + .label20 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:#ffffff;
}



</style>






      <div class="col-md-8 col-xs-8 pag-center">
         <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div>
        <h3 style="margin-top: 50px;">Soy Creativo- Crea Tú Cuento</h4>
          
          <span class="col-md-10 " id="span-preview" style="display: none; border:1px solid #3498db; height: 200px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left:30px; margin-bottom: 40px;"></span> 

          <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;">

         <div class="row">

        <?php while(@$row1=$mostrarRecursosNivel2->fetch(PDO::FETCH_ASSOC)){?> 

           <div class="col-md-12">
                    <div class="card">

                      <div class="image" style="background-image: url('../../img/flatWall1.png');" >
                        <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;">Crea Tú Cuento</h1>
                      </div>

                      <div class="text" style="text-align: left;">
                        
                    <?php if($hayRegistros==0){
                     ?>  
                    <h3>Instrucciones: Crea un cuento utilizando como ayuda la imagen, colocale título.
                          </h3><hr> 
                      <img class="card-style" src="<?php echo 'data:image/jpeg;base64,'.$row1['direccionImg']; ?>" style="max-width:400px; max-height: 400px; margin-left: 25%; border-radius: 5px;">     
                      <form method="post" action="controllador/emNivel2paso1.php">
                        <div class="input-container" style="margin-top: 65px;">
                            <input style="height: 35px; background-size;" id="name1" class="input1" type="text" pattern=".+" name="tituloCuento" required />
                              <label class="label1" for="name1" style="color:black; text-align: left; background-color:#ffffff;">Agregar Título a la historia</label>
                        </div>
                        
                        <div class="input-container" style="margin-top: 35px;">
                            <textarea style="height: 205px; border:2px solid #3498db; background-size;" id="name7" class="input7" type="text" pattern=".+" name="cuentoAlumno" required /></textarea>
                              <label class="label7" for="name7" style="color:black; text-align: left; background-color:#ffffff;">Escribe</label>
                          </div>                      

                          <input style="display: none;" type="text" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
                          <input  style="display: none;" type="text" name="idTexto" value="<?php echo $_GET['idLectura']; ?>">
                          <input style="display: none;" type="text" name="gradoB" value="<?php echo $_GET['gradoB']; ?>">

                        <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #2ecc71; font-size: 17pt; background-color: #2ecc71; height: 50px; margin-bottom: 50px; margin-top: 30px;"   type="submit" value="Terminar Cuento">
                       
                      </form> 
                      <img src="../enviado1.png" style="width:60px; height: 60px;  margin-left:90%; ">                    
                    <?php }else if($hayRegistros!=0){ ?>  
                    <h3>Felicidades: Terminaste esta actividad.

                          </h3><hr>    

                            <?php while(@$row2=$yaRealizo->fetch(PDO::FETCH_ASSOC)){?>                   

                               <div class="input-container" style="margin-top: 35px;">
                            <input style="height: 35px; background-size;" id="name1" class="input1" type="text" pattern=".+" name="tematica" value="" disabled />
                              <label class="label1" for="name1" style="color:black; text-align: left; background-color:#ffffff;"><?php echo $row2['titulo']; ?></label>
                        </div>
                        <h3 style="margin-top: 30px; margin-bottom: 5px;"><?php echo '"'.$row2['cuento']; ?></h3>
                        
                        <img class="card-style" src="<?php echo 'data:image/jpeg;base64,'.$row1['direccionImg']; ?>" style="max-width:400px; max-height: 400px; margin-left: 25%; border-radius: 5px;">
                        
                        <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #95a5a6; font-size: 17pt; background-color: #95a5a6; height: 50px;margin-top:20px;"   type="submit" value="Ya enviaste el Cuento">

                        <img src="../leido1.png" style="width:60px; height: 60px;  margin-left:90%; margin-top: 70px;">
                      <?php } } ?>      

                      </div>

                    </div>
                  </div> 




            
          <?php } ?>
         </div>







   <script type="text/javascript">
    
 function startArtyom(){

    artyom.initialize({
        lang: "es-ES",
        continuous:true,// Reconoce 1 solo comando y para de escuchar
              listen:true, // Iniciar !
              debug:true, // Muestra un informe en la consola
              speed:1 // Habla normalmente
      });
  
    };

    function informacion(){
          var name = $('#nombre').val(); 
            startArtyom();
            artyom.say("Hola "+name+" te explicare como realizar esta actividad, antes de empezar quiero que sepas que si mejoras tu vocabulario podrás incrementar tu comprensión lectora, te ayudare a comprender, para eso te presentamos las palabras mas difíciles de la lectura, hay dentro de cada tarjeta un micrófono dale clic, y repite la palabra y el concepto por favor. La plataforma guardara cada palabra que dictes, esto te ayudara a guardar mejor las palabras en tú memoria.");
            finAsistente();

          }


        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }    

function inicio(clicked_id){
            
            //enviar idPalabra seleccionada para registrarlo en la base de datos          
            var idPalabra= clicked_id.substring(2,6); 

            startArtyom();
            capturarFluidez();
            
            $('#'+clicked_id).css("display","none");
            $('#of'+clicked_id).css("display","block"); 
            $('#idGlosarioEnviar').val(idPalabra);


           };
    function capturarFluidez(){
    // Escribir lo que escucha.
    artyom.redirectRecognizedTextOutput(function(text,isFinal){
      if (isFinal) {
        texto.val(text);
            
      }else{
        var fluidez=[text];
        $("#span-preview").text(fluidez);
     
      }
      
    });

   }
  

function finGrabacion(clicked_id){
   var texto = $("#span-preview").text();
   var ocultar= clicked_id;
   var mostrar= ocultar.substring(2,6); 

   $('#'+ocultar).css("display","none");
  $('#'+mostrar).css("display","block"); 
  
  $('#textoEnviar').val(texto);

    //confirmar guardado de grabacion
  $("#activarNoti").click();
    finAsistente();
}



  </script> 
    
        </div>

<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
    <?php include '../../static/lat-derecho.php';  $nivelll=2; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script   src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>