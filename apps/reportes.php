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
//curso 1

$fecha_actual=date("d/m/Y");
$hora_actual=date('h:i:s');
//dias habilitados

$lunes=1;
$martes=2;
$miercoles=3;
$jueves=4;
$viernes;

                            $q6= ("SELECT * FROM atomolector where semana=:semana and noLecturaDiaria=1 and noLecturaDiaria=3 and noLecturaDiaria=4");
                            $lecturasDiariasVer=$dbConn->prepare($q6);
                            $lecturasDiariasVer->bindParam(':idUsuario',$_POST['semana'], PDO::PARAM_INT);

                             while(@$mostrarLecturasD=$lecturasDiariasVer->fetch(PDO::FETCH_ASSOC)){
                            //echo 'nombre lectura Diaria '.$mostrarLecturasD['nombreLectura'];

                          }


$_SESSION['idUsuario'];

//echo $_SESSION['grados'];

$grados1=explode(',', $_SESSION['grados']);


//cuento cuantas variables hay
$iteracionesGrados=count($grados1);
 $iteracionesGrados;

$sql1 = ("SELECT * FROM estructuraNivelesColegio");
$obtenerEstructuras=$dbConn->prepare($sql1);
$obtenerEstructuras->execute();


$preescolarD='display:none;';
$primariaD='display:none;';
$basicosD='display:none;';
$diverD='display:none;';
 
 $busquedaDiver='display:none';
 $busquedaBasico='display:none';
 $busquedaPrepri='display:none';
 $busquedaPrimaria='display:none';


for($j=0; $j<=$iteracionesGrados; $j++){

  //echo 'grados ='.(int)@$grados1[$j];

  if((int)@$grados1[$j]>=10 and (int)@$grados1[$j]<=12)
  {

  //echo 'diver'; 
  $diverD='display:block';
  $busquedaDiver=  'display:block'; 
  }

  if((int)@$grados1[$j]>=1 and (int)@$grados1[$j]<=6){
    //echo 'primaria'; 
    $primariaD='display:block';
    $busquedaPrimaria=  'display:block'; 
  }

   if((int)@$grados1[$j]>=13 and (int)@$grados1[$j]<=15){
   // echo 'prepri'; 
    $preescolarD='display:block';
    $busquedaPrepri=  'display:block'; 
  }

   if((int)@$grados1[$j]>=7 and (int)@$grados1[$j]<=9){
    //echo 'basico'; 
    $basicosD='display:block';
    $busquedaBasico=  'display:block'; 
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>

  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell); ?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel); ?>
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

 </style>



 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style=" margin-bottom: 50px; margin-top: 30px;">
              <h3 class="text-center">Atom Reportes</h3>
         </div>
          <p id="fechaPdf" style="display: none;"><?php echo $fecha_actual.' '.$hora_actual; ?></p>
         <div class=" col-xs-12" style="height:50px; margin-bottom: 50px;">
             <form method="post" action="reportes.php" class="form-inline form-filtro " id="formulario">

                  <div class="form-group" style="">
                    <label class="sr-only" for="filtro-tipo">Preescolar</label>
                
                    <select class="form-control" name="preecolarSet" id="presco1" style="margin-left: 20px; <?php echo $preescolarD; ?>" >
                          <option value="0">Prescolar</option>
                        <option value="13">Prekinder</option>
                        <option value="14">Kinder</option>
                        <option value="15">Preparatoria</option>
             
                    </select>
                  </div>

                  <div class="form-group" style="">
                    <label class="sr-only" for="filtro-tipo">Primaria</label>
     
                    <select class="form-control" name="primariaSet" id="primaria1" style="margin-left: 20px; <?php echo $primariaD; ?>">
                         <option value="0">Primaria</option>
                        <option value="1">1ero primaria</option>
                        <option value="2">2do primaria</option>
                        <option value="3">3ero primaria</option>
                        <option value="4">4to primaria</option>
                        <option value="5">5to primaia</option>
                        <option value="6">6to primaria</option>
             
                    </select>
                  </div>

             <div class="form-group" style="">
                    <label class="sr-only" for="filtro-tipo">Básicos</label>
                
                    <select class="form-control" name="basicosSet" id="basicos1" style="margin-left: 20px;<?php echo $basicosD; ?>">
                         <option value="0">Basicos</option>
                        <option value="7">1ero Básico</option>
                        <option value="8">2do Básico</option>
                        <option value="9">3ero Básico</option>                        
             
                    </select>
                  </div>
                  <div class="form-group" >
                    <label class="sr-only" for="filtro-tipo">Diver</label>
                
                    <select class="form-control" name="diverSet" id="diver1" style="margin-left: 20px; <?php echo $diverD; ?>" >
                         <option value="0">Diver</option>
                        <option value="10">4to Diver</option>
                        <option value="11">5to Diver</option>
                        <option value="12">6to Diver</option>                        
             
                    </select>
                  </div>
                                   
                 <div class="form-group">
                    <label class="sr-only" for="filtro-tipo">Semana</label>
                    <select class="form-control" name="semana" id="semana1" style="margin-left: 20px">
                      <option value="0">Semana</option>
                      <?php for($o=1; $o<=45; $o++ ){ ?>
                        <option value="<?php echo $o; ?>"><?php echo 'semana '.$o ?></option>
                      <?php } ?>
                    </select>
                  </div><br><br>

                  <div class="form-group" style="margin-left: 77%; margin-top: -20px;">
                    <input type="submit"  class="btn btn-default botonAgg botonAgg-1" style="margin-top:30px; background-color: #3498db; border:1px solid #3498db; color:white; width: 200px;"  >
                  </div>


                </form> <br><br>

           
         </div>

