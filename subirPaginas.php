<?php 

?>
<!DOCTYPE html>
<html lang="es">
<style type="text/css">
	.container-login100{
		
	}

	@keyframes rotate360 { 
 
    to { transform: rotate(360deg); } 
 
} 
 
</style>
<head>
	<title>Átomo - Entrar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/ini.gif" alt="IMG" >
				</div>
				<img src="img/logos.png" width="100" height="100" style=" position: absolute; margin-top: -120px; margin-left: 40%;  animation: 2s rotate360 infinite linear;">
				<form class="login100-form validate-form" method="post" enctype="multipart/form-data" action="conection/subirBase64.php">
					<span class="login100-form-title">
						base64 Img  :)
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Contraseña Requerida">
						<input class="input100" type="text" name="idLectura" placeholder="Ingrese idLectura" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

									
					<input type="file" name="txtImg[]" accept="image/x-png,image/gif,image/jpeg" multiple="" />
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" value="Subir" >
						
					</div>
					<a href="administracion.php" style="margin-top: 100px; background-color: #3498db;" class="login100-form-btn" >Volver</a>
			

					<div class="text-center p-t-136">
					
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>