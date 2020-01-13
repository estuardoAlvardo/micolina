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

$_SESSION['idUsuario'];
$_GET['idLectura'];
$_GET['numeroLectura'];
$_GET['gradoB'];

$sql1 = ("SELECT * FROM atomolectorvelocidad where noLectura=:noLectura and idUsuario=:idUsuario ");
$obtenerIntentos = $dbConn->prepare($sql1);
$obtenerIntentos->bindParam(':noLectura', $_GET['idLectura'], PDO::PARAM_INT); 
$obtenerIntentos->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT); 
$obtenerIntentos->execute();

//consultar intento para incrementar
$sql2 = ("SELECT intento FROM atomolectorvelocidad where noLectura=:noLectura and idUsuario=:idUsuario order by intento desc limit 1 ");
$obtenernoIntento = $dbConn->prepare($sql2);
$obtenernoIntento->bindParam(':noLectura', $_GET['idLectura'], PDO::PARAM_INT); 
$obtenernoIntento->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT); 
$obtenernoIntento->execute();
$hayIntento=$obtenernoIntento->rowCount();

$sql3 = ("SELECT * FROM velocidadlectora where idLectura=:noLectura");
$obtenerLectura = $dbConn->prepare($sql3);
$obtenerLectura->bindParam(':noLectura', $_GET['idLectura'], PDO::PARAM_INT); 
$obtenerLectura->execute();

//consulta mostrar detalle recursiva a esta pagina
if(!empty(@$_GET['intento100']) and !empty(@$_GET['idLectura'])){

  $sql4 = ("SELECT * FROM atomolectorvelocidad where noLectura=:noLectura and intento=:intento and idUsuario=:idUsuario LIMIT 1");
$detalleLectura = $dbConn->prepare($sql4);
$detalleLectura->bindParam(':noLectura', $_GET['idLectura'], PDO::PARAM_INT);
$detalleLectura->bindParam(':intento', $_GET['intento100'], PDO::PARAM_INT); 
$detalleLectura->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT); 
$detalleLectura->execute();
$columnasEncontradas= $detalleLectura->rowCount();

}


 if($_GET['gradoB']>=7){
                      $extencion='.png';
                    } 
                   
 if($_GET['gradoB']<7){
                      $extencion='.gif';
                    }



//control de estandares de velocidad--------------------------------------------------------

switch ($_GET['gradoB']) {
  case 1:
    //variables 
    $necesitaMejorar=10; 
    $cercarEstandar=25;
    $estandar=45;
    $avanzado=58;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';

    break;

  case 2:
  //variables 
    $necesitaMejorar=25; 
    $cercarEstandar=45;
    $estandar=65;
    $avanzado=84;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 3: 
    //variables 
    $necesitaMejorar=45; 
    $cercarEstandar=65;
    $estandar=85;
    $avanzado=112;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 4: 
    //variables 
    $necesitaMejorar=70; 
    $cercarEstandar=84;
    $estandar=100;
    $avanzado=140;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 5: 
    //variables 
    $necesitaMejorar=95; 
    $cercarEstandar=120;
    $estandar=140;
    $avanzado=168;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 6: 
    //variables 
    $necesitaMejorar=120; 
    $cercarEstandar=145;
    $estandar=180;
    $avanzado=196;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 7: 
    //variables 
    $necesitaMejorar=170; 
    $cercarEstandar=180;
    $estandar=200;
    $avanzado=224;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

     case 8: 
    //variables 
    $necesitaMejorar=200; 
    $cercarEstandar=210;
    $estandar=225;
    $avanzado=252;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 9: 
    //variables 
    $necesitaMejorar=220; 
    $cercarEstandar=230;
    $estandar=260;
    $avanzado=280;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

    case 10: 
    //variables 
    $necesitaMejorar=240; 
    $cercarEstandar=260;
    $estandar=280;
    $avanzado=308;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

     case 11: 
    //variables 
    $necesitaMejorar=260; 
    $cercarEstandar=280;
    $estandar=300;
    $avanzado=336;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;

         case 12: 
    //variables 
    $necesitaMejorar=290; 
    $cercarEstandar=300;
    $estandar=340;
    $avanzado=365;

    //rangos
    $rango1='0 - '.$necesitaMejorar;
    $rango2= $necesitaMejorar.' - '.$cercarEstandar;
    $rango3= $cercarEstandar.' - '.$estandar;
    $rango4= $estandar.' - '.$avanzado.' o mayor';
    break;
  default:
    $necesitaMejorar=0; 
    $cercarEstandar=0;
    $estandar=0;
    $avanzado=0;
    break;
}








 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Lecturas Fluidez Verbal</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">

    

