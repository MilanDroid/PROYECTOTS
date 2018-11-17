<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");

	include("class/class_conexion.php");
?>
<!doctype html>
<html>
	<head>
		<title>Agregar Capacitaciones</title>
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
        	<h4 class="mb-3">Agregar Capacitación</h4>
          	<hr class="mb-4">
            <div class="row">
            	<div class="col-md-6 mb-3">
                	<label for="nombreCapacitacion">Nombre Capacitación</label>
                	<input class="form-control" id="nombreCapacitacion" name="nombreCapacitacion" type="text">
              	</div>
              	<div class="col-md-6 mb-3">
                	<label for="descripcion">Descripcion</label>
                	<input class="form-control" id="descripcion" name="descripcion" type="text">
              	</div>

              	<div class="col-md-6 mb-3">
	              	<label for="nombreTutor">Nombre Tutor</label>
	              	<input class="form-control" id="nombreTutor" name="nombreTutor" type="text">
	            </div>

	            <div class="col-md-6 mb-3">
                	<label for="slc-tipo">Tipo de Capacitación</label>
	              	<!--Se genera desde la DB-->
	              	<?php
	              		include("class/class_capacitacion.php");
                        $conexion = new Conexion();
                    	Capacitacion::mostrarTipoCapacitacion($conexion);
                        $conexion->closeConnection();
	              	?>
            	</div>

              	<div class="col-md-6 mb-3">
                	<label for="slc-depto">Departamento donde se realizó</label>
	              	<!--Se genera desde la DB-->
	              	<?php
	              		include("class/class_departamento.php");
                        $conexion = new Conexion();
                    	Departamento::mostrarDepartamento($conexion);
                        $conexion->closeConnection();
	              	?>
            	</div>

            	<div class="col-md-6 mb-3">
	              	<label for="fechaInicio">Fecha Inicio</label>
	              	<input class="form-control" id="fechaInicio" name="fechaInicio" type="date">
	            </div>
				
				<div class="col-md-6 mb-3">
	              	<label for="fechaFin">Fecha Fin</label>
	              	<input class="form-control" id="fechaFin" name="fechaFin" type="date">
	            </div>

	            <div class="col-md-6 mb-3">
	              	<label for="centro">Centro donde se realizó</label>
	              	<input class="form-control" id="centro" name="centro" type="text">
	            </div>

	            <div class="col-md-6 mb-3">
	              	<label for="centro">Duración(Hrs)</label>
	              	<input class="form-control" id="horas" name="horas" type="number">
	            </div>
				
	            <div class="col-md-8 mb-4" style="margin-top: 3%;">
	              	<button class="btn btn-info btn-block" id="btn-save">Guardar</button>
	            </div>
            </div>	          
		</div>
	</div>
	<div class="row">
		<div class="alert alert-success col-md-8" role="alert" id="resultado" style="visibility: hidden;" style="margin-top: 3%;">
			<!-- Imprimir resultado exitoso.-->
		</div>
		<div class="alert alert-danger col-md-8" role="alert" id="resultado2" style="visibility: hidden;" style="margin-top: 3%;">
			<!-- Imprimir resultado fallido.-->
		</div>
	</div>
</div>

<div class="container">
	<div class="row" id="list-capacitations">
		<!--
			Aqui se imprime una tabla con la 
			lista de capacitaciones registradas
			en el sistema.
		-->
	</div>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/add-capacitacion-controller.js"></script>

</body>
</html>