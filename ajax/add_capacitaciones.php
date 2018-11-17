<?php
	switch ($_GET["action"]) {
		case 'save':
			
			include("../class/class_conexion.php");
			include("../class/class_capacitacion.php");

			$conexion = new Conexion();
			$capacitacion = new Capacitacion(0,
					$_POST["nombreCapacitacion"],
					$_POST["descripcion"],
					$_POST["nombreTutor"],
					$_POST["slc-depto"],
					$_POST["fechaInicio"],
					$_POST["fechaFin"],
					$_POST["centro"],
					$_POST["slc-tipo"],
					$_POST["horas"]
			);

			$capacitacion->guardarRegistro($conexion);
			break;

		case 'load':
			include("../class/class_conexion.php");
			$conexion = new Conexion();
			$resultado = $conexion->executeQuery(
					'SELECT C.txt_nombre, C.txt_descripcion, C.txt_tutor, D.txt_nombre as depto, C.fecha_inicio,
							C.fecha_fin, C.txt_centro, T.txt_nombre as tipo, C.horas_capacitacion as horas 
					FROM Capacitacion C 
					INNER JOIN Departamento D 
					ON C.num_depto_fk = D.num_depto_pk 
					INNER JOIN TipoCapacitacion T 
					ON T.num_tipo_capacitacion_pk = C.num_tipo_capacitacion_fk');
			echo '
				<table class="table table-responsive table-hover table-bordered">
					<tr>
						<td colspan="8" align="center" class="alert alert-success"><h5>Listado de capacitaciones</h5></td>
					</tr>
						<tr class="alert alert-warning">
						<td align="center">Nombre Capacitación</td>
						<td align="center">Tipo Capacitación</td>
						<td align="center">Duración(Hrs)</td>
						<td align="center">Tutor</td>
						<td align="center">Departamento</td>
						<td align="center">Centro</td>
						<td align="center">Fecha de Inicio</td>
						<td align="center">Fecha Final</td>
					</tr>';
			while ($fila = $conexion->getRow($resultado)){
				echo "<tr>";
				?>
				
					<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($fila["txt_nombre"])); ?></td>
					<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($fila["tipo"])); ?></td>
					<td align="center"><?php echo $fila["horas"]; ?></td>
					<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($fila["txt_tutor"])); ?></td>
					<td align="center"><?php echo $fila["depto"]; ?></td>
					<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($fila["txt_centro"])); ?></td>
					<td align="center"><?php echo $fila["fecha_inicio"]; ?></td>
					<td align="center"><?php echo $fila["fecha_fin"]; ?></td>
				</tr>
				<?php

				echo "</tr>";
			}
			echo "</table>";
			
			break;
		default:
			echo "Accion Inválida";	
			break;
	}
	
?>