<script type="text/javascript">

$('select#presco1').on('change',function(){
    var valor = $(this).val();
    //alert(valor);
});

$('select#primaria1').on('change',function(){
    var valor = $(this).val();
   // alert(valor);
});

$('select#basicos1').on('change',function(){
    var valor = $(this).val();
   // alert(valor);
});

$('select#diver1').on('change',function(){
    var valor = $(this).val();
   // alert(valor);
});

$('select#semana1').on('change',function(){
    var valor = $(this).val();
   // alert(valor);
});





</script>



<?php


///funcion busqueda alumnos por PRIMARIA

if(isset($_POST['primariaSet'])){

//lecturas Diarias
 $q1 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelPrimaria=$dbConn->prepare($q1);
      $mostrarNivelPrimaria->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT); 
      $mostrarNivelPrimaria->execute();

//lecturas Medición
 $qr2 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelPV=$dbConn->prepare($qr2);
      $mostrarNivelPV->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT); 
      $mostrarNivelPV->execute();

//lecturas velocidad
 $qr3 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelVL=$dbConn->prepare($qr3);
      $mostrarNivelVL->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT); 
      $mostrarNivelVL->execute();

    



 ?>

 <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 25px; margin-top: 50px; background-color: #2980b9; color: white; border-radius: 5px;">Lecturas Diarias</div>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-top:50px;  margin-left:510px;background-color: #c0392b; color: white; border:white;" onclick="demoFromHTML();">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-top:50px; background-color: #16a085; color: white; border:white;" onclick = "exportTableToExcel ('lectDiaria','LecturasDiarias')">EXCEL</button>
           <p id="gradoPdf"><?php echo $_POST['primariaSet'];  ?></p> 
          <div class="col-md-12 sombra"  id="customers" style=" min-height:100px; margin-bottom: 30px; ">

                    <table class="table table-hover" id="lectDiaria">
                      <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Registros</th>
                          <th scope="col">Lunes</th>
                          <th scope="col">Miercoles</th>
                          <th scope="col">Jueves</th>
                         <th scope="col">Avance Semanal</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                         <?php       while(@$row1=$mostrarNivelPrimaria->fetch(PDO::FETCH_ASSOC)){
                          


                            //verificamos si ha realizad las lecturas diarias

                            $q6= ("SELECT * FROM micofre where idUsuario=:idUsuario and idLectura=:idLectura");
                            $palabrasMiCofre=$dbConn->prepare($q6);
                            $palabrasMiCofre->bindParam(':idUsuario',$row1['idUsuario'], PDO::PARAM_INT);
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


                          ?>
                        <tr>
                            
                          <td><?php echo $row1['nombre'].' '.$row1['apellido']; ?></td>
                          <td>
                                                        
                        Detalle                        
                        </div>
                          </td>
                          <td>P</td>
                          <td>P</td>
                          <td>P</td>
                          <td>0%</td>
                        </tr>
                              <?php } ?>                    
                                                        
                      </tbody>
                    </table>         
          </div> 



          <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px;">Lecturas De Medición</div>
          <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-left:510px;background-color: #c0392b; color: white; border:white;">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button"style="background-color: #16a085; color: white; border:white;">EXCEL</button>

          <div class="col-md-12 sombra" style=" min-height:100px;  margin-bottom: 50px; overflow: auto;">

                    <table class="table table-hover" id="ejemplo">
                        <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Semana</th>
                          <th scope="col">Lectura</th>
                          <th scope="col">Comprensión CNB</th>
                          <th scope="col">Comprensión PISA</th>
                          <th scope="col">Glosario</th>
                          <th scope="col">Con Tus Palabras</th>
                          <th scope="col">Evaluación Personajes</th>
                          <th scope="col">Total Lectura</th>
                        </tr>
                      </thead>
                       <?php       while(@$rowr2=$mostrarNivelPV->fetch(PDO::FETCH_ASSOC)){ ?> 

                       <tr> 
                       <td><strong><?php echo $rowr2['nombre'].' '.$rowr2['apellido']; ?></strong></td>  
                        <td><strong>Semana 1</strong></td>   
                          <td><strong>El gato con botas</strong></td>
                          <td>
                            <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0
                        </button></a>                       
                        </div>
                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">B1
                        </button></a>
                        
                        </div>

                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1">
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0 Detalle
                        </button></a>
                        
                        </div>

                          </td>
                           <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">Finalizado Detalle 
                        </button></a>
                        
                        </div>

                          </td>
                            <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" target="">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0 Detalle
                        </button></a>
                        
                        </div>

                          </td>
                             <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" >00</div></td>
                        </tr> 
        <?php } ?>
                      </tbody>
                    </table>         
          </div>

               <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 15px; background-color: #9b59b6; color: white; border-radius: 5px;">Medición Fluidez Verbal y </div>
          <button class="btn btn-default botonAgg botonAgg-1" type="button"style="margin-left:510px;background-color: #c0392b; color: white; border:white;">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="background-color: #16a085; color: white; border:white;">EXCEL</button>

          <div class="col-md-12 sombra" style=" min-height:100px;  margin-bottom: 50px;">

                    <table class="table table-hover" id="ejemplo">
                      <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Semana</th>
                          <th scope="col">Lectura </th>
                          <th scope="col">Velocidad Lectora(palabras por minuto)</th>
                          <th scope="col">Fluidez Verbal en porcentaje</th>
                          <th scope="col">Más detalle Graficos</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <?php   while(@$rowr2=$mostrarNivelVL->fetch(PDO::FETCH_ASSOC)){ 

                           $qin1= ("SELECT * FROM velocidadlectora where grado=:grado and semana=:semana");
                            $lecturaVelocidad=$dbConn->prepare($qin1);
                            $lecturaVelocidad->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT);
                            $lecturaVelocidad->bindParam(':semana',$_POST['semana'], PDO::PARAM_INT);
                            $lecturaVelocidad->execute();
                            while(@$rowr3=$lecturaVelocidad->fetch(PDO::FETCH_ASSOC)){ 
                          ?>
                          
                        <tr>     
                          <td><?php echo $rowr2['nombre'].' '.$rowr2['apellido']; ?></td>
                          <td><?php echo $_POST['semana']; ?></td>
                          <td><?php echo $rowr3['nombreLectura']; ?></td>
                          <td>0</td>
                          <td>0</td>
                          <td> 
                              <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">Detalle
                        </button>
                        
                        </div></td>
                          </tr> 
                       <?php }} ?>
                      </tbody>
                    </table>         
          </div>      
     





