<?php

$time = time();


//buscamos todos los actos de bullyng no resuelto
$sql3 = ("SELECT * FROM atomobullying where resuelto=0 or resuelto=2");
$obtenerDrive = $dbConn->prepare($sql3);
$obtenerDrive->execute();
$_SESSION['bullyg']=$obtenerDrive->rowCount();

//buscamos ficheros compartidos conmigo
$sql1 = ("SELECT * FROM atomodrivecompartir where idUsuarioCompartir=:idUsuario");
$obtenerCompartidos = $dbConn->prepare($sql1);
$obtenerCompartidos->bindParam(':idUsuario', $_SESSION['idUsuario'], PDO::PARAM_INT); 
$obtenerCompartidos->execute();
$_SESSION['notiDrive']=$obtenerCompartidos->rowCount();


//datos a modificar para produccion

  $urlComands='https://micolina.atomolector.com/'; //modificar 


 ?>

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
  
    <script src="../js/artyom/artyom.min.js"></script>
  <script src="../js/artyom/artyom.window.js"></script>
  <script src="../js/artyom/artyomCommands.js"></script>

<style>



.recodinggN {
 
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;
}

.recodinggN:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}
</style>




 <div class="row cont-page">
<p id="cajaUrlComandos" style="display: none"><?php echo $urlComands; ?>
<p id="userIa" style="display: none;"><?php echo $_SESSION['nombre']; ?></p>
<p id="tipoUserIa" style="display: none;"><?php echo $_SESSION['tipoUsuario']; ?></p>
<p id="gradoIa" style="display: none;"><?php echo $_SESSION['grado']; ?></p>

