<!doctype html>
<html>
	<head>
		<title>Iniciar Sesion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/login.css">
		<link rel="icon" type="text/css" href="img/icon.png">
	</head>

<body>
	
	<div class="container">
		<div class="p-3 mb-2" id="div-titulo">
			<img src="img/logo.png" class="img-responsive img">
		</div>
	</div>

	<div class="container" style="border:2px solid #2A85C3;"></div>

	<div class="container">
        <div class="card card-container">
        	
			<img id="profile-img" class="profile-img-card" src="img/person.png"/>
        	
            <input type="email" id="email" class="form-control" placeholder="Correo Electronico" required autofocus>
            <input type="password" id="password" class="form-control" placeholder="Contraseña" required style="margin-top: 5%;">
            <button class="btn btn-lg btn-primary btn-block btn-signin" style="margin-top: 5%;" id="btn-login">Ingresar</button>
        </div>
		
		<div align="center">
			<div class="alert alert-danger" role="alert" id="response" style="width: 35%;text-align: center;visibility: hidden;"></div>
		</div>
    </div>
        
	
	<script src="js/jquery.min.js"></script>
	<script src="js/login-controller.js"></script>

</body>
</html>
