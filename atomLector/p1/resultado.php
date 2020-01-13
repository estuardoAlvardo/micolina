<?php 
session_start();


//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../../index.html');
}


$fundamento="pisa";

if(empty($_SESSION['grado'])){


$gradoPisa=$_GET['gradoB'];

}else{

$gradoPisa=$_SESSION['grado'];

}

switch ($gradoPisa) {
  case 1:
    
    $estandarEvaluado='1B';
    $inicioEstandar=262;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
       
   break;

   case 2:
    
    $estandarEvaluado='1A';
    $inicioEstandar=335;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
    break;

    

    case 3:
    $estandarEvaluado='2';
    $inicioEstandar=407;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
    break;

     case 4:
    $estandarEvaluado='3';
    $inicioEstandar=480;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
    break;

    case 5:
    $estandarEvaluado='4';
    $inicioEstandar=553;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
    break;

    case 6:
    $estandarEvaluado='5';
    $inicioEstandar=626;
    $cantidadPreguntas=10;
    //rangos para verificacion;
    $rangosinicial=$inicioEstandar;
    break;
  
  default:
    # code...
    break;
}




require("../../conection/conexion.php");
$_GET['idLectura'];
$_GET['idUsuario'];
@$_GET['intentoABuscar'];
@$_GET['intento'];

if(@$_GET['intentoABuscar']!=null){
$_GET['idLectura'];
$_GET['idUsuario'];
@$_GET['intento'];
@$_GET['intentoABuscar'];


$_SESSION['ultimoIntento']=$_GET['intentoABuscar'];
}else if(@$_GET['intentoABuscar']==null){
@$_GET['intento']=1;

//buscar el ultimo intento insertado;
$sq1 = ("SELECT idRegistro  FROM registropruebacomprension where idUsuario=:idUsuario order by idRegistro desc limit 1");
    $obtenerIntento = $dbConn->prepare($sq1);
     $obtenerIntento->bindparam(':idUsuario',$_GET['idUsuario']);
    $obtenerIntento->execute();
     while(@$row1=$obtenerIntento->fetch(PDO::FETCH_ASSOC)){

    $_SESSION['ultimoIntento']=$row1['idRegistro'];
       }

    }
   
      
      //obtenemos todos los datos  
     $sq2 = ("SELECT  * from registropruebacomprension as registro join atomolector as lectura on  registro.idLectura=lectura.idLectura join cuestionario as cues on cues.idLectura =registro.idLectura join itemopcionmultiple as preguntas on preguntas.idCuestionario=cues.idCuestionario where registro.idRegistro=:idRegistro and cues.fundamento=:fundamento");
      $obtenerItems = $dbConn->prepare($sq2);
      $obtenerItems->bindparam(':idRegistro',$_SESSION['ultimoIntento'],PDO::PARAM_INT);  
      $obtenerItems->bindparam(':fundamento',$fundamento,PDO::PARAM_STR); 
      $obtenerItems->execute();

     //obtenemos datos para detalle
      $sq3 = ("SELECT  * from registropruebacomprension as registro join atomolector as lectura on  registro.idLectura=lectura.idLectura join cuestionario as cues on cues.idLectura =registro.idLectura join itemopcionmultiple as preguntas on preguntas.idCuestionario=cues.idCuestionario where registro.idRegistro=:idRegistro limit 1");
      $obtenerDetalle = $dbConn->prepare($sq3);
      $obtenerDetalle->bindparam(':idRegistro',$_SESSION['ultimoIntento']);  
      $obtenerDetalle->execute();

      //para graficos indicadores de logro
       $sq4 = ("SELECT  * from registropruebacomprension as registro join atomolector as lectura on  registro.idLectura=lectura.idLectura join cuestionario as cues on cues.idLectura =registro.idLectura join itemopcionmultiple as preguntas on preguntas.idCuestionario=cues.idCuestionario where registro.idRegistro=:idRegistro and cues.fundamento=:fundamento");
      $detalleGrafico  = $dbConn->prepare($sq4);
      $detalleGrafico->bindparam(':idRegistro',$_SESSION['ultimoIntento'],PDO::PARAM_INT);
      $detalleGrafico->bindparam(':fundamento',$fundamento,PDO::PARAM_STR);   
      $detalleGrafico->execute();

   
      //consulta para ver la escala que corresponde
        $sq5 = ("SELECT  * from registropruebacomprension as registro join atomolector as lectura on  registro.idLectura=lectura.idLectura join cuestionario as cues on cues.idLectura =registro.idLectura join itemopcionmultiple as preguntas on preguntas.idCuestionario=cues.idCuestionario where registro.idRegistro=:idRegistro and cues.fundamento=:fundamento");
      $detalleEscala  = $dbConn->prepare($sq5);
      $detalleEscala->bindparam(':idRegistro',$_SESSION['ultimoIntento'],PDO::PARAM_INT);
      $detalleEscala->bindparam(':fundamento',$fundamento,PDO::PARAM_STR);   
      $detalleEscala->execute();


 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Resultados PISA</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
    <script src='../../js/jquery.min.js'></script>
    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  
  <script src="../../js/artyom/jquery-3.1.1.js"></script>
  <script src="../../js/artyom/artyom.min.js"></script>
  <script src="../../js/artyom/artyom.window.js"></script>
  <script src="../../js/artyom/artyomCommands.js"></script>


  <!-- libreria de graficos -->