<?php function directoriosNiveles($nivel){

  if($nivel==1){
    require("../conection/conexion.php");
  }

  if($nivel==2){
    require("../../conection/conexion.php");
  }
if($nivel==3){
    require("../../../conection/conexion.php");
  }


//buscarmos los eventos e incrementamos en el lateral izquierdo
$q1 = ("SELECT * FROM evento");
$verEventos=$dbConn->prepare($q1);
$verEventos->execute();

  while($rownew1=$verEventos->fetch(PDO::FETCH_ASSOC)){

  if($rownew1['visible']==1){
    @$todos+=1;
    $_SESSION['todos']=$todos;
    
  } 

  if($rownew1['visible']==2){
    @$primaria+=1;
    $_SESSION['primaria']=$primaria;


  } 

  if($rownew1['visible']==3){
    @$basicos+=1;
     $_SESSION['basicos']=$basicos;

  } 
  if($rownew1['visible']==4){
    @$diver+=1;
     $_SESSION['diver']=$diver;

  } 
  if($rownew1['visible']==5){
    @$docente+=1;
    $_SESSION['docente']=$docente;

  }  

  if($rownew1['visible']==6){
    @$papas+=1;
     $_SESSION['papas']=$papas;
    
  } 


  }



  if($nivel==1){ // este nivel es el que todas las paginas tienen si no hay mas directorios

 ?>
      <div class="col-md-2 col-xs-2 lat-izquierdo">

      	
        <img class="img-responsive btn-back" src="../img/back3.png" title="atras" onclick="history.back(-1)" style="margin-left:70px;"  />

        
        <h5 style="color:white; margin-left: 10px; margin-top: 50px;">Asistente de voz</h5>

        <div class="recodinggN" id="microOn" title="Que quieres hacer.." style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #3498db; margin-left: 40%;" onclick="inicio(this.id)"><img src="../img/micro.png" width="40" height="40" ></div>

        <div id="microOf" class="recodinggN" title="Graba el concepto" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #F72626; margin-left: 40%; display: none" onclick="finGrabacion(this.id)"><img src="../img/microOf.png" width="40" height="40" ></div>

        <div class="text-center col-md-12" style="margin-left:5px; margin-top: 20%;">
        	<h5 style="color:white; margin-left: 10px;">Mis apps</h5>

          <?php if($_SESSION['tipoUsuario']==1){  ?>


<!--
        <a href="../apps/calendarm.php" ><img class="img-responsive" src="../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>
-->

<!--
          <a href="../apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>
-->
          <a href="../apps/misNotas.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Mis notas</h5>


          <!--

          <a href="../apps/streamingCanales.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>
          --->
     <!--     
          <a href="../apps/bullying.php"><img class="img-responsive" src="../img/alert.png" style="max-width:50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Bullying"/>           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Bullying</h5>
-->
          <!-- 
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
          ---->
           <?php  } if($_SESSION['tipoUsuario']==2){  ?>

 <!-- 
          <a href="../apps/calendarm.php" ><img class="img-responsive" src="../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" /> 

          </a>
        
          </a><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: -60px; margin-left: -32px;" ><?php $notiEvent=@$_SESSION['todos']+@$_SESSION['docente']; echo $notiEvent; ?></div>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>


          <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: -100px; margin-left: 52px;" ><?php echo $_SESSION['notiDrive']; ?></div>

          <a href="../apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>
 ---> 
          <a href="../apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>
 <!-- 
          <a href="../apps/misAlumnos.php"><img class="img-responsive" src="../img/conexion.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Asistencia"/>           
          </a>

        
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Reporte Acceso</h5>
          <a href="../apps/reportbullying.php"><img class="img-responsive" src="../img/alert.png" style="max-width:50px; max-height: 50px; margin-left:10px; margin-top: 30px;" title="Bullyng"/>           
          </a><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: -60px; margin-left: -32px;" ><?php echo @$_SESSION['bullyg']; ?></div>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Bullying</h5>
-->
          <a href="../apps/planificacion.php"><img class="img-responsive" src="../img/planificacion.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Plani"/>           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Planificación</h5>
          <!--
          <a href="../apps/streamingCanales.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%; " />           
          </a>
         
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>
         --->
          
          <!--
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
        
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
            ---->

            

         <?php }if($_SESSION['tipoUsuario']==3){ ?>

          <!--
         <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>



          <a href="../apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

          <a href="../apps/misAlumnos.php"><img class="img-responsive" src="../img/conexion.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 30px;" title="Asistencia"/>           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Reporte de Acceso</h5>

          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>

-->


           <?php  }if($_SESSION['tipoUsuario']==4){ ?>
<!--
        <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
        	<h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



        	<a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />        		
        	</a>
        	<h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

        	<a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />        		
        	</a>
        	<h5 style="color: white; margin-left: 20px;" class="text-left">Notas</h5>



        	<a href="../static/apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />        		
        	</a>
        	<h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

         <!--
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 10%; margin-top: 15%;" />            
          </a>
          <h5 style="color: white; margin-left: 10%;" class="text-left">Plataformas</h5>
          ---->
  <?php }?>
          

      

<script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
        },
        dayClick:function(date,jsEvent,view){

          $('#fecha').val(date.format());
          //alert("vista Actual "+view.name); nos da el vista = mes dia 
          //alert("vista Actual "+view.name);
          //$(this).css('background-color','#e67e22');
          $('#crearEvento').modal();


        },
        
        events:'http://localhost:8080/atomolms/calendar/eventos.php',


        
        eventClick:function(calEvent,jsEvent,view){
          $('#relltitulo').val(calEvent.title);
          $('#relldescripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start._i.split(" ");          
          $('#rellfecha').val(fechaHora[0]);
          $('#rellhora').val(fechaHora[1]);
          $('#rellcolor').val(calEvent.color);
          $('#mostrarEvento').modal();

        }
        

      
    });

  });

</script>
<script type="text/javascript">
var NuevoEvento;

function datos(){
   NuevoEvento = {
        title:$('#titulo').val(),
        descripcion:$('#descripcion').val(),
        start:$('#fecha').val()+" "+$('#hora').val(),
        color:$('#color').val(),
        textColor:"#ffffff",
        end:$('#fecha').val()+" "+$('#hora').val()
      }
}



  $('#btnGuardarEvento').click(function(){
       datos();
      $('#calendar').fullCalendar('renderEvent',NuevoEvento);
        $('#crearEvento').modal('toggle');
       
  });


</script>



           
            
        	

        </div>
  </div>

  
