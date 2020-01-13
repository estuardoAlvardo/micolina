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

    $q1 = ("SELECT * FROM aprendizajepreescolar where grado=:grado");
      $mostrarObjetos=$dbConn->prepare($q1);      
       $mostrarObjetos->bindParam(':grado',$_GET['gradoB'], PDO::PARAM_INT); 
      $mostrarObjetos->execute();
/*
    $q2= ("SELECT * FROM palabrasglosario as glo JOIN registroglosario as registro on glo.idPalabras=registro.idPalabra WHERE registro.idUsuario=:idUsuario");
      $yaRealizo=$dbConn->prepare($q2);
      $yaRealizo->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $yaRealizo->execute();
      $hayRegistros=$yaRealizo->rowCount();

      //mostramos las vocales
  $objBuscar='vocal';
 $q5 = ("SELECT * FROM aprendizajepreescolar where grado=:grado and descripcion=:descripcion");
    $mostrarVocales=$dbConn->prepare($q5);
    $mostrarVocales->bindParam(':grado',$_GET['gradoB'], PDO::PARAM_INT); 
    $mostrarVocales->bindParam(':descripcion',$objBuscar, PDO::PARAM_STR); 
    $mostrarVocales->execute();

*/

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
@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic);
@-webkit-keyframes popUpEntrada {
  0%{opacity: 0; margin-top: -20%;}
  75%{margin-top: 5%;}
  100%{opacity: 1;}
}
@keyframes popUpEntrada {
  0%{opacity: 0; margin-top: -20%;}
  75%{margin-top: 5%;}
  100%{opacity: 1;}
}
@-webkit-keyframes popUpSaida {
  0%{opacity: 1;}
  75%{opacity: 1; margin-top: -20%;}
  100%{opacity: 0;margin-top: 40%;}
}
@keyframes popUpSaida {
  0%{opacity: 1;}
  75%{opacity: 1; margin-top: -20%;}
  100%{opacity: 0;margin-top: 40%;}
}
body, html, root, document{
  display: block
  height: 500px;
}
 .popUpFundo{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color:#4879c3;
    opacity: 0.8;
    z-index: 50;
}
.popUp{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    display: none;
    position: fixed;
    top: 40%;
    left: 50%;
    padding: 0;
    font-size: 14px;
    font-family: 'PT Sans', sans-serif;
    color: #fff;
    border-style:none;
    z-index: 999;
    overflow: hidden;
}
.popUp button:focus{
    outline-style: none;
}
.popUp>h1{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 5px;
    min-height: 40px;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    color: #fff;
    background-color: transparent;
    border-style: none;
    border-width: 5px;
    border-color: black;
}
.vermelha>h1{
    border-color: #fa5032;
}
.verde>h1{
    border-color: #42ad4f;
}
.azul>h1{
    border-color: #659cff;
}

.popUp>div{
    display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 5%;
    text-align: center;
    vertical-align: middle;
    border-width: 1px;
    border-color: #ccc;
    border-style: none none solid none;
    overflow: auto;
}
.popUp>div>span{
    display: table-cell;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 0;
    vertical-align: middle;
}
.popUp>button{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 10px;
    width: 50%;
    border: 1px none #ccc;
    color: #fff;
    font-family: inherit;
    cursor: pointer;
}
.alert{
    width: 100% !important;
}
.popUp .puCancelar{
    float: left;
}

.popUp .puEnviar{
    float: right;
}

.p{
    margin: 0;
    width: 100%;
    max-width: 300px;
    height: 100%;
    max-height: 200px;
    transform: translate(-50%, -50%);
}

.p>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    
}
.p>div>div, .p span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 300px;
    height: 108px;
    margin: 0;
    padding: 0;
    border-style: none;

}

.p>button{
    height: 50px;
    
}
.puEnviar{
    margin: 5px 0;
}
.puCancelar{
    margin: 5px 0;
}


.m{
    margin: 0;
    width: 100%;
    max-width: 400px;
    height: 100%;
    max-height: 300px;
    transform: translate(-50%, -50%);
}
.m>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    border-color:#ccc;
}
.m>div>div, .m>span, .m>div>span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 400px;
    height: 208px;
    margin: 0;
    padding: 0;
    border-style: none;
}

.m>button{
    height: 50px;
}

