<?php 
session_start();

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}



$_SESSION['tipoUsuario'];

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


    <!---- STREAMING LIBRERIAS ----->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
         <!---- STREAMING LIBRERIAS ----->
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

/*AREA DE CHAT --------------------------------*/
* {
  box-sizing: border-box;
}

body {
  background-color: #edeff2;
  font-family: "Calibri", "Roboto", sans-serif;
}



 </style>

 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style=" margin-bottom: 50px;">
              <h3 class="text-center">Atomo Streaming</h3>
         </div>
         
         <div class="col-md-12 sombra" style=" min-height: 500px; margin-bottom: 50px; ">
          <div  style="text-align: left; margin-left: 10px; width: 250px; height: 100px; margin-top: 10px; background-color: #d63031;  box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
            <h2 style="font-weight: bold; font-size: 50px; margin-left: 20px; color:white; margin-top: 20px; padding-top: 20px; z-index:1;">LIVE</h2>
            <p style="color:white; font-weight: bold; margin-top: -10px; margin-left: 23px;">Canales</p>
            <img src="../img/playBtn.png" width="60" height="60" style="margin-top: -120px;  margin-left: 140px;">
            
          </div>
          <div style="margin-top:-10px;width:250px; height: 50px; background-color: #2980b9; margin-left: 50px; z-index: 2; box-shadow: 0 19px 38px rgba(0,0,0,0.30), 0 15px 12px rgba(0,0,0,0.22);">
              <h2 style="color:white; padding-top: 10px;">STREAMING</h2>
          </div>
          <br>

          <?php if($_SESSION['tipoUsuario']==2){

            ?>

          <a href="streamingCrearCanal.php">
          <button class="btn botonAgg-1" type="button" aria-haspopup="true" aria-expanded="true" style="background-color: rgb(54, 171, 203); color: white; border:white; float: right; "><img src="../img/plus.png" width="30" height="30" style="margin-left: 5px; margin-right: 10px;">Crear Canal </button>
          </a><br><br>

        <?php } ?>







          <div style="margin-top: 50px;">
            
              <h2>Canales Habilitados</h2>
              <p></p>            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Titulo Transmisión</th>
                    <th>Nombre del Docente</th>
                    <th>Play</th>
                    <th>Conectados</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Sociales 2ero primaria</td>
                    <td>Jose Almeira</td>
                    <td><a href="streaming.php">Play</a></td>
                    <td>50</td>
                  </tr>
                  <tr>
                   <td>Fisica 2 4to Diversificado</td>
                    <td>Jose Almeira</td>
                    <td><a href="streaming.php">Play</a></td>
                    <td>50</td>
                  </tr>
                  <tr>
                   <td>Programacion 5to Diversificado</td>
                    <td>Jose Almeira</td>
                    <td><a href="streaming.php">Play</a></td>
                    <td>50</td>
                  </tr>
                </tbody>
              </table>
        
           </div>             

            
         </div>

             
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