<?php }else{ ?>

<div class="col-md-12 sombra text-left" style="text-align:center; margin-top:200px; min-height:50px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px; <?php echo $busquedaPrimaria; ?>"><h1>Ninguna busqueda.. :)</h1> </div>

<?php } ?>
     

   <script>

    //funcion para exportar desde excel
    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}  


//funcion para exportar en pdf
 function demoFromHTML() {
            var fechaPdf=$('#fechaPdf').text();
            var grado=$('#gradoPdf').text();

            var pdf = new jsPDF('p', 'pt', 'letter');
           
            //source can be HTML-formatted string, or a reference
            //to an actual DOM element from which the text will be scraped.
            source = $('#customers')[0];
            pdf.text(20, 20, 'Reporte LecturasDiarias'+fechaPdf);
             pdf.text(20, 45, 'Grado: '+grado+' Primaria');


            //we support special element handlers. Register them with jQuery-style 
            //ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
            //There is no support for any other type of selectors 
            //(class, of compound) at this time.
            specialElementHandlers = {
                //element with id of "bypass" - jQuery style selector
                '#bypassme': function(element, renderer) {
                    //true = "handled elsewhere, bypass text extraction"
                    return true
                }
            };
            margins = {
                top: 50,
                bottom: 20,
                left: 20,
                width: 800
            };
            //all coords and widths are in jsPDF instance's declared units
            //'inches' in this case
            pdf.fromHTML(
                    source, //HTML string or DOM elem ref.
                    margins.left, //x coord
                    margins.top, {//y coord
                        'width': margins.width, //max width of content on PDF
                        'elementHandlers': specialElementHandlers
                    },
            function(dispose) {
                //dispose: object with X, Y of the last line add to the PDF 
                //         this allow the insertion of new lines after html
                pdf.save('Reporte Lecturas Diarias.pdf');
            }
            , margins);
        }
 </script> 





