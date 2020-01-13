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



//variables de niveles
$nivelPrimaria=1;
$nivelBasico=2;
$nivelDiver=3;



//funcion encargada de asignar imagen segun primer letra del nombre del curso
  $l='#2980b9';
  $m='#2980b9';
  $x='#2980b9';
  $j='#2980b9';
  $v='#2980b9';

if(date("l")=='Monday'){
$l='#2ecc71';
}

if(date("l")=='Tuesday'){
$l='#2ecc71';
}

if(date("l")=='Tuesday'){
$m='#2ecc71';
}

if(date("l")=='Wednesday'){
$x='#2ecc71';
}
if(date("l")=='Thursday'){
$j='#2ecc71';
}
if(date("l")=='Friday'){
$v='#2ecc71';
}


//obtenemos la semana actual
$noSemanaActual = date("W"); 
//Buscar Lectura Correspondiente al dia - Lecturas diarias
$semanaModificar=1; //tiene que ser igual a = $noSemanaActual;

$query1 = ("SELECT nombreLectura,noLecturaDiaria FROM atomolector where grado=:grado and semana=:semana");
$getLecturaDiaria = $dbConn->prepare($query1);
$getLecturaDiaria->bindParam(':grado', $_SESSION['grado'], PDO::PARAM_INT); 
$getLecturaDiaria->bindParam(':semana', $semanaModificar, PDO::PARAM_INT); 
$getLecturaDiaria->execute();
$hayLecturasDiarias=$getLecturaDiaria->rowCount();

if($hayLecturasDiarias==0){
  $_SESSION['lunesLectura']='Terminamos,bravo fue un año lector exitoso!!';
     $_SESSION['martesLectura']='Terminamos,bravo fue un año lector exitoso!!';
     $_SESSION['miercolesLectura']='Terminamos,bravo fue un año lector exitoso!!';
     $_SESSION['juevesLectura']='Terminamos,bravo fue un año lector exitoso!!';
     $_SESSION['viernesLectura']='Terminamos,bravo fue un año lector exitoso!!';
}

while ($lecturaDiaria=$getLecturaDiaria->fetch(PDO::FETCH_ASSOC)){
 
  switch ($lecturaDiaria['noLecturaDiaria']) {
   case 1:
     $_SESSION['lunesLectura']=$lecturaDiaria['nombreLectura'];

     break;
     case 2:
     $_SESSION['martesLectura']=$lecturaDiaria['nombreLectura'];

     break;
     case 3:
     $_SESSION['miercolesLectura']=$lecturaDiaria['nombreLectura'];
   
     break;
     case 4:
     $_SESSION['juevesLectura']=$lecturaDiaria['nombreLectura'];
     break;
     case 5:
     $_SESSION['viernesLectura']=$lecturaDiaria['nombreLectura'];
     break;

   
   default:
     
     break;
 }

}
//Buscar Lectura Correspondiente a la semana
$query2 = ("SELECT nombreLectura FROM atomolector where grado=:grado and noLecturaDiaria=0");
$getLecturasComprension = $dbConn->prepare($query2);
$getLecturasComprension->bindParam(':grado', $_SESSION['grado'], PDO::PARAM_INT); 
$getLecturasComprension->execute();
$hayLecturasDiarias=$getLecturasComprension->rowCount();

while ($lecturaComprension=$getLecturasComprension->fetch(PDO::FETCH_ASSOC)){
  @$p+=1;
  if($p==$semanaModificar){

  $_SESSION['comprensionSemanal']=	$lecturaComprension['nombreLectura'];
  //echo 'Semana'.$p.' Lectura------>'.$lecturaComprension['nombreLectura'].'<br>';
  }



}


//Buscar lecturas de velocidad correspondiente a la semana 
$query3 = ("SELECT nombreLectura FROM velocidadlectora where grado=:grado");
$getLecturaVelocidad = $dbConn->prepare($query3);
$getLecturaVelocidad->bindParam(':grado', $_SESSION['grado'], PDO::PARAM_INT); 
$getLecturaVelocidad->execute();
$hayLecturasDiarias=$getLecturaVelocidad->rowCount();

while ($lecturaVelocidadver=$getLecturaVelocidad->fetch(PDO::FETCH_ASSOC)){
  @$h+=1;
  if($h==$semanaModificar){

  $_SESSION['velocidadVer']=	$lecturaVelocidadver['nombreLectura'];
 // echo 'Semana'.$h.' Lectura Velocidad------>'.$lecturaVelocidadver['nombreLectura'].'<br>';
  }



}


 ?>