<?php } if($nivel==2){  ?>


       <div class="col-md-2 col-xs-2 lat-izquierdo">

        
        <img class="img-responsive btn-back" src="../../img/back3.png" title="atras" onclick="history.back(-1)"  style="margin-left:70px;"/>
        <h5 style="color:white; margin-left: 10px; margin-top: 50px;">Asistente de voz</h5>
           <div class="recodinggN" id="microOn" title="Que quieres hacer.." style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #3498db; margin-left: 40%;" onclick="inicio(this.id)"><img src="../../img/micro.png" width="40" height="40" ></div>

        <div id="microOf" class="recodinggN" title="Graba el concepto" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #F72626; margin-left: 40%; display: none" onclick="finGrabacion(this.id)"><img src="../../img/microOf.png" width="40" height="40" ></div>

        <div class="text-center col-md-12" style="margin-left:5px; margin-top: 50%;">
          <h5 style="color:white; margin-left: 10px;">Mis apps</h5>

          <?php if($_SESSION['tipoUsuario']==1){  ?>
<!--
        <a href="../../apps/calendarm.php" ><img class="img-responsive" src="../../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../../apps/atomDrive.php"><img class="img-responsive" src="../../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>
--->
          <a href="../../apps/misNotas.php"><img class="img-responsive" src="../../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Mis notas</h5>
  

          <!--
          <a href="../../apps/streamingCanales.php"><img class="img-responsive" src="../../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>
          -->
 <!--
          <a href="../../apps/bullying.php"><img class="img-responsive" src="../../img/alert.png" style="max-width:50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Bullyng"/>           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Bullying</h5>
--->
          <!--
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
            -->
           <?php  } if($_SESSION['tipoUsuario']==2){  ?>
        
 <!--
          <a href="../../apps/calendarm.php" ><img class="img-responsive" src="../../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../../apps/atomDrive.php"><img class="img-responsive" src="../../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>
-->
          <a href="../../apps/reportes.php"><img class="img-responsive" src="../../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>

        <a href="../apps/planificacion.php"><img class="img-responsive" src="../../img/planificacion.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Plani"/>           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Planificación</h5>
          <!---
          <a href="../../apps/streamingCanales.php"><img class="img-responsive" src="../../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>
         
          <a href="../../apps/misAlumnos.php"><img class="img-responsive" src="../../img/conexion.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" title="Asistencia"/>           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left" >Reporte Acceso</h5>
        -->  <!--
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
   
          <a href="../../apps/reportbullying.php"><img class="img-responsive" src="../../img/alert.png" style="max-width:50px; max-height: 50px; margin-left:10px; margin-top: 30px;" title="Bullyng"/>           
          </a><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: -60px; margin-left: -32px;" ><?php echo @$_SESSION['reporteBullying1']; ?></div>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Bullying</h5>

               -->

            
         <?php }if($_SESSION['tipoUsuario']==3){ ?>
          <!--
         <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>



          <a href="../apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

          <a href="../apps/misAlumnos.php"><img class="img-responsive" src="../img/alumnos.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 30px;" title="Asistencia"/>           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Asistencia</h5>

          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
-->



           <?php  }if($_SESSION['tipoUsuario']==4){ ?>

<!--
        <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Notas</h5>



          <a href="../static/apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

         
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 10%; margin-top: 15%;" />            
          </a>
          <h5 style="color: white; margin-left: 10%;" class="text-left">Plataformas</h5>
-->
  <?php }?>
          

            <div class="modal fade" id="plataformas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                       <div class="modal-header text-left">
                           Plataformas<br>
                           <hr>
                          
                       
                       <div class="modal-body">
                        <a href="http://www.progrentis.com/Selector/" target="_blank">
                           <div class="col-md-1 item">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/progrentis.jpg" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Progrentis</p></strong>
                           </div>
                           </a>
                          <a href="http://www.achieve3000.com/" target="_blank">
                           <div class="col-md-1 item" data-toggle="modal" data-target="#achive3000">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/achive3000.png" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Achive3000</p></strong>
                           </div>
                           </a>
                           <a href="http://www.lectopolis.net/login.php" target="_blank">
                           <div class="col-md-1 item" data-toggle="modal" data-target="#lectopolis">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/lectopolis.png" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Lectopolis</p></strong>
                           </div>
                           </a>
                       </div>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-info btn1" data-dismiss="modal" style="margin-left: 90%;">Cerrar</button>
                         
                       </div>
                    </div>
                </div>
            </div>


<script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
        },
        dayClick:function(date,jsEvent,view){

          $('#fecha').val(date.format());
          //alert("vista Actual "+view.name); nos da el vista = mes dia 
          //alert("vista Actual "+view.name);
          //$(this).css('background-color','#e67e22');
          $('#crearEvento').modal();


        },
        
        events:'http://localhost:8080/atomolms/calendar/eventos.php',


        
        eventClick:function(calEvent,jsEvent,view){
          $('#relltitulo').val(calEvent.title);
          $('#relldescripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start._i.split(" ");          
          $('#rellfecha').val(fechaHora[0]);
          $('#rellhora').val(fechaHora[1]);
          $('#rellcolor').val(calEvent.color);
          $('#mostrarEvento').modal();

        }
        

      
    });

  });

