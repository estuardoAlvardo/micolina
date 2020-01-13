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

$q1 = ("SELECT * FROM atomobullying");
$mostrarReporteBull=$dbConn->prepare($q1);
$mostrarReporteBull->execute();



 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Reporte Bullying</title>
 
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
/*estilos material design*/
.pure-material-switch {
    z-index: 0;
    position: relative;
    display: inline-block;
    color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.87);
    font-family: var(--pure-material-font, "Roboto", "Segoe UI", BlinkMacSystemFont, system-ui, -apple-system);
    font-size: 16px;
    line-height: 1.5;
}

/* Input */
.pure-material-switch > input {
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    z-index: -1;
    position: absolute;
    right: 6px;
    top: -8px;
    display: block;
    margin: 0;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
    outline: none;
    opacity: 0;
    transform: scale(1);
    pointer-events: none;
    transition: opacity 0.3s 0.1s, transform 0.2s 0.1s;
}

/* Span */
.pure-material-switch > span {
    display: inline-block;
    width: 100%;
    cursor: pointer;
}

/* Track */
.pure-material-switch > span::before {
    content: "";
    float: right;
    display: inline-block;
    margin: 5px 0 5px 10px;
    border-radius: 7px;
    width: 36px;
    height: 14px;
    background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
    vertical-align: top;
    transition: background-color 0.2s, opacity 0.2s;
}

/* Thumb */
.pure-material-switch > span::after {
    content: "";
    position: absolute;
    top: 2px;
    right: 16px;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    background-color: rgb(var(--pure-material-onprimary-rgb, 255, 255, 255));
    box-shadow: 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
    transition: background-color 0.2s, transform 0.2s;
}

/* Checked */
.pure-material-switch > input:checked {
    right: -10px;
    background-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
}

.pure-material-switch > input:checked + span::before {
    background-color: rgba(var(--pure-material-primary-rgb, 33, 150, 243), 0.6);
}

.pure-material-switch > input:checked + span::after {
    background-color: rgb(var(--pure-material-primary-rgb, 33, 150, 243));
    transform: translateX(16px);
}

/* Hover, Focus */
.pure-material-switch:hover > input {
    opacity: 0.04;
}

.pure-material-switch > input:focus {
    opacity: 0.12;
}

.pure-material-switch:hover > input:focus {
    opacity: 0.16;
}

/* Active */
.pure-material-switch > input:active {
    opacity: 1;
    transform: scale(0);
    transition: transform 0s, opacity 0s;
}

.pure-material-switch > input:active + span::before {
    background-color: rgba(var(--pure-material-primary-rgb, 33, 150, 243), 0.6);
}

.pure-material-switch > input:checked:active + span::before {
    background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
}

/* Disabled */
.pure-material-switch > input:disabled {
    opacity: 0;
}

.pure-material-switch > input:disabled + span {
    color: rgb(var(--pure-material-onsurface-rgb, 0, 0, 0));
    opacity: 0.38;
    cursor: default;
}

.pure-material-switch > input:disabled + span::before {
    background-color: rgba(var(--pure-material-onsurface-rgb, 0, 0, 0), 0.38);
}

.pure-material-switch > input:checked:disabled + span::before {
    background-color: rgba(var(--pure-material-primary-rgb, 33, 150, 243), 0.6);
}

 </style>



 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style=" margin-bottom: 50px;">
              <h3 class="text-center">Reporte Bullying</h3>
         </div>

         <div class="col-md-12 sombra" style="min-height:100px; margin-left:0px; margin-right: 70px; margin-bottom: 50px;">
           <table class="table">
    <thead>
      <tr>
        <th>Registro Alerta</th>
        <th>Tipo Agresión</th>
        <th>Nombre de la victima</th>
        <th>Grado Sección</th>
        <th>Nombre del agresor</th>
        <th>Grado Sección</th>
        <th>Descripción</th>
        <th>Resuelto</th>

        
      </tr>
    </thead>
    <tbody>
      <?php while($row1=$mostrarReporteBull->fetch(PDO::FETCH_ASSOC)){

      ?>

      <tr>
        <td><?php echo $row1['fechaAlerta']." ".$row1['horaAlerta']; ?></td>
        <td><?php echo $row1['tipoBullying']; ?></td>
        <td><?php echo $row1['nombreVictima']; ?></td>
        <td><?php echo $row1['gradoSeccionVictima']; ?></td>
        <td><?php echo $row1['nombreAgresor']; ?></td>
        <td><?php echo $row1['gradoSeccionAgresor']; ?></td>
        <td><?php echo $row1['descripcion']; ?></td>
        <td><label class="pure-material-switch">
  <input type="checkbox" <?php if($row1['resuelto']==1){ echo 'checked'; }else{  } ?> id="<?php echo $row1['idBullyng']; ?>" name="activonew" onclick="funcion1(this.id);">
  <span></span>
</label></td>


     <?php } ?>
     
    </tbody>
  </table>

         </div>
    <script type="text/javascript">



      function funcion1(clicked_id){

      let activo=$('input:checkbox[name=activonew]:checked').val();
      let idModificar=clicked_id;

      //alert(activo);

      
      if(activo=='on'){
        var estado='activo';
      $.ajax({
      type:'POST',
      url:'../conection/updateEstadoBullyng.php?accion='+estado+'&idMod='+idModificar,
      success:function(msg){
       console.log('funciono');
       location.reload();
      },
      error:function(){
        alert('hay un error');
      }
    });
      }

       if(activo==null){

        var estado='inactivo';
      $.ajax({
      type:'POST',
      url:'../conection/updateEstadoBullyng.php?accion='+estado+'&idMod='+idModificar,
      success:function(msg){
       console.log('funciono');
       location.reload();
      },
      error:function(){
        alert('hay un error');
      }
    });
      }





      }
    </script>  
             
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