<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");
?>
<!doctype html>
<html>
<head>
	<title>Menu - Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/menu-admin.css">
	<link rel="icon" type="text/css" href="img/icon.png">
</head>
<body>

	<header class="p-3 mb-2 bg-info text-white" >
		<div class="wrapper">
			<div class="logo">
				<p>CRFP/CSO</p>   
					
			</div>
			<nav>
				<a>
					<?php 
						echo "Bienvenid@: ".$_SESSION["txt_nombre"]." ".$_SESSION["txt_apellido"];
					?>
				</a>
				<a href="cerrar_sesion.php">Salir</a>
			</nav>
		</div>
	</header>
	
	<div class="container" style="margin-top: 5%;">
		
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    	<div align="center">
		      		<img src="img/teacher.svg" alt="..." class="img-responsive" style="width: 70%;height: auto;">
		    	</div>
		      <div class="caption" align="center">
		        <p style="margin-top: 3%;"><a href="registro-maestro.php" class="btn btn-info btn-block" role="button">Agregar Maestro</a>
		        </p>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    	<div align="center">
		      		<img src="img/courses.svg" alt="..." class="img-responsive" style="width: 70%;height: auto;">
		    	</div>
		      <div class="caption" align="center">
		        <p style="margin-top: 3%;"><a href="agregar-capacitacion.php" class="btn btn-info btn-block" role="button">Registrar Capacitación</a>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    	<div align="center">
		      		<img src="img/presentation.svg" alt="..." class="img-responsive" style="width: 70%;height: auto;">
		    	</div>
		      <div class="caption" align="center">
		        <p style="margin-top: 3%;"><a href="registro-capacitacion.php" class="btn btn-info btn-block" role="button">Agregar capacitación a maestro</a>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-6 col-md-4" style="margin-top: 5%;">
		    <div class="thumbnail">
		    	<div align="center">
		      		<img src="img/report.svg" alt="..." class="img-responsive" style="width: 70%;height: auto;">
		    	</div>
		      <div class="caption" align="center">
		        <p style="margin-top: 3%;"><a href="reportes.php" class="btn btn-info btn-block" role="button">Reportes</a>
		      </div>
		    </div>
		  </div>

		  <div class="col-sm-6 col-md-4" style="margin-top: 5%;">
		    <div class="thumbnail">
		    	<div align="center">
		      		<img src="img/user.svg" alt="..." class="img-responsive" style="width: 70%;height: auto;">
		    	</div>
		      <div class="caption" align="center">
		        <p style="margin-top: 3%;"><a href="registro-usuario.php" class="btn btn-info btn-block" role="button">Registrar Usuario</a>
		      </div>
		    </div>
		  </div>
			
			

		</div>
	</div>
	
</body>
</html>
