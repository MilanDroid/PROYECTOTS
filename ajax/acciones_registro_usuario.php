<?php
	switch ($_GET["action"]) {
		case 'save':

			include("../class/class_conexion.php");
			include("../class/class_usuario.php");

			$conexion = new Conexion();
			$usuario = new Usuario(null,
					$_POST["name"],
					$_POST["last"],
					$_POST["email"],
					$_POST["password"],
					$_POST["slc-tipo"]
			);
			$usuario->guardarRegistro($conexion);
			$conexion->closeConnection();
			break;

		case 'load':
			include("../class/class_conexion.php");
			$conexion = new Conexion();
			$resultado = $conexion->executeQuery(
					'SELECT U.num_usuario_pk as id,U.txt_nombre, U.txt_apellido, U.txt_email, T.txt_nombre as tipo 
					FROM Usuario U 
					INNER JOIN TipoUsuario T 
					ON(U.num_tipo_usuario_fk = T.num_tipo_usuario_pk)');
			echo '
				<div class="col-md-8 order-md-1">
        			<h4 class="mb-3" align="center">Lista de usuarios</h4>
					<table class="table table-hover table-condensed table-bordered">
						<tr>
							<td align="center" class="alert alert-success">Nombre</td>
							<td align="center" class="alert alert-success">Apellido</td>
							<td align="center" class="alert alert-success">Email</td>
							<td align="center" class="alert alert-success">Tipo Usuario</td>
						</tr>';
			while ($fila = $conexion->getRow($resultado)){
				echo "<tr>";
				?>
				
					<td align="center"><?php echo $fila["txt_nombre"]; ?></td>
					<td align="center"><?php echo $fila["txt_apellido"]; ?></td>
					<td align="center"><?php echo $fila["txt_email"]; ?></td>
					<td align="center"><?php echo $fila["tipo"]; ?></td>
				</tr>
				<?php

				echo "</tr>";
			}
			echo "</table></div>";
			break;
		default:
			echo "Accion Invalida";
			break;
	}
	
?>