<?php
	switch ($_GET["action"]) {
		case 'save':

			include("../class/class_conexion.php");
			include("../class/class_maestro.php");

			$conexion = new Conexion();
			$identidad = $_POST["identidad"];
			$telefono = $_POST["telefono"];

			$re = "/[0-9]{4}-[0-9]{4}-[0-9]{5}/";
			$result = preg_match($re, $identidad);

			if($result == 1){
				$sql = sprintf("SELECT txt_nombre,txt_apellido,txt_identidad FROM Maestro WHERE txt_identidad = '%s'",stripslashes($identidad));
				$newUser = $conexion->executeQuery($sql); 

				if($conexion->countRegisters($newUser)>0){ 
					echo "<script> alert('Registro ya existe!'); </script>"; 
				}else{
					$maestro = new Maestro(
							$_POST["nombre"],
							$_POST["apellido"],
							$identidad,
							$_POST["genero"],
							$_POST["email"],
							$telefono,
							$_POST["slc-depto"],
							$_POST["slc-nivel"],
							$_POST["slc-cargo"],
							$_POST["centro"],
							$_POST["distrito"],
							$_POST["slc-capacitacion"],
							$_POST["horas"]
					);
					$maestro->guardarRegistro($conexion);
					$conexion->closeConnection();
				}
			}else{
				echo "<script> alert('El número de identidad es incorrecto!'); </script>";
			}
			break;
			
		default:
			echo "Accion Invalida";
			break;
	}
	
?>