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
        $_SESSION['curso']="Lecturas Diarias";
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

//funciones para verificar la semanas

    //semana prueba 
$semanaPrueba=1;
//verificar la semana 
setlocale(LC_ALL,"es_ES");
$dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");;
$noSemanaActual = date("W"); //produccion

$diaSemanaSet=$dias[date("w")];

 
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

  /* timeline vertical*/
.itemLect {
    position: relative;
    margin: 15px;
    border-left: 3px dashed #d35400;
    padding: 10px 40px;
}

.itemLect > span {
    position: absolute;
    width: 40px;
    height: 40px;
    font-size: 30px;
    text-align: center;
    line-height: 40px;
    border-radius: 100%;
    left: -20px;
    top: 0;
    background: #d35400;
    color: white;
    font-weight: 20pt;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;
}

.itemLect div {
    font-size: 18px;
    font-weight: bold;  
}

.itemLect p {
    margin-top: 15px;
}

/* Timeline horizontal */
.timeline,
.timeline-horizontal {
  list-style: none;
  padding: 20px;
  position: relative;
}
.timeline:before {
  top: 40px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline .timeline-item {
  margin-bottom: 20px;
  position: relative;
}
.timeline .timeline-item:before,
.timeline .timeline-item:after {
  content: "";
  display: table;
}
.timeline .timeline-item:after {
  clear: both;
}
.timeline .timeline-item .timeline-badge {
  color: #fff;
  width: 54px;
  height: 54px;
  line-height: 52px;
  font-size: 22px;
  text-align: center;
  position: absolute;
  top: 18px;
  left: 50%;
  margin-left: -25px;
  background-color: #7c7c7c;
  border: 3px solid #ffffff;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline .timeline-item .timeline-badge i,
.timeline .timeline-item .timeline-badge .fa,
.timeline .timeline-item .timeline-badge .glyphicon {
  top: 2px;
  left: 0px;
}
.timeline .timeline-item .timeline-badge.primary {
  background-color: #1f9eba;
}
.timeline .timeline-item .timeline-badge.info {
  background-color: #5bc0de;
}
.timeline .timeline-item .timeline-badge.success {
  background-color: #59ba1f;
}
.timeline .timeline-item .timeline-badge.warning {
  background-color: #d1bd10;
}
.timeline .timeline-item .timeline-badge.danger {
  background-color: #ba1f1f;
}
.timeline .timeline-item .timeline-panel {
  position: relative;
  float: left;
  right: 16px;
  border: 1px solid #c0c0c0;
  background: #ffffff;
  border-radius: 2px;
  padding: 20px;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}

.timeline .timeline-item .timeline-panel:hover{
 box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);

}


.timeline .timeline-item .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -16px;
  display: inline-block;
  border-top: 16px solid transparent;
  border-left: 16px solid #c0c0c0;
  border-right: 0 solid #c0c0c0;
  border-bottom: 16px solid transparent;
  content: " ";
}
.timeline .timeline-item .timeline-panel .timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline .timeline-item .timeline-panel .timeline-body > p,
.timeline .timeline-item .timeline-panel .timeline-body > ul {
  margin-bottom: 0;
}
.timeline .timeline-item .timeline-panel .timeline-body > p + p {
  margin-top: 5px;
}
.timeline .timeline-item:last-child:nth-child(even) {
  float: right;
}
.timeline .timeline-item:nth-child(even) .timeline-panel {
  float: right;
  left: 16px;
}
.timeline .timeline-item:nth-child(even) .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-horizontal {
  list-style: none;
  position: relative;
  padding: 20px 0px 20px 0px;
  display: inline-block;
}
.timeline-horizontal:before {
  height: 3px;
  top: auto;
  bottom: 26px;
  left: 56px;
  right: 0;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item {
  display: table-cell;
  height: 280px;
  width: 20%;
  min-width: 320px;
  float: none !important;
  padding-left: 0px;
  padding-right: 20px;
  margin: 0 auto;
  vertical-align: bottom;
}
.timeline-horizontal .timeline-item .timeline-panel {
  top: auto;
  bottom: 64px;
  display: inline-block;
  float: none !important;
  left: 0 !important;
  right: 0 !important;
  
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item .timeline-panel:before {
  top: auto;
  bottom: -16px;
  left: 28px !important;
  right: auto;
  border-right: 16px solid transparent !important;
  border-top: 16px solid #c0c0c0 !important;
  border-bottom: 0 solid #c0c0c0 !important;
  border-left: 16px solid transparent !important;
}
.timeline-horizontal .timeline-item:before,
.timeline-horizontal .timeline-item:after {
  display: none;
}
.timeline-horizontal .timeline-item .timeline-badge {
  top: auto;
  bottom: 0px;
  left: 43px;
}

.page-header{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 10px;
                      cursor: pointer;
                      border-radius: 10px;
                      margin-bottom: 20px;
}
 </style>


 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center"><?php echo $_SESSION['curso'];?></h3>
              
         </div>

         <div class="col-md-12" style="">

              <h4 class="text-left">Lecturas Diarias </h4><hr>
         </div>

  

<!--- SEMANAS 2DO ALGORITMO ---------------------->
<?php 

    $qnew=("SELECT DISTINCT semana from atomolector where grado=:grado and semana IS NOT NULL");
    $mostrarSemanas=$dbConn->prepare($qnew);
    $mostrarSemanas->bindParam(':grado',$gradoBuscar, PDO::PARAM_STR); 
    $mostrarSemanas->execute();


?>


  <div class="container">
      <div class="row">
     

            <?php while(@$mostSemana=$mostrarSemanas->fetch(PDO::FETCH_ASSOC)){  
              
              @$contador+=1;// semana 

              

              ?>
      <div class="col-sm-9">
          <button class="btn btn-default botonAgg-1"  id="<?php echo 'btn'.$contador; ?>" style="position: absolute; margin-left: 43%; margin-top: 25%; color:white; width:70px; height:70px; background-color: #3498db; border:1px solid #3498db;" onclick="verMasLecturas(this.id);"> <span class="glyphicon glyphicon-chevron-right" width="60" heght="60"></span></button>
          
          <div class="itemLect">
           <span class=""><?php echo $contador;  ?></span>
             
             <!-----  time line 2 ---->

          <div class="page-header" >
            <h3>Semana <?php echo $contador; ?> </h3>
          </div>
          <div style="overflow-y:auto; opacity: 0px;" id="<?php echo 'panel'.$contador; ?>">
          <ul class="timeline timeline-horizontal">
          
          <?php 

              $queryDatosLecturas = ("SELECT  * FROM atomolector where grado=:grado and semana=:semana");
              $datosLecturas=$dbConn->prepare($queryDatosLecturas);
              $datosLecturas->bindParam(':grado',$gradoBuscar, PDO::PARAM_INT); 
              $datosLecturas->bindParam(':semana',$contador, PDO::PARAM_STR); 
              $datosLecturas->execute(); 

              
            while(@$rowDatosLecturas=$datosLecturas->fetch(PDO::FETCH_ASSOC)){              
                @$h+=1;//dias de la semana 1=lunes, 2=martes,3=miercoles, 4=jueves, 5=viernes

                //convertimos $h en dias de la semana
                $bloqueante='display:block';
                switch ($h) {
                  case 1:
                    $diaSemanaGet='lunes';
                    break;
                  case 2:
                    $diaSemanaGet='martes';
                    $bloqueante='display:none';
                    break;
                  case 3:
                    $diaSemanaGet='miercoles';
                    break;
                  case 4:
                    $diaSemanaGet='jueves';
                    break;
                  case 5:
                    $diaSemanaGet='viernes';
                    $bloqueante='display:none';
                    break;
                  case 6:
                    $diaSemanaGet='sabado';
                    break;
                  case 7:
                    $diaSemanaGet='domingo';
                    break;

                  default:
                    # code...
                    break;
                }


// Trozo de codigo que pone bloqueante el plan lector
if($_SESSION['tipoUsuario']==1){


                if($diaSemanaSet==$diaSemanaGet and $semanaPrueba==$contador){

                  $activo='activo';
                  $activoOjo='glyphicon glyphicon-eye-open';
                  $estiloActivo=' ';


                }else{
                   $activo='inactivo';
                  $activoOjo='glyphicon glyphicon-eye-close';
                  $estiloActivo='cursor: not-allowed;  pointer-events: none; -webkit-filter: grayscale(100%); -moz-filter: grayscale(100%); -ms-filter: grayscale(100%); -o-filter: grayscale(100%); filter: grayscale(100%);';

                }
}


              $query12 = ("SELECT  * FROM atomolector where idLectura=:idLectura limit 1");
              $caratulaNew=$dbConn->prepare($query12);
              $caratulaNew->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_STR); 
              $caratulaNew->execute(); 

              while(@$rowCaratula=$caratulaNew->fetch(PDO::FETCH_ASSOC)){  
             ?>

            <li class="timeline-item" >

              <div class="timeline-badge primary" style="background-color: <?php echo $background; ?>;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;" >

<?php 

if($gradoBuscar>=1 and $gradoBuscar<=4){
              $q6= ("SELECT * FROM micofre where idUsuario=:idUsuario and idLectura=:idLectura");
              $palabrasMiCofre=$dbConn->prepare($q6);
              $palabrasMiCofre->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $palabrasMiCofre->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $palabrasMiCofre->execute();
              $hayPalabras=$palabrasMiCofre->rowCount();

              //verificamos si ya publico un texto 
              $q7= ("SELECT * FROM emnivel1completopaso1 where idUsuario=:idUsuario and idTexto=:idLectura");
              $sePublicoTexto=$dbConn->prepare($q7);
              $sePublicoTexto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $sePublicoTexto->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $sePublicoTexto->execute();
              $hayTextoPublicado=$sePublicoTexto->rowCount();

              }

              if($gradoBuscar>=5 and $gradoBuscar<=8){

                  $q6= ("SELECT * FROM micofre where idUsuario=:idUsuario and idLectura=:idLectura");
              $palabrasMiCofre=$dbConn->prepare($q6);
              $palabrasMiCofre->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $palabrasMiCofre->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $palabrasMiCofre->execute();
              $hayPalabras=$palabrasMiCofre->rowCount();

              //verificamos si ya publico un texto 
              $q7= ("SELECT * FROM emnivel2completopaso1 where idUsuario=:idUsuario and idTexto=:idLectura");
              $sePublicoTexto=$dbConn->prepare($q7);
              $sePublicoTexto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $sePublicoTexto->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $sePublicoTexto->execute();
              $hayTextoPublicado=$sePublicoTexto->rowCount();

              }

              if($gradoBuscar>=9 and $gradoBuscar<=12){

              //verificamos si hay el minimo de palabras de cada lectura

              $q6= ("SELECT * FROM micofre where idUsuario=:idUsuario and idLectura=:idLectura");
              $palabrasMiCofre=$dbConn->prepare($q6);
              $palabrasMiCofre->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $palabrasMiCofre->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $palabrasMiCofre->execute();
              $hayPalabras=$palabrasMiCofre->rowCount();

              //verificamos si ya publico un texto 
              $q7= ("SELECT * FROM publictexto where idUsuario=:idUsuario and idLectura=:idLectura");
              $sePublicoTexto=$dbConn->prepare($q7);
              $sePublicoTexto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
              $sePublicoTexto->bindParam(':idLectura',$rowDatosLecturas['idLectura'], PDO::PARAM_INT);
              $sePublicoTexto->execute();
              $hayTextoPublicado=$sePublicoTexto->rowCount();
              }


          



if($h==1){ echo "L"; $background="#2980b9";
  if(@$hayPalabras>=1 and $hayTextoPublicado>=1){
                    $completo='leido1.png';

                  }else{
                    $completo='enviado1.png';
                  }

                  } if($h==2){echo "M"; $background="#1abc9c"; 

                  if(@$hayPalabras>=1 and $hayTextoPublicado>=1){
                    $completo='leido1.png';

                  }else{
                    $completo='enviado1.png';
                  }} if($h==3){echo "X"; $background="#f1c40f";
                    if(@$hayPalabras>=1 and $hayTextoPublicado>=1){
                    $completo='leido1.png';

                  }else{
                    $completo='enviado1.png';
                  }
                  } if($h==4){echo "J";  $background="#be2edd";
                  if(@$hayPalabras>=1 and $hayTextoPublicado>=1){
                    $completo='leido1.png';

                  }else{
                    $completo='enviado1.png';
                  }
                  } if($h==5){echo "V"; $background="#30336b";
                  if(@$hayPalabras>=1 and $hayTextoPublicado>=1){
                    $completo='leido1.png';

                  }else{
                    $completo='enviado1.png';
                  }
                  }  ?></div>


       <a href="<?php echo 'p1/mostrarLect1.php?idLectura='.$rowDatosLecturas['idLectura'].'&gradoB='.$gradoBuscar; ?>" style="text-decoration:none; color: black; <?php echo $bloqueante; ?>  ">
              <div class="timeline-panel"  style="border:0px; cursor: pointer; margin-left: -70px; <?php echo $estiloActivo; ?>">
                <div class="timeline-heading" >
                  <h4 class="timeline-title" style="margin-top: 30px;"><?php echo $rowDatosLecturas['nombreLectura']; ?></h4>
                  <p><small class="text-muted"><i class="glyphicon glyphicon-bookmark"></i> <?php echo $rowDatosLecturas['tipoLectura']; ?></small></p>
                   <h5 style="text-align: left;">Descripción: <?php echo $rowDatosLecturas['descripcion']; ?> </h5>
                    <h5 style="text-align: left;">Edad: <?php echo $rowDatosLecturas['edadLectura']; ?></h5>
                    <span style="margin-left:10px;" class="<?php echo $activoOjo; ?>"></span> 
                    <span><?php echo $diaSemanaGet; ?></span>
                </div>
                <div class="timeline-body" style=" min-height:100px; width: 100px; 
                  background-image: ; background-size: 100%; background-repeat:no-repeat;">

                  <img src="<?php echo $_SESSION['uri'].$rowDatosLecturas['rutaLectura'].'1.jpg'; ?>" style="width: 150px; height: 150px;">
                  
                  <img src="<?php echo $completo; ?>" style=" display:block; width: 40px; height: 40px; position:absolute; margin-top:-18%; margin-left:69%;">
                </div>
              </div>
            </a>
            
            </li>

                        

            <?php  }  } $h=0; ?>
                       
          </ul>
        </div>
        <!----   time line 2 ----> 
               <p style="opacity: 0;">asda</p>
          </div>
    
      </div>

    <?php } ?>
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


function verMasLecturas(clicked_id){
  var idRuido= clicked_id; 

  var mostrar= idRuido.substring(3,6); 
  //alert(mostrar);
    //var posicion_boton = $("#btn"+mostrar).offset().top;
    var posicion_boton=1108.375;
    
  $("#panel"+mostrar).animate({scrollLeft:posicion_boton+"px"});
}



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