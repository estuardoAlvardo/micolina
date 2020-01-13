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
  $_GET['noLectura'];
  $_GET['intento'];
  $_GET['gradoB'];

  $fundamento="cnb";
  $sq1 = ("SELECT *  FROM atomolector as lectura join cuestionario as cues on lectura.idLectura=cues.idLectura join itemopcionmultiple as item on item.idCuestionario=cues.idCuestionario where lectura.idLectura=:idLectura AND fundamento=:fundamento");
    $obtenerCuestionario = $dbConn->prepare($sq1);
    $obtenerCuestionario->bindparam(':idLectura', $_GET['noLectura'],PDO::PARAM_INT);
    $obtenerCuestionario->bindparam(':fundamento', $fundamento,PDO::PARAM_STR);
     $obtenerCuestionario->execute();
    $consulta=$obtenerCuestionario->rowCount();
    
   
   $sql2=("SELECT *  FROM atomolector as lectura join cuestionario as cues on lectura.idLectura=cues.idLectura join itemopcionmultiple as item on item.idCuestionario=cues.idCuestionario where lectura.idLectura=:idLectura limit 1");
   $obtenerDatosLectura = $dbConn->prepare($sql2);
     $obtenerDatosLectura->bindparam(':idLectura', $_GET['noLectura']);
    $obtenerDatosLectura->execute();
    

    if($_GET['gradoB']==3){
        //url para insertar bd
      $urlCalificar='controllador/calificarCnbReconocimiento.php';
    }else{
       $urlCalificar='controllador/calificarCnb.php';
    }

    if($_GET['gradoB']==4){
         //url para insertar bd
       $urlCalificar='controllador/calificarCnbReconocimiento4p.php';
    }

    if($_GET['gradoB']==5){

      $urlCalificar='controllador/calificarCnbReconocimiento5p.php';
    }
     if($_GET['gradoB']==6){

      $urlCalificar='controllador/calificarCnbReconocimiento6p.php';
    }
      
    // echo $urlCalificar; 

 ?>
    

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
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

/*estilos radiobutton*/


/* Variables
–––––––––––––––––––––––––––––––––––––––––––––––––– */
:root {
  --colorfondo-c: #2980b9;
  --primary-c: #74b9ff;
  --secondary-c: #74b9ff;
  --tercery-c: #74b9ff;
  --fort-c: #74b9ff;
  
  --white: #FDFBFB;
  
  --text: #082943;  
  --bg: var(--colorfondo-c);
}
ul {
  list-style-type: none;
  padding-left: 50px;
  margin: 0;
}

li {
  display: block;
  position: relative;
  padding: 20px 0px;
}

h2 {
  margin: 10px 0;
  font-weight: 900;
}


/* Card
–––––––––––––––––––––––––––––––––––––––––––––––––– */
.card {
  display: flex;
  flex-direction: column; 
  background: var(--white);
 
  padding: 20px 25px;
  border-radius: 20px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  margin-top: 20px;
  text-align: left;

}


/* Radio Button
–––––––––––––––––––––––––––––––––––––––––––––––––– */
input[type=radio] {
  position: absolute;
  visibility: block;
  margin-left: -45px; 
  z-index: 6;
  width:30px;height:30px;
  opacity: 0;
  cursor: pointer;
}



.check {
  width: 40px; height: 40px;
  position: absolute;
  border-radius: 50%;
  transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);


}

.check:hover{
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
}

input:hover  ~ .check {
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
}

/* Reset */
input#one ~ .check { 
  transform: translate(-50px, -30px); 
  background: var(--primary-c); 

}
input#two ~ .check { 
  transform: translate(-50px,-30px); 
  background: var(--secondary-c);
  
}
input#tree ~ .check { 
  transform: translate(-50px, -30px); 
  background: var(--tercery-c);
  
}
input#fort ~ .check { 
  transform: translate(-50px, -30px); 
  background: var(--fort-c);
  
  
}

/* Radio Input #1 */
input#one:checked ~ .check { transform: translate(-50px, -35px); 
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background: var(--colorfondo-c);



}
input#one:checked ~ label  {
  padding:5px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
  color: white;
  border-radius: 10px;


}


