<?php 
session_start();
  require("../conection/conexion.php");

//validacion session
header("Cache-control: private");
header("Cache-control: no-cache, must-revalidate");
header("Pragma: no-cache");
if(!isset($_SESSION['idUsuario'])) {
header('Location: ../index.html');
}

//curso 1
$_SESSION['idUsuario'];
$_SESSION['grado'];
$_SESSION['seccion'];

//variables de niveles
$nivelPrimaria=1;
$nivelBasico=2;
$nivelDiver=3;
$nivelPadre=1;

//consultarCursos($nivelPrimaria,$_SESSION['grado'],$_SESSION['seccion']);
//Buscar todos los cursos de este usuario primaria

/*
function consultarCursos($nivel1,$grado1,$seccion1){
  require("../conection/conexion.php");



if($seccion1==null){
$q1 = ("SELECT * FROM cursos where grado=:grado and nivel=:nivel");
$cursosPrimaria=$dbConn->prepare($q1);
$cursosPrimaria->bindParam(':grado',$grado1, PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':nivel',$nivel1, PDO::PARAM_INT); 
$cursosPrimaria->execute();
}else{

  $q1 = ("SELECT * FROM cursos where nivel=:nivel and grado=:grado and seccion=:seccion");
$cursosPrimaria=$dbConn->prepare($q1);
$cursosPrimaria->bindParam(':nivel',$nivel1, PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':grado',$grado1, PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':seccion',$seccion1, PDO::PARAM_INT); 

$cursosPrimaria->execute();

}


/*
$q1 = ("SELECT * FROM cursos where grado=:grado and nivel=:nivel and seccion= :seccion");
$cursosPrimaria=$dbConn->prepare($q1);
$cursosPrimaria->bindParam(':grado',$_SESSION['grado'], PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':nivel',$nivelPrimaria, PDO::PARAM_INT); 
$cursosPrimaria->bindParam(':seccion',$_SESSION['seccion'], PDO::PARAM_STR); 
$cursosPrimaria->execute();
*/

 ?>


<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title><?php echo $_SESSION["nombre"]; ?> | Familia</title>
 
    <!-- CSS de Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/navLateralesModPedagogico.css" rel="stylesheet" media="screen">
    <link href="../css/centroPagina.css" rel="stylesheet" media="screen">
    <link href="css/rol5FuncCursos.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">

     <!-- JQUERY FUNCIONAL -->
    <script src='../js/jquery.min.js'></script>
  </head>
  <body class="txt-fuente">

  
<!--NAVEGACION CONTENIDO FIJO -->
<?php include '../static/nav.php';  $nivell=1; directorioNivelesNav($nivell);?>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <?php include '../static/lat-izquierdo.php'; $nivel=1; directoriosNiveles($nivel);?>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO ROL 1 -->
 <style type="text/css">
   
   .cursoN{

 background-size: 160px;

 background-repeat: no-repeat;
  height: 178px;
  margin-left: 50px;
  border-radius: 15px;
   -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition:.2s ease-in-out;
    transition: .2s ease-in-out;
  margin-bottom: 40px;

}

.cursoN:hover{

  -webkit-box-shadow: 0px 3px 30px 0px rgba(0,0,0,0.75);
}


.pieCurso{ 
  width:181px;
  height:56px;
  margin-left: -15px;
  margin-top: 123px;
  padding-top: 20px;
  padding-left: 5px;
  border-radius: 0px 0px 15px 15px;
   -webkit-transition: .2s ease-in-out;
    -moz-transition: .2s ease-in-out;
    -o-transition:.2s ease-in-out;
    transition: .2s ease-in-out;
    overflow: hidden;
    background-color: rgba(10,38,64,0.5);
    color: white;
    
}
.pieCurso:hover{
background-color: rgba(10,38,64,0.7);
height:178px;
margin-top: 0px;
border-radius:15px;
color:white;
padding-top: -13px;
width: 181px;
}

