<?php
	include("../class/class_conexion.php");
	switch ($_GET["action"]) {
		case 'search':	
			$conexion = new Conexion();
			$id = $_POST["identity"];
			$sql = sprintf("SELECT 	M.txt_nombre as name, 
									M.txt_apellido as lastName, 
									M.txt_email as email,
									M.txt_telefono as phone,
									M.txt_centro_educativo as center
									FROM Capacitacion_X_Maestro CM 
									INNER JOIN Maestro M 
									ON M.num_maestro_pk = CM.num_maestro_fk 
									INNER JOIN Capacitacion C  
									ON C.num_capacitacion_pk = CM.num_capacitacion_fk 
									WHERE M.txt_identidad = '%s' LIMIT 1",stripslashes($id));
			$result = $conexion->executeQuery($sql);
			$persons = array();
			while($row = $conexion->getRow($result)){
				$persons["name"] = str_replace("?", "ñ", utf8_decode($row["name"]));
				$persons["lastName"] = str_replace("?", "ñ", utf8_decode($row["lastName"]));
				$persons["email"] = $row["email"];
				$persons["phone"] = $row["phone"];
				$persons["center"] = str_replace("?", "ñ", utf8_decode($row["center"]));
			}
			$sql2 = sprintf("	SELECT C.txt_nombre as capacitation 
								FROM Capacitacion_X_Maestro CM 
								INNER JOIN Maestro M 
								ON M.num_maestro_pk = CM.num_maestro_fk 
								INNER JOIN Capacitacion C  
								ON C.num_capacitacion_pk = CM.num_capacitacion_fk 
								WHERE M.txt_identidad = '%s'",stripslashes($id));
			$result2 = $conexion->executeQuery($sql2);
			$capacitations = array();
			while($row = $conexion->getRow($result2)){
				$capacitations[] = str_replace("?", "ñ", utf8_decode($row["capacitation"]));
			}
			$persons["capacitations"] = $capacitations;
			echo json_encode($persons);
			$conexion->closeConnection();
			break;

		case 'save':
			$conexion = new Conexion();
			$id = $_POST["identity"];
			$idCapacitation = $_POST["slc-capacitacion"];
			$hours = $_POST["horas"];
			$sql = sprintf("SELECT 	M.num_maestro_pk as id
							FROM Capacitacion_X_Maestro CM
							INNER JOIN Maestro M
							ON M.num_maestro_pk = CM.num_maestro_fk
							INNER JOIN Capacitacion C 
							ON C.num_capacitacion_pk = CM.num_capacitacion_fk
							WHERE M.txt_identidad = '%s'
							LIMIT 1",stripslashes($id));
			$result = $conexion->executeQuery($sql);
			$codePerson = $conexion->getRow($result);

			$query = sprintf("INSERT INTO Capacitacion_X_Maestro(num_maestro_fk,num_capacitacion_fk,horas_recibidas) 
				VALUES('%s','%s','%s')",
					stripslashes($codePerson["id"]),
					stripslashes($idCapacitation),
					stripslashes($hours)
				);
			$result2 = $conexion->executeQuery($query);
			if($result2){
				echo "<b>Registro almacenado con exito, presione 'Buscar' para refrescar los cambios</b>";
			}else{
				echo "Error al guardar el registro";
				exit;
			}
		break;

		case 'report':	
			$conexion = new Conexion();
			$id = $_POST["identity"];
			$sql = sprintf("SELECT 	M.txt_nombre as name, 
									M.txt_apellido as lastName, 
									M.txt_identidad as id,
									D.txt_nombre as depto,
									M.txt_distrito as district,
									M.txt_email as email,
									M.txt_telefono as phone,
									M.txt_centro_educativo as center,
									Ca.txt_nombre as work
									FROM Capacitacion_X_Maestro CM 
									INNER JOIN Maestro M 
									ON M.num_maestro_pk = CM.num_maestro_fk 
									INNER JOIN Capacitacion C  
									ON C.num_capacitacion_pk = CM.num_capacitacion_fk 
									INNER JOIN Departamento D
									ON M.num_depto_fk = D.num_depto_pk
									INNER JOIN Cargo Ca
									ON M.num_cargo_fk = Ca.num_cargo_pk
									WHERE M.txt_identidad = '%s' LIMIT 1",stripslashes($id));
			$result = $conexion->executeQuery($sql);
			echo '<table class="table table-responsive table-hover table-bordered">
						<tr class="alert alert-success">
							<td align="center">Nombre</td>
							<td align="center">Identidad</td>
							<td align="center">Departamento</td>
							<td align="center">Email</td>
							<td align="center">Telefono</td>
							<td align="center">Centro Educativo</td>
							<td align="center">Distrito Educativo</td>
							<td align="center">Cargo</td>
						</tr>';
			while($row = $conexion->getRow($result)){
				echo "<tr>";
				?>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["name"]))." ".str_replace("?", "ñ", utf8_decode($row["lastName"])); ?></td>
				<td align="center"><?php echo $row["id"]; ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["depto"])); ?></td>
				<td align="center"><?php echo $row["email"]; ?></td>
				<td align="center"><?php echo $row["phone"]; ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["center"])); ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["district"])); ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["work"])); ?></td>
			<?php
				echo "</tr>";
			}
			echo "</table>";


			$sql2 = sprintf("	SELECT C.txt_nombre as capacitation2, C.txt_centro as center2, C.fecha_inicio as date_init, C.fecha_fin as date_end, CM.horas_recibidas as hoursIn,C.horas_capacitacion as totalHours, T.txt_nombre as tipo
								FROM Capacitacion_X_Maestro CM 
								INNER JOIN Maestro M 
								ON M.num_maestro_pk = CM.num_maestro_fk 
								INNER JOIN Capacitacion C  
								ON C.num_capacitacion_pk = CM.num_capacitacion_fk 
								INNER JOIN TipoCapacitacion T
								ON T.num_tipo_capacitacion_pk = C.num_tipo_capacitacion_fk
								WHERE M.txt_identidad = '%s'",stripslashes($id));
			$result2 = $conexion->executeQuery($sql2);

			echo '<hr class="mb-4">
					<h4>Capacitaciones del maestro</h4>
					<br>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-responsive table-hover table-bordered">
								<tr class="alert alert-primary">
									<td align="center">Nombre</td>
									<td align="center">Tipo Capacitación</td>
									<td align="center">Centro</td>
									<td align="center">Fecha Inicio</td>
									<td align="center">Fecha Fin</td>
									<td align="center">Duracion(Hrs)</td>
									<td align="center">Horas asistidas</td>
									<td align="center">Diferencia(Hrs)</td>
								</tr>';

			while($row = $conexion->getRow($result2)){
				echo "<tr>";
				?>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["capacitation2"])); ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["tipo"])); ?></td>
				<td align="center"><?php echo str_replace("?", "ñ", utf8_decode($row["center2"])); ?></td>
				<td align="center"><?php echo $row["date_init"]; ?></td>
				<td align="center"><?php echo $row["date_end"]; ?></td>
				<td align="center"><?php echo $row["totalHours"]; ?></td>
				<td align="center"><?php echo $row["hoursIn"]; ?></td>
				<td align="center"><?php echo $row["totalHours"]-$row["hoursIn"]; ?></td>
			<?php
				echo "</tr>";
			}
			echo "</table></div></div>";
			$conexion->closeConnection();
			break;

		case 'report-master':
			echo "Simon";
		break;

		case 'report-capacitation':
			echo "Simon 2";
		break;

		default:
			echo "Accion Inválida";	
			break;
	}
	
?>