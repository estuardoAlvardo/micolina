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

    $q1 = ("SELECT * FROM objetosPreescolar where idObjeto=:idObjeto and recurso!=''");
      $mostrarRecurso=$dbConn->prepare($q1);      
       $mostrarRecurso->bindParam(':idObjeto',$_GET['frag'], PDO::PARAM_INT); 
      $mostrarRecurso->execute();





 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Mis Cursos</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="../css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerias para el funcionamiento del calendario -->
     <!-- JQUERY FUNCIONAL -->
   <script src='../../js/jquery.min.js'></script>

    <!-- LIBRERIAS RECONOCIMIENTO DE VOZ -->
  

  <script src="../../js/artyom/artyom.min.js"></script>
  <script src="../../js/artyom/artyom.window.js"></script>
  <script src="../../js/artyom/artyomCommands.js"></script>

 <script type="text/javascript" src="../extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="../extras/modernizr.2.5.3.min.js"></script>


 
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../../static/nav.php'; $nivell=2; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../../static/lat-izquierdo.php'; $nivel=2; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->

<style type="text/css">

body{
  overflow-x: none;
}

.cajaCards{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                      border-radius: 5px;
                      height: 100px; 
                      margin-bottom: 20px;
                      padding-top: 10px;
                    }

                    .cajaCards:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 10px;
                      cursor: pointer;

                    }

                    .cajaGrado{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 5px;


                    }

                    .btnGrado{
                       box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                       transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                       height:50px; padding-top: 20px; background-color:#2980b9;
                       margin-bottom: 20px;
                       border-radius: 10px;

                    }
                    .btnGrado:hover{
                      box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                      cursor: pointer;
                    }


                    /* acordion css*/
  
                    .estiloProducto{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }

                    .estiloProducto:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                    }

.cardGlosario {
 
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  margin: 20px;
  
  margin-bottom: 50px;
  transition: all .2s ease-in-out;
  text-decoration: none;
  color: black; 
  border-radius:5px;
}

.cardGlosario:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.recodinggN {
 
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
transition: all .2s ease-in-out;
}

.recodinggN:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}


/*estilos alerta */
@import url(https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic);
@-webkit-keyframes popUpEntrada {
  0%{opacity: 0; margin-top: -20%;}
  75%{margin-top: 5%;}
  100%{opacity: 1;}
}
@keyframes popUpEntrada {
  0%{opacity: 0; margin-top: -20%;}
  75%{margin-top: 5%;}
  100%{opacity: 1;}
}
@-webkit-keyframes popUpSaida {
  0%{opacity: 1;}
  75%{opacity: 1; margin-top: -20%;}
  100%{opacity: 0;margin-top: 40%;}
}
@keyframes popUpSaida {
  0%{opacity: 1;}
  75%{opacity: 1; margin-top: -20%;}
  100%{opacity: 0;margin-top: 40%;}
}
body, html, root, document{
  display: block
  height: 500px;
}
 .popUpFundo{
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color:#4879c3;
    opacity: 0.8;
    z-index: 50;
}
.popUp{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    display: none;
    position: fixed;
    top: 40%;
    left: 50%;
    padding: 0;
    font-size: 14px;
    font-family: 'PT Sans', sans-serif;
    color: #fff;
    border-style:none;
    z-index: 999;
    overflow: hidden;
}
.popUp button:focus{
    outline-style: none;
}
.popUp>h1{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 5px;
    min-height: 40px;
    font-size: 1.2em;
    font-weight: bold;
    text-align: center;
    color: #fff;
    background-color: transparent;
    border-style: none;
    border-width: 5px;
    border-color: black;
}
.vermelha>h1{
    border-color: #fa5032;
}
.verde>h1{
    border-color: #42ad4f;
}
.azul>h1{
    border-color: #659cff;
}

.popUp>div{
    display: block;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 5%;
    text-align: center;
    vertical-align: middle;
    border-width: 1px;
    border-color: #ccc;
    border-style: none none solid none;
    overflow: auto;
}
.popUp>div>span{
    display: table-cell;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 0;
    vertical-align: middle;
}
.popUp>button{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    margin: 0;
    padding: 10px;
    width: 50%;
    border: 1px none #ccc;
    color: #fff;
    font-family: inherit;
    cursor: pointer;
}
.alert{
    width: 100% !important;
}
.popUp .puCancelar{
    float: left;
}

.popUp .puEnviar{
    float: right;
}

.p{
    margin: 0;
    width: 100%;
    max-width: 300px;
    height: 100%;
    max-height: 200px;
    transform: translate(-50%, -50%);
}

.p>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    
}
.p>div>div, .p span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 300px;
    height: 108px;
    margin: 0;
    padding: 0;
    border-style: none;

}

.p>button{
    height: 50px;
    
}
.puEnviar{
    margin: 5px 0;
}
.puCancelar{
    margin: 5px 0;
}


