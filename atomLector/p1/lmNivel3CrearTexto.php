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
  $pisa='pisa';
  $cnb='cnb';


      $q1 = ("SELECT * FROM emnivel4paso0 where idLectura=:idLectura and idUsuario=:idUsuario");
      $mostrarDatosPaso0=$dbConn->prepare($q1);
      $mostrarDatosPaso0->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $mostrarDatosPaso0->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $mostrarDatosPaso0->execute();
      $paso0=$mostrarDatosPaso0->rowCount();  



      $q2 = ("SELECT * FROM emnivel4paso1 where idLectura=:idLectura and idUsuario=:idUsuario");
      $mostrarDatosPaso2=$dbConn->prepare($q2);
      $mostrarDatosPaso2->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $mostrarDatosPaso2->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $mostrarDatosPaso2->execute();
      $paso2=$mostrarDatosPaso2->rowCount();      
    

      $_SESSION['gradoEnviar']=$_GET['idLectura'];

      //REVISION consultamos datos para mostrar la revision
      $q3 = ("SELECT * FROM emnivel4paso0 where idLectura=:idLectura and idUsuario=:idUsuario");
      $mostrarPaso3_1=$dbConn->prepare($q3);
      $mostrarPaso3_1->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $mostrarPaso3_1->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $mostrarPaso3_1->execute();
      $paso3_1=$mostrarPaso3_1->rowCount();  

      $q4 = ("SELECT * FROM emnivel4paso1 where idLectura=:idLectura and idUsuario=:idUsuario");
      $mostrarDatosPaso3_2=$dbConn->prepare($q2);
      $mostrarDatosPaso3_2->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $mostrarDatosPaso3_2->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $mostrarDatosPaso3_2->execute();
      $paso3_2=$mostrarDatosPaso3_2->rowCount();   

      //consultamos datos para mostrar parrafos modificados.   
      $q4 = ("SELECT * FROM emnivel4paso2 where idLectura_mod=:idLectura and idUsuario=:idUsuario");
      $mostrarParrafosMod=$dbConn->prepare($q4);
      $mostrarParrafosMod->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $mostrarParrafosMod->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $mostrarParrafosMod->execute();
      $hayParrafosMod=$mostrarParrafosMod->rowCount();


      //consultamos todos los parrafos antiguos y modificados para que elija y publique el texto
      //--antiguos
      $q5 = ("SELECT * FROM emnivel4paso1 where idLectura=:idLectura and idUsuario=:idUsuario");
      $parrafosAntiguos=$dbConn->prepare($q5);
      $parrafosAntiguos->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $parrafosAntiguos->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $parrafosAntiguos->execute();
      $hayParrafosAntiguos=$parrafosAntiguos->rowCount();  

      //--mod
       $q6 = ("SELECT * FROM emnivel4paso2 where idLectura_mod=:idLectura and idUsuario=:idUsuario");
      $parrafosNuevosMod=$dbConn->prepare($q6);
      $parrafosNuevosMod->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $parrafosNuevosMod->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $parrafosNuevosMod->execute();
      $hayParrafosNuevosMod=$parrafosNuevosMod->rowCount();


      //buscar si ya publico texto

      $q8 = ("SELECT * FROM publictexto where idLectura=:idLectura and idUsuario=:idUsuario");
      $publicoTexto=$dbConn->prepare($q8);
      $publicoTexto->bindParam(':idLectura',$_GET['idLectura'], PDO::PARAM_INT);
      $publicoTexto->bindParam(':idUsuario',$_SESSION['idUsuario'], PDO::PARAM_INT);  
      $publicoTexto->execute();
      $publicoText=$publicoTexto->rowCount();
   


        
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
  .masCentrado{
    margin-left: 55%;
    margin-top: 36%;
  }

  .cajaDescripcion{
                     box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
                     transition: all 0.3s cubic-bezier(.25,.8,.25,1);
                    }


.card-style{
  
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}