</script>
<script type="text/javascript">
var NuevoEvento;

function datos(){
   NuevoEvento = {
        title:$('#titulo').val(),
        descripcion:$('#descripcion').val(),
        start:$('#fecha').val()+" "+$('#hora').val(),
        color:$('#color').val(),
        textColor:"#ffffff",
        end:$('#fecha').val()+" "+$('#hora').val()
      }
}



  $('#btnGuardarEvento').click(function(){
       datos();
      $('#calendar').fullCalendar('renderEvent',NuevoEvento);
        $('#crearEvento').modal('toggle');
       
  });




</script>



           
            
          

        </div>
  </div>
<?php } if($nivel==3){ ?>

  <div class="col-md-2 col-xs-2 lat-izquierdo">

        
        <img class="img-responsive btn-back" src="../../../img/back3.png" title="atras" onclick="history.back(-1)" style="margin-left:70px;" />

        <h5 style="color:white; margin-left: 10px; margin-top: 50px;">Asistente de voz</h5>
         <div class="recodinggN" id="microOn" title="Que quieres hacer.." style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #3498db; margin-left: 40%;" onclick="inicio(this.id)"><img src="../../../img/micro.png" width="40" height="40" ></div>

        <div id="microOf" class="recodinggN" title="Graba el concepto" style="cursor: pointer; padding-top:3px;  width: 50px; height: 50px; border-radius: 100%; margin-top: 30px; background-color: #F72626; margin-left: 40%; display: none" onclick="finGrabacion(this.id)"><img src="../../../img/microOf.png" width="40" height="40" ></div>

        <div class="text-center col-md-12" style="margin-left:5px; margin-top: 50%;">
          <h5 style="color:white; margin-left: 10px;">Mis apps</h5>

          <?php if($_SESSION['tipoUsuario']==1){  ?>

        <a href="../../../apps/calendarm.php" ><img class="img-responsive" src="../../../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../../../apps/atomDrive.php"><img class="img-responsive" src="../../../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../../../apps/misNotas.php"><img class="img-responsive" src="../../../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Mis notas</h5>



          <a href="../../apps/streamingCanales.php"><img class="img-responsive" src="../../../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

          <a href="../../../apps/bullying.php"><img class="img-responsive" src="../../../img/alert.png" style="max-width:50px; max-height: 50px; margin-left:10px; margin-top: 30px;" title="Bullyng"/>           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Bullying</h5>

          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../../../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
           <?php  } if($_SESSION['tipoUsuario']==2){  ?>

<!--
          <a href="../../../apps/calendarm.php" ><img class="img-responsive" src="../../../img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../../../apps/atomDrive.php"><img class="img-responsive" src="../../../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>
-->
          <a href="../../../apps/reportes.php"><img class="img-responsive" src="../../../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>


          <!--
          <a href="../../../apps/streamingCanales.php"><img class="img-responsive" src="../../../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>
            
          <a href="../../../apps/misAlumnos.php"><img class="img-responsive" src="../../../img/conexion.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 30px;" title="Asistencia"/>           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Reporte Acceso</h5>
-->
          <!--
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../../../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>
          

          <a href="../../../apps/reportbullying.php"><img class="img-responsive" src="../../../img/alert.png" style="max-width:50px; max-height: 50px; margin-left:10px; margin-top: 30px;" title="Bullyng"/>           
          </a><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: rgb(54, 171, 203); position: absolute; margin-top: -60px; margin-left: -32px;" ><?php echo @$_SESSION['reporteBullying1']; ?></div>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Bullying</h5>

          -->

            
         <?php }if($_SESSION['tipoUsuario']==3){ ?>
         <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Reportes</h5>



          <a href="../apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

          <a href="../apps/misAlumnos.php"><img class="img-responsive" src="../img/alumnos.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 30px;" title="Asistencia"/>           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left" >Asistencia</h5>

          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />            
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Plataformas</h5>




           <?php  }if($_SESSION['tipoUsuario']==4){ ?>

        <a href="../static/apps/calendarm.php" ><img class="img-responsive" src="img/calendario.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />           
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Calendario</h5>



          <a href="../static/apps/atomDrive.php"><img class="img-responsive" src="../img/atomDrive.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">AtomDrive</h5>

          <a href="../static/apps/reportes.php"><img class="img-responsive" src="../img/reportes.png" style="max-width: 50px; max-height: 50px; margin-left: 20px; margin-top: 50px;" />            
          </a>
          <h5 style="color: white; margin-left: 20px;" class="text-left">Notas</h5>



          <a href="../static/apps/streaming.php"><img class="img-responsive" src="../img/streaming.png" style="max-width: 50px; max-height: 50px; margin-left: 65%; margin-top: -50%;" />           
          </a>
          <h5 style="color: white; margin-left: 60%;" class="text-left">Streaming</h5>

         
          <a href="#" data-toggle="modal" data-target="#plataformas"><img class="img-responsive" src="../img/otras.png" style="max-width: 50px; max-height: 50px; margin-left: 10%; margin-top: 15%;" />            
          </a>
          <h5 style="color: white; margin-left: 10%;" class="text-left">Plataformas</h5>

  <?php }?>
          

            <div class="modal fade" id="plataformas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                       <div class="modal-header text-left">
                           Plataformas<br>
                           <hr>
                          
                       
                       <div class="modal-body">
                        <a href="http://www.progrentis.com/Selector/" target="_blank">
                           <div class="col-md-1 item">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/progrentis.jpg" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Progrentis</p></strong>
                           </div>
                           </a>
                          <a href="http://www.achieve3000.com/" target="_blank">
                           <div class="col-md-1 item" data-toggle="modal" data-target="#achive3000">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/achive3000.png" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Achive3000</p></strong>
                           </div>
                           </a>
                           <a href="http://www.lectopolis.net/login.php" target="_blank">
                           <div class="col-md-1 item" data-toggle="modal" data-target="#lectopolis">
                                <div class="img-responsive sinfondo"> 
                                  <img class="img-fondo" src="../../img/lectopolis.png" style="border-radius: 10px;">
                                </div> 
                                <strong><p class="txt-fuente">Lectopolis</p></strong>
                           </div>
                           </a>
                       </div>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-info btn1" data-dismiss="modal" style="margin-left: 90%;">Cerrar</button>
                         
                       </div>
                    </div>
                </div>
            </div>


<script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right: 'month, basicWeek, basicDay, agendaWeek, agendaDay'
        },
        dayClick:function(date,jsEvent,view){

          $('#fecha').val(date.format());
          //alert("vista Actual "+view.name); nos da el vista = mes dia 
          //alert("vista Actual "+view.name);
          //$(this).css('background-color','#e67e22');
          $('#crearEvento').modal();


        },
        
        events:'http://localhost:8080/atomolms/calendar/eventos.php',


        
        eventClick:function(calEvent,jsEvent,view){
          $('#relltitulo').val(calEvent.title);
          $('#relldescripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start._i.split(" ");          
          $('#rellfecha').val(fechaHora[0]);
          $('#rellhora').val(fechaHora[1]);
          $('#rellcolor').val(calEvent.color);
          $('#mostrarEvento').modal();

        }
        

      
    });

  });

