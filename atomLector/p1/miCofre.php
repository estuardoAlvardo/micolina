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

 $q1 = ("SELECT * FROM micofre where idLectura=:idLectura and idUsuario=:idUsuario");
      $mostrarPalabra=$dbConn->prepare($q1);
      $mostrarPalabra->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT); 
      $mostrarPalabra->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
      $mostrarPalabra->execute();
      $hayRegistros=$mostrarPalabra->rowCount();


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

/*Estilos para cards */
.wrimagecard{ 
  margin-top: 0;
    margin-bottom: 1.5rem;
    text-align: left;
    position: relative;
    background: #fff;
    box-shadow: 12px 15px 20px 0px rgba(46,61,73,0.15);
    border-radius: 4px;
    transition: all 0.3s ease;
}
.wrimagecard .fa{
  position: relative;
    font-size: 70px;
}
.wrimagecard-topimage_header{
padding: 20px;
}
a.wrimagecard:hover, .wrimagecard-topimage:hover {
    box-shadow: 2px 4px 8px 0px rgba(46,61,73,0.2);
}
.wrimagecard-topimage a {
    width: 100%;
    height: 100%;
    display: block;
}
.wrimagecard-topimage_title {
    padding: 20px 24px;
    min-height: 80px;
    padding-bottom: 0.75rem;
    position: relative;
}
.wrimagecard-topimage a {
    border-bottom: none;
    text-decoration: none;
    color: #525c65;
    transition: color 0.3s ease;
}


/*estilos input*/
/* Estrutura */
.input-container {
position: relative;

}

.input-container2 {
position: relative;

}


.input1 {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;
}

.input2 {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;

}

.label1 {
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

.label2 {
  top: 0;
  left: 0; right: 1;
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

/* Interation */
.input1:valid,
.input1:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:rgba(187, 120, 36, 0.1)
}

.input2:valid,
.input2:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:rgba(187, 120, 36, 0.1)
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



/* Just for leave it a little more beautiful */


section {
    margin: 15px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
    padding: 20px;
    border-radius: 0 0 2px 2px;
    background-color: #FFF;
}

</style>






      <div class="col-md-8 col-xs-8 pag-center">
         <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div>
        <h3 style="margin-top: 50px;">Mi Cofre de palabras</h4>
          
        
          <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;">

<div class="container-fluid">
  <div class="row">
  <div class="col-md-12 col-sm-12">
  <div class="wrimagecard wrimagecard-topimage" style="margin-top: 50px;">
        
          <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) ">
            <h2 style="text-align: center;">Nueva Palabra</h2>
            <form method="post" action="controllador/guardarMiCofre.php">
              <div class="input-container" style="margin-bottom:50px; margin-top: 50px; ">
                  <input id="name" name="palabra" class="input1" type="text" pattern=".+" required />
                  <label class="label1" for="name" style="color:black; text-align: left; background-color:rgba(187, 120, 36, 0.1);">Palabra</label>
              </div>
              <div class="input-container2" style="margin-top: 15px;">
                  <textarea style="height: 35px; background-size;" id="name2" class="input2" type="text" pattern=".+" name="definicion" required /></textarea>
                  <label class="label2" for="name2" style="color:black; text-align: left; background-color:rgba(187, 120, 36, 0.1);">Definición</label>
              </div>
              <input style="display:none;" type="text" name="idLectura" value="<?php echo $_GET['idLectura']; ?>">
              <input type="text" style="display: none;" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
            
          </div>
          <div class="wrimagecard-topimage_title" style="margin-left: 40%;">
            <input  type="submit" value="Agregar a mi cofre" class="col-md-12 btn btn-default botonAgg-1" style="font-size: 17pt; background-color: #3498db; color: white; border:1px solid #3498db; ">
          </div>
       </form>
      </div>
      </div>
    
</div>
</div>

<h4></h4>
<hr>

<div class="container-fluid">
  <div class="row">
<?php  if($hayRegistros<5){?>

<div style="padding: 3px; text-align: center; background-color:#f39c12; color: white; margin-bottom: 50px;">
  <h3>Te faltán <?php $palabrasP=5-$hayRegistros; echo $palabrasP; ?> palabras para que está actividad tenga punteo.</h3>
</div>

<?php }else{ ?>
<div style="padding: 3px; text-align: center; background-color:#27ae60; color: white; margin-bottom: 50px;">
  <h3>Felicidades completaste las palabras minimas!! pero puedes seguir agregando más.</h3>
</div>

<?php } ?> 
<?php if($hayRegistros==0){ ?>

<h1>Aún no tienes ninguna palabra en tú cofre.</h1>



<?php } else{ while(@$row1=$mostrarPalabra->fetch(PDO::FETCH_ASSOC)){ ?>

 

<div class="col-md-4 col-sm-4"  style="min-height: 200px; margin-bottom:40px;">
      <div class="wrimagecard wrimagecard-topimage" style=" border-radius: 5px;">
         
          <div class="wrimagecard-topimage_header" style="background-image: linear-gradient(45deg, #874da2 0%, #c43a30 100%); color: white;">
            <h3 style="text-align: center;"><?php echo $row1['palabra']; ?></h3>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4 ><?php echo $row1['definicion']; ?></h4>
          </div>
       
      </div>
</div>


<?php } } ?>

</div>
</div>
       


<!-- TROZO DE CODIGO NOS VA A SERVIR PARA LANZAR LAS NOTIFICACIONES AL USUARIO --->
         <section class="colorfulForm" style="display: none;">
            <label>Title</label>
            <input type="text" id="title" value="Esto es lo que grabamos ¿Lo deseas Guardar?" class="l2"/><br>
            <label>Text</label>
          <textarea id="myText" class="l2" id="palabraAguardar"></textarea><br>
            <label>Mode</label>
            <select class="l2" id="mode">
                <option value="">confirm</option>
                <option value="alert">alert</option>
            </select><br>
            <label>Size</label>
            <select class="l2" id="size">
              
                <option value="m">medium</option>
              
            </select><br>
          <label>Color</label>
          <button id="activarNoti" class="l1 blue">blue</button> 
          <button class="l1 green">green</button> 
          <button class="l1 red">red</button>  
          <button class="l1 white" style="border: 1px solid #555; color: #555;">white</button>
          <button class="l1 orange">orange</button> 
          <button class="l1 purple">purple</button> 
        </section> 


<!-- TROZO DE CODIGO NOS VA A SERVIR PARA LANZAR LAS NOTIFICACIONES AL USUARIO ---->

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
            artyom.say("Hola "+name+" estoy para servirte, te explicare para que sirve está actividad, quiero que sepas que para poder mejorar tú comprensión, necesitas entender todas las palabras de la lectura, incrementa tu vocabulario agregando palabras a tu cofre. Tienes que ingresar por lo menos 5 palabras, es el mínimo, puedes empezar cuando lo desees.");
            finAsistente();

          }


        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }    

function grabarCuentame(clicked_id){
            
            //enviar idPalabra seleccionada para registrarlo en la base de datos          
            var idPalabra= clicked_id.substring(2,6); 

            startArtyom();
            capturarFluidez();
            
            $('#cuentameOn').css("display","none");
            $('#cuentaOf').css("display","block"); 
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

 $('#cuentameOn').css("display","block");
  $('#cuentaOf').css("display","none");  
  
  $('#textoEnviar').val(texto);

    //confirmar guardado de grabacion
  $("#activarNoti").click();
    finAsistente();
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