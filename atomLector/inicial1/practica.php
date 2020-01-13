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

    $q1 = ("SELECT * FROM objetosPreescolar where idObjeto=:idObjeto");
      $mostrarGlosario=$dbConn->prepare($q1);
      $mostrarGlosario->bindParam(':idObjeto',$_GET['obj'], PDO::PARAM_INT); 
      $mostrarGlosario->execute();
      $cantidadFichero=$mostrarGlosario->rowCount();

    $q2= ("SELECT * FROM practicaPreescolar where idUsuario=:idUsuario");
      $relizoFragmentoObjeto=$dbConn->prepare($q2);
      $relizoFragmentoObjeto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $relizoFragmentoObjeto->execute();
      $hayRegistros=$relizoFragmentoObjeto->rowCount();

      
 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | <?php echo $_SESSION['idUsuario']; ?> Práctica Fonemas</title>
 
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
  <body class="txt-fuente"  >

  
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


/*estilos alerta */


/* estilos para recursos*/

.recursos{
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;
background-color: #00a8ff; border-radius: 5px; height: 50px; width:50px; margin-top: -50px; margin-left: -15px;
cursor: pointer;
color:white;
padding: 5px;
text-decoration: none;
margin-top: 140px;
font-size: 16pt;
}

.recursos:hover{
 box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
 color:white;
text-decoration: none;
}

.recursos h3{
padding-top: 10px;

}


</style>






      <div class="col-md-8 col-xs-8 pag-center">
         <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div>
        <h3 style="margin-top: 50px;">Aprendo Fonemas</h4>
          
          <span class="col-md-10" id="span-preview1" style="display: none; border:1px solid #3498db; height: 200px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left:30px; margin-bottom: 40px;"></span> 

          <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;">
          <a class="recursos" target="_blank" href="<?php echo 'listaRecursos.php?frag='.$_GET['obj']; ?>">Recursos</h3></a>

          <a class="recursos" style="background-color: #27ae60; margin:20px;" href="#aqui">Mi práctica</h3></a>
         <div class="row">
         <?php while(@$row1=$mostrarGlosario->fetch(PDO::FETCH_ASSOC)){
          @$i+=1;
           
          ?> 



              <div class="col-md-5 cardGlosario" id="<?php echo 'card'.$row1['idFragmentoObjeto'].$i; ?>" style="background: url(<?php echo 'data:image/jpg;base64,'.$row1['fichero'];  ?> ) no-repeat center ;
                  height: 100%;
                   background-size:     cover;                      /* <------ */
                  background-repeat:   no-repeat;
                  background-position: center center;
                  color: white; box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                  height: 350px;
              ">
               
                <div style="width: 100%; height:150; padding: 0px 0px; border-radius: 5px; ">
                 
                </div>
                <div class="recodinggN1" id="<?php echo 'on'.$row1['idFragmentoObjeto'].$i; ?>" title="Graba el concepto" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 280px; background-color: #e67e22; margin-left: 85%;" onclick="inicio(this.id)"><img src="../../img/micro.png" width="40" height="40" ></div>

                <div class="recodinggN1" id="<?php echo 'list'.$row1['idFragmentoObjeto']; ?>" title="Felicidades!!!" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 280px; background-color: #9b59b6; margin-left: 85%; display: none;" ><img src="../../img/star.png" width="40" height="40" ></div>


                <div id="<?php echo 'ofon'.$row1['idFragmentoObjeto'].$i; ?>" class="recodinggN" title="Graba el concepto" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 280px; background-color: #F72626; margin-left: 85%; display: none" onclick="finGrabacion(this.id)"><img src="../../img/microOf.png" width="40" height="40" ></div>
                
               
                <input style="display: none" type="text" id="<?php echo 'usuarioEnv'; ?>" value="<?php echo $_SESSION['idUsuario']; ?>" >

                <div  class="cardGlosario" title="Reproducir" style="cursor: pointer; padding-top:5px;  width: 50px; height: 50px; border-radius: 100%; margin-top:-50px; background-color: #3498db; margin-left: 60%; display: block ;position:absolute; padding-left: 10px;">
                  <img id="<?php echo 'audio'.$i; ?>" src="../../img/play.png" width="40" height="40" onclick="reproducirAudio(this.id);" >                  
                </div>
                <audio id="<?php echo 'reproducir'.$i; ?>" src="<?php echo 'data:audio/mpeg;base64,'.$row1['audio']; ?>" preload="auto" controls style="display: none;"></audio>
               


                <div  class="cardGlosario" title="Reproducir" style="cursor: pointer; padding-top:5px;  width: 50px; height: 50px; border-radius: 100%; margin-top:-50px; background-color: #3498db; margin-left: 60%; display: none ;position:absolute;">
                  <img src="../../img/pause.png" width="40" height="40" >                  
                </div>

                
                
           </div>

            
          <?php $_SESSION['idFragmentoObjeto']=$row1['idFragmentoObjeto']; //$_SESSION['lect']=$row1['idLectura'];  
        } ?>
         </div>

          <div style="display:none;color:black;">
                  
                  <select name="listaDeDispositivos" id="listaDeDispositivos"></select>
                  <br><br>
                  <p id="duracion"></p>
                  <br>
                  <button id="btnComenzarGrabacion">Comenzar</button>
                  <button id="btnDetenerGrabacion">Detener</button>
              </div>

