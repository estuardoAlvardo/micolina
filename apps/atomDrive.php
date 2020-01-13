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
//Buscar todos los cursos de este usuario primaria

$q1 = ("SELECT * FROM atomodrive where idUsuario=:idUsuario");
$misDocumentos=$dbConn->prepare($q1);
$misDocumentos->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$misDocumentos->execute();

//Buscar totos los archivos compartidos conmigo

$q2 = ("SELECT * FROM atomodrivecompartir where idUsuarioCompartir=:idUsuario");
$compartidosConmigo=$dbConn->prepare($q2);
$compartidosConmigo->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$compartidosConmigo->execute();

//Buscar totos que comparti
$q5 = ("SELECT * FROM atomodrivecompartir where idUsuarioPropietario=:idUsuario");
$compartidocon=$dbConn->prepare($q5);
$compartidocon->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT); 
$compartidocon->execute();



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
    <!-- jquery funcional -->
    <script src='../js/jquery.min.js'></script>
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

/*modal*/
.miVentanaCss{

  position: fixed; 
  width: 550px; 
  min-height: 100px; 
  top: 10%; 
  left: 0;  
  background-color: #e67e22; 
  color: #ffffff; 
  display:none; 
  border-radius: 10px; 
  padding: 20px; 
  -webkit-box-shadow: -5px 9px 38px -5px rgba(0,0,0,0.75);
  -moz-box-shadow: -5px 9px 38px -5px rgba(0,0,0,0.75);
  box-shadow: -5px 9px 38px -5px rgba(0,0,0,0.75);
}

 </style>

 	<div class="col-md-8 col-xs-8 pag-center">
 		<div id="fondoModal" class="blurCircular">

         <div class="col-md-12" style="">
              <h3 class="text-center">AtomDrive</h3>
         </div>

         <div style="margin-right: 90%;">
            <div class="dropdown botonAgg botonAgg-1" >
            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: rgb(54, 171, 203); color: white; border:white;"><img src="../img/plus.png" width="30" height="30" style="margin-left: 5px; margin-right: 10px;">NUEVO              
              <span class="caret"></span>
            </button>
            
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1" style="margin-left:50px;">
              <li "><a href="#" class="btnSubir">subir archivo</a></li>
            </ul>
          </div>
        </div>
        <form action="atomDriveSubir.php" method="post" enctype="multipart/form-data">
        <input  type="file" class="subirArchivo" name="fotoPerfilUsuario" style="opacity:0;  margin-top: -15%; cursor: pointer; width: 100px; height: 100px; position: absolute; margin-left: 0px;"  >
        
       <br><br>
        <h4 class="text-left col-md-3 botonAgg-1 "  style="background-color: #e67e22; color: white; border-radius: 50px;">Mis Documentos <i class="glyphicon glyphicon-cloud"></i></h4><br><br><hr>
        <div>
                       <table class="table table-hover">
                <thead>
                  <tr>
                  
                    <th scope="col">Nombre Documento</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <?php while($row1=$misDocumentos->fetch(PDO::FETCH_ASSOC)){                
               
                 ?>  
                  <tr>   

                    <td><?php echo $row1['nombreArchivo']; ?>
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #e67e22; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="atomoDriveDescargar.php?file=<?php echo $row1['nombreArchivo']; ?>&id=<?php echo $_SESSION['idUsuario']; ?>">Descargar</a></li>
                          <li><a href="#" id="<?php echo $row1['idArchivo']; ?>" onclick="compartir(this.id);">Compartir</a></li>
                          <li><a href="#" id="<?php echo $row1['idArchivo']; ?>" onclick="eliminarArchivosss(this.id);">Eliminar</a></li>  
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td><?php echo $row1['peso']; ?></td>
                  <?php } ?>
                  </tr>
                 
                </tbody>
              </table>
        </div><br>

         <h4 class="text-left col-md-4 botonAgg-1" style="background-color: #8e44ad; color:white; border-radius: 50px;">Compartido Conmigo <i class="glyphicon glyphicon-gift"></i> </h4><br><br><hr>
        <div>
                  <table class="table table-hover">
                <thead>
                        
                  <tr>                      
                   
                    <th scope="col">Nombre Archivo</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                  <?php     while($row2=$compartidosConmigo->fetch(PDO::FETCH_ASSOC)){

                $q3 = ("SELECT * FROM atomodrive where idArchivo=:idArchivo");
                $detalleArchivoCompartir=$dbConn->prepare($q3);
                $detalleArchivoCompartir->bindParam(':idArchivo',$row2['idArchivo'], PDO::PARAM_INT); 
                $detalleArchivoCompartir->execute();

               while($row3=$detalleArchivoCompartir->fetch(PDO::FETCH_ASSOC)){


                $q4 = ("SELECT * FROM usuarios where idUsuario=:idUsuario");
                $detalleUsuarioCompartio=$dbConn->prepare($q4);
                $detalleUsuarioCompartio->bindParam(':idUsuario',$row3['idUsuario'], PDO::PARAM_INT); 
                $detalleUsuarioCompartio->execute();

                while($row4=$detalleUsuarioCompartio->fetch(PDO::FETCH_ASSOC)){


                 ?>
                <tbody class="text-left">
                  <tr>                    
                    <td><?php echo $row3['nombreArchivo']; ?>
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #8e44ad; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="atomoDriveDescargar.php?file=<?php echo $row3['nombreArchivo']; ?>&id=<?php echo $row3['idUsuario']; ?>">Descargar</a></li>
                          <li><a href="#" id="<?php echo $row2['idArchivo']; ?>" onclick="eliminarCompartir(this.id);">Eliminar</a></li>            
                        </ul>
                        </div>
                    </td>
                    <td><?php echo $row4['nombre']." ".$row4['apellido']; ?></td>
                    <td><?php echo $row3['peso']; ?></td>
                  </tr>
                    <?php } 
                  }

                }
                   ?>         
                </tbody>
              </table>
        </div><br>

        <h4 class="text-left col-md-3 botonAgg-1" style="background-color: #16a085; color: white; border-radius: 50px;">Compartidos con: <i class="glyphicon glyphicon-transfer"></i></h4><br><br><hr>
        <div>
                 <table class="table table-hover">
                <thead>
                  <tr>
                   
                    <th scope="col">Nombre Archivo</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Se compartio a:</th>
                    <th scope="col">Tamaño Archivo</th>
                  </tr>
                </thead>
                <tbody class="text-left">
                  <?php while($row5=$compartidocon->fetch(PDO::FETCH_ASSOC)){                
                     
                      //en este ciclo accedo a la tabla atomodrivecompartir
                       $q6 = ("SELECT * FROM usuarios where idUsuario=:idUsuario");
                      $usuarioCompartido=$dbConn->prepare($q6);
                      $usuarioCompartido->bindParam(':idUsuario',$row5['idUsuarioCompartir'], PDO::PARAM_INT); 
                      $usuarioCompartido->execute();

                      while($row6=$usuarioCompartido->fetch(PDO::FETCH_ASSOC)){
                                             
                      //en este ciclo accedo a la tabla usuarios

                      $q7 = ("SELECT * FROM atomodrive where idArchivo=:idArchivo");
                      $detalleComparti=$dbConn->prepare($q7);
                      $detalleComparti->bindParam(':idArchivo',$row5['idArchivo'], PDO::PARAM_INT); 
                      $detalleComparti->execute();
                       while($row7=$detalleComparti->fetch(PDO::FETCH_ASSOC)){
                      
                       //en este cilo accedo a la tabla atomodrive
                    
                 ?> 
                  <tr>                    
                    <td><?php echo $row7['nombreArchivo']; ?>
                       <div class="dropdown botonAgg botonAgg-1" >
                        <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="background-color: #16a085; color: white; border:white;">
                          
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="margin-left: 50%;">
                          <li><a href="#" id="<?php echo $row5['idArchivo']; ?>" onclick="eliminarCompartirA(this.id);">Eliminar</a></li>             
                        </ul>
                        </div>
                    </td>
                    <td>yo</td>
                    <td><?php echo $row6['nombre']." ".$row6['apellido']; ?></td>
                    <td><?php echo $row7['peso']; ?></td>
                  </tr>
                  <?php     }
                        }
                    }
                     ?>
                </tbody>

              </table>
        </div><br>
      </div>

      

		   <div id="crearLeccion"  class="miVentanaCss">
            <div class="row">
              <div class="col-md-11 text-left" style=" margin-left:0; padding-bottom:5px; ">
                <h4 class="text-center">Se cargo correctamente ¿Guardar en mis documentos?</h4>
                <br><br>                
                  <label style="color: black;" class="col-sm-12 control-label archivoSelec" style="text-align: center; display: none;"></label>  
                 <br>
                              
              </div>
            </div>
            <br> 
            <div class="row" >
              <div class="col-md-5"></div>
              <input style="  background-color: #2980b9; border:1px solid #2980b9; padding: 2px; border-radius: 5px;" type="submit" name="enviar" value="GUARDAR" class="col-md-3 botonAgg-1"> 
              </form>
            <button class="col-md-3 botonAgg-1" onclick="ocultarLeccion()" style="margin-left:10px; background-color: #e74c3c; border:1px solid #e74c3c; padding: 2px; border-radius: 5px; ">CANCELAR</button>            
            </div>    
      </div>


      <div id="eliminarArchivo"  class="miVentanaCss" style="background-color: #e74c3c;">
            <div class="row">
              <div class="col-md-11 text-left" style=" margin-left:0; padding-bottom:5px; ">
                <h4 class="text-center">¿Deseas Eliminar el archivo?</h4>                              
              <form action="atomDriveEliminar.php?primaryTable=1" method="post">
                <input style="margin-left: 30px; display: none;" class="col-md-6 form-control seleccionado" type="text"  name="idArchivoEliminar" id="rellenarEliminar"  required><br> 
                                               
              </div>
            </div>
            <br> 
            <div class="row" >
              <div class="col-md-5"></div>
              <input style="  background-color: #2980b9; border:1px solid #2980b9; padding: 2px; border-radius: 5px;" type="submit" name="enviar2" value="Si quiero eliminar" class="col-md-3 botonAgg-1"> 
              </form>
            <button class="col-md-3 botonAgg-1" onclick="ocultarEliminarA()" style="margin-left:10px; background-color: #e67e22; border:1px solid #e67e22; padding: 2px; border-radius: 5px; ">CANCELAR</button>            
            </div>    
      </div>

      <div id="eliminarCompartir"  class="miVentanaCss" style="background-color: #e74c3c;">
            <div class="row">
              <div class="col-md-11 text-left" style=" margin-left:0; padding-bottom:5px; ">
                <h4 class="text-center">¿Deseas Eliminar el archivo compartido conmigo?</h4>                              
              <form action="atomDriveEliminar.php?primaryTable=2" method="post">
                <input style="margin-left: 30px; display: none;" class="col-md-6 form-control seleccionado" type="text"  name="idArchivoEliminar" id="rellenarEliminarC"  required><br> 
                                               
              </div>
            </div>
            <br> 
            <div class="row" >
              <div class="col-md-5"></div>
              <input style="  background-color: #2980b9; border:1px solid #2980b9; padding: 2px; border-radius: 5px;" type="submit" name="enviar2" value="Si quiero eliminar" class="col-md-3 botonAgg-1"> 
              </form>
            <button class="col-md-3 botonAgg-1" onclick="ocultarEliminarC()" style="margin-left:10px; background-color: #e67e22; border:1px solid #e67e22; padding: 2px; border-radius: 5px; ">CANCELAR</button>            
            </div>    
      </div>


            <div id="eliminarCompartirA"  class="miVentanaCss" style="background-color: #e74c3c;">
            <div class="row">
              <div class="col-md-11 text-left" style=" margin-left:0; padding-bottom:5px; ">
                <h4 class="text-center">¿Deseas Eliminar el archivo que has compartido?</h4>                              
              <form action="atomDriveEliminar.php?primaryTable=2" method="post">
                <input style="margin-left: 30px; display: none;" class="col-md-6 form-control seleccionado" type="text"  name="idArchivoEliminar" id="rellenarEliminarA"  required><br> 
                                               
              </div>
            </div>
            <br> 
            <div class="row" >
              <div class="col-md-5"></div>
              <input style="  background-color: #2980b9; border:1px solid #2980b9; padding: 2px; border-radius: 5px;" type="submit" name="enviar2" value="Si quiero eliminar" class="col-md-3 botonAgg-1"> 
              </form>
            <button class="col-md-3 botonAgg-1" onclick="ocultarEliminarA()" style="margin-left:10px; background-color: #e67e22; border:1px solid #e67e22; padding: 2px; border-radius: 5px; ">CANCELAR</button>            
            </div>    
      </div>




         <div id="compartir"  class="miVentanaCss" style=" background-color: #16a085;">
            <div class="row">
              <div class="col-md-11 text-left" style=" margin-left:0; padding-bottom:5px; ">
                <h4 class="text-center">Selecciona la carpeta o ingresa correo</h4>
                <br> 
                <div style="margin-left: 35px;">
                  <!-- oculto para alumno mostrar para otros roles--->
                <label id="1" class="radio-inline botonAgg-1 col-md-4" name="1" onclick="seleccionarCarpeta(this.id);" style="border-radius:10px; background-color:#eb2f06; display: none;">Coordinación</label>
               <label id="2" class="radio-inline botonAgg-1 col-md-3" name="2" onclick="seleccionarCarpeta(this.id)" style="border-radius:10px; background-color:#eb2f06; display: none;"> Orientación </label>
               <label id="3" class="radio-inline botonAgg-1 col-md-3" name="3" onclick="seleccionarCarpeta(this.id)"  style="border-radius:10px; background-color:#eb2f06; display: none;">Secretaria</label>
               <!-- oculto para alumno mostrar para otros roles--->
              <form action="atomDriveCompartir.php" method="post">
                  <input type="radio" id="11" name="carpetasD" value="Coordinacion" style="display:none;">
                  <input type="radio" id="22" name="carpetasD" value="Orientacion" style="display: none;" >
                  <input type="radio" id="33" name="carpetasD" value="Secretaria" style="display: none">
                 </div> 
                  <br>
                  <br>
                  <input type="text" name="idArchivoEnviar" id="archivoId" style="display: none;">
                   <input style="margin-left: 30px;" class="col-md-6 form-control seleccionado" type="text"  name="correo" placeholder="Ingrese Correo" required><br> 
                <div class="row" style="margin-top: 50px;" >
                <div class="col-md-5"></div>              
                  <input style="  background-color: #2980b9; border:1px solid #2980b9; padding: 2px; border-radius: 5px;" type="submit" name="enviar" value="COMPARTIR" class="col-md-3 botonAgg-1"> 
                </form>
                <button class="col-md-3 botonAgg-1" onclick="ocultarCompartir()" style="margin-left:10px; background-color: #e74c3c; border:1px solid #e74c3c; padding: 2px; border-radius: 5px; ">CANCELAR</button>               
            </div>  
          </div> 
        </div>         
     </div>  
    </div>
              

