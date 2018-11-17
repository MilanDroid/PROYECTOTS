<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");
?>
<!doctype html>
<html>
	<head>
		<title>Registro Usuarios</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/menu-admin.css">	
		<link rel="icon" type="text/css" href="img/icon.png">	
	</head>

<body class="bg-light">
	<header class="p-3 mb-2 bg-info text-white" >
		<div class="wrapper">
			<div class="logo">
				<p>CRFP/CSO</p>   
			</div>
			<nav>
				<a href="menu-admin.php" id="back">Regresar</a>
			</nav>
		</div>
	</header>

<div class="container" style="margin-top: 2%;">
	<div class="row">
		<div class="col-md-8 order-md-1">
        	<h4 class="mb-3">Registro de usuarios</h4>
          	<hr class="mb-4">
	            <div class="row">
	            	<div class="col-md-6 mb-3">
	                	<label for="name">Nombre</label>
	                	<input class="form-control" id="name" name="name" type="text">
	              	</div>
	              	<div class="col-md-6 mb-3">
	                	<label for="last">Apellido</label>
	                	<input class="form-control" id="last" name="last" type="text">
	              	</div>
	            </div>

	            <div class="row">
		        	<div class="col-md-6 mb-3">
		              	<label for="email">Email</label>
		              	<input class="form-control" id="email" type="email">
		            </div>

		            <div class="col-md-6 mb-3">
		              	<label for="slc-tipo">Tipo Usuario</label>
		              	<?php
		              		include("class/class_conexion.php");
		              		include("class/class_usuario.php");
		              		$conexion = new Conexion();
		              		Usuario::mostrarTipoUsuario($conexion);
		              		$conexion->closeConnection();
		              	?>
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-6 mb-3">
		              	<label for="password">Contraseña</label>
		              	<input class="form-control" id="password" type="password">
		            </div>

		            <div class="col-md-6 mb-3">
		              	<label for="password2">Confirmar Contraseña</label>
		              	<input class="form-control" id="password2" type="password">
		            </div>
		        </div>

		        <div class="row" style="margin-top: 3%;">
		        	<div class="col-md-4 mb-2">
		              	<button class="btn btn-success btn-block" id="btn-save">Guardar</button>
		            </div>
		            <!--div class="col-md-4 mb-2">
		              	<button class="btn btn-warning btn-block" disabled>Actualizar</button>
		            </div>
		            <div class="col-md-4 mb-2">
		              	<button class="btn btn-danger btn-block" disabled>Eliminar</button>
		            </div-->
		        </div>

		        <div class="alert alert-success" role="alert" id="resultado" style="visibility: hidden;" style="margin-top: 3%;">
					<!-- Imprimir resultado exitoso.-->
				</div>
				<div class="alert alert-danger" role="alert" id="resultado2" style="visibility: hidden;" style="margin-top: 3%;">
					<!-- Imprimir resultado fallido.-->
				</div>
		</div>
	</div>
</div>

<div class="container" style="margin-top: 2%;">
	<div class="row" id="list-users">
		<!--
			Aqui se imprime una tabla con la 
			lista de usuarios registrados
			en el sistema.
		-->
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/usuarios-controller.js"></script>

</body>
</html>