<!-- AQUI VERIFICAMOS SI YA REALIZO ALGUNA LECTURA Y CAMBIAMOS ESTILOS TARJETAS -->

        <input id="cantidadIteracion" type="text" name="cantidadRealizada" value="<?php echo $hayRegistros; ?>" style="display: none;">
        <h3 id="aqui" style="">Mi Práctica</h3>
               <a class="recursos" style="background-color: #27ae60; margin-top:100px;" href="practica.php?obj=<?php echo $_GET['obj']; ?>&grado=<?php echo $_GET['grado'];  ?>"> Volver</h3></a>
         

        <?php while(@$row2=$relizoFragmentoObjeto->fetch(PDO::FETCH_ASSOC)){  


                $q2= ("SELECT * FROM objetosPreescolar where idFragmentoObjeto=:idObjeto");
                $detallesPractica=$dbConn->prepare($q2);
                $detallesPractica->bindParam(':idObjeto',$row2['idFragmentoObjeto'], PDO::PARAM_INT);
                $detallesPractica->execute();
               
               while(@$row3=$detallesPractica->fetch(PDO::FETCH_ASSOC)){
                @$p+=1;


          ?>      
                 <div content="Content-Type: audio/webm"  style="border:3px dashed orange; margin-top: 50px;  margin-bottom: 100px;">
                  <h3>Práctica: <?php echo $row3['descripcionObjeto']; ?></h3>
                  <h3>Fecha y hora práctica: <?php echo $row2['fecha'].' '.$row2['hora']; ?></h3>
                  <h3>Audio:</h3>
                      <audio controls="controls" preload="metadata" >
                           <source src="<?php echo 'data:audio/mp3;base64,'.$row2['audio']; ?>"/>;
                      </audio>
                 </div>

                 <input style="display: none;" type="text" id="<?php echo 'cambiar'.$p; ?>" value="<?php echo "frag".$row2['idFragmentoObjeto']; ?>">
        <?php } }  ?> 
       



   <script type="text/javascript">
    
//fraccion de codigo para cambiar de color las cards --> inicio
 let ficheros='<?php echo $cantidadFichero; ?>';
 for(var m=1; m<=ficheros; m++ ){ 

 var cambiarMicro= $('#cambiar'+m).val();
 var idMicroMod= cambiarMicro.substring(4,6); 
 var midcroOcultarMod='on'+idMicroMod;
  //alert(midcroOcultarMod+idMicroMod);
  $('#'+midcroOcultarMod+idMicroMod).css('display','none');
  $('#list'+idMicroMod).css('display','block');
}


//fraccion de codigo para cambiar de color las cards --> fin
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
            artyom.say("Hola "+name+" me encanta que estés aquí, quiero que conozcas la letra. A, te mostraré las tarjetas y aprenderás nuevas palabras, presiona el botón de color azul para escuchar, luego graba la palabra activando el micrófono. Vamos a aprender juntos.  ");
            finAsistente();

          }



        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  } 


  function reproducirAudio(clicked_id){
    var id= clicked_id.substring(5,10); 
    var audio= document.getElementById("reproducir"+id);
    audio.play(); //reproducimos audio


  }   

