<?php 
	session_start(); 
	if(!isset($_SESSION['num_usuario_pk']))
		header("Location: index.php");
?>
<!doctype html>
<html>
<head>
	<title>Menu - CRFPCSO</title>
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
		<div class="row" >
		  	<div class="col-sm-6 col-md-4" style="margin-top: 5%;">
		    	<div class="thumbnail">
		    		<div align="center">
		      			<img src="img/studying.svg" class="img-responsive" style="width: 70%;height: auto;">
		    		</div>
		      		<div class="caption" align="center">
		        		<p style="margin-top: 3%;"><a href="consultas.php" class="btn btn-info btn-block" role="button">Consultar Información</a>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>
	
</body>
</html>
