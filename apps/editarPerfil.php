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

$_SESSION['idUsuario'];

/*-------*/
$_SESSION["imgPerfil"];

//@$nivel1="../app/";

if(empty($_SESSION["imgPerfil"])){
 $imgPerfilVeri="../img/profile.png";
}else{
$imgPerfilVeri=$_SESSION["imgPerfil"];

}



//variables de niveles
$nivelPrimaria=1;
$nivelBasico=2;
$nivelDiver=3;

//Buscar todos los cursos de este usuario primaria







 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mi Perfil</title>
 
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


/*efectos imputs editar perfil*/
 .inputGeneral{
  float: left; outline:0px; border:0;border-bottom:1px solid gray;
transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);

 }
.inputGeneral:hover{
  float: left; outline:0px; border:0;border-bottom:3px solid #B53471;
}


.card-1 {
   box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}


 </style>



 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style=" margin-bottom: 50px;">
              <h3 class="text-center">Mi Perfil</h3>
         </div>

         <div class="col-md-12 sombra" style="min-height:600px; margin-left:0px; margin-right: 70px; margin-bottom: 50px;">
          <img src="../img/edicion.gif" width="50" height="50" style="float: right;">
          <form method="post" action="actualizarPerfil.php" enctype="multipart/form-data" accept="image-*">
          <img class="card-1"  style="float: left; margin-top: 40px; border-radius: 10px;" src="<?php echo $imgPerfilVeri; ?>" width="100" height="100"><br><br><br><br><br><br><br><br>
          
          <h4  class="cambioV" style="margin-top: -150px; margin-right:400px; display: none;">imagen preparada</h4>
            <img   id="blah" class="cambioV" src="http://placehold.it/100" alt="your image" width="100" height="100" style="margin-top: 0px; margin-left: -400px; display: none; border-radius: 10px;" />
          
          <input  type="file" onclick="func1();" onchange="readURL(this);" name="fotoPerfilUsuario" style="opacity:0;  margin-top: -15%; cursor: pointer; width: 100px; height: 100px; position: absolute; margin-left: 0px;"  ><br><br>
          
          <h4 style="text-align: left">Nombre</h4>
          <input class="input-lg inputGeneral" type="text" name="nombreActualizar"  value="<?php echo $_SESSION["nombre"]; ?>" /><br><br><br>

          <h4  style="text-align: left">Apellidos</h4>
          <input class="input-lg inputGeneral" type="text" name="apellidoActualizar"  value="<?php echo $_SESSION["apellido"]; ?>" /><br><br><br>
          <h4 style="text-align: left">Grado</h4>
          <input style="background-color: white;" class="input-lg inputGeneral" type="text"  disabled value="<?php echo $_SESSION["nombreGrado"]; ?>" /><br><br><br>
          <h4 style="text-align: left">Sección</h4>
          <input style="background-color: white;" class="input-lg inputGeneral"  type="text" disabled  value="<?php echo $_SESSION["seccion"]; ?>" />

          <div class="col-md-3" style="margin-top: -130px; margin-left: 20px;">
          <h4 style="text-align: left">Usario</h4>
          <input style="background-color: white;" class="input-lg inputGeneral"  type="text" disabled  value="<?php echo $_SESSION["usuario"]; ?>" /><br><br> <br>
          <h4 style="text-align: left">Contraseña</h4>
          <input style="background-color: white;" class="input-lg inputGeneral"  type="password" disabled  value="<?php echo $_SESSION["password"]; ?>" />
          </div>

          <input  class="btn btn-default botonAgg botonAgg-1" type="submit"style="margin-top: 40px; margin-right:-200px;background-color: #c0392b; color: white; border:white;" value="Aplicar Cambios"> 
          </form>
         </div>

         
         

       
     
             
      </div>
<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../static/lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="../js/jquery-3.2.1.js"></script>
<script type="text/javascript">

  function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    
                    $('#blah')
                        .attr('src', e.target.result);

                };

                
                reader.readAsDataURL(input.files[0]);

            }



        }
         function func1(){
         $('.cambioV').show();
       }   
        

 
</script>
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>

  </body>
</html>