function inicio(clicked_id){
            
            //enviar idPalabra seleccionada para registrarlo en la base de datos          
            var idPalabra= clicked_id.substring(2,6); 
            startArtyom();
            capturarFluidez();
           //alert(idPalabra);
            $('#'+clicked_id).css("display","none");
            $('#of'+clicked_id).css("display","block"); 
            $('#idGlosarioEnviar').val(idPalabra);
            $('#btnComenzarGrabacion').click();
          
           

           };





 function capturarFluidez(){
    // Escribir lo que escucha.
    artyom.redirectRecognizedTextOutput(function(text,isFinal){
      if (isFinal) {
        texto.val(text);
            
      }else{
        var fluidez=[text];
        $("#span-preview1").text(fluidez);
     
      }
      
    });

   }
  

function finGrabacion(clicked_id){
   var texto = $("#span-preview1").text();
   var ocultar= clicked_id;

   var mostrar= ocultar.substring(2,6); 

  


   $('#'+ocultar).css("display","none");
  $('#'+mostrar).css("display","block"); 
   $("#btnDetenerGrabacion").click();
  $('#textoEnviar').val(texto);
    //alert(texto);
    //confirmar guardado de grabacion  
    finAsistente();
    $("#activarNoti").click();



     var opcion = confirm("¿Quieres Grabarlo?\n"+texto);
    if (opcion == true) {
        mensaje = "Se guargdo";


  } else {
      mensaje = "no se guardo";
  }
}




  </script> 


