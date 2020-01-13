<?php 
session_start();

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../../index.html');
}


require_once("../../conection/conexion.php") ;

  $pisa='pisa';
  $cnb='cnb';



      $q1 = ("SELECT * FROM atomolector where idLectura=:idLectura");
      $mostrarLectura=$dbConn->prepare($q1);
      $mostrarLectura->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT); 
      $mostrarLectura->execute();

      $_SESSION['gradoEnviar']=$_GET['idLectura'];

         //buscar id= cuestionario pisa y id CUestionario cnb para mostrar intentos por metodologia

             //--pisa   
                $q4= ("SELECT idCuestionario FROM cuestionario WHERE fundamento=:fundamento AND idLectura=:idLectura");

                $idPisa=$dbConn->prepare($q4);
                $idPisa->bindParam(':fundamento',$pisa, PDO::PARAM_INT);
                $idPisa->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
                $idPisa->execute();

                while(@$fila1=$idPisa->fetch(PDO::FETCH_ASSOC)){ 
                  $_SESSION['idPisa']=$fila1['idCuestionario'];
                  
                }

                //--cnb   
                $q4= ("SELECT idCuestionario FROM cuestionario WHERE fundamento=:fundamento AND idLectura=:idLectura");

                $idPisa=$dbConn->prepare($q4);
                $idPisa->bindParam(':fundamento',$cnb, PDO::PARAM_INT);
                $idPisa->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
                $idPisa->execute();
                
                while(@$fila1=$idPisa->fetch(PDO::FETCH_ASSOC)){ 
                  $_SESSION['idCnb']=$fila1['idCuestionario'];
                  
                }



   

//OBTENEMOS INTENTOS SEGUN PISA

      $q2 = ("SELECT * FROM registropruebacomprension as registro left join cuestionario on registro.idLectura=cuestionario.idLectura where cuestionario.idLectura=:idLectura and registro.idUsuario=:idUsuario and cuestionario.idCuestionario=:idCuestionario and registro.nivelObtenido!='' ");
      $buscarIntentosPisa=$dbConn->prepare($q2);
      $buscarIntentosPisa->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
        $buscarIntentosPisa->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $buscarIntentosPisa->bindParam(':idCuestionario',$_SESSION['idPisa'], PDO::PARAM_STR);  
      $buscarIntentosPisa->execute();
      $hayIntentos1=$buscarIntentosPisa->rowCount();
      

 //OBTENEMOS INTENTOS SEGUN CNB  
if($_GET['gradoB']==3){
 $q3 = ("SELECT * FROM registropruebacomprension3p as registro left join cuestionario on registro.idLectura=cuestionario.idLectura where cuestionario.idLectura=:idLectura and registro.idUsuario=:idUsuario and cuestionario.idCuestionario=:idCuestionario ");
      $buscarIntentosCnb=$dbConn->prepare($q3);
      $buscarIntentosCnb->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $buscarIntentosCnb->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);  
      $buscarIntentosCnb->bindParam(':idCuestionario',$_SESSION['idCnb'], PDO::PARAM_STR); 
      $buscarIntentosCnb->execute();
      $hayIntentos2=$buscarIntentosCnb->rowCount();
      $urlresultado='resultadoCnb3p.php';
}

