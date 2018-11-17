<?php

	class NivelEducativo{

		private $codigoNivel;
		private $nombre;
		private $descripcion;

		public function __construct($codigoNivel,$nombre,$descripcion){
			$this->codigoNivel = $codigoNivel;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
		}
		public function getCodigoNivel(){
			return $this->codigoNivel;
		}
		public function setCodigoNivel($codigoNivel){
			$this->codigoNivel = $codigoNivel;
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
		public function toString(){
			return "CodigoNivel: " . $this->codigoNivel . 
				" Nombre: " . $this->nombre . 
				" Descripcion: " . $this->descripcion;
		}

		public static function mostrarNivelEducativo($conexion){
			
			$resultado = $conexion->executeQuery("SELECT num_nivel_pk, txt_nombre FROM Nivel");

			echo '<select name="slc-nivel" id="slc-nivel" class="form-control">';
			while($fila = $conexion->getRow($resultado)){
				echo '<option value="'.$fila["num_nivel_pk"].'">'.$fila["txt_nombre"].'</option>';
			}
			echo '</select>';

		}

	}
?>