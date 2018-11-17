<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");

	include("class/class_conexion.php");
?>
<!doctype html>
<html>
	<head>
		<title>Registro Maestros</title>
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
        	<h4 class="mb-3">Datos Generales</h4>
          	<hr class="mb-4">
          	<form method="POST">
          		
          	</form>
	            <div class="row">
	            	<div class="col-md-6 mb-3">
	                	<label for="nombre">Nombres</label>
	                	<input class="form-control" id="nombre" name="nombre" type="text">
	              	</div>
	              	<div class="col-md-6 mb-3">
	                	<label for="apellido">Apellidos</label>
	                	<input class="form-control" id="apellido" name="apellido" type="text">
	              	</div>
	            </div>

	            <div class="row">
					<div class="col-md-6 mb-3">
		              	<label for="identidad">Numero de Identidad</label>
		              	<input class="form-control" id="identidad" name="identidad" placeholder="0000-0000-00000" type="text">
		            </div>

	              	<div class="col-md-6 mb-3">
	                	<label for="email">Correo Electronico</label>
	                	<input class="form-control" id="email" name="email" placeholder="email@ejemplo.com" type="text">
	              	</div>
	            </div>

	            <div class="row">
		            <div class="col-md-6 mb-3">
		              	<label for="telefono">Numero de Telefono/Celular</label>
		              	<input class="form-control" id="telefono" name="telefono" placeholder="0000-0000" type="text">
		            </div>

		            <div class="col-md-6 mb-3">
		            	<h5>Genero</h5>
					    <div class="form-check">
			      			<label class="form-check-label">
			        		<input type="radio" class="form-check-input" name="genero" id="masculino" value="M" checked>
			        		Masculino
			      			</label>
			      			<label class="form-check-label" style="margin-left: 10%;">
			        		<input type="radio" class="form-check-input" name="genero" id="femenino" value="F">
			        		Femenino
			      			</label>
			    		</div>
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-6 mb-3">
		              	<label for="slc-depto">Departamento</label>
		              	<!--Se genera desde la DB-->
		              	<?php
		              		include("class/class_departamento.php");
	                        $conexion = new Conexion();
	                    	Departamento::mostrarDepartamento($conexion);
	                        $conexion->closeConnection();
		              	?>
		            </div>

		            <div class="col-md-6 mb-3">
		              	<label for="centro">Centro Educativo</label>
		              	<input class="form-control" id="centro" name="centro" type="text">
		            </div>

		            <div class="col-md-6 mb-3">
		              	<label for="distrito">Distrito Educativo</label>
		              	<input class="form-control" id="distrito" name="distrito" type="text">
		            </div>
		        </div>

		        <div class="row">
		            <div class="col-md-6 mb-3">
		              	<label for="slc-cargo">Cargo</label>
		              	<?php
		              		include("class/class_cargo.php");
	                        $conexion = new Conexion();
	                    	Cargo::mostrarCargo($conexion);
	                        $conexion->closeConnection();
		              	?>
		            </div>

		            <div class="col-md-6 mb-3">
		              	<label for="slc-nivel">Nivel Educativo</label>
		              	<?php
		              		include("class/class_nivel.php");
	                        $conexion = new Conexion();
	                    	NivelEducativo::mostrarNivelEducativo($conexion);
	                        $conexion->closeConnection();
		              	?>
		            </div>
		        </div>
	            
				<br>
				<hr class="mb-4">
				<hr class="mb-4">

				<h4>Información de la capacitación</h4>
				<br>
	            <div class="row">
	              	<div class="col-md-12 mb-4">
	                	<label for="slc-capacitacion">Capacitacion Tomada</label>
	                	<?php
		              		include("class/class_capacitacion.php");
	                        $conexion = new Conexion();
	                    	Capacitacion::mostrarCapacitacion($conexion);
	                        $conexion->closeConnection();
		              	?>
	              	</div>
	              	<div class="col-md-2">
		              	<label for="telefono">Horas asistidas</label>
		              	<input class="form-control" id="horas" name="horas" type="number">
		            </div>
	            	
	            	<button class="btn btn-info btn-lg btn-block" id="btn-save" style="margin-top: 3%;">Registrar</button>
        		</div>

        		<div class="alert alert-success" role="alert" id="resultado" style="visibility: hidden;">
					<!-- Imprimir resultado exitoso.-->
				</div>
				<div class="alert alert-danger" role="alert" id="resultado2" style="visibility: hidden;">
					<!-- Imprimir resultado fallido.-->
				</div>
		</div>
	</div>
</div>
<br>

<script src="js/jquery.min.js"></script>
<script src="js/maestros-controller.js"></script>

</body>
</html>