</script>
<script type="text/javascript">
var NuevoEvento;

function datos(){
   NuevoEvento = {
        title:$('#titulo').val(),
        descripcion:$('#descripcion').val(),
        start:$('#fecha').val()+" "+$('#hora').val(),
        color:$('#color').val(),
        textColor:"#ffffff",
        end:$('#fecha').val()+" "+$('#hora').val()
      }
}



  $('#btnGuardarEvento').click(function(){
       datos();
      $('#calendar').fullCalendar('renderEvent',NuevoEvento);
        $('#crearEvento').modal('toggle');
       
  });


</script>



           
            
          

        </div>
  </div>
<?php }} ?>



<script type="text/javascript">
          //asistente
 function startArtyom(){

    artyom.initialize({
        lang: "es-ES",
        continuous:true,// Reconoce 1 solo comando y para de escuchar
              listen:true, // Iniciar !
              debug:true, // Muestra un informe en la consola
              speed:1 // Habla normalmente
      });
  
    };

 function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }    

function inicio(){
             var tipoUsuario= $('#tipoUserIa').text();

             if(tipoUsuario==1){
               iaEstudiante();
             }
             if(tipoUsuario==2){
               iaDocente();
             }
            //enviar idPalabra seleccionada para registrarlo en la base de datos          
            startArtyom(); 
                    
            $('#microOn').css("display","none");
            $('#microOf').css("display","block"); 
           
};
    
  