<?php


///funcion busqueda alumnos por BASICOS

if(isset($_POST['basicosSet'])){

//lecturas Diarias
 $q1 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelPrimaria=$dbConn->prepare($q1);
      $mostrarNivelPrimaria->bindParam(':grado',$_POST['basicosSet'], PDO::PARAM_INT); 
      $mostrarNivelPrimaria->execute();

//lecturas Medición
 $qr2 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelPV=$dbConn->prepare($qr2);
      $mostrarNivelPV->bindParam(':grado',$_POST['basicosSet'], PDO::PARAM_INT); 
      $mostrarNivelPV->execute();

//lecturas velocidad
 $qr3 = ("SELECT * FROM usuarios where grado=:grado and tipoUsuario=1");
      $mostrarNivelVL=$dbConn->prepare($qr3);
      $mostrarNivelVL->bindParam(':grado',$_POST['basicosSet'], PDO::PARAM_INT); 
      $mostrarNivelVL->execute();

 ?>

       
 <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 25px; margin-top: 50px; background-color: #2980b9; color: white; border-radius: 5px;">Lecturas Diarias</div>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-top:50px;  margin-left:510px;background-color: #c0392b; color: white; border:white;" onclick="demoFromHTML();">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-top:50px; background-color: #16a085; color: white; border:white;" onclick = "exportTableToExcel ('lectDiaria','LecturasDiarias')">EXCEL</button>
           <p id="gradoPdf"><?php echo $_POST['basicosSet'];  ?></p> 
          <div class="col-md-12 sombra"  id="customers" style=" min-height:100px; margin-bottom: 30px; ">

                    <table class="table table-hover" id="lectDiaria">
                      <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Registros</th>
                          <th scope="col">Lunes</th>
                          <th scope="col">Miercoles</th>
                          <th scope="col">Jueves</th>
                         <th scope="col">Avance Semanal</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                         <?php       while(@$row1=$mostrarNivelPrimaria->fetch(PDO::FETCH_ASSOC)){
                          


                            //verificamos si ha realizad las lecturas diarias

                            $q6= ("SELECT * FROM micofre where idUsuario=:idUsuario and idLectura=:idLectura");
                            $palabrasMiCofre=$dbConn->prepare($q6);
                            $palabrasMiCofre->bindParam(':idUsuario',$row1['idUsuario'], PDO::PARAM_INT);
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


                          ?>
                        <tr>
                            
                          <td><?php echo $row1['nombre'].' '.$row1['apellido']; ?></td>
                          <td>
                                                        
                        Detalle                        
                        </div>
                          </td>
                          <td>P</td>
                          <td>P</td>
                          <td>P</td>
                          <td>0%</td>
                        </tr>
                              <?php } ?>                    
                                                        
                      </tbody>
                    </table>         
          </div> 




<div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px;">Lecturas De Medición</div>
          <button class="btn btn-default botonAgg botonAgg-1" type="button" style="margin-left:510px;background-color: #c0392b; color: white; border:white;">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button"style="background-color: #16a085; color: white; border:white;">EXCEL</button>

          <div class="col-md-12 sombra" style=" min-height:100px;  margin-bottom: 50px; overflow: auto;">

                    <table class="table table-hover" id="ejemplo">
                        <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Semana</th>
                          <th scope="col">Lectura</th>
                          <th scope="col">Comprensión CNB</th>
                          <th scope="col">Comprensión PISA</th>
                          <th scope="col">Glosario</th>
                          <th scope="col">Con Tus Palabras</th>
                          <th scope="col">Evaluación Personajes</th>
                          <th scope="col">Total Lectura</th>
                        </tr>
                      </thead>
                       <?php       while(@$rowr2=$mostrarNivelPV->fetch(PDO::FETCH_ASSOC)){ ?> 

                       <tr> 
                       <td><strong><?php echo $rowr2['nombre'].' '.$rowr2['apellido']; ?></strong></td>  
                        <td><strong>Semana 1</strong></td>   
                          <td><strong>El gato con botas</strong></td>
                          <td>
                            <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0
                        </button></a>                       
                        </div>
                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">B1
                        </button></a>
                        
                        </div>

                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1">
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0 Detalle
                        </button></a>
                        
                        </div>

                          </td>
                           <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" >
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">Finalizado Detalle 
                        </button></a>
                        
                        </div>

                          </td>
                            <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="#" target="">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">0 Detalle
                        </button></a>
                        
                        </div>

                          </td>
                             <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" >00</div></td>
                        </tr> 
        <?php } ?>
                      </tbody>
                    </table>         
          </div>



               <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 15px; background-color: #9b59b6; color: white; border-radius: 5px;">Medición Fluidez Verbal y </div>
          <button class="btn btn-default botonAgg botonAgg-1" type="button"style="margin-left:510px;background-color: #c0392b; color: white; border:white;">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button" style="background-color: #16a085; color: white; border:white;">EXCEL</button>

          <div class="col-md-12 sombra" style=" min-height:100px;  margin-bottom: 50px;">

                    <table class="table table-hover" id="ejemplo">
                      <thead>
                        <tr>
                          <th scope="col">Alumno</th>
                          <th scope="col">Semana</th>
                          <th scope="col">Lectura </th>
                          <th scope="col">Velocidad Lectora(palabras por minuto)</th>
                          <th scope="col">Fluidez Verbal en porcentaje</th>
                          <th scope="col">Más detalle Graficos</th>
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <?php   while(@$rowr2=$mostrarNivelVL->fetch(PDO::FETCH_ASSOC)){ 

                           $qin1= ("SELECT * FROM velocidadlectora where grado=:grado and semana=:semana");
                            $lecturaVelocidad=$dbConn->prepare($qin1);
                            $lecturaVelocidad->bindParam(':grado',$_POST['basicosSet'], PDO::PARAM_INT);
                            $lecturaVelocidad->bindParam(':semana',$_POST['semana'], PDO::PARAM_INT);
                            $lecturaVelocidad->execute();
                            while(@$rowr3=$lecturaVelocidad->fetch(PDO::FETCH_ASSOC)){ 
                          ?>
                          
                        <tr>     
                          <td><?php echo $rowr2['nombre'].' '.$rowr2['apellido']; ?></td>
                          <td><?php echo $_POST['semana']; ?></td>
                          <td><?php echo $rowr3['nombreLectura']; ?></td>
                          <td>0</td>
                          <td>0</td>
                          <td> 
                              <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">Detalle
                        </button>
                        
                        </div></td>
                          </tr> 
                       <?php }} ?>
                      </tbody>
                    </table>         
          </div>      
     










    

         
     
<?php }else{ ?>

<div class="col-md-12 sombra text-left" style="text-align:center; margin-top:200px; min-height:50px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px; <?php echo $busquedaBasico; ?>"><h1>Ninguna busqueda.. :)</h1> </div>

