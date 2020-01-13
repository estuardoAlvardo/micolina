<?php 
session_start();

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}



//curso 1
$curso="Matemáticas";
$curso="";
$leccionRealizada=1; // varaiable dependera del uso en la base de datos
$leccionPendiente=4; // variable dependera del uso en la bd 

require("../conection/conexion.php");

$_SESSION['idUsuario'];



//$sql1 = ("SELECT * FROM registrocl2p2 where idIntento=:idIntento");
//$obtenerMatriz=$dbConn->prepare($sql1);
//$obtenerMatriz->bindParam(':idIntento', $_GET['idIntento'], PDO::PARAM_INT); 
//$obtenerMatriz->execute();

//variables de niveles
$nivelPrimaria=1;
$nivelBasico=2;
$nivelDiver=3;

 $q2 = ("SELECT * FROM atomolector where semana=:semana and grado=:grado");
      $buscarSemana=$dbConn->prepare($q2);
      $buscarSemana->bindParam(':semana',$_GET['semana'], PDO::PARAM_INT);
      $buscarSemana->bindParam(':grado',$_GET['gradoBuscar'], PDO::PARAM_INT);  
      $buscarSemana->execute();


//Buscar todos los cursos de este usuario primaria

//funcion encargada de asignar imagen segun primer letra del nombre del curso

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


  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php'; $nivell=1; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php';  $nivel=1; directoriosNiveles($nivel);?>
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
         <div class="col-md-12" style=" margin-bottom: 50px;">
              <h3 class="text-center">Atom Reportes - Detalle - Jose Manuel</h3>
         </div>
          <div class="col-md-3 sombra text-left" style="height:25px; margin-bottom: 15px;">Lecturas Diarias Semana 1</div>
            <button class="btn btn-default botonAgg botonAgg-1" type="button"style="margin-left:510px;background-color: #c0392b; color: white; border:white;">PDF</button>
            <button class="btn btn-default botonAgg botonAgg-1" type="button"style="background-color: #16a085; color: white; border:white;">EXCEL</button>

          <div class="col-md-12 sombra" style=" min-height:100px; margin-bottom: 30px; ">

                    <table class="table table-hover" id="ejemplo">
                      <thead>
                        <tr>
                          <th scope="col">Lectura </th>
                          <th scope="col">Dia</th>
                          <th scope="col">Fecha </th>
                          <th scope="col">Hora</th>
                          <th scope="col">Estado</th>
                          <th scope="col">Porcentaje Obtenido</th>
                         
                        </tr>
                      </thead>
                      <tbody class="text-left">
                       <?php  while(@$row1=$buscarSemana->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>     
                          <td><?php echo $row1['nombreLectura']; ?></td>
                          <td>Lunes</td>
                          <td>08/01/2019</td>
                          <td>9:00</td>
                          <td>ok</td>
                          <td>10%</td>
                          <td></td>
                        </tr>
                       <?php } ?> 
                        <tr>     
                          <td colspan="5">Total</td>
                          
                          <td>90%</td>
                        </tr>

                       
                                  
                      </tbody>
                    </table>         
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
     
    </script>
  </body>
</html>