<script src="../graficos/code/highcharts.js"></script>
<script src="../graficos/code/highcharts-3d.js"></script>
<script src="../graficos/code/modules/cylinder.js"></script>
<script src="../graficos/code/modules/exporting.js"></script>
<script src="../graficos/code/modules/export-data.js"></script>
<!-- libreria de graficos FIN -->


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
  background-color:#3498db;
  color: black;
  height: 30px;
  border-radius: 5px;
  padding-top: 5px;
  color: white;
}

.botonAgg-1:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
  color: white;

}
  
.cajaDescripcion{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }


/*radio butons estilos*/



@font-face {
  
 
}
/* aqui va el estilo que tendra el clock */

/*estilos detalle Lectura*/

.textCajaDetalle{
  text-align: left;
}

.card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}


 </style>


	<div class="col-md-8 col-xs-8 pag-center">
      <div class="col-md-12" style="">
          <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div></div>


         <div class="col-md-12" style="margin-top: 60px;">
              <h3 class="text-center">Resultado Prueba según Estándares Pisa </h3><br>
              <a href="../comprensionLectora.php?gradoB=<?php echo $_SESSION['gradoEnviar']; ?>" class="btn botonAgg-1" style="color: white; background-color: #3498db;">Mis Lecturas</a>
             
              <div class="col-md-12 cajaDescripcion" style="min-height:200px; margin-top: 20px;">
                <?php  while(@$row4=$obtenerDetalle->fetch(PDO::FETCH_ASSOC)){
                       $_SESSION['gradoEnviar']=$row4['grado'];
                       

                    $_SESSION['nivelObtenido']=$row4['nivelObtenido'];
                 ?>
                <h4>Datos de Lectura</h4>
                <h4 class="textCajaDetalle">Lectura: <span><?php echo $row4['nombreLectura']; ?></span></h4>
                <h4 class="textCajaDetalle">Intento: <span><?php echo  $_GET['intento']; ?></span></h4>
                <h4 class="textCajaDetalle">Alumno: <span><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']; ?></span></h4>
                <h4 class="textCajaDetalle">Tiempo En la Prueba: <span><?php echo $row4['tiempo'].'min'; ?></span></h4>
                <h4 class="textCajaDetalle">Fecha de Registro: <span><?php echo $row4['fechaRegistro']; ?></span></h4>
                <h4 class="textCajaDetalle">Hora Registro: <span><?php echo $row4['horaRegistro']; ?></span></h4>

              </div>
              <?php } ?>
         </div>

         <div class="col-md-4 cajaDescripcion" style="min-height: 200px; margin-top: 30px; margin-left: 35%; background:-webkit-gradient(radial, 220 0, 0, 165 173, 468, from(#8E4D61), to(#05455E));
 border-radius: 5px; color:white; margin-bottom: 50px;">
          <h4>Estándar PISA evaluado</h4>

          <div class="col-md-12 botonAgg-1" style="margin-left:23%; height: 150px; width: 150px; border-radius: 100%; background-color: #3498db; padding-top: 15px;">
            <h1 style="font-size: 48pt;"><?php echo $estandarEvaluado; ?></h1>
          </div>           
         </div> 
         

