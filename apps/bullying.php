<?php 
session_start();

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}



$curso="Matemáticas";
$curso="";
$leccionRealizada=1; // varaiable dependera del uso en la base de datos
$leccionPendiente=4; // variable dependera del uso en la bd 

require("../conection/conexion.php");

$_SESSION['idUsuario'];



 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Bullyng</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- CDN PARA BOTONES DE EXPORTACION -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
    
 <!-- jquery funcional -->
    <script src='../js/jquery.min.js'></script>

  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php';  $nivell=1; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
.botonAgg {
  background: #fff;
  border-radius: 10px;
  display: inline-block;
  margin: 1rem;
  position: relative;
  
}
.botonAgg-1 {
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}

.botonAgg-1:hover {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.sombra{
   box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

.card-3 {
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}

 </style>



 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style=" margin-bottom: 50px;">
              <h3 class="text-center">Alerta!! Bullying</h3>
         </div>

         <div class="col-md-12 sombra" style="min-height:700px; margin-left:0px; margin-right: 70px; margin-bottom: 50px;">
          <h4 style="text-align: left; margin-top: 30px;">Ayudate a ti y a tus compañeros de salón, <strong>estos mensajes son anonimos</strong>, selecciona a continuacion el tipo de bullying que viste en tu salon o colegio. </h4>
          <video src="../img/bullying.mp4" style="margin-top: 20px; border-radius: 5px;" height="300" width="500" controls autoplay loop>
            
          </video>
          <br><br><br>
          <div class="botonAgg col-md-12 sombra" style="height: 30px; margin-left: -3px; background-color: #2980b9 ;" ></div>
          <h3>¿Que tipo de Bullying quieres denunciar?</h3>
          <form action="bullyingReportes.php" method="post">
                    <div class="col-md-1 item" >
                        <div class="img-responsive sinfondo" id="1" onclick="tipoAgresion(this.id);"> 
                          <img class="img-fondo" src="../img/bull1.png" style="border-radius: 15px;">
                        </div> 
                        <strong><p class="txt-fuente">Exclusion social</p></strong>
                   </div>
                    <div  class="col-md-1 item">
                        <div class="img-responsive sinfondo" id="2" onclick="tipoAgresion(this.id);" > 
                          <img class="img-fondo" src="../img/bull3.png" style="border-radius: 15px;" >
                        </div> 
                        <strong><p class="txt-fuente">Agresión Verbal</p></strong>
                   </div>         
                   <div class="col-md-1 item">
                        <div class="img-responsive sinfondo" id="3" onclick="tipoAgresion(this.id);"> 
                          <img class="img-fondo" src="../img/bull4.png" style="border-radius: 15px;">
                        </div> 
                        <strong><p class="txt-fuente">Agresión Indirecta</p></strong>
                   </div>
                    <div class="col-md-1 item">
                        <div class="img-responsive sinfondo" id="4" onclick="tipoAgresion(this.id);"> 
                          <img class="img-fondo" src="../img/bull2.png" style="border-radius: 15px;">
                        </div> 
                        <strong><p class="txt-fuente">Agresión Fisica Directa</p></strong>
                   </div>
                    <div class="col-md-1 item">
                        <div class="img-responsive sinfondo" id="5" onclick="tipoAgresion(this.id);"> 
                          <img class="img-fondo" src="../img/bull6.png" style="border-radius: 15px;">
                        </div> 
                        <strong><p class="txt-fuente">Amenazas</p></strong>
                   </div>
                   <div class="col-md-1 item">
                        <div class="img-responsive sinfondo" id="6" onclick="tipoAgresion(this.id);"> 
                          <img class="img-fondo" src="../img/bull7.png" style="border-radius: 15px;">
                        </div> 
                        <strong><p class="txt-fuente">Ciberbullying o ciberacoso</p></strong>
                   </div>
                 <div style="display: none;">
                   <input id="b1" type="radio" name="tipoBullying" value="1">1
                   <input id="b2" type="radio" name="tipoBullying" value="2">2
                   <input id="b3" type="radio" name="tipoBullying" value="3">3
                   <input id="b4" type="radio" name="tipoBullying" value="4">4
                   <input id="b5" type="radio" name="tipoBullying" value="5">5
                   <input id="b6" type="radio" name="tipoBullying" value="6">6
                 </div>
                 <p class="botonAgg botonAgg-1" id="queEligio" style="padding:5px; background-color:#7f8c8d;  margin-top: 50px; transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1); color:white;">Ningun Tipo de bullyin seleccionado!</p>

                  
                   <input class="col-md-12 form-control" type="text" name="nombreCompanero" placeholder="Escribe el nombre de la victima" style="margin-top: 10px;">
                    <input class="col-md-12 form-control" type="text" name="gradoSeccion1" placeholder="Escribe el grado y seccion de la victima" style="margin-top: 10px;">
                   <input class="col-md-12 form-control" type="text" name="nombreAgresor" placeholder="Escribe el nombre del agresor" style="margin-top: 10px;">
                   <input class="col-md-12 form-control" type="text" name="gradoSeccion2" placeholder="Escribe el grado y sección del agresor" style="margin-top: 10px;">
                    <textarea class="col-md-12 form-control" type="text" name="descripcion" placeholder="Describe que es lo que pasa" style="margin-top: 10px;"></textarea>
                  <br><br><br><br>
                   <input class="btn btn-default botonAgg botonAgg-1" type="submit" style="margin-left:600px;background-color: #c0392b; color: white; border:white; margin-top: 20px;" value="Denunciar">

                   <br><br>
                   <div class="" style="border:3px dashed pink; min-height: 100px; margin-bottom: 50px;">
                     <h1> Gracias :) <br>
                     Por un mundo estudiantil sin Bullying.
                     </h1>
                   </div>


              </form>

         </div>
         


       
     
             
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../static/lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll);?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>

    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
         
function tipoAgresion(clicked_id){
  var idNew=clicked_id;
  //alert(idNew);

    if(idNew==1){ 
    var  notificar="Seleccionado: Exclusion Social";     
      $('input:radio[name=tipoBullying]')[0].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");

    }
    if(idNew==2){      
      var  notificar="Seleccionado: Agresion Verbal"; 
      $('input:radio[name=tipoBullying]')[1].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");
    }
    if(idNew==3){      
      var  notificar="Seleccionado: Agresion Indirecta"; 
      $('input:radio[name=tipoBullying]')[2].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");
    }
    if(idNew==4){ 
    var  notificar="Seleccionado: Agresion Fisica";      
      $('input:radio[name=tipoBullying]')[3].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");
    }
    if(idNew==5){  
    var  notificar="Seleccionado: Amenazas";     
      $('input:radio[name=tipoBullying]')[4].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");
    }
    if(idNew==6){ 
    var  notificar="Eligio Ciberbullyng";      
      $('input:radio[name=tipoBullying]')[5].checked = true;
      $('#queEligio').text(notificar);
      $('#queEligio').css("background-color","#27ae60");
       $('#queEligio').css("color","white");
    }


}

</script>
  </body>
</html>