<!-- libreria de graficos -->
<script src="../graficos/code/highcharts.js"></script>
<script src="../graficos/code/highcharts-3d.js"></script>
<script src="../graficos/code/modules/cylinder.js"></script>
<script src="../graficos/code/modules/exporting.js"></script>
<script src="../graficos/code/modules/export-data.js"></script>
<!-- libreria de graficos FIN -->

 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
    <script src='../../js/jquery.min.js'></script>
    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  
 
  <script src="../../js/artyom/artyom.min.js"></script>
  <script src="../../js/artyom/artyom.window.js"></script>
  <script src="../../js/artyom/artyomCommands.js"></script>

<script language="Javascript"  type="text/javascript" src="../reloj/clockCountdown.js"></script>
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../../static/nav.php'; $nivell=2; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../../static/lat-izquierdo.php'; $nivel=2; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
   .masCentrado{
    margin-top: 500px;
    margin-left: 55%;
   }
    
    .botonAgg-1 {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  background-color: #6ab04c;
  color: black;
}

.botonAgg-1:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #6ab04c;
  color: black;
}
  
.cajaDescripcion{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }


/*cronometro inverso*/
@font-face {
  
 
}
/* aqui va el estilo que tendra el clock */

#clock, #clock-2, #clock-3{
  padding:0;
  height:90px;
  font-family: inherit;
  /*position: absolute;*/
  top: 0px;
  right: 0px;
  color: #2a2807;
  padding:4px;
  width: 300px;
  margin-top: -10px;
  margin-bottom: 20px;
  
}

.clockCountdownNumber{
  float:left;
  background:URL('../reloj/numeros.png');
  display:block;
  width:34px;
  height:50px;
}

.clockCountdownSeparator_days,
.clockCountdownSeparator_hours,
.clockCountdownSeparator_minutes,
.clockCountdownSeparator_seconds
{
  float:left;
  display:block;
  width:10px;
  height:50px;
}
.clockCountdownFootItem{
  width:80px;
  float:left;
  text-align:center;
}                    

.card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

#container, #sliders {
    
    margin: 0 auto;
    margin-top: 100px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); margin-top: 50px; 
}
#container {
    height: 400px; 
}

/*estilos para liston titulo*/

.container {
  width: 80%;
  max-width: 1000px;
  height: 80px;
  margin: 100px auto; 
  position: relative;

}

.one > div {
  height: 50px;
}

.main {
  background: #2ecc71; 
  position: relative;
  display: block;
  width: 95%;
  left: 50%;
  top: 0;
  padding: 5px;
  margin-left: -47%;
  z-index: 10;
}

.main > div {
  border: 1px dashed #fff;
  border-color: rgba(255, 255, 255, 0.5);
  height: 40px;
}

.bk {
 background:#2ecc71;
 position: absolute;
 width: 8%;
 top: 12px;
}

.bk.l {
 left: 0;
}

.bk.r {
 right: 0;
}

.skew {
  position: absolute;
  background: #27ae60;
  width: 3%;
  top: 6px;
  z-index: 5;
}

.skew.l {
  left: 5%;
  transform: skew(00deg,20deg);
}

.skew.r {
  right: 5%;
  transform: skew(00deg,-20deg);
}

.bk.l > div {
  left: -30px;
}

.bk.r > div {
  right: -30px;
}

.arrow {
  height: 25px !important;
  position: absolute;
  z-index: 2;
  width: 0; 
  height: 0; 
}

.arrow.top {
  top: 0px;
  border-top: 0px solid transparent;
  border-bottom: 25px solid transparent;  
  border-right: 30px solid #2ecc71; 
}

.arrow.bottom {
  top: 25px;
  border-top: 25px solid transparent;
  border-bottom:0px solid transparent;  
  border-right: 30px solid #2ecc71; 
}

.r .bottom {
  border-top: 25px solid transparent;
  border-bottom: 0px solid transparent;   
  border-left: 30px solid #2ecc71; 
  border-right: none;
}

.r .top {
  border-bottom: 25px solid transparent;
  border-top: 0px solid transparent;  
  border-left: 30px solid #2ecc71; 
  border-right: none;
}