/* Radio Input #2  */
input#two:checked ~ .check { transform: translate(-50px, -35px);
box-shadow: 0 6px 12px rgba(33, 150, 243, 0.35);
  background: var(--colorfondo-c);
}

input#two:checked ~ label  {
  padding:5px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
  color: white;
  border-radius: 10px;


}

/* Radio Input #3  */

input#tree:checked ~ .check { transform: translate(-50px, -35px);
  box-shadow: 0 6px 12px rgba(33, 150, 243, 0.35);
  background: var(--colorfondo-c);
  
  

}
input#tree:checked ~ label  {
  padding:5px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
  color: white;
  border-radius: 10px;


}

/* Radio Input #4  */

input#fort:checked ~ .check { transform: translate(-50px, -35px);
  box-shadow: 0 6px 12px rgba(33, 150, 243, 0.35);
  background: var(--colorfondo-c);

}
input#fort:checked ~ label  {
  padding:5px;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
  background-color: #3498db;
  color: white;
  border-radius: 10px;


}







 </style>



	<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="margin-top: 60px;">
              <h3 class="text-center">Test Comprensión Lectora</h3><br>
              
         </div>
         <?php while(@$row2=$obtenerDatosLectura->fetch(PDO::FETCH_ASSOC)){  
 
 ?>
      <div class="col-md-12 cajaDescripcion" style="min-height:100px; text-align: left; border-radius: 5px;">

        <h4 style="text-align: center; font-weight: bold;">Datos de la lectura</h4>
        <h4 style="font-weight: bold;">Nombre Lectura:<span  style="font-weight: normal;"> <?php echo '"'.$row2['nombreLectura'].'"'; ?></span></h4>
        <p id="idLectura" style="display: none;"><?php echo $row2['idLectura']; ?></p>
        <h4 style="font-weight: bold;">Tipo Lectura: <span  style="font-weight: normal;"><?php echo $row2['tipoLectura']; ?></span> </h4>
        <h4 style="font-weight: bold;">Nombre Alumno: <span style="font-weight: normal;"><?php echo strtoupper($_SESSION['nombre'])." ".strtoupper($_SESSION['apellido']); ?></span> </h4>
        <div style="border:0px  pink; margin-bottom: 30px; margin-top: -50px; ">
            <h1  style="margin-top:-40px; margin-left: 73%;">Tiempo: <span id="minutos">00</span>:<span id="segundos">00</span></h1>
          </div> 
        
      </div>
  <?php } ?>   

   
<form action="<?php echo $urlCalificar; ?>" method="post" id="cuestionarioEnviar">