<!--  NIVEL OBTENIDO DEL ESTÁNDAR EVALUADO INICIO----->
 <div class="col-md-12" style="margin-bottom: 50px;">   

        <table class="table table-hover">       
          <thead>
            <tr>
              <th colspan="11" style="text-align: center;">Subescala de medición</th>
            </tr>
            <tr>

             <th colspan="4" style="text-align: center;"> Necesita mejorar</th>
             <th colspan="3" style="text-align: center;"> Intermedio</th>
             <th colspan="3" style="text-align: center;"> Estándar</th>
                      
            </tr>
          </thead>
           <tbody>
               <tr> 
                 <td class="" style="background-color:#B71C1C;color: white;"><?php echo $inicioEstandar; ?></td>
               <?php 
               
                while(@$row5=$detalleEscala->fetch(PDO::FETCH_ASSOC)){ 
                @$n+=1;

               if($row5['rPregunta'.$n]==$row5['respuestaCorrecta']){ $punteoNew=$row5['punteoItem'];
               @$sumaEscala+=$row5['punteoItem'];
               @$porcentaje+=10;
               }else{
                @$sumaEscala+=0;

               } 
                
                if($n==1){
                $inicioEstandar+=8 ;

              }
              if($n>=2 and $n<=5){
                $inicioEstandar+=8;
          

              }
              if($n>=6 and $n<=8){
                $inicioEstandar+=7;
              }
              if($n>=9 and $n<=10){
                $inicioEstandar+=6;
              }

                
                $tSuma=$sumaEscala+$rangosinicial;
                


               
             

                  //Mandar color en base a nivel de items
               switch ($n) {
              
                 case 1:
                   $color='#B71C1C';
                   

                   echo '<td class="" style="background-color:'.$color.';color: white;">'.$inicioEstandar.'</td>';

                   break; 
                 
                 case 2:
                   $color='#C62828';
                   
                   echo '<td class="" style="background-color:'.$color.';color: white;'.@$estilos2.'">'.$inicioEstandar.'</td>';
                   break;
                 case 3:
                   $color='#E53935';
                 
                   echo '<td class="" style="background-color:'.$color.';color: white;'.@$estilo3.'">'.$inicioEstandar.'</td>';
                   break;
                 case 4:
                   $color='#F57C00';
                   
                   echo '<td class="" style="background-color:'.$color.';color: white;'.@$estilo4.'">'.$inicioEstandar.'</td>';
                   break;
                 case 5:
                   $color='#FB8C00';
                   
                   echo '<td class="" style="background-color:'.$color.';color: white;'.@$estilo5.'">'.$inicioEstandar.'</td>'; 
                   break; 
                 case 6:
                   $color='#FF9800';
                  
                  echo '<td class="" style="background-color:'.$color.';color: white;">'.$inicioEstandar.'</td>'; 
                   break;
                case 7:
                   $color='#42A5F5';
                  
                   echo '<td class="" style="background-color:'.$color.';color: white;">'.$inicioEstandar.'</td>'; 
                   break; 
                  case 8:
                   $color='#2196F3';
                 
                   echo '<td class="" style="background-color:'.$color.';color: white;">'.$inicioEstandar.'</td>';  
                   break;
                 case 9:
                   $color='#1E88E5';
                   
                   echo '<td class="" style="background-color:'.$color.'; color: white;">'.$inicioEstandar.'</td>'; 
                   break; 
                  case 10:
                   $color='#1976D2';
                   
                   echo '<td class="" style="background-color:'.$color.'; color: white;">'.$inicioEstandar.'</td>'; 
                   break;


                 default:
                   # code...
                   break;
               }





              }

             
                ?>
                

                           
              </tr>

    </table>
    <div class="progress-bar bg-success" role="progressbar"  style="width: <?php echo $porcentaje.'%'; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo 'Mi resultado '.$porcentaje."%"; ?> </div>