function finGrabacion(clicked_id){
   var texto = $("#span-preview").text();
   var ocultar= clicked_id;
   var mostrar= ocultar.substring(2,6); 

 $('#microOn').css("display","block");
  $('#microOf').css("display","none");  
  
  //confirmar guardado de grabacion
  $("#activarNoti").click();
    finAsistente();
}



//buscamos tipo usuario para mandar comandos



function iaDocente(){
 var nombreUser= $('#userIa').text();
 var urlComandos= $('#cajaUrlComandos').text();
  //grupo 1 conociendo a lola 
 //grupo 2 despedida cortar grabacion
 //grupo 3 ir a lecturas de medicion semanales
 //grupo 4 ver reportes 
 //grupo 5 ver actividades
 //grupo 6 atomDrive
 //grupo 7 asistencia
 //grupo 8 reporte de bullyng
 //grupo 9 crear circular
  //grupo 10 perfil
 //grupo 11 salir de la plataforma
 //grupo 12 ir a lecturas de velocidad
//gurpo 13 ir a lecturas diarias
//gurpo 14 descargar planificacion




  artyom.addCommands([
      {
        indexes:['cómo te llamas','qué eres','no sé qué decir','hola hola', 'hola'],//grupo 1
        action: function(i){
          if (i==0) {
            artyom.say("Hola"+nombreUser+", mi nombre es lola y estoy para servirte.");
          }
          if (i==1) {
            artyom.say("soy una parte muy básica de inteligencia artificial.");
          }
          if (i==2) {
            artyom.say("muy bien te dare algunos comandos para poder realizar,realizar lecturas, ver notas, ver actividades, mejorar mi velocidad, mejorar mi comprensión, entre otras si quieres saber mas dí. ayuda ");
          }

          if (i==3) {
            artyom.say("hola me alegra que estés de buen humor!! ");
          }
           if (i==4) {
            artyom.say("Hola"+nombreUser+", mi nombre es lola y estoy para servirte.");
          }
          
        }
      },
      {
        //grupo 2
        indexes:['me voy','chau','adiós','fin grabación', 'no quiero decir nada', 'no quiero mas comandos', 'mejor uso el maus', 'apagar','salir','exit'],
        action: function(){
          artyom.say("Está bién te escucho luego.");
           $('#microOn').css("display","block");
          $('#microOf').css("display","none");
         artyom.fatality();

        }
      },
      {
        //grupo 3
        indexes:['lecturas semanales','lecturas de medición','prueba pisa', 'prueba cnb','ver lecturas semanales','ir a lecturas semanales','abrir lecturas lecturas semanales','lecturas semanales','comprensión lectora',],
        action: function(){
          artyom.say("Abriendo lecturas, por favor tienes que elegir grado por ser docente");
          window.open(urlComandos+"/atomLector/eleccionNivelprogramaLector.php?curso=7",'_blank')

        }
      },
      {
        //grupo 4 
        indexes:['ver reportes','reportes','reportes de lecturas', 'notas','ver notas','ver avances de lectura','sacar reportes','ir a reportes'],
        action: function(){
          artyom.say("Abriendo área de reportes, elije grado y sección para ver el avance lector");
          window.open(urlComandos+"/apps/reportes.php",'_blank')

        }
      },
      {
        //grupo 5 
        indexes:['ver actividades','actividades','mis actividades', 'calendario','ver calendario','ir a calendario','fechas importantes','crear actividad','nueva actividad'],
        action: function(){
          artyom.say("Abriendo calendario de actividades, si quieres ver una actividad dale click, crea una nueva actividad dándole clic al día.");
          window.open(urlComandos+"/apps/calendarm.php",'_blank')

        }
      },
      {
        //grupo 6 
        indexes:['guardar archivos','mis documentos','subir archivo', 'compartir archivo','mis archivos','archivos','compartir archivos','borrar un archivo','atomDrive', 'atomodrive','drive','abrir drive','abrir atomodrive', 'atom drive'],
        action: function(){
          artyom.say("Abriendo AtomDrive, para subir un documento dale clic al botón nuevo y subir archivo, puedes compartir tus archivos, y ver archivos que han compartido contigo.");
          window.open(urlComandos+"/apps/atomDrive.php",'_blank')

        }
      },
      {
        //grupo 7
        indexes:['ver asistencia','asistencia','ir a asistencia', 'ver faltas','ver conectividad','reporte de asistencia','ausencia','actividad plataforma','conectiviadad plataforma'],
        action: function(){
          artyom.say("Abriendo reporte de asistencia, elije el grado, sección y mes para ver la asistencia presencial, también podrás ver el reporte de uso de la plataforma.");
          window.open(urlComandos+"/apps/misAlumnos.php",'_blank')

        }
      },
      {
        //grupo 8
        indexes:['bullying','reporte bullying','ver incidencias', 'reporte de agresión','agreciones','controlar bullying','reporte de agreciones'],
        action: function(){
          artyom.say("Abriendo reporte de bullying, encontraras en este apartado, los datos de personas que valientemente reportan las agreciones que suceden en el plantel educativo, con esta información podremos actuar y combatir el bullying.");
          window.open(urlComandos+"/apps/reportbullying.php",'_blank')

        }
      },
      {
        //grupo 9
        indexes:['crear circular','madar circular','circulares','circular'],
        action: function(){
          artyom.say("Abriendo área de circulares, crea la circular y mandacelo a  quienes tú quieras.");
           $('#myModal').modal('show');


        }
      },
      {
        //grupo 10
        indexes:['editar perfil','perfil','ver perfil','ir a perfil','quiero ver mi perfil'],
        action: function(){
          artyom.say("Abriendo tú perfil, en el podrás editar nombre y apellido, hay datos que están bloqueados por tu seguridad");
           window.open(urlComandos+"/apps/editarPerfil.php",'_blank')


        }
      },
      {
        //grupo 11
        indexes:['cerrar sesión','salir de la plataforma','terminar sesión','finalizar sesión','cerrar plataforma'],
        action: function(){
          artyom.say("Saliendo de la plataforma, espero escucharte pronto, hasta luego.");
          window.location.replace(urlComandos+"/index.html");
          
            artyom.fatality();

        }
      },
      {
        //grupo 12
        indexes:['abrir lecturas de velocidad','lecturas de velocidad','practicar velocidad','velocidad lectora','ver lecturas de velocidad','lecturas de fluidez'],
        action: function(){
          artyom.say("abriendo las lecturas de velocidad, elije grado que quieres observar");
          window.location.replace(urlComandos+"/atomLector/eleccionNivelvelocidadLectora.php?curso=7",'_blank');
          
            artyom.fatality();

        }
      },
      {
        //grupo 13
        indexes:['abrir lecturas diarias','ver las lecturas diarias','mis lecturas diarias','quiero leer hoy','lecturas diarias',],
        action: function(){
          artyom.say("abriendo las lecturas diarias, elije grado que quieres observar, y empieza a crear el hábito lector.");
          window.location.replace(urlComandos+"/atomLector/eleccionNivelLecturasDiarias.php?curso=7",'_blank');
          
            artyom.fatality();

        }
      },
      {
        //grupo 14
        indexes:['descargar planificación','planificación','descargar plani','ver planificacion','plani',],
        action: function(){
          artyom.say("abriendo area de planificación, elije grado que quieres descargar.");
          window.location.replace(urlComandos+"/atomLector/eleccionNivelLecturasDiarias.php?curso=7",'_blank');
          
            artyom.fatality();

        }
      }



    ]); 


}

