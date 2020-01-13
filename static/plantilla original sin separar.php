<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0">
    <title>Master Page</title>
 
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/masterpage.css" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Ubuntu', sans-serif;-->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Ubuntu" rel="stylesheet"><!-- habilitar font famili font-family: 'Indie Flower', cursive;-->

    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Nunito+Sans|Ubuntu" rel="stylesheet">
 
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  
<!--NAVEGACION CONTENIDO FIJO -->
	 <div class="row">
	     <div class="col-md-12 col-xs-12 mst-navegacion">
           <div class="col-md-12">
              <h1 class="txt-fuente txt-colegio">Colegio Integral Americano</h1>
              <a href="#" ><img class="img-responsive btn-logo"  src="img/image.png"/></a>                
              <h4 class="txt-fuente txt-mod-rol">Administración - Secretaria</h4>
          </div>  
      </div>
	 </div>
<!-- //NAVEGACION CONTENIDO FIJO -->

<!-- LATERAL IZQUIERDO CONTENIDO FIJO -->
 <div class="row cont-page">
      <div class="col-md-2 col-xs-2 lat-izquierdo">
        <a href="#"><img class="img-responsive btn-back" src="img/back2.png" title="ATRAS" /></a>
      </div>
<!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->

<!--CENTRANDO CONTENIDO VARIABLE -->
 
 			<div class="col-md-8 col-xs-8 pag-center">CENTRO DE LA PAGINA</div>
<!--//CENTRANDO CONTENIDO VARIABLE -->

<!--LATERAL DERECHO CONTENIDO FIJO -->
			<div class="col-md-2 col-xs-2 lat-derecho">
        <div class="profile">
          <img class="img-responsive img-profile" src="img/profile.png"/>
          <h5 class="txt-fuente txt-nombre">Jessica Estafania,</h5>
          <h5 class="txt-fuente txt-nombre">Morales Garcia</h5> 
          <a href="#"><img class="img-responsive img-logout" src="img/of.png" title="SALIR" /></a>         
        </div>
      </div>
 <!-- //LATERAL IZQUIERDO CONTENIDO FIJO -->  


  
 
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         plugins que utilices) -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>