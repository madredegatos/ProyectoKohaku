<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>KOHAKU</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'><link rel="stylesheet" href="./views/css/loginstyle.css">

</head>
<body>
<!-- partial:index.partial.html -->
<h2>LOGIN KOHAKU 1</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container" overflow: auto >

		<form action="" method="post" overflow: auto>
			<h1>Crear cuenta</h1>
			<div class="social-container">

			</div>
			<span>Puedes usar tu correo para registrarte</span>
			<input type="text" placeholder="Nombre" id="first_name" name= "first_name" />
			<input type="text" placeholder="Apellido" id="lastname" name="last_name">
			<select  name = "type_id" name = "type_id">
				<option value="0" selected>tipo de documento</option>
				<option value="1">Cedula de Ciudadadania</option>
				<option value="2">Cedula de Extranjeria</option>
				<option value="3">Tarjeta de Identidad</option>
			<input type="text" placeholder="Numero de Documento" id="number_id" name="number_id"/>
			<input type="text" placeholder="Direccion" id="direction" name="direction"/>
			<input type="text" placeholder="Telefono Fijo" id="phone" name="phone"/>
			<input type="text" placeholder="celular" id="celphone"name="celphone"/>
			<input type="email" placeholder="Correo electronico" id="email" name="email"/>
			<input type="password" placeholder="Contraseña" id="pass" name="pass"/>
			<input type="password" placeholder="Confirmar contraseña" id="pass_confirm" name= "pass_confirm"/>

			<button type= "submit" value ="Registro" class="btn btn-kohaku m-3" >Registrarte</button>

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="post">
			<h1>Registro</h1>
			<div class="social-container">
				<!--<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>-->
			</div>
			<span>Puedes ingresar con tu cuenta</span>
			<input type="email" placeholder="Correo electronico" id="loginemail" name="loginemail" />
			<input type="password" placeholder="Contraseña" id="loginpass" name="loginpass"/>
		<a href="#">Olvidaste tu contraseña?</a>
			<button>Ingresa</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenido de vuelta!</h1>
				<p>Para mantenerse conectado con nosotros, inicie sesión con su información personal</p>
				<p><?php $error?> </p>				 
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hola amigo!</h1>
				<p>Ingrese sus datos personales y comience con nosotros</p>
				<button class="ghost" id="signUp">Inscribirse</button>
				
			</div>
		</div>
	</div>
</div>
<?php
	if(isset($_POST['loginemail'])&& isset($_POST['loginpass'])&& $_POST['loginemail']!=""&&$_POST['loginpass']!="" ){
		require_once"./controllers/controllerLogin.php";
		$login = new controllerLogin();
		echo $login->star_controller_session();
	}
?>
<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>
<!-- partial -->
  <script  src="./views/js/loginscript.js"></script>

</body>
</html>