<?php } ?>




<?php


///funcion busqueda alumnos por DIVER

if(isset($_POST['diverSet'])){

 $q1 = ("SELECT * FROM usuarios where grado=:grado");
      $mostrarNivelPrimaria=$dbConn->prepare($q1);
      $mostrarNivelPrimaria->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT); 
      $mostrarNivelPrimaria->execute();

      while(@$row1=$mostrarNivelPrimaria->fetch(PDO::FETCH_ASSOC)){ 

        //echo 'nombreAlumno==' .$row1['nombre'];
      

 ?>





<?php }}else{ ?>

<div class="col-md-12 sombra text-left" style="text-align:center; margin-top:200px; min-height:50px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px; <?php echo $busquedaDiver; ?>"><h1>Ninguna busqueda.. :)</h1> </div>

<?php } ?>


<?php


///funcion busqueda alumnos por PREESCO

if(isset($_POST['preescolarSet'])){

 $q1 = ("SELECT * FROM usuarios where grado=:grado");
      $mostrarNivelPrimaria=$dbConn->prepare($q1);
      $mostrarNivelPrimaria->bindParam(':grado',$_POST['primariaSet'], PDO::PARAM_INT); 
      $mostrarNivelPrimaria->execute();

      while(@$row1=$mostrarNivelPrimaria->fetch(PDO::FETCH_ASSOC)){ 

       // echo 'nombreAlumno==' .$row1['nombre'];
      

 ?>




<?php }}else{ ?>

<div class="col-md-12 sombra text-left" style="text-align:center; margin-top:200px; min-height:50px; margin-bottom: 15px; background-color:#1abc9c; color: white; border-radius: 5px;<?php echo $busquedaPrepri; ?>"><h1>Ninguna busqueda.. :)</h1> </div>

<?php } ?>





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