<script type="text/javascript">
  //script para grabar audio

  const init = () => {
        const tieneSoporteUserMedia = () =>
            !!(navigator.mediaDevices.getUserMedia)

        // Si no soporta...
        // Amable aviso para que el mundo comience a usar navegadores decentes ;)
        if (typeof MediaRecorder === "undefined" || !tieneSoporteUserMedia())
            return alert("Tu navegador web no cumple los requisitos; por favor, actualiza a un navegador decente como Firefox o Google Chrome");


        // Declaración de elementos del DOM
        const $listaDeDispositivos = document.querySelector("#listaDeDispositivos"),
            $duracion = document.querySelector("#duracion"),
            $btnComenzarGrabacion = document.querySelector("#btnComenzarGrabacion"),
            $btnDetenerGrabacion = document.querySelector("#btnDetenerGrabacion");

        // Algunas funciones útiles
        const limpiarSelect = () => {
            for (let x = $listaDeDispositivos.options.length - 1; x >= 0; x--) {
                $listaDeDispositivos.options.remove(x);
            }
        }

        const segundosATiempo = numeroDeSegundos => {
            let horas = Math.floor(numeroDeSegundos / 60 / 60);
            numeroDeSegundos -= horas * 60 * 60;
            let minutos = Math.floor(numeroDeSegundos / 60);
            numeroDeSegundos -= minutos * 60;
            numeroDeSegundos = parseInt(numeroDeSegundos);
            if (horas < 10) horas = "0" + horas;
            if (minutos < 10) minutos = "0" + minutos;
            if (numeroDeSegundos < 10) numeroDeSegundos = "0" + numeroDeSegundos;

            return `${horas}:${minutos}:${numeroDeSegundos}`;
        };
        // Variables "globales"
        let tiempoInicio, mediaRecorder, idIntervalo;
        const refrescar = () => {
                $duracion.textContent = segundosATiempo((Date.now() - tiempoInicio) / 1000);
            }
            // Consulta la lista de dispositivos de entrada de audio y llena el select
        const llenarLista = () => {
            navigator
                .mediaDevices
                .enumerateDevices()
                .then(dispositivos => {
                    limpiarSelect();
                    dispositivos.forEach((dispositivo, indice) => {
                        if (dispositivo.kind === "audioinput") {
                            const $opcion = document.createElement("option");
                            // Firefox no trae nada con label, que viva la privacidad
                            // y que muera la compatibilidad
                            $opcion.text = dispositivo.label || `Dispositivo ${indice + 1}`;
                            $opcion.value = dispositivo.deviceId;
                            $listaDeDispositivos.appendChild($opcion);
                        }
                    })
                })
        };
        // Ayudante para la duración; no ayuda en nada pero muestra algo informativo
        const comenzarAContar = () => {
            tiempoInicio = Date.now();
            idIntervalo = setInterval(refrescar, 500);
        };

        
        // Comienza a grabar el audio con el dispositivo seleccionado

        //funcion que captura en que fragmentoObjeto se hizo click guardando el id---inicio
        let idFragSucio=0;
        let idFragLimpio=0;
        $(".recodinggN").click(function () {

                      idFragSucio=this.id; //cambiamos el valor inicial por el clic obtenido
                      idFragLimpio=idFragSucio.substring(5,8);
                      if(idFragLimpio>9){
                        idFragLimpio=idFragSucio.substring(6,8);
                      }


                    });
      //funcion que captura en que fragmentoObjeto se hizo click guardando el id---fin

        const comenzarAGrabar = () => {
            if (!$listaDeDispositivos.options.length) return alert("No hay dispositivos");
            // No permitir que se grabe doblemente
            if (mediaRecorder) return alert("Ya se está grabando");

            navigator.mediaDevices.getUserMedia({
                    audio: {
                        deviceId: $listaDeDispositivos.value,
                    }
                })
                .then(
                    stream => {
                        // Comenzar a grabar con el stream
                        mediaRecorder = new MediaRecorder(stream);
                        mediaRecorder.start();
                        comenzarAContar();
                        // En el arreglo pondremos los datos que traiga el evento dataavailable
                        const fragmentosDeAudio = [];
                        // Escuchar cuando haya datos disponibles
                        mediaRecorder.addEventListener("dataavailable", evento => {
                            // Y agregarlos a los fragmentos
                            fragmentosDeAudio.push(evento.data);
                        });
                       // Cuando se detenga (haciendo click en el botón) se ejecuta esto
                            mediaRecorder.addEventListener("stop", () => {
                                  

                                // Detener el stream
                                stream.getTracks().forEach(track => track.stop());
                                // Detener la cuenta regresiva
                                detenerConteo();
                                // Convertir los fragmentos a un objeto binario
                                const blobAudio = new Blob(fragmentosDeAudio);
                                const formData = new FormData();
                                var idUsuarioEnviar= $('#usuarioEnv').val();
                                                   

                                // Enviar el BinaryLargeObject con FormData
                                formData.append("audio", blobAudio);
                                formData.append('idUsuario',idUsuarioEnviar);
                                formData.append('idFrag1',parseInt(idFragLimpio));
                                const RUTA_SERVIDOR = "../../conection/guardarAudio.php";
                                $duracion.textContent = "Guardando Audio...";
                                fetch(RUTA_SERVIDOR, {
                                        method: "POST",
                                        body: formData,
                                    })
                                    .then(respuestaRaw => respuestaRaw.text()) // Decodificar como texto
                                    .then(respuestaComoTexto => {
                                        // Aquí haz algo con la respuesta ;)
                                        console.log("La respuesta: ", respuestaComoTexto);
                                        //location.reload();
                                       
                                    })
                            });
                    }
                )
                .catch(error => {
                    // Aquí maneja el error, tal vez no dieron permiso
                    console.log(error)
                });
        };


        const detenerConteo = () => {
            clearInterval(idIntervalo);
            tiempoInicio = null;
            $duracion.textContent = "";
        }

        const detenerGrabacion = () => {
            if (!mediaRecorder) return alert("No se está grabando");
            mediaRecorder.stop();
            mediaRecorder = null;
        };


        $btnComenzarGrabacion.addEventListener("click", comenzarAGrabar);
        $btnDetenerGrabacion.addEventListener("click", detenerGrabacion);

        // Cuando ya hemos configurado lo necesario allá arriba llenamos la lista

        llenarLista();
    }
    // Esperar a que el documento esté listo...
document.addEventListener("DOMContentLoaded", init);

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