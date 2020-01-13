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

$_SESSION['tipoUsuario'];

//se modifica la url para que en produccion funcione de manera correcta
$urlProduccion='http://localhost/atomolms';
$urlEstatica='/apps/calendar/eventos.php';
$urlMaster=$urlProduccion.$urlEstatica;

echo '<p id="urlMaster" style="display:none;">'.$urlMaster.'</p>';

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Eventos</title>
 
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

  <!--- LIBRERIAS PARA EL CALENDARIO---->
<meta charset='utf-8' />
<link href='calendar/fullcalendar.min.css' rel='stylesheet' />
<link href='calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src='calendar/lib/moment.min.js'></script>
<script src='calendar/lib/jquery.min.js'></script>
<script src='calendar/fullcalendar.min.js'></script>
<script src='calendar/locale/es.js'></script>

 <!--- Scrip Ajax para insertar eventos ---->

<script>
  $(document).ready(function() {
  var tipoUsuario= $('#obtenerUsuairio').val();
  var urlMaster=$('#urlMaster').text();
  
  
    if(tipoUsuario==2){

      $('#calendar').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right: 'month, agendaWeek, agendaDay'
        },
        dayClick:function(date,jsEvent,view){
          //activacion de botones o desactivacion
          $("#btnAgregar").prop('disabled',false);
          $("#btnModificar").prop('disabled',true);
          $("#btnBorrar").prop('disabled',true);
          limpiarFormulario();
          $('#fecha').val(date.format());
          
          $('#crearEvento').modal();


        },       
        events:urlMaster,
        
        eventClick:function(calEvent,jsEvent,view){
           $("#btnAgregar").prop('disabled',true);
          $("#btnModificar").prop('disabled',false);
          $("#btnBorrar").prop('disabled',false);

          $('#id').val(calEvent.id);
          $('#titulo').val(calEvent.title);
          $('#descripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start._i.split(" ");          
          $('#fecha').val(fechaHora[0]);
          $('#hora').val(fechaHora[1]);
          $('#color').val(calEvent.color);
          $('#crearEvento').modal();

        },
        editable:true,
        eventDrop:function(calEvent){
          $('#id').val(calEvent.id);
          $('#titulo').val(calEvent.title);
          $('#descripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start.format().split("T");          
          $('#fecha').val(fechaHora[0]);
          $('#hora').val(fechaHora[1]);
          $('#color').val(calEvent.color);
          

        }
        

      
    });
      
    }

    if(tipoUsuario=1){
     $('#calendar').fullCalendar({
        header:{
          left:'today,prev,next',
          center:'title',
          right: 'month, agendaWeek, agendaDay'
        },
        events:urlMaster,        
        eventClick:function(calEvent,jsEvent,view){
           $('#myModal').modal();
         // $('#id').val(calEvent.id);
          $('#tituloEvento1').text("Evento: "+calEvent.title);
          $('#descripcion11').text("Descripcion Evento: "+calEvent.descripcion);
          var fechaHora=calEvent.start._i.split(" ");          
          $('#fechaNoti').text("Evento creado el: "+fechaHora[0]);
          $('#horaNoti').text(" A las: "+fechaHora[1]);
          //$('#color').val(calEvent.color);
         

        },
        editable:false,
        eventDrop:function(calEvent){
          $('#id').val(calEvent.id);
          $('#titulo').val(calEvent.title);
          $('#descripcion').val(calEvent.descripcion);
          var fechaHora=calEvent.start.format().split("T");          
          $('#fecha ').val(fechaHora[0]);
          $('#hora').val(fechaHora[1]);
          $('#color').val(calEvent.color);
          

        }
        

      
    });

    }

 

  });


</script>
<style>

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


  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }


  .fc-content{
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  }
    .fc-content:hover{
   box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  }

  .fc th{
    padding: 10px 0px;
  background-color:#4285f4;
  color: white;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
    
  }


</style>
</head>
<body class="txt-fuente">
  <!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php';$nivell=1; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel)?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center">Calendario de Actividades</h3>
              
              <input type="text" id="obtenerUsuairio" name="idUsuario" value="<?php echo $_SESSION['tipoUsuario']; ?>" style="display: none;">
         </div>
  <div/>