.contenedorCurso{
  background-color:white;
    margin-top: 40px;
    height:200px;
    margin-left: 2%;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    -moz-border-radius:5px;
    padding: 0px;

 -webkit-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -moz-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -ms-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  -o-box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
  box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);



  -webkit-transition: 0.3s ease;
  -moz-transition: 0.3s ease;
  -ms-transition: 0.3s ease;
  -o-transition: 0.3s ease;
  transition: 0.3s ease;
   
    
    }


.contenedorCurso:hover{
-moz-box-shadow: 0px 3px 8px #000000;
-webkit-box-shadow: 0px 3px 8px #000000;
box-shadow: 0px 3px 8px #000000;
 }
    
.pieCurso2{
  background-color: #36abcb;
  height: 60px;
  top: 116px;
padding-top: -30px;
  }
.pieCurso2 h4{
   text-align: center;
   color: white;
   padding-top: -5%;
   margin-top:120px;
}


 .contenedorCurso p{
  padding:3px;
  color: #36abcb;
 }

 .cajaCards{
                      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                      transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                      border-radius: 5px;
                      height: 100px; 
                      margin-bottom: 20px;
                      padding-top: 10px;
                      color: black;
                    }

                    .cajaCards:hover{
                       box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
                       background: #642B73;  /* fallback for old browsers */
                      background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
                      background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
                      color: white;
                      font-size: bold;
                      padding-top: 10px;

                    }


/* card material design style*/

.card {
  display: inline-block;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  margin: 20px;
  position: relative;
  margin-bottom: 50px;
  transition: all .2s ease-in-out;
  text-decoration: none;
  color: black; 
}

.card:hover {
  /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
  box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
  
}

.image {
  height: 150px;
  opacity: .7;
  overflow: hidden;
  transition: all .2s ease-in-out;
   background: -webkit-linear-gradient(to right, #C6426E, #642B73);  /* Chrome 10-25, Safari 5.1-6 */
   background: linear-gradient(to right, #C6426E, #642B73); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

.image:hover,
.card:hover .image {
  height: 150px;
  opacity: 1;
}

.text {
  background: #FFF;
  padding: 20px;
  min-height: 200px;
}

.text p {
  margin-bottom: 0px;
}

.fab {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  position: absolute;
  margin-top: -50px;
  right: 20px;
  box-shadow: 0px 2px 6px rgba(0, 0, 0, .3);
  color: #fff;
  font-size: 48px;
  line-height: 48px;
  text-align: center;
  background: #0066A2;
  -webkit-transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
}

.fab:hover {
  background: #549D3C;
  cursor: pointer;
  -ms-transform: rotate(90deg);
  -webkit-transform: rotate(90deg);
  transform: rotate(90deg);
}


/*estilos input*/
/* Estrutura */
.input-container {
position: relative;

}

.input-container2 {
position: relative;

}


.input1 {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;
}

.input2 {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;

}

.label1 {
  top: 0;
  left: 0; right: 0;
  color: #616161;
  display: flex;
  align-items: center;
  position: absolute;
  font-size: 1rem;
  cursor: text;
  transition: .2s ease-in-out;
  box-sizing: border-box;
}

.label2 {
  top: 0;
  left: 0; right: 1;
  color: #616161;
  display: flex;
  align-items: center;
  position: absolute;
  font-size: 1rem;
  cursor: text;
  transition: .2s ease-in-out;
  box-sizing: border-box;
}

.input1,
.label1 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input2,
.label2 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

/* Interation */
.input1:valid,
.input1:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:rgba(187, 120, 36, 0.1)
}

.input2:valid,
.input2:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:rgba(187, 120, 36, 0.1)
}

.input1:valid + .label1,
.input1:focus + .label1 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input2:valid + .label2,
.input2:focus + .label2 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}



/* Just for leave it a little more beautiful */


section {
    margin: 15px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);
    padding: 20px;
    border-radius: 0 0 2px 2px;
    background-color: #FFF;
}

.sombra{
   box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}