</div>  
<!--  NIVEL OBTENIDO DEL ESTÁNDAR EVALUADO FIN----->

         <div class="col-md-12 cajaDescripcion" style="margin-bottom: 50px;">
          <h4>Solucionario Reactivos PISA</h4>
          <table class="table table-hover">
              <thead>
                <tr>
                 <th scope="col">No Pregunta</th>
                  <th scope="col">Pregunta</th>
                  <th scope="col">Respuesta Correcta</th>
                  <th scope="col">Tú respuesta</th>
                  <th scope="col">Proceso Evaluado</th>
                  <th scope="col">Capacidad</th>
                  <th scope="col">Punto de cada pregunta</th>
                  <th scope="col">Tus Puntos</th>
                  
                </tr>
              </thead>
              <tbody>
          <?php  while(@$row3=$obtenerItems->fetch(PDO::FETCH_ASSOC)){ 
              //variable session sirve para regresar al catalog de lecturas enviarmos como parametro get
           @$i+=1;
            ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $row3['pregunta']; ?></td>
                  <td><?php $respuestConcatenada="respuesta".$row3['respuestaCorrecta']; echo $row3[$respuestConcatenada]; ?></td>
                  <td><?php if($row3['rPregunta'.@$i]==$row3['respuestaCorrecta']){@$respuestConcatenada="respuesta".@$row3['respuestaCorrecta'];  echo @$row3[$respuestConcatenada]; }else{@$respuestConcatenada="respuesta".@$row3['rPregunta'.@$i]; echo @$row3[$respuestConcatenada];  } ?></td>
                   <td><?php echo $row3['capacidad']; ?></td>
                   <td><?php echo $row3['objetivoItem']; ?></td>
                   <td><?php echo $row3['punteoItem']; ?></td>
                   <td><?php  if($row3['rPregunta'.$i]==$row3['respuestaCorrecta']){ $punteoNew=$row3['punteoItem'];     ?> 

                   <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><?php echo $punteoNew; ?>

                   <?php  }else{ $punteoNew=0;     ?>
                    <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #e74c3c; margin-top:0px; margin-left:0px;" ><?php echo $punteoNew; ?>

                  <?php } ?>


                   </td>
                   
                </tr>

      <?php } ?>
                
              </tbody>
            </table>
           
         </div>

         <div class="row" style="margin-top: 30px;">
            <div class="col-md-1"></div>
         <div id="container" class="col-md-9 cajaDescripcion" style="margin-bottom: 30px;"></div>
          
 </div>
         
  
 




<script language="Javascript"  type="text/javascript">
   
   //graficos pisa

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
        text: 'Grafico de Proceso PISA'
    },
    subtitle: {
        text: 'Capacidades Lectoras'
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Puntos según - Pisa'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> en total<br/>'
    },

    "series": [
        {
            "name": "Capacidades Lectoras",
            "colorByPoint": true,
            "data": [
    <?php while(@$row6=$detalleGrafico->fetch(PDO::FETCH_ASSOC)){
      @$e+=1;
      if($row6['rPregunta'.$e]==$row6['respuestaCorrecta']){ $punteoNew=100;  }else{ $punteoNew=0; }
     

                  echo '{ "name": "'.$row6['capacidad'].'",
                  "y":'.$punteoNew.',
                  "drilldown": "Lectura" },';
                 }
                 ?>
                
                   
                
               

            ]


        }
    ]
});      //fin graficos pisa

 


  
//ia 

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
            startArtyom();
            artyom.say("Veo que tienes dudas al momento de leer tus resultados. Estoy para servirte yo te explicare. En la primer caja llamada Datos de Lectura encontraras tus datos, la fecha y la hora en la que realizaste la prueba, en el recuadro que tiene por nombre, Nivel obtenido en la escala Pisa, está tú resultado total, esté es el nivel que alcanzaste, si quieres saber que destrezas posees dale clic.Por favor baja un poco hasta ver El enunciado Detalle de resultado. Este es el detalle de la prueba que realizaste, se detalla cada pregunta y no solo eso, también detalla si obtuviste los créditos estarán de color verde si los obtuviste y de color rojo si no lo obtuviste, aquí no se manejan puntos son créditos que obtienes según tú nivel. Te pediré de favor que bajes con el maus, Si bajas hasta encontrar los gráficos este detallara que capacidades lograste de una manera mas visual. Espero halla resuelto tus dudas.");
            finAsistente();

          }


        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
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