.g{
    margin: 0;
    width: 100%;
    max-width: 600px;
    height: 100%;
    max-height: 500px;
    transform: translate(-50%, -50%);
}
.g>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    border-color: #ccc;
}
.g>div>div, .g span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 600px;
    height: 408px;
    margin: 0;
    padding: 0;
    border-style: none;
}
.g>button{
   height: 60px;
}


.alert.puEnviar{
    display: none;
}

.popUpEntrada{
    display: block !important;
    animation: popUpEntrada 0.5s;
    -webkit-animation: popUpEntrada 0.5s;
}
.popUpSaida{
    display: block !important;
    animation: popUpSaida 0.5s;
    -webkit-animation: popUpSaida 0.5s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}

.blue{
    background-color:#51b2d6;
}
.blue>button{
    background-color:#38a7d0;
}
.blue>button:hover{
    background-color:#72c1de;
}
.popUpFundo.blue{
    background-color:#134152;
}
.green{
    background-color: #43b649;
}
.green>button{
    background-color:#3da743;
}
.green>button:hover{
    background-color:#4fbe55;
}
.popUpFundo.green{
    background-color:#173f19;
}
.red{
    background-color: #d55c4b;
}
.red>button{
    background-color: #d04b38;
}
.red>button:hover{
    background-color: #d86959;
}
.popUpFundo.red{
    background-color:#4a1811;
}
.orange{
    background-color: #f9a025;
}
.orange>button{
    background-color: #f89710;
}
.orange>button:hover{
    background-color: #f9ac42;
}
.popUpFundo.orange{
    background-color: #8c5b02;
}
.purple{
    background-color: #ab4bd5;
}
.purple>button{
    background-color: #a238d0;
}
.purple>button:hover{
    background-color: #b159d8;
}
.popUpFundo.purple{
    background-color: #3f114a;
}
.white{
    background-color: #fff;
    color: #555;
}
.white>h1{
  color: #000;
}
.white>button{
    background-color: #f3f3f3;
    color: #555;
}
.white>button:hover{
    background-color: #e3e3e3;
}

.popUpFundo.white{
    background-color:#555;
}


/*
That part is just for the form
*/
.colorfulForm{
  width: 350px;
  margin: 60px auto;
}
.colorfulForm input, .colorfulForm textarea, .colorfulForm select{
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  width: 350px;
  padding: 5px;
  background-color: #f3f3f3;
  border: 1px solid #ccc;
  border-radius: 2px; 
}

.colorfulForm label{
  display: block;
  font-family: Verdana, Arial;
  margin: 10px 0 5px 0;
}
.colorfulForm button{
  width: 100px;
  margin: 3px 7px;
  padding: 5px;
  color: #fff;
  border-style: none;
}


</style>






      <div class="col-md-8 col-xs-8 pag-center">
         <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div>
        <h3 style="margin-top: 50px;">Práctica Fonemas</h4>
          
              <div class="row" style="margin-bottom: 50px;">
             <?php  while(@$row1=$mostrarObjetos->fetch(PDO::FETCH_ASSOC)){  ?>
               <a href="<?php echo 'practica.php?obj='.$row1['idObjetoAprendizaje'].'&grado='.$row1['grado'];?>"><div class="col-md-5 estiloProducto" style="min-height:150px; margin-left: 10px; margin-left: 20px; margin-bottom: 20px;">
                <div class="row" style="background-image:linear-gradient(to top, #e6e9f0 0%, #eef1f5 100%); ">

                  <div class="col-md-5" style=" min-height:150px; 
                  background-image: url(<?php echo 'data:image/jpg;base64,'.$row1['portada'];  ?>);  background-size: 100%; background-repeat:no-repeat; ">                                  
                  </div>
                  <div class="col-md-7" style=" min-height: 150px; color: black;">
                    <h4 style="font-size: 22pt; " ><?php echo $row1['objetoAprendizaje']; ?></h4>
                    <h3 style="text-align: left; font-size: 10pt;"><strong>Descripción:</strong> <?php echo $row1['descripcion']; ?></h3>

                    <img src="../enviado1.png" style="width: 40px; height: 40px; position:absolute; margin-top:-2%; margin-left:23%;">             
                </div>

                </div>
              
                 
               </div></a>
<?php  }?>
               
              
         </div>
          
          <span class="col-md-10 " id="span-preview1" style="display: none; border:1px solid #3498db; height: 200px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left:30px; margin-bottom: 40px;"></span> 

          <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;">

         <div class="row">
      
         </div>

     