<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
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

 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php';  $nivel=1; directoriosNiveles($nivel); ?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
   
.cajaCards{
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  border-radius: 5px;
  height: 150px; 
  margin-bottom: 20px;
  padding-top: 10px;
  color: black;
                    }

   .cajaCards:hover{
box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
background: #642B73;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
color: white;
font-size: bold;
padding-top: 10px;

}
                 


/* card material design style*/
.card {
  display: inline-block;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  margin: 20px;
  position: relative;
  margin-bottom: 50px;
  transition: all .2s ease-in-out;
  text-decoration: none;
  color: black; 
  min-height: 250px;
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


/*timeline lecturas diarias*/


#timeline-wrap{
  margin:10% 20%;
  top:10;
  position:relative;
 
}

#timeline{
  height:2px;
  width: 130%;
  background-color:#2980b9;
  position:relative;
  margin-left: -10px;
  margin-top: -10px;
 
}

 .marker{
   z-index:1000;
   color: #fff;
  width: 35px;
  height:35px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  margin-left: -40px;
  background-color: #999999;
  border-radius: 50%;

        }

 .marker p {
  margin-top: -5px;

 }

 .marker:hover{
   -moz-transform: scale(1.2);
-webkit-transform: scale(1.2);
-o-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
   
   -webkit-transition: all 300ms ease;
-moz-transition: all 300ms ease;
-ms-transition: all 300ms ease;
-o-transition: all 300ms ease;
transition: all 300ms ease;
 }


.timeline-icon.one {
    background-color:<?php echo $l;?> !important;
}

.timeline-icon.two {
    background-color:<?php echo $m;?>!important;
}

.timeline-icon.three{
    background-color: <?php echo $x;?> !important;
}

.timeline-icon.four {
    background-color: <?php echo $j;?>!important;
}

.timeline-icon.five {
    background-color: <?php echo $v;?> !important;
}



.mfirst{
     top:-25px;
}

.m2{
     top:-25px;
      left:32.5%
}

.m3{
     top:-25px;
    left:66%
}


.mlast{
     top:-25px;
    left:100%
}

.timeline-panel {
  margin-top: 20%;
  width: 500px;
  height: 200px;
  background-color: #cbd0df;
  border-radius:2px;
  position:relative;
  text-align:left;
  padding:10px;
  font-size:20px;
  font-weight:bold;
  line-height:20px;
  float:left;
  display: none;
}

.timeline-panel:after {
  content:'';
  position:absolute;
  margin-top: -12%;
  left:10%;
  width:0;
  height:0;
  border:12px solid transparent;
  border-bottom: 15px solid #cbd0df;
}


/*chip material*/
.md-chip {
  display: inline-block;
  border-radius: 42px;
  padding: 0;
  height: 42px;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
  -webkit-transition: .2s ease-out;
          transition: .2s ease-out;
}

.md-chip:hover {
  box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
  cursor: pointer;
}

.md-chip-img .md-chip-span {
  display: block;
  height: 42px;
}

.md-chip-img {
  border-radius: 50%;
  width: 42px;
  height: 42px;
  overflow: hidden;
  float: left;
  box-shadow: 2px 0px rgba(0,0,0,.3);
}
.md-chip-text {
  display: inline-block;
  font-weight: 400;
  font-size: 16px;
  height: 42px;
  float: left;
  padding: 12px 18px 12px 10px;
  color: rgba(255, 255, 255, .87);
}
.pink {
  background-color: #E91E63;
}

.indigo {
  background-color: #3f51b5;
}
.md-chip {
  margin: 0 20px 20px 0px;
}


 </style>
<script type="text/javascript">
  //$(".timeline-panel").hide(0);