<script type="text/javascript">
         $('.btnSubir').click(function(event) {
         $('.subirArchivo').click();
        });
            //capture selected filename 
        $('.subirArchivo').change(function(click) {
          var body =  document.getElementById('fondoModal');
            var ventana = document.getElementById('crearLeccion');
            ventana.style.marginTop = "100px";
            ventana.style.left = ((document.body.clientWidth-500) / 2) +  "px";
            ventana.style.display = 'block';
            body.style.filter="blur(10px)";
          $('.archivoSelec').show();
          $('.archivoSelec').text(this.value);
        });

  function ocultarLeccion()
          {

            var body =  document.getElementById('fondoModal');
              var ventana = document.getElementById('crearLeccion');
             
              ventana.style.display = 'none';
              body.style.filter="blur(0px)";
          }


  function compartir(clicked_id){

            var archivo=clicked_id;
            //alert(archivo);
            var body =  document.getElementById('fondoModal');
            var ventana = document.getElementById('compartir');
            ventana.style.marginTop = "100px";
            ventana.style.left = ((document.body.clientWidth-500) / 2) +  "px";
            ventana.style.display = 'block';
            body.style.filter="blur(10px)";
            $("#archivoId").val(archivo);

  }  
  function ocultarCompartir()
          {

            var body =  document.getElementById('fondoModal');
              var ventana = document.getElementById('compartir');
             
              ventana.style.display = 'none';
              body.style.filter="blur(0px)";
          }   

   //funciones para compartir archivo
   
  function seleccionarCarpeta(clicked_id){

     var carpeta=clicked_id;
     var nuevaCarpeta=parseInt(carpeta);
      //alert(nuevaCarpeta);

    if(nuevaCarpeta==1){
      var nombreCarpeta="coordinacion";
      $('.seleccionado').val("@"+nombreCarpeta);
      $('input:radio[name=carpetasD]')[0].checked = true;
    }
    if(nuevaCarpeta==2){
      var nombreCarpeta="orientacion";
      $('.seleccionado').val("@"+nombreCarpeta);
      $('input:radio[name=carpetasD]')[1].checked = true;
    }
    if(nuevaCarpeta==3) {
      var nombreCarpeta="secretaria";
      $('.seleccionado').val("@"+nombreCarpeta);
      $('input:radio[name=carpetasD]')[2].checked = true;
    }
   }   


   function eliminarArchivosss(clicked_id){
    
    

          var idNewid=clicked_id;
            //alert(archivo);
            var body =  document.getElementById('fondoModal');
            var ventana = document.getElementById('eliminarArchivo');
            ventana.style.marginTop = "100px";
            ventana.style.left = ((document.body.clientWidth-500) / 2) +  "px";
            ventana.style.display = 'block';
            body.style.filter="blur(10px)";
           $("#rellenarEliminar").val(idNewid);

           
      

       } 


   function ocultarEliminarA(){

      var body =  document.getElementById('fondoModal');
              var ventana = document.getElementById('eliminarArchivo');
             
              ventana.style.display = 'none';
              body.style.filter="blur(0px)";
   } 


   function eliminarCompartir(clicked_id){
    
    

          var idNew1=clicked_id;
            //alert(archivo);
            var body =  document.getElementById('fondoModal');
            var ventana = document.getElementById('eliminarCompartir');
            ventana.style.marginTop = "100px";
            ventana.style.left = ((document.body.clientWidth-500) / 2) +  "px";
            ventana.style.display = 'block';
            body.style.filter="blur(10px)";
           $("#rellenarEliminarC").val(idNew1);

           
      

       } 


   function ocultarEliminarC(){

             var body =  document.getElementById('fondoModal');
              var ventana = document.getElementById('eliminarCompartir');
             
              ventana.style.display = 'none';
              body.style.filter="blur(0px)";
   }           

   function eliminarCompartirA(clicked_id){
    
    

          var idNew2=clicked_id;
            //alert(archivo);
            var body =  document.getElementById('fondoModal');
            var ventana = document.getElementById('eliminarCompartirA');
            ventana.style.marginTop = "100px";
            ventana.style.left = ((document.body.clientWidth-500) / 2) +  "px";
            ventana.style.display = 'block';
            body.style.filter="blur(10px)";
           $("#rellenarEliminarA").val(idNew2);

           
      

       } 


   function ocultarEliminarA(){

             var body =  document.getElementById('fondoModal');
              var ventana = document.getElementById('eliminarCompartirA');
             
              ventana.style.display = 'none';
              body.style.filter="blur(0px)";
   }    
        </script>


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