.card-style:hover{
 box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
}


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
.input-container,.input-container2,.input-container3,.input-container4,.input-container5,.input-container6,.input-container7, .input-container20 {
position: relative;

}








.input1,.input2,.input3,.input4,.input5,.input6,.input7,.input20  {
  border: 0;
  border-bottom: 2px solid #9e9e9e;
  outline: none;
  transition: .2s ease-in-out;
  box-sizing: border-box;
  color:black;
}



.label1,.label2,.label3,.label4,.label5,.label6,.label7,.label20 {
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

.input3,
.label3 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}


.input4,
.label4 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input5,
.label5 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input6,
.label6 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input7,
.label7 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}

.input20,
.label20 {
  width: 100%;
  height: 3rem;
  font-size: 3rem;
}



/* Interation */
.input1:valid,
.input1:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input2:valid,
.input2:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input3:valid,
.input3:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input4:valid,
.input4:focus {
  border-bottom: 2px solid #26a69a;  
 background-color:#ffffff;
}
.input5:valid,
.input5:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}
.input6:valid,
.input6:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input7:valid,
.input7:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
}

.input20:valid,
.input20:focus {
  border-bottom: 2px solid #26a69a;  
  background-color:#ffffff;
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


.input3:valid + .label3,
.input3:focus + .label3 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}
.input4:valid + .label4,
.input4:focus + .label4 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input5:valid + .label5,
.input5:focus + .label5 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}

.input6:valid + .label6,
.input6:focus + .label6 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:rgba(187, 120, 36, 0.1)
}


.input7:valid + .label7,
.input7:focus + .label7 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:#ffffff;
}

.input20:valid + .label20,
.input20:focus + .label20 {
  color: #26a69a;
  font-size: .8rem;
  top: -30px;
  pointer-events: none;
  background-color:#ffffff;
}