$("i").click(function() {
      $('.timeline-panel').show(0);
});
</script>

      <div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center">Átomo Lector</h3>
         </div>

 
            <h3 class="text-left" style="">Lecturas y Evaluaciones</h3><hr>
           

             <div class="row">
               
                <a href="../atomLector/lecturasDiarias.php?grado=<?php echo $_SESSION['grado']; ?>&curso=7">
                   <div class="col-md-4">
                    <div class="card">

                      <div class="image" >
                        <img  src="../img/lecturasDiarias.png" width="60%">
                      </div>

                      <div class="text">
                        <h3>Lecturas Diarias</h3>
                        <p style="text-align: left;">Antología de lecturas, compendio de lecturas adecuadas a la edad cognitiva del alumno.</p>

                      </div>
                       <div class="md-chip indigo">
                          <div class="md-chip-img">
                            <span class="md-chip-span pink">&nbsp;</span>
                          </div>
                          <span class="md-chip-text">Semana  <?php echo $noSemanaActual; ?> </span>
                        </div>
                              <div id="timeline-wrap">
                            <div id="timeline"></div>
                            
                            <!-- This is the individual marker-->
                            <div class="marker mfirst timeline-icon one">
                                <p title=" <?php echo $_SESSION['lunesLectura']; ?>">L</p>
                            </div>
                            <!-- / marker -->

                            <!-- This is the individual marker-->
                            <div class="marker m2 timeline-icon two">
                                <p title=" <?php echo $_SESSION['martesLectura']; ?>">M</p>
                            </div>
                            <!-- / marker -->

                              <!-- This is the individual panel-->
                            <div class="timeline-panel">
                              
                            </div>
                            <!-- / panel -->
                            
                            <!-- This is the individual marker-->
                            <div class="marker m3 timeline-icon three">
                              <p title=" <?php echo $_SESSION['miercolesLectura']; ?>">X</p>
                            </div>
                            <!-- / marker -->

                            
                            <!-- This is the individual marker-->
                            <div class="marker mlast timeline-icon four">
                             <p title=" <?php echo $_SESSION['juevesLectura']; ?>">J</p>
                            </div>
                            <!-- / marker -->

                             <!-- This is the individual marker-->
                            <div class="marker mlast timeline-icon five" style="margin-left: 5px;">
                             <p title=" <?php echo $_SESSION['viernesLectura']; ?>">V</p>
                            </div>
                            <!-- / marker -->                           
                          </div> 
                    </div>
                  </div> 
                </a>
                 <a href="../atomLector/comprensionLectora.php?gradoB=<?php echo $_SESSION['grado']; ?>&curso=7">
                  <div class="col-md-4" style="">
                    <div class="card">

                      <div class="image" >
                        <img  src="../img/programaLector.png" width="60%">
                      </div>

                      <div class="text">
                        
                        
                        <h3>Lecturas de Medición</h3>
                        <p style="text-align: left;">Pruebas diseñadas para desarrollar las competencias lectoras, y con ello mejorar el rendimiento académico.</p>

                      </div>
                      <div class="md-chip indigo">
                          <div class="md-chip-img">
                            <span class="md-chip-span pink">&nbsp;</span>
                          </div>
                          <span title="<?php echo  $_SESSION['comprensionSemanal']; ?>"  class="md-chip-text">Semana <?php echo $noSemanaActual; ?> </span>
                        </div>

                    </div>
                  </div>
              </a>
                 <a href="../atomLector/velocidadLectora.php?gradoB=<?php echo $_SESSION['grado']; ?>&curso=7">
                   <div class="col-md-4">
                    <div class="card">

                      <div class="image" >
                        <img  src="../img/velocidadLectora.png" width="60%">
                      </div>

                      <div class="text">
                        <h3>Fluidez y Velocidad Lectora </h3>
                        <p style="text-align: left;">Desarrolla la habilidad de leer con fluidez a grandes velocidades.</p>

                      </div>
                      <div class="md-chip indigo">
                          <div class="md-chip-img">
                            <span class="md-chip-span pink">&nbsp;</span>
                          </div>
                          <span title="<?php echo $_SESSION['velocidadVer']; ?>" class="md-chip-text">Semana <?php echo $noSemanaActual; ?> </span>
                        </div>

                    </div>
                  </div> 
                </a>
                                
              </div>

              <div>
                <h3 style="text-align: left;">Soy Creativo</h3>
                <hr>
                <a href="../atomLector/cofrePalabras.php?curso=7">
                   <div class="col-md-4">
                    <div class="card">

                      <div class="image" >
                        <img  src="../img/miCofre.png" width="60%" style="margin-left: -50px; margin-top: 30px;">
                      </div>

                      <div class="text">
                        <h3>Mi glosario</h3>
                        <p style="text-align: left;">Palabras que agrego a mi vocabulario</p>

                      </div>

                    </div>
                  </div> 
                </a>
                <a href="../atomLector/misTextos.php?gradoB=7">
                   <div class="col-md-4">
                    <div class="card">

                      <div class="image" >
                        <img  src="../img/misTextos.png" width="50%">
                      </div>

                      <div class="text">
                        <h3>Red de escritores</h3>
                        <p style="text-align: left;">Mi creatividad descrita en textos.</p>

                      </div>

                    </div>
                  </div> 
                </a>

              </div>      




            



     
          
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