<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");

?>
<!doctype html>
<html>
	<head>
		<title>Registro Capacitacion</title>
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
		<div class="col-md-12">
        
	            <div class="row">
	            	<div class="col-md-8 mb-3">
	                	<label for="identity">ID Maestro</label>
	                	<table class="table table-responsive">
	                		<tr>
	                			<td><input class="form-control" id="identity" name="identity" type="text" placeholder="0000-0000-00000"></td>
	                			<td><button class="btn btn-info" id="btn-search">Buscar</button></td>
	                		</tr>
	                	</table>
	              	</div>
	              	
	            </div>

	            
				<h4>Información del Maestro</h4>
				<br>
	            <div>
					<div class="col-md-8 mb-3">
	                	<label for="nombre"><b>Nombre:</b></label>
	                	<label id="full-name"></label>
	              	</div>
					<div class="col-md-8 mb-3">
						<label for="correo"><b>Correo:</b></label>
						<label id="email"></label>
					</div>	
					<div class="col-md-8 mb-3">
						<label for="celular"><b>Telefono:</b></label>
						<label id="phone"></label>
					</div>	
					<div class="col-md-8 mb-3">
						<label for="centro"><b>Centro Educativo:</b></label>
						<label id="center"></label>
					</div>
					<div class="col-md-8 mb-3">
						<label for="caacitaciones"><b>Capacitaciones tomadas:</b></label>
						<label id="capacitations"></label>
					</div>	

        		</div>
				<hr class="mb-4">
				<h4>Capacitacion Realizada</h4>
				<div class="col-md-8 mb-3">
					<?php
						include("class/class_conexion.php");
						include("class/class_capacitacion.php");
						$conexion = new Conexion();
						Capacitacion::mostrarCapacitacion($conexion);
						$conexion->closeConnection();
					?>
				</div>
				<div class="col-md-2">
	              	<label for="telefono">Horas recibidas</label>
	              	<input class="form-control" id="horas" name="horas" type="number">
	            </div>
					 
				<button class="btn btn-info btn-lg btn-block" id="btn-save" style="margin-top: 3%;">Agregar nueva capacitacion</button>

        		<div class="alert alert-success" role="alert" id="resultado" style="visibility: hidden;" style="margin-top: 3%;">
					<!-- Imprimir resultado exitoso.-->
				</div>
				<div class="alert alert-danger" role="alert" id="resultado2" style="visibility: hidden;" style="margin-top: 3%;">
					<!-- Imprimir resultado fallido.-->
				</div>
		</div>
	</div>
</div>
<br>

<script src="js/jquery.min.js"></script>
<script src="js/capacitacion-maestro-controller.js"></script>

</body>
</html>