</style>






      <div class="col-md-8 col-xs-8 pag-center">

         <div class="col-md-12" style="margin-top: 30px;">
        
              <h3 class="text-center">Escritura Madura</h3><br> 
                    
         </div>

         <div class="col-md-12">
                    <div class="card">

                      <div class="image" style="background-image: url('../../img/flatWall1.png');" >
                       </div>

                      <div class="text" style="text-align: left;">
                        <h3>Para redactar cualquier tipo de texto necesitas desarrollar las habilidades del pensamiento como análisis, síntesis, deducción, inducción, lingüística entre otras, te apoyaremos dividiendo la escritura en 4 pasos fundamentales:</h3>
                        <h3>1. Planeación.</h3>
                        <h3>2. Redacción.</h3>
                        <h3>3. Revisión.</h3> 
                        <h3>Completa todos los pasos y obtendrás un texto bien redactado.</h3>

                        <div class="" style=" margin-left: 45%; height: 70px; width: 70px; border-radius: 100%; background-color: #3498db;"><img src="../../img/flechaAbajo.png" style="width: 50px; height: 50px; margin-left: 10px; margin-top: 7px; cursor: pointer; "></div>
                      </div>

                    </div>
                  </div> 

           <div class="col-md-12">
                    <div class="card">

                      <div class="image" style="background-image: url('../../img/flatWall1.png');" >
                        <h1 style="color: white; width: 380px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;">PASO 1: Planificación</h1>
                      </div>

                      <div class="text" style="text-align: left;">
                        <h3>Redacta los datos del texto que quieres crear. Recuerda que la idea principal depende del tema o Título.</h3><hr>
                        <h3>En este paso lo que tienes que hacer es planificar, el tema, el titulo y el o los objetivos del texto a redactar.</h3>
                        
                        <div >
                          <h4 style="text-align: center;">Ayuda</h4>
                          <div class="row">
                            <button  class="btn btn-default botonAgg-1" style="margin-left: 100px; color: white; background-color:#e67e22 ; border:1px solid #e67e22; " onclick="tematica();">¿Qué es Temática?</button>
                          <button class="btn btn-default botonAgg-1" style="color: white; background-color:#1abc9c ; border:1px solid #1abc9c; " onclick="titulo();">¿Para que un título?</button>
                          <button class="btn btn-default botonAgg-1" onclick="parrafo();" style="color: white; background-color:#2980b9 ; border:1px solid #2980b9; ">¿Cómo se cuántos párrafos tengo que crear?</button>
                          </div>
                        </div>
                        <hr>

                        <form method="post" action="controllador/emNivel3paso0.php" >
                          <?php if($paso0==0){ ?>
                          <div class="input-container" style="margin-top: 35px;">
                            <input style="height: 35px; background-size;" id="name1" class="input1" type="text" pattern=".+" name="tematica" required />
                              <label class="label1" for="name1" style="color:black; text-align: left; background-color:#ffffff;">Tema</label>
                        </div>

                          <div class="input-container2" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name2" class="input2" type="text" pattern=".+" name="titulo" required />
                              <label class="label2" for="name2" style="color:black; text-align: left; background-color:#ffffff;">Título del Texto</label>
                          </div>
                          <div class="input-container20" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name20" class="input20" type="text" pattern=".+" name="objetivoTexto" required />
                              <label class="label20" for="name20" style="color:black; text-align: left; background-color:#ffffff;">Objetivos del texto</label>
                          </div>

                          <div class="input-container3" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name3" class="input3" type="number" pattern=".+" name="cantidadP" required />
                              <label class="label3" for="name3" style="color:black; text-align: left; background-color:#ffffff;">Cantidad Párrafos</label>
                          </div>
                          <input style="display: none;" type="text" name="idLectura" value="<?php echo $_GET['idLectura']; ?>">
                          <input style="display: none;"  type="text" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>"><br>

                          
                          <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #2ecc71; font-size: 17pt; background-color: #2ecc71; height: 50px;"   type="submit" value="Enviar Datos">
                          <?php }else{
                            while(@$row1=$mostrarDatosPaso0->fetch(PDO::FETCH_ASSOC)){
                              $_SESSION['idTexto']=$row1['idTexto'];


                            ?>
 
                              <div class="input-container" style="margin-top: 35px;">
                            <input style="height: 35px; background-size;" id="name1" class="input1" type="text" pattern=".+" name="tematica" disabled />
                              <label class="label1" for="name1" style="color:black; text-align: left; background-color:#ffffff;"><?php echo $row1['tema']; ?></label>
                        </div>

                          <div class="input-container2" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name2" class="input2" type="text" pattern=".+" name="titulo" disabled />
                              <label class="label2" for="name2" style="color:black; text-align: left; background-color:#ffffff;"><?php echo $row1['tituloTexto'];  $_SESSION['tituloFin']=$row1['tituloTexto']; 
                              ?></label>
                          </div>

                          <div class="input-container20" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name20" class="input20" type="text" pattern=".+" name="objetivoTexto" disabled />
                              <label class="label20" for="name20" style="color:black; text-align: left; background-color:#ffffff;" ><?php echo $row1['objetivoTexto']; ?></label>
                          </div>

                          <div class="input-container3" style="margin-top: 35px;">
                              <input style="height: 35px; background-size;" id="name3" class="input3" type="number" pattern=".+" name="cantidadP" disabled />
                              <label class="label3" for="name3" style="color:black; text-align: left; background-color:#ffffff;"><?php echo $row1['cantidadParrafos']; $_SESSION['parrafos']=$row1['cantidadParrafos']; ?></label>

                          </div>
                        <br>

                       
                            <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #95a5a6; font-size: 17pt; background-color: #95a5a6; height: 50px;"   type="submit" disabled value="Se envio">
                           <?php } } ?> 
                        </form>

                        <?php if($paso0==0){ ?>
                          <img src="../enviado1.png" style="width:60px; height: 60px; position: absolute; margin-left:-50px; margin-top: 100px;">
                         <?php }else{ ?>
                            <img src="../leido1.png" style="width:60px; height: 60px; position: absolute; margin-left:-50px; margin-top: 100px;">

                         <?php } ?>   
                        <div  class="" style="margin-top:100px; margin-left: 45%; height: 70px; width: 70px; border-radius: 100%; background-color: #3498db;"><img src="../../img/flechaAbajo.png" style="width: 50px; height: 50px; margin-left: 10px; margin-top: 7px; "></div>
                      </div>

                    </div>
                  </div>   


                      


                  <div class="col-md-12">
                    <div class="card">

                      <div class="image" style="background-image: url('../../img/flatWall1.png');" >
                        <h1 style="color: white; width: 350px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;">PASO 2: Redacción </h1>
                      </div>

                      <div class="text" style="text-align: left;">
                        <h3>Redacta un párrafo a la vez hasta completar los párrafos que indicaste en el paso anterior, recuerda el o los objetivos que planteaste.
                          </h3><hr>
                        <div >
                          <h4 style="text-align: center;">Redacción Párrafo</h4>
                        </div>
                        <hr>                       

                          <?php
                            if($paso2!=@$_SESSION['parrafos']){ ?>
                      <form method="post" action="controllador/emNivel3paso1.php">
                        <div class="input-container" style="margin-top: 35px;">
                            <textarea style="height: 205px; border:2px solid #3498db; background-size;" id="name7" class="input7" type="text" pattern=".+" name="parrafo" required /></textarea>
                              <label class="label7" for="name7" style="color:black; text-align: left; background-color:#ffffff;">Párrafo <?php echo $paso2; ?></label>
                          </div>
                        <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #2ecc71; font-size: 17pt; background-color: #2ecc71; height: 50px;"   type="submit" value="Enviar Párrafo">

                          <input style="display:none;" type="type" name="idLectura" value="<?php echo $_GET['idLectura']; ?>">
                          <input  style="display:none;" type="type" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
                      </form>
                          
                      
                        

                     
                        <div class="card-style" style=" margin-top:70px; margin-left: 72%; height: 40px; width: 200px; border-radius: 5%; background-color: #9b59b6; color: white;"><h4 style="margin-left: 5px; ">Pendientes <?php $pendiente=$_SESSION['parrafos']-$paso2; echo $pendiente;?> párrafos por crear </h4></div>
                        
                          <img src="../enviado1.png" style="width:60px; height: 60px; position: absolute; margin-left:85%; margin-top: 40px;">
                         <?php }else if(@$pendiente==0){ ?>

                               <div class="input-container" style="margin-top: 35px;">
                            <textarea style="height: 205px; border:2px solid #3498db; background-size;" id="name7" class="input7" type="text" pattern=".+" name="parrafo" disabled /></textarea>
                              <label class="label7" for="name7" style="color:black; text-align: left; background-color:#ffffff;">Párrafo <?php echo $paso2; ?></label>
                        </div>
                        <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #95a5a6; font-size: 17pt; background-color: #95a5a6; height: 50px;"   type="submit" value="Se enviaron los Párrafos" disabled>

                          <input style="display:none;" type="type" name="idTexto" value="<?php echo $_SESSION['idTexto']; ?>">
                           <input style="display:none;" type="type" name="idLectura" value="<?php echo $_GET['idLectura']; ?>">
                          <input  style="display:none;" type="type" name="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

                            <img src="../leido1.png" style="width:60px; height: 60px; position: absolute; margin-left:-40px; margin-top: 70px;">

                         <?php } ?> 


                        <div  class="" style="margin-top:70px; margin-left: 45%; height: 70px; width: 70px; border-radius: 100%; background-color: #3498db;"><img src="../../img/flechaAbajo.png" style="width: 50px; height: 50px; margin-left: 10px; margin-top: 7px; cursor: pointer; "></div>
                      </div>

                    </div>
                  </div> 



                  <div class="col-md-12">
                    <div class="card">

                      <div class="image" style="background-image: url('../../img/flatWall1.png');">
                        <h1 style="color: white; width: 300px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;">PASO 3: Revisión</h1>
                      </div>

                      <div class="text" style="text-align: left;">
                        <h3>Auto evalúa tu texto y realiza por lo menos una modificación, para que tus lectores puedan comprender mejor tú texto. Una vez hallas terminado podrás publicar tú trabajo.</h3><hr>
                        <div >
                          <h4 style="text-align: center;">Borrador</h4>
                          <div class="row">
                           <div class="" style="min-height: 100px; border-radius: 5px; color: black; padding: 5px; border:2px solid #3498db;">

                            <?php if($paso3_1==0){ ?>
                            <h3 style="text-align: center;">Aun no hay titulo</h3>
                            <?php }else{ 
                              while(@$row2=$mostrarPaso3_1->fetch(PDO::FETCH_ASSOC)){
                                $_SESSION['tematica']=$row2['tema'];
                                ?>

                              <h3 style="text-align: center;"><?php echo $row2['tituloTexto']; ?></h3>
                              <?php } } ?> 

                            <?php if($paso3_2<1 or $paso3_2==0){ ?>     
                            <div style="padding:10px; background-image: linear-gradient(45deg, #874da2 0%, #c43a30 100%); color: white; border-radius:5px;">
                              <h4 class="botonAgg-1 col-md-2" style="background-color: #3498db; color: white;">0 Párrafos</h4><br><br>
                              <h4 style="">No hay Párrafo...
                                
                              </h4>
                            </div>
                          <?php }else{ 
                              while(@$row3=$mostrarDatosPaso3_2->fetch(PDO::FETCH_ASSOC)){
                                @$f+=1;
                            ?>
                            <div  style="width:800px; padding:10px; background-image: linear-gradient(45deg, #874da2 0%, #c43a30 100%); color: white; border-radius:5px;">
                              <h4 class="botonAgg-1 col-md-2" style="background-color: #3498db; color: white;"><?php echo 'Párrafo'.$f; ?></h4><br><br>
                              <h4 style=""><?php echo $row3['parrafo']; ?><br>
                              <h5>Registro: <?php echo $row3['fecha'].$row3['hora']; ?></h5>
                                <a class="btn btn-default botonAgg-1" id="<?php echo $row3['idParrafo'];?>" style="border:1px solid #2ecc71; background-color: #2ecc71; color:white; margin-top: 20px; margin-left: 90%;" onclick="modificar_Parrafor(this.id);">Editar</a>
                                <div style="display: none;">
                                <p id="<?php echo 'idParrafo_mod'.$row3['idParrafo']; ?>" ><?php echo $row3['idParrafo']; ?></p><br>
                                <p id="<?php echo 'idTexto_mod'.$row3['idParrafo']; ?>"><?php echo $row3['idTexto']; ?></p><br>
                                <p id="<?php echo 'idLectura_mod'.$row3['idParrafo']; ?>"><?php echo $row3['idLectura']; ?></p><br>
                                <p id="<?php echo 'parrafo_mod'.$row3['idParrafo']; ?>"><?php echo $row3['parrafo']; ?></p><br>
                                <p id="<?php echo 'idUsuario'.$row3['idParrafo']; ?>"><?php echo $_SESSION['idUsuario']; ?></p><br>
                               
                                </div>
                              </h4>
                            </div><br>
                            <?php } } ?> 

                            <?php if($hayParrafosMod==0){ ?>


                               <h3>Aun no hay Párrafos Modificados</h3>
                            <?php }else{ ?>


                            <h3>Párrafos Modificados</h3>
                             <?php  while(@$row4=$mostrarParrafosMod->fetch(PDO::FETCH_ASSOC)){ 
                              @$g+=1;
                              ?>

                             <div  style="width:800px; padding:10px; background-image: linear-gradient(45deg, #874da2 0%, #c43a30 100%); color: white; border-radius:5px;">
                             
                              <h4 class="botonAgg-1 col-md-2" style="background-color: #3498db; color: white;"><?php echo 'Parrafo Modificado'.$g; ?></h4><br><br><br>
                              <h4 style=""><?php echo $row4['parrafo_mod']; ?> </h4><br>
                              <h5>Registro: <?php echo $row4['fecha'].$row4['hora']; ?></h5>
                              
                                
                             
                            </div><br>
                          <?php } }?>
                          </div>


                        </div>
                      </div>
                        <hr>

                        <form action="controllador/emNivel3paso2.php" method="post"  >
                          <div class="input-container" style="margin-top: 35px;">
                            <h4 class="botonAgg-1 col-md-3" style=" padding:4px; background-color: #9b59b6; color: white;">Área de corrección</h4> 

                            <textarea style="height: 205px; border:2px solid #3498db; background-size;" id="parrafoMod_in" class="input7" type="text" pattern=".+" name="parraNew_save" required />                           
                            </textarea>

                        </div>

                          <input id="idParrafo_in" type="type" name="idParrafo_save" value="" style="display: none;" >
                          <input id="idTexto_in" type="type" name="idTexto_save" value="" style="display: none;">
                          <input id="idLectura_in" type="type" name="idLectura_save" value="" style="display: none;">
                          <input id="idUsuario_in" type="type" name="idUsuario_save" value="" style="display: none;">

                          <input id="botonPublicar" class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #2ecc71; font-size: 17pt; background-color: #2ecc71; height: 50px; display: none; "   type="submit"  value="Guardar Modificación">   
                          
                        </form>                         

                        <div  class="" style="margin-top:70px; margin-left: 45%; height: 70px; width: 70px; border-radius: 100%; background-color: #3498db;"><img src="../../img/flechaAbajo.png" style="width: 50px; height: 50px; margin-left: 10px; margin-top: 7px; cursor: pointer; "></div>
                      </div>

                    </div>
                  </div>   

                  <div class="col-md-12">
                    <div class="card" >

                      <div class="image"  style="background-image: url('../../img/flatWall1.png');">
                        <h1 style="color: white; width: 400px; background-color: #9b59b6; text-align: left; padding:5px; border-radius: 0 10px 10px 0;">
