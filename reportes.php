<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");
?>
<!doctype html>
<html>
	<head>
		<title>Reportes</title>
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
            		<h3>Reporte por maestro</h3>
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
			<div class="row">
				<div class="col-md-12">
					<div id="response"></div>
				</div>
				<div class="col-md-6">
					<button class="btn btn-info btn-lg btn-block" id="btn-generar" style="margin-top: 3%;">Generar Reporte</button>
				</div>
			</div>


    		<div class="alert alert-success" role="alert" id="resultado" style="visibility: hidden;" style="margin-top: 3%;">
				<!-- Imprimir resultado exitoso.-->
			</div>
			<div class="alert alert-danger" role="alert" id="resultado2" style="visibility: hidden;" style="margin-top: 3%;">
				<!-- Imprimir resultado fallido.-->
			</div>

			<div class="row">
            	<div class="col-md-8 mb-3">
            		<h3>Reporte por capacitación</h3>
                	<?php
                		include("class/class_conexion.php");
                		include("class/class_capacitacion.php");
                		$conexion = new Conexion();
                		Capacitacion::mostrarCapacitacion($conexion);
                	?>
                	<button class="btn btn-info btn-block" style="margin-top: 3%;" id="btn-generar2">Generar</button>
              	</div>
            </div>

		</div>
	</div>
</div>
<br>

<script src="js/jquery.min.js"></script>
<script src="js/reportes.js"></script>

</body>
</html>