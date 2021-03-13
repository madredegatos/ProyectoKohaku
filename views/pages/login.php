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
			<input type="text" placeholder="Apellido" id="last_name" name="last_name">
			<!--<select  name = "id_type" name = "id_type">
				<option value="0" selected>tipo de documento</option>
				<option value="1">Cedula de Ciudadadania</option>
				<option value="2">Cedula de Extranjeria</option>
				<option value="3">Tarjeta de Identidad</option>
			<input type="text" placeholder="Numero de Documento" id="id_number" name="id_number"/>
			<input type="text" placeholder="Direccion" id="direction" name="direction"/>
			<input type="text" placeholder="Telefono Fijo" id="phone" name="phone"/>
			<input type="text" placeholder="celular" id="celphone"name="cellphone"/>-->
			<input type="email" placeholder="Correo electronico" id="email" name="email"/>
			<input type="password" placeholder="Contraseña" id="pass" name="pass"/>
			<input type="password" placeholder="Confirmar contraseña" id="pass_confirm" name= "pass_confirm"/>

			<button type= "submit" value ="Registro">Registrarte</button>

		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="" method="POST" autocomplete="off">
			<h1>Registro</h1>
			<div class="social-container">
				<!--<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>-->
			</div>
			<span>Puedes ingresar con tu cuenta</span>
            <!-- name="loginemail" name="loginpass" -->
			<input type="email" placeholder="Correo electronico" id="loginemail" name="loginemail" />
			<input type="password" placeholder="Contraseña" id="loginpass" name="loginpass"/>
		<a href="#">Olvidaste tu contraseña?</a>
			<button type="submit" value="login">Ingresa</button>
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
	if(isset($_POST['loginemail']) && isset($_POST['loginpass']) && $_POST['loginemail']!="" &&$_POST['loginpass']!="" ){
		require_once"./controllers/controllerLogin.php";
		$login = new controllerLogin();
		echo $login->start_session_controller();
	}
	if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['pass_confirm']) && $_POST['first_name']!="" && $_POST['last_name']!="" && $_POST['email']!="" && $_POST['pass']!="" && $_POST['pass_confirm']!="")
	{
		require_once"./controllers/controllerRegister.php";
		$register = new controllerRegister();
		echo $register->add_user_controller();
	}
	else{
		require_once"./controllers/controllerRegister.php";
		$registerFail = new controllerRegister();
		echo $registerFail->add_user_incomplete_data();
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

<!-- Se agrega este bloque de código para iniciar la sesión -->
<?php 
    if(isset($_POST['correo']) && isset($_POST['clave'])){
        require_once "./controllers/controllerLogin.php";
        $login = new ControllerLogin();
        echo $login->start_controller_session();
    }
?>
</html>