if($_GET['gradoB']==4){
   $q3 = ("SELECT * FROM registropruebacomprension4p as registro left join cuestionario on registro.idLectura=cuestionario.idLectura where cuestionario.idLectura=:idLectura and registro.idUsuario=:idUsuario and cuestionario.idCuestionario=:idCuestionario ");
      $buscarIntentosCnb=$dbConn->prepare($q3);
      $buscarIntentosCnb->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $buscarIntentosCnb->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);  
      $buscarIntentosCnb->bindParam(':idCuestionario',$_SESSION['idCnb'], PDO::PARAM_STR); 
      $buscarIntentosCnb->execute();
      $hayIntentos2=$buscarIntentosCnb->rowCount();
      $urlresultado='resultadoCnb4p.php';

}
if($_GET['gradoB']==5){
   $q3 = ("SELECT * FROM registropruebacomprension5p as registro left join cuestionario on registro.idLectura=cuestionario.idLectura where cuestionario.idLectura=:idLectura and registro.idUsuario=:idUsuario and cuestionario.idCuestionario=:idCuestionario ");
      $buscarIntentosCnb=$dbConn->prepare($q3);
      $buscarIntentosCnb->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $buscarIntentosCnb->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);  
      $buscarIntentosCnb->bindParam(':idCuestionario',$_SESSION['idCnb'], PDO::PARAM_STR); 
      $buscarIntentosCnb->execute();
      $hayIntentos2=$buscarIntentosCnb->rowCount();
      $urlresultado='resultadoCnb5p.php';

}else{

     $q3 = ("SELECT * FROM registropruebacomprension as registro left join cuestionario on registro.idLectura=cuestionario.idLectura where cuestionario.idLectura=:idLectura and registro.idUsuario=:idUsuario and cuestionario.idCuestionario=:idCuestionario and registro.nivelObtenido IS NULL ");
      $buscarIntentosCnb=$dbConn->prepare($q3);
      $buscarIntentosCnb->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);
      $buscarIntentosCnb->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);  
      $buscarIntentosCnb->bindParam(':idCuestionario',$_SESSION['idCnb'], PDO::PARAM_STR); 
      $buscarIntentosCnb->execute();
      $hayIntentos2=$buscarIntentosCnb->rowCount();
       $urlresultado='resultadoCnb.php';

}
  //validamos si hay intentos en caso de que no halla mandamos incrementamos 1 
      


      if($hayIntentos1==0){
          $hayIntentos1=1;
      }else{
        $hayIntentos1+=1;

      }

      if($hayIntentos2==0){
         $hayIntentos2=1;

      }else{
        $hayIntentos2+=1;
      }

//cambiamos link para prueba cnb : aqui ya se incluye reconocimiento de voz
  if($_GET['gradoB']>=3){
    $rutaCnb='cnbReconocimiento.php';
  }else{
    $rutaCnb='cnb.php';
  }    
      
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
  .masCentrado{
    margin-left: 55%;
    margin-top: 70%;
  }

  .cajaDescripcion{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }
</style>






      <div class="col-md-8 col-xs-8 pag-center">

         <div class="col-md-12" style="margin-top: 60px;">
          <?php while(@$row1=$mostrarLectura->fetch(PDO::FETCH_ASSOC)){   ?>
              <h3 class="text-center">Lectura: <?php echo $row1['nombreLectura']; ?></h3><br> 
              <hr>
              <h4>Actividades Lectoras</h4>              
              <a href="pisa1p.php?noLectura=<?php echo $row1['idLectura']; ?>&intento=<?php echo $hayIntentos1; ?>" class="btn align-center botonAgg-1" style="color: white; background-color:#3498db; ">Prueba Comprensión - Segun Pisa</a>
              <a href="<?php echo $rutaCnb;?>?noLectura=<?php echo $row1['idLectura']; ?>&intento=<?php echo $hayIntentos2; ?>&gradoB=<?php echo $_GET['gradoB']; ?>" class="btn align-center botonAgg-1" style="color: white; background-color:#27ae60; ">Prueba Comprensión - Segun CNB</a>             
              <a href="glosario.php?noLectura=<?php echo $row1['idLectura']; ?>" class="btn align-center botonAgg-1" style="color: white; background-color:#ff4757; ">Mi vocabulario</a>
               <a href="cuentame.php?noLectura=<?php echo $row1['idLectura']; ?>" class="btn align-center botonAgg-1" style="color: white; background-color:#e67e22; ">Con tus palabras</a>
              <a href="personajes.php?noLectura=<?php echo $row1['idLectura']; ?>" class="btn align-center botonAgg-1" style="color: white; background-color:#f1c40f; margin-top: 10px; ">Identificar Personaje</a>
              <hr>
         </div>


 
<div class="row sectionDinamico masCentrado">
           <div class="col-md-11">
              <div class="flipbook-viewport">
                <div class="container">
                  <div class="flipbook">
                    <div style="background-image:url(<?php echo 'data:image/gif;base64,'.$row1['rutaPasta']; ?>)"></div>
                    <?php for($inc=1; $inc<=$row1['cantidadFicheros'];$inc++){ ?>
                    <div style="background-image:url(<?php echo "../../".$row1['rutaLectura']."/".$inc.".jpg";  ?>)"></div>
                  <?php } ?>
                    <div style="background-image:url(<?php echo "../../".$row1['rutaPasta']."/2.jpg"; ?>)"></div>
                  
                  </div>
                </div>
              </div>
  
        <?php  }?>

        </div>
 </div>

  <div  class="col-md-12 cajaDescripcion" style="margin-top: -220px;" >
              <h3 class="text-center">MIS INTENTOS SEGÚN PISA</h3><br>
               <table class="table table-hover" >
                    <thead>
                      <tr>
                        <th style="text-align: center;">Intento</th>
                        <th style="text-align: center;">Nivel Obtenido</th>
                        <th style="text-align: center;">Fecha Registro</th>
                        <th style="text-align: center;">Ver Detalles</th>
                      </tr>
                    </thead>
                    <tbody>

                       <?php if($hayIntentos1==0){ ?>
                         <tr>      
                        <td colspan="4">¡No hay Intentos! </td>
 
                      </tr>

                       <?php  }else{ while($row2=$buscarIntentosPisa->fetch(PDO::FETCH_ASSOC)){
                          @$i+=1;
                        ?>
                      <tr style="text-align: center;">      
                        <td><?php echo $i; ?></td>
                        <td ><?php echo $row2['nivelObtenido']; ?></td>
                        <td><?php echo $row2['fechaRegistro']." ".$row2['horaRegistro']; ?></td>
                        <td><a href="resultado.php?intentoABuscar=<?php echo $row2['idRegistro'];?>&idLectura=<?php echo $row2['idLectura']; ?>&idUsuario=<?php echo $_SESSION['idUsuario'];?>&intento=<?php echo $i; ?>" class="btn botonAgg-1" style="color: white; background-color: #2ecc71;">Ver</a></td>   
                      </tr>
                    <?php    } }  ?>
                    </tbody>
                  </table>
         </div>

         <div  class="col-md-12 cajaDescripcion" style="margin-top: 20px; margin-bottom: 50px;" >
              <h3 class="text-center">MIS INTENTOS SEGÚN CNB</h3><br>
               <table class="table table-hover" >
                    <thead>
                      <tr style="text-align:center;">
                        <th>Intento</th>
                        <th>Punteo Obtenido</th>
                        <th>Fecha Registro</th>
                        <th>Ver Detalles</th>
                      </tr>
                    </thead>
                    <tbody>

                       <?php if($hayIntentos2==0){ ?>
                         <tr>      
                        <td colspan="4">¡No hay Intentos! </td>
 
                      </tr>

                       <?php  }else{ while($row3=$buscarIntentosCnb->fetch(PDO::FETCH_ASSOC)){
                          @$e+=1;
                        ?>
                      <tr style="text-align: center;">      
                        <td><?php echo $e; ?></td>
                        <td><?php echo $row3['totalObtenido']; ?></td>
                        <td><?php echo $row3['fechaRegistro']." ".$row3['horaRegistro']; ?></td>
                        <td><a href="<?php echo $urlresultado; ?>?intentoABuscar=<?php echo $row3['idRegistro'];?>&idLectura=<?php echo $row3['idLectura']; ?>&idUsuario=<?php echo $_SESSION['idUsuario'];?>&intento=<?php echo $e; ?>" class="btn botonAgg-1" style="color: white; background-color: #2ecc71;">Ver</a></td>   
                      </tr>
                    <?php    } }  ?>
                    </tbody>
                  </table>
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
            startArtyom();
            artyom.say("Veo que tienes dudas al momento de leer tus resultados. Estoy para servirte yo te explicare. En la primer caja llamada Datos de Lectura encontraras tus datos, la fecha y la hora en la que realizaste la prueba, en el recuadro que tiene por nombre, Nivel obtenido en la escala Pisa, está tú resultado total, esté es el nivel que alcanzaste, si quieres saber que destrezas posees dale clic.Por favor baja un poco hasta ver El enunciado Detalle de resultado. Este es el detalle de la prueba que realizaste, se detalla cada pregunta y no solo eso, también detalla si obtuviste los créditos estarán de color verde si los obtuviste y de color rojo si no lo obtuviste, aquí no se manejan puntos son créditos que obtienes según tú nivel. Te pediré de favor que bajes con el maus, Si bajas hasta encontrar los gráficos este detallara que capacidades lograste de una manera mas visual. Espero halla resuelto tus dudas.");
            finAsistente();

          }


        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }    

//FUNCIONES PARA EBOOK
function loadApp() {

  // Create the flipbook

  $('.flipbook').turn({
      // Width

      width:800,
      
      // Height

      height:500,

      // Elevation

      elevation: 20,
      
      // Enable gradients

      gradients: true,
      
      // Auto center this flipbook

      autoCenter: true

   
  });





}

// Load the HTML4 version if there's not CSS transform

yepnope({
  test : Modernizr.csstransforms,
  yep: ['../turn/lib/turn.js'],
  nope: ['../turn/lib/turn.html4.min.js'],
  both: ['../css/basic.css'],
  complete: loadApp
});

  </script>
          
    
        </div>

<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../../static/lat-derecho.php';  $nivelll=2; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>