@media all and (max-width: 1020px) {
  .skew.l {
    left: 5%;
    transform: skew(00deg,25deg);
  }

  .skew.r {
    right: 5%;
    transform: skew(00deg,-25deg);
  }
}

@media all and (max-width: 680px) {
  .skew.l {
    left: 5%;
    transform: skew(00deg,30deg);
  }

  .skew.r {
    right: 5%;
    transform: skew(00deg,-30deg);
  }
}

@media all and (max-width: 460px) {
  .skew.l {
    left: 5%;
    transform: skew(00deg,40deg);
  }
  .skew.r {
    right: 5%;
    transform: skew(00deg,-40deg);
  }
}

 </style>
 <script type="text/javascript">
   document.oncontextmenu = function(){return false}
 </script>

 			<div class="col-md-8 col-xs-8 pag-center">
        <div class="col-md-12" style="">
          <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div></div>
         

         <?php while($obj1=$obtenerLectura->fetch(PDO::FETCH_ASSOC)){ 
          $_SESSION['lecturaPatron']=$obj1['lectura'];


          ?> 
          <div class="container one">
                <div class="bk l">
                  <div class="arrow top" ></div> 
                  <div class="arrow bottom"></div>
                </div>
                <div class="skew l"></div>
                <div class="main">
                  <div style="text-align:center; color: white;"><h3 style="margin-top:6px">Lectura: <?php echo $obj1['nombreLectura'] ?></h3></div>   
                </div>
                <div class="skew r"></div>                
                <div class="bk r">
                  <div class="arrow top"></div> 
                  <div class="arrow bottom"></div>
                </div>
              </div> 
              <hr>
         <div class="row" style="margin-bottom: 30px;">


          <div style="border:0px  pink; margin-bottom: 30px;">
            <h1 style="margin-top:10px;">Tiempo: <span id="minutos">00</span>:<span id="segundos">00</span></h1>
          </div>  

          <div class="recodinggN" id="grabarOn" title="Empieza a leer" style="cursor: pointer; width: 70px; height: 70px; border-radius: 100%; margin-top: 25px; background-color: #e67e22; margin-left: 47%; margin-bottom: 30px;" onclick="iniciarVelocidadG(this.id)">
            <img style="margin-top: 5px;" src="../../img/micro.png" width="55" height="55" ></div>

            <div id="grabarOf" class="recodinggN" title="Terminar de leer" style="cursor: pointer; padding-top:3px;  width: 70px; height: 70px; border-radius: 100%; margin-top: 25px; background-color: #F72626; margin-left: 47%; display: none;  margin-bottom: 30px;" onclick="findeGrabacion(this.id)"><img src="../../img/microOf.png" width="55" height="55" ></div>

     

          <div class="col-md-12" style="margin-top: -20px; margin-bottom: 20px;">
          <img src="<?php echo $_SESSION['uri'].$obj1['fichero']; ?>" style=" box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius: 20px;">
         <p id="numeroLectura" style="display: none;"><?php echo $obj1['idLectura']; ?></p>
         <p id="palabrasLecturabd" style="display: none;"><?php echo $obj1['cantidadPalabras']; ?></p>
        
         </div>
       <?php } ?>

      <div class="row">
        <h4 style="text-align: left; margin-left: 50px;">Tú Fluidez:</h4>
       <span class="col-md-12 cajaDescripcion" id="span-preview" style="min-height:0px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left: 40px; margin-bottom: 40px; background-color: #e67e22; text-align: left; color: white;"></span>
       </div>


         <h4  style="font-weight: bold; text-align: left; margin-left: 50px; margin-bottom: 20px;">Mis Intentos</h4><hr>