.m{
    margin: 0;
    width: 100%;
    max-width: 400px;
    height: 100%;
    max-height: 300px;
    transform: translate(-50%, -50%);
}
.m>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    border-color:#ccc;
}
.m>div>div, .m>span, .m>div>span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 400px;
    height: 208px;
    margin: 0;
    padding: 0;
    border-style: none;
}

.m>button{
    height: 50px;
}

.g{
    margin: 0;
    width: 100%;
    max-width: 600px;
    height: 100%;
    max-height: 500px;
    transform: translate(-50%, -50%);
}
.g>div{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    height: calc(100% -108px);
    margin: 0;
    padding: 0;
    border-style: none;
    border-color: #ccc;
}
.g>div>div, .g span{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 600px;
    height: 408px;
    margin: 0;
    padding: 0;
    border-style: none;
}
.g>button{
   height: 60px;
}


.alert.puEnviar{
    display: none;
}

.popUpEntrada{
    display: block !important;
    animation: popUpEntrada 0.5s;
    -webkit-animation: popUpEntrada 0.5s;
}
.popUpSaida{
    display: block !important;
    animation: popUpSaida 0.5s;
    -webkit-animation: popUpSaida 0.5s;
    -webkit-animation-fill-mode: forwards;
    animation-fill-mode: forwards;
}

.blue{
    background-color:#51b2d6;
}
.blue>button{
    background-color:#38a7d0;
}
.blue>button:hover{
    background-color:#72c1de;
}
.popUpFundo.blue{
    background-color:#134152;
}
.green{
    background-color: #43b649;
}
.green>button{
    background-color:#3da743;
}
.green>button:hover{
    background-color:#4fbe55;
}
.popUpFundo.green{
    background-color:#173f19;
}
.red{
    background-color: #d55c4b;
}
.red>button{
    background-color: #d04b38;
}
.red>button:hover{
    background-color: #d86959;
}
.popUpFundo.red{
    background-color:#4a1811;
}
.orange{
    background-color: #f9a025;
}
.orange>button{
    background-color: #f89710;
}
.orange>button:hover{
    background-color: #f9ac42;
}
.popUpFundo.orange{
    background-color: #8c5b02;
}
.purple{
    background-color: #ab4bd5;
}
.purple>button{
    background-color: #a238d0;
}
.purple>button:hover{
    background-color: #b159d8;
}
.popUpFundo.purple{
    background-color: #3f114a;
}
.white{
    background-color: #fff;
    color: #555;
}
.white>h1{
  color: #000;
}
.white>button{
    background-color: #f3f3f3;
    color: #555;
}
.white>button:hover{
    background-color: #e3e3e3;
}

.popUpFundo.white{
    background-color:#555;
}


/*
That part is just for the form
*/
.colorfulForm{
  width: 350px;
  margin: 60px auto;
}
.colorfulForm input, .colorfulForm textarea, .colorfulForm select{
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  width: 350px;
  padding: 5px;
  background-color: #f3f3f3;
  border: 1px solid #ccc;
  border-radius: 2px; 
}

.colorfulForm label{
  display: block;
  font-family: Verdana, Arial;
  margin: 10px 0 5px 0;
}
.colorfulForm button{
  width: 100px;
  margin: 3px 7px;
  padding: 5px;
  color: #fff;
  border-style: none;
}


</style>






      <div class="col-md-8 col-xs-8 pag-center">
         <div class="card-style" style="width:60px; height: 60px; border-radius:100px; border:4px solid #f39c12; margin-left: 90%; margin-top: 20px; color: #d35400; cursor:pointer; position: absolute; z-index:6;" onclick="informacion();" title="¿Cómo Funciona?"><h1 style="margin-top:7px;">?</h1></div>
        <h3 style="margin-top: 50px;">Listado Recursos</h4>
          
             
          
          <span class="col-md-10 " id="span-preview1" style="display: none; border:1px solid #3498db; height: 200px; text-align: center;box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24); border-radius:5px;margin-left:30px; margin-bottom: 40px;"></span> 

          <input type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre']; ?>" style="display: none;">

         <div class="row">
              <table class="table table-hover" id="ejemplo" style="margin-top: 100px;">
                      <thead>
                        <tr>
                         
                          <th scope="col">Título Recurso</th>
                          <th scope="col">Descargar</th>
                          
                        </tr>
                      </thead>
                      <tbody class="text-left">
                        <tr> 
                        
                        <?php while(@$row1=$mostrarRecurso->fetch(PDO::FETCH_ASSOC)){ @$o+=1; ?> 
                          <td>Recurso lecto Escritura--> <?php  $objeto=$resultado = substr($row1['descripcionObjeto'], 0,9); echo $objeto; ?> </td>
                          <td><a title="<?php echo $row1['idFragmentoObjeto']; ?>" href="../../conection/descargarRecursos.php?frag=<?php echo $row1['idFragmentoObjeto']; ?>" target="_blank">
                        <button class="btn btn-default" type="button"style="background-color: #e67e22; color: white; border:white;">Descargar</button></a></td>
                                                 
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>         
         </div>

     



    
        </div>

<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../../static/lat-derecho.php';  $nivelll=2; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script   src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>