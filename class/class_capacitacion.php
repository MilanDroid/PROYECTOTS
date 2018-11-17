<?php

	class Capacitacion{

		private $codigoCapacitacion;
		private $nombre;
		private $descripcion;
		private $tutor;
		private $codigoDepartamento;
		private $fechaInicio;
		private $fechaFin;
		private $centro;
		private $tipoCapacitacion;
		private $horas;

		public function __construct($codigoCapacitacion,$nombre,$descripcion,$tutor,$codigoDepartamento,
			$fechaInicio,$fechaFin,$centro,$tipoCapacitacion,$horas){
			$this->codigoCapacitacion = $codigoCapacitacion;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->tutor = $tutor;
			$this->codigoDepartamento = $codigoDepartamento;
			$this->fechaInicio = $fechaInicio;
			$this->fechaFin = $fechaFin;
			$this->centro = $centro;
			$this->tipoCapacitacion = $tipoCapacitacion;
			$this->horas = $horas;
		}
		public function getCodigoCapacitacion(){
			return $this->codigoCapacitacion;
		}
		public function setCodigoCapacitacion($codigoCapacitacion){
			$this->codigoCapacitacion = $codigoCapacitacion;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getTutor(){
			return $this->tutor;
		}
		public function setTutor($tutor){
			$this->tutor = $tutor;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getFechaInicio(){
			return $this->fechaInicio;
		}
		public function setFechaInicio($fechaInicio){
			$this->fechaInicio = $fechaInicio;
		}
		public function getFechaFin(){
			return $this->fechaFin;
		}
		public function setFechaFin($fechaFin){
			$this->fechaFin = $fechaFin;
		}
		public function getCentro(){
			return $this->centro;
		}
		public function setCentro($centro){
			$this->centro = $centro;
		}
		public function toString(){
			return "CodigoCapacitacion: " . $this->codigoCapacitacion . 
				" Nombre: " . $this->nombre . 
				" Descripcion: " . $this->descripcion . 
				" Tutor: " . $this->tutor . 
				" CodigoDepartamento: " . $this->codigoDepartamento . 
				" FechaInicio: " . $this->fechaInicio . 
				" FechaFin: " . $this->fechaFin . 
				" Centro: " . $this->centro;
		}

		public static function mostrarCapacitacion($conexion){
			$resultado = $conexion->executeQuery("SELECT num_capacitacion_pk, txt_nombre FROM Capacitacion");
			echo '<select name="slc-capacitacion" id="slc-capacitacion" class="form-control">';
			while($fila = $conexion->getRow($resultado)){
				echo '<option value="'.$fila["num_capacitacion_pk"].'">'.str_replace("?", "ñ", utf8_decode($fila["txt_nombre"])).'</option>';
			}
			echo '</select>';
		}

		public static function mostrarTipoCapacitacion($conexion){
			$resultado = $conexion->executeQuery("SELECT num_tipo_capacitacion_pk, txt_nombre FROM TipoCapacitacion");
			echo '<select name="slc-tipo" id="slc-tipo" class="form-control">';
			while($fila = $conexion->getRow($resultado)){
				echo '<option value="'.$fila["num_tipo_capacitacion_pk"].'">'.str_replace("?", "ñ", utf8_decode($fila["txt_nombre"])).'</option>';
			}
			echo '</select>';
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
				"INSERT INTO Capacitacion 
						(
							txt_nombre, txt_descripcion, txt_tutor,
							num_depto_fk, fecha_inicio, fecha_fin, txt_centro, num_tipo_capacitacion_fk, horas_capacitacion
						) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
						stripslashes(utf8_decode($this->nombre)),
						stripslashes(utf8_decode($this->descripcion)),
						stripslashes(utf8_decode($this->tutor)),
						stripslashes($this->codigoDepartamento),
						stripslashes($this->fechaInicio),
						stripslashes($this->fechaFin),
						stripslashes(utf8_decode($this->centro)),
						stripslashes($this->tipoCapacitacion),
						stripslashes($this->horas)
				);
			$resultado = $conexion->executeQuery($sql);
			if($resultado){
				echo "<b>Registro almacenado con exito</b>";
			}else{
				echo "Error al guardar el registro";
				exit;
			}		
		}

	}
?>