<?php echo @$_SESSION['tituloFin']; ?></h1>
 
                  </div>
 <style type="text/css">
   /*estilos checkbox*/
   .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  float:right;
}
/* Hide default HTML checkbox */
.switch input {display:none;}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
 </style>   
                      <div class="text" style="text-align: left;">
                       <?php if($hayParrafosAntiguos>=1){
                        while(@$row7=$parrafosAntiguos->fetch(PDO::FETCH_ASSOC)){ ?>
                        <h5>Párrafo Primer Borrador</h5> 
                        <h3 id="<?php echo 'parrafo'.$row7['idParrafo']; ?>"><?php echo $row7['parrafo']; ?>

                         <ul class="list-group list-group-flush">
                            
                                              
                                <label class="switch ">
                                  <input type="checkbox" id="<?php echo $row7['idParrafo']; ?>" class="primary" onClick="if(this.checked == true){
                                  var idBuscarAnt= this.id;
                                  var parrafoCapturado=$('#parrafo'+idBuscarAnt).text();
                                  enviarParrafoAnt(idBuscarAnt,parrafoCapturado);

                                 } else{

                                  var idBuscarAnt= this.id;
                                  var parrafoCapturado=$('#parrafo'+idBuscarAnt).text();
                                  quitarParrafoAnt(idBuscarAnt,parrafoCapturado);

                               }">
                                  <span class="slider round"></span>
                                </label>
                           
                        </ul>   

                        </h3>
                        
                        <br>
                      <?php }} else{ ?>

                        <h3>No hay párrafos aun.</h3><br>
                      <?php } if($hayParrafosNuevosMod>=1){ 
                        while(@$row8=$parrafosNuevosMod->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <h5>Párrafo Segundo Borrador</h5> 
                        <h3 id="<?php echo 'new'.$row8['idParrafo_mod']; ?>"><?php echo $row8['parrafo_mod']; ?>
                           <ul class="list-group list-group-flush">
                            
                                              
                                <label class="switch ">
                                  <input type="checkbox" id="<?php echo $row8['idParrafo_mod']; ?>" class="primary" onClick="if(this.checked == true){
                                  var idBuscarNew= this.id;
                                  var parrafoCapturado1=$('#new'+idBuscarNew).text();
                                  enviarParrafoNew(idBuscarNew,parrafoCapturado1);

                                } else{

                                  var idBuscarNew= this.id;
                                  var parrafoCapturado1=$('#newP'+idBuscarNew).text();
                                  quitarParrafoNew(idBuscarNew,parrafoCapturado1);


                                }">
                                  <span class="slider round"></span>
                                </label>
                           
                        </ul>   
                        </h3><br>
                      <?php } } ?>



                             <div style="text-align: right;">
                              <h5>Temática: <?php echo @$_SESSION['tematica']; ?> .</h5>
                              <h5>Autor: <?php echo  strtoupper($_SESSION['nombre'])." ".strtoupper($_SESSION['apellido']); ?>.</h5>
                              </div> 

                      </div>

                      
                      <form method="post" action="controllador/publicarTexto.php" id="agregarParrafos" >
                        
                        <input type="text" style="display: none;" value="<?php echo $_SESSION['tematica']; ?>" name="tematica">
                        <input type="text" style="display: none;" value="<?php echo $_SESSION['idUsuario']; ?>" name="idUsuario">
                        <input type="text" style="display: none;" value="<?php echo $_GET['idLectura']; ?>" name="idLectura">
                        <input type="text" style="display: none;" value="<?php echo  strtoupper($_SESSION['nombre'])." ".strtoupper($_SESSION['apellido']); ?>" name="autor">
                        <input type="text" style="display: none;" value="<?php echo $_SESSION['tituloFin'];?>" name="titulo">
                        
                      <?php if($publicoText==0){ ?>  

                       <input class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #3498db; font-size: 17pt; background-color: #3498db; height: 50px; margin-bottom: 20px;"   type="submit" value="Publicar Texto">
                       <?php }elseif($publicoText>=1) { ?>

                          <button class="btn btn-default botonAgg-1 col-md-12" style=" color:white; border:1px solid #95a5a6; font-size: 17pt; background-color: #95a5a6; height: 50px; margin-bottom: 20px;"  disabled >Se Publico Texto</button>

                          <?php } ?>
                       </form>


                    </div>
                  </div>







