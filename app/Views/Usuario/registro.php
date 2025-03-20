<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Bienestar Animal Tlaxcala</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?=base_url(RECURSOS_LOGIN_IMAGES.'icons/favicon.ico') ?>"/>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_FONTS.'font-awesome-4.7.0/css/font-awesome.min.css') ?>">
	<!-- Linearicons -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_FONTS.'Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
	<!-- Animations -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'animate/animate.css') ?>">
	<!-- Hamburgers -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'css-hamburgers/hamburgers.min.css') ?>">
	<!-- Animsition -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'animsition/css/animsition.min.css') ?>">
	<!-- Select2 -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'select2/select2.min.css') ?>">
	<!-- Daterangepicker -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/daterangepicker.css') ?>">
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_CSS.'util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url(RECURSOS_LOGIN_CSS.'main.css') ?>">
	<!-- Custom styles for inputs and gender section -->
	<style>
		.input100 {
			width: 80%;  /* Cambia el porcentaje para ajustar el tamaño */
			margin: 10px auto;
		}
		.wrap-input100 {
			text-align: center;  /* Centra el contenido del campo */
		}
		.wrap-input100 input[type="radio"] {
			margin: 0 10px;  /* Espaciado entre los botones de radio */
		}
	</style>
</head>
<body style="background-color:rgb(142, 1, 126);">
	

<div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">

                <?= form_open('registrar_usuario', ['class'=>'login100-form validate-form']) ?>

                <span class="login100-form-title p-b-43">
                    Regístrate para continuar
                </span>

                <div class="wrap-input100 validate-input" data-validate="Nombre requerido">
                    <input class="input100" type="text" name="nombre_usuario" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Nombre</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Apellido paterno requerido">
                    <input class="input100" type="text" name="ap_usuario" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Apellido Paterno</span>
                </div>

                <div class="wrap-input100">
                    <input class="input100" type="text" name="am_usuario">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Apellido Materno</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Correo válido requerido">
                    <input class="input100" type="email" name="email_usuario" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Correo Electrónico</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Contraseña requerida">
                    <input class="input100" type="password" name="password_usuario" required>
                    <span class="focus-input100"></span>
                    <span class="label-input100">Contraseña</span>
                </div>

                <div class="wrap-input100">
                <span class="label-input100">Sexo </span>
                <div class="d-flex justify-content-center">
                    <!-- Radio button para Masculino -->
                    <div class="form-check mx-2">
                        <input type="radio" class="form-check-input" id="sexo_masculino" name="sexo_usuario" value="1" required>
                        <label class="form-check-label" for="sexo_masculino">
                        <br>
                        Masculino
                        </label>
                    </div>
                    <!-- Radio button para Femenino -->
                    <div class="form-check mx-2">
                        <input type="radio" class="form-check-input" id="sexo_femenino" name="sexo_usuario" value="2" required>
                        <label class="form-check-label" for="sexo_femenino">
                        <br>
                        Femenino
                        </label>
                    </div>
                </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">Registrarse</button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">Ya tienes una cuenta? <a href="<?= base_url('login') ?>">Inicia sesión</a></span>
                </div>

                <?= form_close() ?>

                <div class="login100-more" style="background-image: url('<?=base_url(RECURSOS_LOGIN_IMAGES.'bg-02.jpg') ?>');">

                </div>
            </div>
        </div>
    </div>
	
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'jquery/jquery-3.2.1.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'animsition/js/animsition.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/js/popper.js') ?>"></script>
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'bootstrap/js/bootstrap.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'select2/select2.min.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/moment.min.js') ?>"></script>
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'daterangepicker/daterangepicker.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_VENDOR.'countdowntime/countdowntime.js') ?>"></script>
<!--===============================================================================================-->
<script src="<?=base_url(RECURSOS_LOGIN_JS.'main.js') ?>"></script>


</body>
</html>