<!-- TROZO DE CODIGO NOS VA A SERVIR PARA LANZAR LAS NOTIFICACIONES AL USUARIO --->

   <script type="text/javascript">
    
//fraccion de codigo para cambiar de color las cards --> inicio
 
  var iteracion = $('#cantidadIteracion').val();
  
  for(var i=1; i<=iteracion; i++ ){


     var cardCambiar= $('#cambiar'+i).val(); //obtenemos el id como no puede ser numero le agregamos una palabra
     var idModificar= cardCambiar.substring(7,10); // quitamos la palabra y nos queda el id modificar
      $('#card'+idModificar).css('background-color','#2ecc71');
      $('#card'+idModificar).css('background-color','#2ecc71');
      $('#on'+idModificar).css('display','none');
       $('#bloq'+idModificar).css('display','block');
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
    var id= clicked_id.substring(5,6);

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



//FUNCIONES PARA LA ALERTA
var janelaPopUp = new Object();
janelaPopUp.abre = function(id, classes, titulo, corpo, functionCancelar, functionEnviar, textoCancelar, textoEnviar){
    var cancelar = (textoCancelar !== undefined)? textoCancelar: 'volver a grabar';
    var enviar = (textoEnviar !== undefined)? textoEnviar: 'Guarda';
    classes += ' ';
    var classArray = classes.split(' ');
    classes = '';
    classesFundo = '';
    var classBot = '';
    $.each(classArray, function(index, value){
        switch(value){
            case 'alert' : classBot += ' alert '; break;
            case 'blue' : classesFundo += this + ' ';
            case 'green' : classesFundo += this + ' ';
            case 'red' : classesFundo += this + ' ';
            case 'white': classesFundo += this + ' ';
            case 'orange': classesFundo += this + ' ';
            case 'purple': classesFundo += this + ' ';
            default : classes += this + ' '; break;
        }
    });
    var popFundo = '<div id="popFundo_' + id + '" class="popUpFundo ' + classesFundo + '"></div>'
    var janela = '<div id="' + id + '" class="popUp ' + classes + '"><h1>' + titulo + "</h1><div><span>" + corpo + "</span></div><button class='puCancelar " + classBot + "' id='" + id +"_cancelar' data-parent=" + id + ">" + cancelar + "</button><button class='puEnviar " + classBot + "' data-parent=" + id + " id='" + id +"_enviar'>" + enviar + "</button></div>";
    $("window, body").css('overflow', 'hidden');
    
    $("body").append(popFundo);
    $("body").append(janela);
    $("body").append(popFundo);
     //alert(janela);
    $("#popFundo_" + id).fadeIn("fast");
    $("#" + id).addClass("popUpEntrada");
    
    $("#" + id + '_cancelar').on("click", function(){
        if((functionCancelar !== undefined) && (functionCancelar !== '')){
            functionCancelar();
            
        }else{
            janelaPopUp.fecha(id);
            //alert('rechazo'); //aqui es donde limpiamos la caja
            $('#span-preview').text('');
            $('body').css('overflow-x','none');
        }
    });
    $("#" + id + '_enviar').on("click", function(){
        if((functionEnviar !== undefined) && (functionEnviar !== '')){

            functionEnviar();

        }else{
            janelaPopUp.fecha(id);
             //si le guardar a la notificacion ejecutamos formulario
             $('#formularioE').submit();

        }
    });
    
};
janelaPopUp.fecha = function(id){
    if(id !== undefined){
        $("#" + id).removeClass("popUpEntrada").addClass("popUpSaida"); 
        
            $("#popFundo_" + id).fadeOut(1000, function(){
                $("#popFundo_" + id).remove();
                $("#" + $(this).attr("id") + ", #" + id).remove();
                if (!($(".popUp")[0])){
                    $("window, body").css('overflow', 'auto');
                }
            });
            
      
    }
    else{
        $(".popUp").removeClass("popUpEntrada").addClass("popUpSaida"); 
        
            $(".popUpFundo").fadeOut(1000, function(){
                $(".popUpFundo").remove();
                $(".popUp").remove();
                $("window, body").css('overflow', 'auto');
            });
            
       
    }
}
$("button").on("click", function(){
  var myText = $("#span-preview").text();
  janelaPopUp.abre( "asdf", $("#size").val() + " "  + $(this).html() + ' ' + $("#mode").val(),  $("#title").val() ,  myText)
});

setTimeout(function(){janelaPopUp.fecha('example');}, 2000);



///--------------------------------------------------------------------------------



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