<p id="nombreAsistente" style="display: none;"><?php echo $_SESSION['nombre'];?></p>


<div class="col-md-12" style="margin-top: -200px;">



  
</div>
 



   <script type="text/javascript">
    var nombreUsuario= $('#nombreAsistente').text();
   
     function startArtyom(){

    artyom.initialize({
        lang: "es-ES",
        continuous:true,// Reconoce 1 solo comando y para de escuchar
              listen:true, // Iniciar !
              debug:true, // Muestra un informe en la consola
              speed:1 // Habla normalmente
      });
  
    };

  function enviarParrafoAnt(idBuscarAnt,parrafoCapturado){
    var nextinput = 0;
    nextinput++;
    //alert('parrafo: '+idBuscarAnt + ' parrafo: '+parrafoCapturado);
   
    var campo = '<li  id="rut'+idBuscarAnt+'"><input type="text" size="20" id="campo' + idBuscarAnt + '"&nbsp; name="campo' + idBuscarAnt + '"&nbsp; value="'+parrafoCapturado+'" /></li>';
    var parrafoFinal='<p id="parr'+idBuscarAnt+'">'+parrafoCapturado+'</p>';

    $("#agregarParrafos").append(campo);
    //$("#agregarPt").append(parrafoFinal);
    
  }

  function quitarParrafoAnt(idBuscarAnt,parrafoCapturado){
    $('#rut'+idBuscarAnt).remove();
  }


  function enviarParrafoNew(idBuscarNew,parrafoCapturado1){
    var nextinput = 0;
    //alert('parrafo: '+idBuscarNew + ' parrafo: '+parrafoCapturado1);
    nextinput++;
    var campo1 = '<li id="newP'+idBuscarNew+'"><input type="text" size="20" id="campo' + idBuscarNew + '"&nbsp; name="campo_' + idBuscarNew + '"&nbsp; value="'+parrafoCapturado1+'" /></li>';
    var parrafoFinal='<p id="parrN'+idBuscarNew+'">'+parrafoCapturado1+'</p>';
    $("#agregarParrafos").append(campo1);
    // $("#agregarPt").append(parrafoFinal);
  }

  function quitarParrafoNew(idBuscarNew,parrafoCapturado1){
    $('#newP'+idBuscarNew).remove();
  }

    function tematica(){
            startArtyom();
            artyom.say("Hola "+nombreUsuario+" te explicare que es una temática o un tema, según Google un Tema es un Asunto o materia sobre la que se trata en una conversación, un discurso, un escrito, una obra artística u otra cosa semejante. Te daré unos ejemplos de temas, uno, El cambio tecnológico, dos, Efectos del tabaco y el alcohol, tres, El cambio climático, cuatro, El flagelo de la guerra, el tema lo eliges en base a tus gustos. Espero te halla ayudado.");
            finAsistente();

          }

        function titulo(){
            startArtyom();
            artyom.say(nombreUsuario+" me alegra mucho poder ayudarte, El título es la palabra o frase llamativa con que se da a conocer el asunto de una obra o de cada una de las partes o divisiones de un escrito para captar la atención del lector. Deberá ser airoso, de ritmo breve, sugerente y atractivo y, cómo no, grato al oído.");
            finAsistente();

          }

           function parrafo(){
            startArtyom();
            artyom.say(nombreUsuario+" la cantidad de párrafos depende de ti.  Pero para poder transmitir de manera correcta la idea al lector, sugerimos que como mínimo debes redactar 3 párrafos. Espero sigas nuestro consejo. Hasta luego");
            finAsistente();

          }