<div id='calendar' class="col-md-11" style="margin-top: 50px; margin-bottom: 100px;"></div>

    <div id="myModal" class="modal fade" role="dialog" style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="tituloEvento1" class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <p id="descripcion11">Evento no localizado</p>
      </div>
      <div class="modal-footer">
        <p id="fechaNoti" style="float:left;"></p>
        <p id="horaNoti" style="float:left; margin-left:20px;"></p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- eliminar desde aqui -->

</div>



<div id="crearEvento" class="modal fade" role="dialog" style="background-image: linear-gradient(120deg, #f093fb 0%, #f5576c 100%);">
  <div class="modal-dialog">
    <form role="form">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Crear Evento</h4>
      </div>
      <div class="modal-body">
        <div >
            <div class="form-group">
             <input type="text" class="form-control" id="id" placeholder="Id" name="id" style="display: none;">
            </div>
            <div class="form-group">
             <input type="text" class="form-control" id="titulo" placeholder="Titulo Evento" name="titulo">
            </div>
            <div class="form-group">
              <textarea class="form-control" id="descripcion" placeholder="Descripción" name="descripcion"></textarea> 
            </div>       

            <div class="form-group">
              <input type="text" class="form-control" id="fecha" placeholder="Fecha" name="fecha">
            </div>
            <div class="form-group">
             <div class="input-group clockpicker " data-autoclose="true">
               <span class="input-group-addon">
               <span class="glyphicon glyphicon-time"></span>
               </span>
               <input type="text" class="form-control" id="hora" value="07:00" />
               </div>
            </div>
            <div class="form-group col-md-4">
              <input type="color" class="form-control" id="color" placeholder="color" value="#e67e22" name="color">
            </div><br><br> 

            <h4>¿Quienes quieres que lo vean?</h4>

            <select class="form-control" id="visible" name="visible"> 
            <option selected value="0">Seleccione</option>             
            <option value="1">Todos</option>
            <option value="2">Primaria</option>
            <option value="3">Basicos</option>
            <option value="4">Diversificado</option>
            <option value="5">Docentes</option>
            <option value="6">Padres de familia</option>
          </select>
        

         
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"  id="btnAgregar">Guardar Evento</button>
        <button type="button" class="btn btn-danger" id="btnModificar" style="display: none;">Modificar</button>
        <button type="button" class="btn btn-warning" id="btnBorrar">Borar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>
       </form>
      </div>





    </div>



  </div>





  
<script type="text/javascript">


var NuevoEvento;

function datos(){

    NuevoEvento = {
        id:$('#id').val(),
        title:$('#titulo').val(),
        descripcion:$('#descripcion').val(),
        start:$('#fecha').val()+" "+$('#hora').val(),
        color:$('#color').val(),
        textColor:"#ffffff",
        end:$('#fecha').val()+" "+$('#hora').val(),
        visible:$("#visible option:selected").val()
        }
      }


  $('#btnAgregar').click(function(){
    
      datos();
      enviarDatos('agregar',NuevoEvento);      
       
  });

    $('#btnBorrar').click(function(){
    
      datos();
      enviarDatos('eliminar',NuevoEvento);      
       
  });


    $('#btnModificar').click(function(){
    
      datos();
      enviarDatos('modificar',NuevoEvento);

       
  });



  function enviarDatos(accion,objEvento,modal){
    $.ajax({
      type:'POST',
      url:'calendar/eventos.php?accion='+accion,
      data:objEvento,
      success:function(msg){
        if(msg){
          $('#calendar').fullCalendar('refetchEvents',NuevoEvento);
          if(!modal){
            $('#crearEvento').modal('toggle');
          }
          
        }
      },
      error:function(){
        alert('hay un error');
      }
    });
  }

  $('.clockpicker').clockpicker();

  function limpiarFormulario(){
        $('#id').val('');
          $('#titulo').val('');
          $('#descripcion').val(''); 
          $('#vistaEvento').val(1); 
          $('#hora').val('7:00');    


  }
</script>


</div>
</div>
<!--LATERAL DERECHO CONTENIDO FIJO -->
    <?php include '../static/lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