/*estilos para nav */
.nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #ffffff;background: #5a4080; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none;  color: #5a4080 !important; background: #fff; }
        .nav-tabs > li > a::after { content: ""; background: #5a4080; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
.tab-nav > li > a::after { background: ##5a4080 none repeat scroll 0% 0%; color: #fff; }
.tab-pane { padding: 15px 0; }
.tab-content{padding:20px}
.nav-tabs > li  {width:30%; text-align:center;}
.card_new {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }


@media all and (max-width:724px){
.nav-tabs > li > a > span {display:none;} 
.nav-tabs > li > a {padding: 5px 5px;}
}

/*Estilos barra social*/

 </style>

 			<div class="col-md-8 col-xs-8 pag-center">
         <div class="col-md-12" style="">
              <h3 class="text-center" style="margin-top: 50px; margin-bottom: 50px;">ÁTOMO LECTOR - Bienvenidos Familia </h3>
         </div>

 
             
                  <h3 class="text-left" style="">Monitorear Avances</h3><hr>
                    
                   
                    <div class="card col-md-11">

                      <div class="image" >
                        <h3 style="color: white;">Ingresa Usuario para monitorear </h3>
                      </div>

                      <div class="text">
                           <form method="post" action="controllador/guardarMiCofre.php">
                              <div class="input-container" style="margin-bottom:50px; margin-top: 50px; ">
                                  <input id="name" name="palabra" class="input1" type="text" pattern=".+" required />
                                  <label class="label1" for="name" style="color:black; text-align: left; background-color:rgba(187, 120, 36, 0.1);">Agregar Usuario</label>
                              </div>
                              
                              <input style="display:none;" type="text" name="idLectura" value="">
                              <input type="text" style="display: none;" name="idUsuario" value="">
                            
                          </div>
                          <div class="wrimagecard-topimage_title" style="margin-left: 40%;">
                            <input  type="submit" value="Monitorear" class="col-md-12 btn btn-default botonAgg-1" style="font-size: 17pt; background-color: #3498db; color: white; border:1px solid #3498db; margin-bottom: 20px; ">
                          </div>
                       </form>

                    </div>

          <div class="col-md-12 sombra text-left" style="min-height:200px; margin-bottom: 15px; margin-top: 50px;">
                  <div class="sombra text-left" style=" margin-bottom: 15px; background-color: #9b59b6; color: white; border-radius: 5px; text-align: center">
                    <h4>Nombre: Nombre Apellido</h4>
                    <h4>Grado: Grado Sección: a</h4>
                  </div>

                  <div class="container" style="">
  <div class="row">
    <div class="col-md-9"> 
      <!-- Nav tabs -->
      <div class="card_new"  style="margin-top: 60px;">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-home"></i>  <span>Lecturas Diarias</span></a></li>

          <li role="presentation" ><a href="#n2" aria-controls="n2" role="tab" data-toggle="tab"><i class="fa fa-n2"></i>  <span>Lecturas Comprensiva</span></a></li>

          <li role="presentation" ><a href="#n1" aria-controls="n1" role="tab" data-toggle="tab"><i class="fa fa-n1"></i>  <span>Lecturas Velocidad</span></a></li>

      </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
           
          <div role="tabpanel" class="tab-pane active" id="home">
            <h3 style="text-align: center">Avance semanales</h3>
          
              <table class="table table-hover" id="ejemplo">
                      <thead>
                        <tr>
                          <th scope="col">Semana</th>
                          <th scope="col">Lunes</th>
                          <th scope="col">Martes</th>
                          <th scope="col">Miercoles</th>
                          <th scope="col">Jueves</th>
                          <th scope="col">Viernes</th>
                          <th scope="col">Avance Semanal</th>
                        </tr>
             </thead>
                <tbody class="text-left">
                        <tr>     
                         <td>
                            <div class="dropdown botonAgg botonAgg-1" >
                              <a href="reportesDetalles.php">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">Semana 1 Detalle
                        </button></a>
                        
                        </div>
                          </td>
                          <td> <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" > <span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                          <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                            <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                              <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                                <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color:  #e74c3c; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-warning-sign" style="margin-left: 4px;"></span></td>
                                  <td style="text-align: center;"><h3>90%</h3></td>
                        </tr>

                        <tr>     
                         <td>
                            <div class="dropdown botonAgg botonAgg-1" >
                              <a href="reportesDetalles.php">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">Semana 2 Detalle
                        </button></a>
                        
                        </div>
                          </td>
                          <td> <div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" > <span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                          <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                            <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                              <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-ok" style="margin-left: 4px;"></span></td>
                                <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color:  #e74c3c; margin-top:0px; margin-left:0px;" ><span class="glyphicon glyphicon-warning-sign" style="margin-left: 4px;"></span></td>
                                  <td style="text-align: center;"><h3>90%</h3></td>
                        </tr>
                    </tbody>

             </table>           


               
          </div>

          <div role="tabpanel" class="tab-pane" id="n2">
           <h3 style="text-align: center">Avance semanales</h3>
           <table class="table table-hover" id="ejemplo">
                      <thead>
                        <tr>
                          <th scope="col">Semana</th>
                          <th scope="col">Lectura</th>
                          <th scope="col">Prueba PISA</th>
                          <th scope="col">Prueba CNB</th>
                          <th scope="col">Glosario</th>
                          <th scope="col">Reflexivo</th>
                          <th scope="col">Personajes</th>
                          <th scope="col">Avance Semanal %</th>
                        </tr>
             </thead>
             <tbody class="text-left">
                <tr>
                  <td style="text-align: center;">
                   1
                  </td>
                  <td style="padding-top:10px; "><strong>El gato con botas</strong></td>
                          <td>
                            <div class="dropdown botonAgg botonAgg-1" >
                              <a href="../atomLector/p1/resultadoCnb.php?intentoABuscar=33&idLectura=1&idUsuario=1&intento=1" target="_blank">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">40 
                        </button></a>                       
                        </div>
                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="../atomLector/p1/resultado.php?idLectura=1&idUsuario=1" target="_blank">
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">C1 
                        </button></a>
                        
                        </div>

                          </td>
                          <td>
                           <div class="dropdown botonAgg botonAgg-1">
                              <a href="../atomLector/p1/glosario.php?noLectura=1" target="_blank">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">50 
                        </button></a>
                        
                        </div>

                          </td>
                           <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="../atomLector/p1/cuentame.php?noLectura=1" target="_blank">
                        <button class="btn btn-default" type="button" style="background-color: #3498db; color: white; border:white;">ok
                        </button></a>
                        
                        </div>

                          </td>
                            <td>
                           <div class="dropdown botonAgg botonAgg-1" >
                              <a href="../atomLector/p1/personajes.php?noLectura=1" target="_blank">
                        <button class="btn btn-default" type="button" style="background-color: #e67e22; color: white; border:white;">60 
                        </button></a>
                        
                        </div>

                          </td>
                             <td><div style="display: inline-block; border: 3px solid white; border-radius: 20rem; color: white; text-align: center; padding: 0.5rem; box-shadow: rgba(0, 0, 0, 0.15) 0px 1px 3px 0px; font-weight: 600; min-width: 4rem; font-size: 2rem; background-color: #2ecc71; margin-top:0px; margin-left:0px;" >90</div></td>
                </tr>

             </tbody>
             </table>   

          </div>

          <div role="tabpanel" class="tab-pane" id="n1">
              <h3>Textos creados a criterio de los alumnos. Grados: 1ero primaria a 4to primaria. </h3>
              
              

            
          </div>

          <div role="tabpanel" class="tab-pane" id="profile">

               <div class="card">

                      
                    </div>

               


          </div>   
          
        </div>
      </div>
    </div>
  </div>
</div>


</div>





           
                  
 


       <?php  ?>



              
             
          
      </div>



<!--//CENTRANDO CONTENIDO ROL 1 -->


<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../static/lat-derecho.php'; $nivelll=1; directoriosNivelesDer($nivelll); ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
   
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../js/bootstrap.min.js"></script>
    
  </body>
</html>