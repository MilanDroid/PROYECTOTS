<?php

	session_start(); 
	switch ($_GET["action"]){
		//Verificamos si existe el usuario
		case 'verify':
			
			include("../class/class_conexion.php");
			include("../class/class_usuario.php");

			$conexion = new Conexion();
			$respuesta = Usuario::verificarUsuario($conexion, $_POST["email"], $_POST["password"]);
			$_SESSION["num_usuario_pk"] = $respuesta["num_usuario_pk"];
			$_SESSION["txt_nombre"] = $respuesta["txt_nombre"];
			$_SESSION["txt_apellido"] = $respuesta["txt_apellido"];
			$_SESSION["num_tipo_usuario_fk"] = $respuesta["num_tipo_usuario_fk"];

			echo json_encode($respuesta);

			break;
		default:
			echo "Accion invalida";
			break;
	}
	
?>