<table class="table table-hover col-md-2" >
  <thead>
    <tr>
      <th style="text-align: center;">Intento</th>
      <th style="text-align: center;">Velocidad Lectora</th>
      <th style="text-align: center;">Tiempo Empleado</th>
      <th style="text-align: center;">Ver Detalle</th>
    </tr>
  </thead>
  <tbody>
     <?php  while($row1=$obtenerIntentos->fetch(PDO::FETCH_ASSOC)){?>
    <tr>      
      <td><?php echo $row1['intento']?></td>
      <td><?php echo $row1['velocidadLectora']."/pm"?></td>
      <td><?php if($row1['tiempoSeg']>=60){ $tiempo =$row1['tiempoSeg']/60; echo $tiempo."min";  }else{echo $row1['tiempoSeg']."seg"; } ?></td>
      <td><a href="velocidad1p.php?idLectura=<?php echo $row1['noLectura'];?>&intento100=<?php echo $row1['intento']; ?>&numeroLectura=<?php echo $_GET['numeroLectura']; ?>&gradoB=<?php echo $_GET['gradoB']; ?>#detalleLecturaAqui" class="btn botonAgg-1" style="color: white; background-color: #2ecc71;">Ver</a></td>   
    </tr>
  <?php } ?>
  </tbody>
</table>

    <?php  while($row2=$obtenernoIntento->fetch(PDO::FETCH_ASSOC)){ 
      $_SESSION['intento']= $row2['intento'];
      ?>

      
    <?php }?>
    <p style="display: none;" id="noIntentoaumento"><?php  if($hayIntento<1){echo 1;}else{ echo $_SESSION['intento']+1;} ?></p>


         <form action="controllador/guardarInforme.php" id="guardarCardLectura" method="post" style="display: none;">
          <input type="text" name="lectura" id="NoLectura">
           <input type="text" name="numLect" value="<?php echo $_GET['numeroLectura']; ?>">
          <input type="text" name="intento" id="intento">
          <input type="text" name="tiempo" id="tiempo">
          <input type="text" name="gradoBB" id="grado" value="<?php echo $_GET['gradoB']; ?>">
          <input type="text" name="velocidad" id="velocidad">
          <textarea id="fluidez" name="fluidez"></textarea>

         </form>