function modificar_Parrafor(clicked_id){
          var idBuscar=clicked_id;
          //recuperamos datos a modificar
          var idParrafo=$('#idParrafo_mod'+idBuscar).text();
          var idTexto=$('#idTexto_mod'+idBuscar).text();
          var idLectura=$('#idLectura_mod'+idBuscar).text();
          var parrafoMod=$('#parrafo_mod'+idBuscar).text();
          var idUsuario=$('#idUsuario'+idBuscar).text();
          //enviamos datoa a los contenedores

          $('#idParrafo_in').val(idParrafo);
          $('#idTexto_in').val(idTexto);
          $('#idLectura_in').val(idLectura);
          $('#idUsuario_in').val(idUsuario);
          $('#parrafoMod_in').val(parrafoMod);
          $('#botonPublicar').css("display","block");

          

          }


      


        function finAsistente(){
    artyom.fatality();// Detener cualquier instancia previa
  }    

//FUNCIONES PARA EBOOK
function loadApp() {

  // Create the flipbook

  $('.flipbook').turn({
      // Width

      width:800,
      
      // Height

      height:500,

      // Elevation

      elevation: 20,
      
      // Enable gradients

      gradients: true,
      
      // Auto center this flipbook

      autoCenter: true

   
  });





}

// Load the HTML4 version if there's not CSS transform

yepnope({
  test : Modernizr.csstransforms,
  yep: ['../turn/lib/turn.js'],
  nope: ['../turn/lib/turn.html4.min.js'],
  both: ['../css/basic.css'],
  complete: loadApp
});

  </script>
          
    
        </div>

<!--//CENTRANDO CONTENIDO ROL 1 -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
		<?php include '../../static/lat-derecho.php';  $nivelll=2; directoriosNivelesDer($nivelll);  ?>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  

 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="../../js/bootstrap.min.js"></script>
  </body>
</html>