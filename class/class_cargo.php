<?php

	class Cargo{

		private $codigoCargo;
		private $nombre;

		public function __construct($codigoCargo,$nombre){
			$this->codigoCargo = $codigoCargo;
			$this->nombre = $nombre;
		}
		public function getCodigoCargo(){
			return $this->codigoCargo;
		}
		public function setCodigoCargo($codigoCargo){
			$this->codigoCargo = $codigoCargo;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function toString(){
			return "CodigoCargo: " . $this->codigoCargo . 
				" Nombre: " . $this->nombre;
		}

		public static function mostrarCargo($conexion){
			
			$resultado = $conexion->executeQuery("SELECT num_cargo_pk, txt_nombre FROM Cargo");

			echo '<select name="slc-cargo" id="slc-cargo" class="form-control">';
			while($fila = $conexion->getRow($resultado)){
				echo '<option value="'.$fila["num_cargo_pk"].'">'.$fila["txt_nombre"].'</option>';
			}
			echo '</select>';

		}

	}
?>