function iaEstudiante(){
 var nombreUser= $('#userIa').text();
 var urlComandos= $('#cajaUrlComandos').text();
  var grado= $('#gradoIa').text();

  //grupo 1 conociendo a lola 
 //grupo 2 despedidad cortar grabacion
 //grupo 3 ir a lecturas comprension
 //grupo 4 ver reportes 
 //grupo 5 ver actividades
 //grupo 6 atomDrive
 //grupo 7 asistencia
 //grupo 8 reporte de bullyng
 //grupo 9 crear circular
  //grupo 10 perfil
 //grupo 11 salir de la plataforma




  artyom.addCommands([
      {
        indexes:['cómo te llamas','qué eres','no sé qué decir','hola hola', 'hola'],//grupo 1
        action: function(i){
          if (i==0) {
            artyom.say("Hola"+nombreUser+", mi nombre es lola y estoy para servirte.");
          }
          if (i==1) {
            artyom.say("soy una parte muy básica de inteligencia artificial.");
          }
          if (i==2) {
            artyom.say("muy bien te dare algunos comandos para poder realizar,realizar lecturas, ver notas, ver actividades, mejorar mi velocidad, mejorar mi comprensión, entre otras si quieres saber mas dí. ayuda ");
          }

          if (i==3) {
            artyom.say("hola me alegra que estes de buen humor!! ");
          }
           if (i==4) {
            artyom.say("Hola"+nombreUser+", mi nombre es lola y estoy para servirte.");
          }
          
        }
      },
      {
        //grupo 2
        indexes:['me voy','chau','adiós','fin grabación', 'no quiero decir nada', 'no quiero mas comandos', 'mejor uso el maus', 'apagar','salir','exit'],
        action: function(){
          artyom.say("Está bién te escucho luego.");
           $('#microOn').css("display","block");
          $('#microOf').css("display","none");
         artyom.fatality();

        }
      },
      {
        //grupo 3
        indexes:['lecturas de medición','comprensión'],
        action: function(){
          artyom.say("Abriendo lecturas, elije la lectura que quieres realizar, mejora tú comprensión.");
          window.open(urlComandos+"/atomLector/comprensionLectora.php?curso=7&gradoB="+grado,'_blank')

        }
      },
      {
        //grupo 4 
        indexes:['ver reportes','reportes','reportes de lecturas', 'notas','ver notas','ver avances de lectura','sacar reportes','ir a reportes'],
        action: function(){
          artyom.say("Abriendo tús notas, en esta área podrás ver tú avance lector ");
          window.open(urlComandos+"/apps/misNotas.php",'_blank')

        }
      },
      {
        //grupo 5 
        indexes:['ver actividades','actividades','mis actividades', 'calendario','ver calendario','ir a calendario','fechas importantes','crear actividad','nueva actividad'],
        action: function(){
          artyom.say("Abriendo calendario de actividades, si quieres ver una actividad dale click, crea una nueva actividad dándole clic al día.");
          window.open(urlComandos+"/apps/calendarm.php",'_blank')

        }
      },
      {
        //grupo 6 
        indexes:['guardar archivos','mis documentos','subir archivo', 'compartir archivo','mis archivos','archivos','compartir archivos','borrar un archivo','atomDrive', 'atomodrive','drive','abrir drive','abrir atomodrive', 'atom drive'],
        action: function(){
          artyom.say("Abriendo AtomDrive, para subir un documento dale clic al botón nuevo y subir archivo, puedes compartir tus archivos, y ver archivos que han compartido contigo.");
          window.open(urlComandos+"/apps/atomDrive.php",'_blank')

        }
      },
      {
        //grupo 8
        indexes:['bullying','reportar agresión','agresión','agreciones','controlar bullying','reporte de agreciones'],
        action: function(){
          artyom.say("Abriendo área de bullying, podrás reportar cualquier agresión, ayudanos a tener un centro educativo sano.");
          window.open(urlComandos+"/apps/bullying.php",'_blank')

        }
      },
      {
        //grupo 10
        indexes:['editar perfil','perfil','ver perfil','ir a perfil','quiero ver mi perfil'],
        action: function(){
          artyom.say("Abriendo tú perfil, en el podras editar nombre y apellido, hay datos que están bloqueados por tu seguridad");
           window.open(urlComandos+"/apps/editarPerfil.php",'_blank')


        }
      },
      {
        //grupo 11
        indexes:['cerrar sesión','salir de la plataforma','terminar sesión','finalizar sesión','cerrar plataforma'],
        action: function(){
          artyom.say("Saliendo de la plataforma, espero escucharte pronto, hasta luego.");
          window.location.replace(urlComandos+"/index.html");
          
            artyom.fatality();

        }
      },{
        //grupo 12
        indexes:['abrir lecturas de velocidad','lecturas de velocidad','practicar velocidad','velocidad lectora','ver lecturas de velocidad','lecturas de fluidez'],
        action: function(){
          artyom.say("abriendo las lecturas de velocidad, elije grado que quieres observar");
          window.location.replace(urlComandos+"/atomLector/velocidadLectora.php?curso=7&gradoB="+grado,'_blank');
          
            artyom.fatality();

        }
      },
      {
        //grupo 13
        indexes:['abrir lecturas diarias','ver las lecturas diarias','mis lecturas diarias','quiero leer hoy','lecturas diarias',],
        action: function(){
          artyom.say("abriendo las lecturas diarias, empieza a crear el hábito lector, no olvides que leer es muy importante.");
          window.location.replace(urlComandos+"/atomLector/lecturasDiarias.php?curso=7&grado="+grado,'_blank');
          
            artyom.fatality();

        }
      }

    ]); 


}





        </script>    
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->