<?php while(@$row1=$obtenerCuestionario->fetch(PDO::FETCH_ASSOC)){  
 @$noPregunta+=1;
 ?>
    
<div class="card col-md-12" style="min-height: 250px;">
	 <div class="col-md-12" style="min-height: 20px; background-color: #27ae60; border-radius: 5px;  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); color: white; text-align: center;"><?php echo "Indicador de logro: ".$row1['capacidad'] ?></div>
  <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: 15%; margin-left: 90%; "><?php echo @$noPregunta; ?></div>


  <h4 style="text-align: center; font-weight: bold;"><?php echo $row1['pregunta']; ?></h4>
  <?php if($row1['respuestaCorrecta']==0){ 

    ?>


       
       <div class="recodinggN" id="<?php echo 'on'.$row1['idItem']; ?>" title="Graba tú respuesta" style="cursor: pointer; padding-top:3px; padding-left: 5px; width: 50px; height: 50px; border-radius: 100%; margin-top: 10px; background-color: #e67e22; margin-left: 40%;" onclick="quizRespuesta(this.id)"><img src="../../img/micro.png" width="40" height="40" ></div>
      
      <div id="<?php echo 'off'.$row1['idItem']; ?>" class="recodinggN" title="Graba el concepto" style="cursor: pointer; padding-top:3px; padding-left: 5px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 10px; background-color: #F72626; margin-left: 40%; display: none" onclick="finVoz(this.id)"><img src="../../img/microOf.png" width="40" height="40" ></div>
      <h4>Tú Grabación:</h4>
      <div class="col-md-8 cajaDescripcion" style="color: white; background-color:#e67e22; border-radius: 5px; " >
      <span  id="<?php echo 'span-preview'.$row1['idItem']; ?>"></span>
      </div>
      <input type="text" name="<?php echo 'input'.$row1['idItem'] ?>" id='<?php echo 'input'.$row1['idItem']; ?>' value="" style="display: none;">
      <a id="<?php echo 'limpiar'.$row1['idItem']; ?>" onclick="lipiarNew1(this.id);" class="btn btn-default botonAgg-1 col-md-2" style="border:1px solid #3498db; margin-top: 50px;">Volver a grabar</a>

<?php }else{

 ?>

  <ul>
    <li >
      <input value="1" type="radio" name="<?php echo 'multiple'.$noPregunta; ?>" id="one" style="" />
      <label ><?php echo $row1['respuesta1']; ?></label>
      
      
      <div class="check"></div>
    </li>
    
    <li>
      <input type="radio" value="2" name="<?php echo 'multiple'.$noPregunta; ?>" id="two" />
      <label ><?php echo $row1['respuesta2']; ?></label>
      
      <div class="check"></div>
    </li>
    <li>
      <input type="radio" value="3" name="<?php echo 'multiple'.$noPregunta; ?>" id="tree" />
      <label ><?php echo $row1['respuesta3']; ?></label>
      
      <div class="check"></div>
    </li>
    <li>
      <input type="radio" value="4" name="<?php echo 'multiple'.$noPregunta; ?>" id="fort" />
      <label ><?php echo $row1['respuesta4']; ?></label>
      
      <div class="check"></div>
    </li>
  </ul>
<?php } ?>
</div>

 <?php } ?>
 <input type="text" name="idUsuario" id="" value="<?php echo $_SESSION['idUsuario']; ?>" style="display: none;">

 <input type="text" name="idLecturaEnviado" id="idLecturaEnviar" value="" style="display: none;">
 <input type="text" name="cantidadPreguntas" value="<?php echo $consulta; ?>" style="display: none;">
  <input type="text" name="tiempo" id="tiempo" value="" style="display: none;">
   <input type="text" name="intento" value="<?php echo $_GET['intento']; ?>" style="display: none;">
 <input style="margin-top: 20px; margin-bottom: 50px;" onclick="obtenerTiempoSubmit();"  value="Termine El Cuestionario" name="" class="btn btn-default botonAgg-1">

  </form>



<script language="Javascript"  type="text/javascript">

  function obtenerTiempoSubmit(){
    minutos = $("#minutos").text();
    segundos= $("#segundos").text();
    idLectura=$("#idLectura").text();
    
    $("#tiempo").val(minutos+":"+segundos);
    $("#idLecturaEnviar").val(idLectura);
    $("#cuestionarioEnviar").submit();
  }
    
  window.onload=carga();

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


  function quizRespuesta(clicked_id){
          var idPregunta= clicked_id.substring(2,6);
          
          startArtyom();
          $('#'+clicked_id).css("display","none");
          $('#off'+idPregunta).css("display","block");
          capturarVoz(idPregunta);

          
  }

    function capturarVoz(idPregunta){
    // Escribir lo que escucha.
    artyom.redirectRecognizedTextOutput(function(text,isFinal){
      if (isFinal) {
        texto.val(text);
            
      }else{
        var fluidez=[text];
        $("#span-preview"+idPregunta).text(fluidez);
       
        
      }
     
    });

   }


function finVoz(clicked_id){
 

   var ocultar= clicked_id;
   var mostrar= ocultar.substring(3,6); 
     var texto = $("#span-preview"+mostrar).text();

   $('#'+ocultar).css("display","none");
   $('#on'+mostrar).css("display","block"); 
  
   $("#input"+mostrar).val(texto);

    //confirmar guardado de grabacion

    finAsistente();
}


function lipiarNew1(clicked_id){
  var cadenaText=clicked_id;
  var idLimpiar=cadenaText.substring(10,7);
   $("#span-preview"+idLimpiar).text('');
   $("#input"+idLimpiar).val('');
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