<?php if(empty($_GET['intento100'])){ ?>

<?php }else{ ?>



<!-- MODULO DE REPORTES INICIO -->

    <div class="col-md-12" style="margin-top: 50px;">
     
   <?php while($obj2=$detalleLectura->fetch(PDO::FETCH_ASSOC)){  

     ?>




          <span id="detalleLecturaAqui" style="display: block;"></span>
           <h3 >Detalle de la Lectura</h3>
           <button class="btn botonAgg-1" style="color: white; background-color: #3498db;">PDF</button>
          <a href="velocidad1p.php?idLectura=<?php echo $_GET['idLectura'];?>&numeroLectura=<?php echo $_GET['numeroLectura']; ?>&gradoB=<?php echo $_GET['gradoB'] ?>" class="btn botonAgg-1" style="color: white; background-color: #e74c3c;">Volver</a>
          <h3 style="font-weight: bold; text-align: left;margin-left: 50px;">No Lectura: <?php echo " ".$obj2['noLectura']; ?></h3>
         <h3 style="font-weight: bold; text-align: left;margin-left: 50px;">Intento:<?php   echo " ".$obj2['intento'];   ?></h3>
         <h3  style="font-weight: bold; text-align: left;margin-left: 50px;">Tiempo:<?php
         if($obj2['tiempoSeg']<=60){ echo " ".$obj2['tiempoSeg']."seg";}else{ echo " ".$obj2['tiempoSeg']."min";}  ?></h4>
          <?php 
           $estiloRemarcado=" ";
        
            $estiloRemarcado='box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22); border:4px dashed #ff6b6b';

         if($obj2['velocidadLectora']>=0 and $obj2['velocidadLectora']<=$necesitaMejorar){

          echo '<div class="card-style" style="background-color: #e74c3c; color: white; "><h3 style="font-weight: bold;text-align: left;margin-left: 50px;">Palabras por minuto:'.$obj2['velocidadLectora'].'</h3></div>'; 

            $r1=$estiloRemarcado;
          

         }


         if($obj2['velocidadLectora']>=$necesitaMejorar and $obj2['velocidadLectora']<=$cercarEstandar){

          echo '<div><h3 class="card-style" style="background-color: #f39c12; color: white; font-weight: bold;text-align: left;margin-left: 50px;">Palabras por minuto:'.$obj2['velocidadLectora'].'</h3></div>'; 
         
          $r2=$estiloRemarcado;
         }

         if($obj2['velocidadLectora']>=$cercarEstandar and $obj2['velocidadLectora']<=$estandar){

          echo '<div class="card-style" style="background-color: #1abc9c; color: white; color: white; "><h3 style="font-weight: bold;text-align: left;margin-left: 50px;">Palabras por minuto:'.$obj2['velocidadLectora'].'</h3></div>'; 
         
          $r3=$estiloRemarcado;
         }

          if($obj2['velocidadLectora']>=$estandar or $obj2['velocidadLectora']>=$avanzado){

          echo '<div ><h3  class="card-style" style="background-color: #2ecc71; color: white;  font-weight: bold;text-align: left;margin-left: 50px;">Palabras por minuto: '.$obj2['velocidadLectora'].'</h3></div>'; 

          $r4=$estiloRemarcado;
          

         }

         //remarcamos en que estandar se encuentra el alumno





         ?>
       


  <div class="col-md-12" style="margin-bottom: 50px;">   

        <table class="table table-hover">       
          <thead>
            <tr>
             
              <th style="text-align: center;">Necesita Mejorar</th>
              <th style="text-align: center;">Se acerca al Estándar</th>
               <th style="text-align: center;">Estándar</th>
                <th style="text-align: center;">Avanzado</th>
            </tr>
          </thead>
           <tbody>
               <tr>      

                <td class="card-style" style="background-color: #e74c3c; color: white; <?php echo $r1; ?>"><?php echo $rango1; ?></td>
                <td class="card-style" style="background-color: #f39c12; color: white; <?php echo $r2; ?>"><?php echo $rango2; ?></td>
                <td class="card-style" style="background-color: #1abc9c; color: white; color: white; <?php echo $r3; ?>"><?php echo $rango3; ?></td>
                <td class="card-style" style="background-color: #2ecc71; color: white; <?php echo $r4; ?>"><?php echo $rango4; ?></td>
              </tr>
    </table>
</div>  
<h3 style="font-weight: bold;text-align: left;margin-left: 50px; ">Fluidez de la Lectura</h3>

 <span class="col-md-10 " id="span-preview" style="border:1px solid #3498db; height: 200px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left: 50px;"><?php echo $obj2['fluidez']; ?></span>
         
<div class="row">
            <div class="col-md-3"></div>
         <div id="container" class="col-md-6" style=""></div>
 </div>

 <?php 


 //calculo de velocidad para graficos
    if($obj2['velocidadLectora']>=0 and $obj2['velocidadLectora']<=$necesitaMejorar){ $graficoTiempo=25; ?>
      <h1 id="graficoVelocidad" style="display:none;"><?php echo $graficoTiempo; ?></h1>
  <?php }else if($obj2['velocidadLectora']>=$necesitaMejorar and $obj2['velocidadLectora']<=$cercarEstandar){ $graficoTiempo=50;?>
    <h1 id="graficoVelocidad"  style="display:none;"><?php echo $graficoTiempo;?></h1>
     <?php }else if($obj2['velocidadLectora']>=$cercarEstandar and $obj2['velocidadLectora']<=$estandar){$graficoTiempo=75; ?>
        <h1 id="graficoVelocidad" style="display:none;"><?php echo $graficoTiempo;?></h1>
       <?php }else if($obj2['velocidadLectora']>=$estandar or $obj2['velocidadLectora']>=$avanzado){$graficoTiempo=100; ?>
 <h1 id="graficoVelocidad" style="display:none;"><?php echo $graficoTiempo;?></h1>
<h1 id="graficoVelocidad" style="display:none;"><?php echo $graficoTiempo;?></h1>
 <?php }else if($obj2['velocidadLectora']>=58){$graficoTiempo=100; ?>
  <h1 id="graficoVelocidad" style="display:none;"><?php echo $graficoTiempo; }  ?></h1>






<?php // calculo de fluidez con expresiones regulares
  //patron 
$_SESSION['lecturaPatron']."<br>";
   //fluidez alumno 
$obj2['fluidez']."<br>";
  
  similar_text($_SESSION['lecturaPatron'], $obj2['fluidez'],$porcentaje);
    echo "<p id='similitudFonetica' style='display:none;'>".round($porcentaje,0)."</p>";

 ?>


<script type="text/javascript">

  var graficoVelocidad= $("#graficoVelocidad").text();
  var similitudFonetica= $('#similitudFonetica').text();

  
   //graficos
          Highcharts.chart('container', {
    chart: {
        type: 'cylinder',
        options3d: {
            enabled: true,
            alpha: 15,
            beta: 15,
            depth: 50,
            viewDistance: 25
        }
    },
    title: {
        text: 'Grafico Velocidad y Fluidez'
    },
    plotOptions: {
        series: {
            depth: 25,
            colorByPoint: true
        }
    },
    series: [{

        data: [parseInt(graficoVelocidad)],
        name: 'Velocidad',
        showInLegend: true
    },
    {
        data: [parseInt(similitudFonetica)],
        name: 'Similitud a nivel fonético',
        showInLegend: true
    }

    ]
});
          //fin graficos




</script>
<?php } ?>
</div>  

  <!-- MODULO DE REPORTES FIN -->
<?php } ?>

  

 </div>

<script type="text/javascript">

         

          function iniciarVelocidadG(){
            startArtyom();
            capturarFluidez();
             carga();
              $('#grabarOn').css("display","none");
            $('#grabarOf').css("display","block"); 
            
           };

          function informacion(){
            startArtyom();
            artyom.say("Bienvenido a la prueba de velocidad y fluidez, de átomo LMS. Esta prueba mide velocidad, en términos básicos cuantas palabras por minuto lees, y mientras lees capturamos la fluidez, el objetivo de estas lecturas es mejorar estas dos habilidades; Velocidad y Fluidez. Para empezar la prueba dale clic al microfono y cuando termines desactiva el microno. Recuerda Leer en voz alta");
            finAsistente();

          }

          function startArtyom(){

    artyom.initialize({
        lang: "es-ES",
        continuous:true,// Reconoce 1 solo comando y para de escuchar
              listen:true, // Iniciar !
              debug:true, // Muestra un informe en la consola
              speed:1 // Habla normalmente
      });
  
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

  function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }

    function findeGrabacion(){
      artyom.fatality();// Detener cualquier instancia previa
      detenerse();
      $('#grabarOn').css("display","block");
      $('#grabarOf').css("display","none");  
      obtenerdatosLectura();
    };

    //calculo de palabras por minuto

      //setInterval
  var cronometro;

  function detenerse()
  {
    clearInterval(cronometro);
  }

  function carga()
  {
    contador_s =0;
    contador_m =0;
    s = document.getElementById("segundos");
    m = document.getElementById("minutos");

    cronometro = setInterval(
      function(){
        if(contador_s==60)
        {
          contador_s=0;
          contador_m++;
          m.innerHTML = contador_m;

          if(contador_m==60)
          {
            contador_m=0;
          }
        }

        s.innerHTML = contador_s;
        contador_s++;

      }
      ,1000);

  }


 function obtenerdatosLectura(){
       var Nolectura=$('#numeroLectura').text();
        var noIntento=$('#noIntentoaumento').text();


      
       var cantidadPalabras=$('#palabrasLecturabd').text();
       //alert(cantidadPalabras);
       var segundos= $('#segundos').text();
       var minutos= $('#minutos').text();
       var guardarForm = document.getElementById("guardarCardLectura");


       

       if(minutos>=1){
        var minutosaSegundos=minutos*60;
      }else{
        var minutosaSegundos=0;
      }

      var tiempo=parseInt(segundos)+parseInt(minutosaSegundos);

                 

       var reconocimientoVoz = $("#span-preview").text();

          //calculo de palabras por minuto pasado el minuto y menor al minuto
       
       if(tiempo<=60){
          //var holgura=60-tiempo;
          
          velocidadLectoroa=((parseInt(cantidadPalabras)*60)/tiempo);
          Math.trunc(velocidadLectoroa);
          //alert("Su velocidad lectora es de "+velocidadLectoroa+" palabras por minuto");
       }else{
        velocidadLectoroa=((parseInt(cantidadPalabras)*60)/tiempo);
        Math.trunc(velocidadLectoroa);
          alert("Su velocidad lectora es de "+velocidadLectoroa+" palabras por minuto");
       }

       
    $("#NoLectura").val(Nolectura);   
    $("#intento").val(noIntento);
    $("#tiempo").val(tiempo);
    $("#velocidad").val(Math.trunc(velocidadLectoroa));
    $("#fluidez").val(reconocimientoVoz);


    $("#tNoLectura").text(Nolectura);   
    $("#tIntento").text(intento);
    $("#tTiempo").text(tiempo);
    $("#tVelocidad").text(Math.trunc(velocidadLectoroa));



    guardarForm.submit();
  
 }   



                    </script>




          
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../../static/lat-derecho.php'; $nivelll=2; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../../js/jquery-3.2.1.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>