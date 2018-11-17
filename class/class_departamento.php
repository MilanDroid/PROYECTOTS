<?php

	class Departamento{

		private $codigoDepartamento;
		private $nombre;

		public function __construct($codigoDepartamento,$nombre){
			$this->codigoDepartamento = $codigoDepartamento;
			$this->nombre = $nombre;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function toString(){
			return "CodigoDepartamento: " . $this->codigoDepartamento . 
				" Nombre: " . $this->nombre;
		}

		public static function mostrarDepartamento($conexion){
			
			$resultado = $conexion->executeQuery("SELECT num_depto_pk, txt_nombre FROM Departamento");

			echo '<select name="slc-depto" id="slc-depto" class="form-control">';
			while($fila = $conexion->getRow($resultado)){
				echo '<option value="'.$fila["num_depto_pk"].'">'.$fila["txt_nombre"].'</option>';
			}
			echo '</select>';

		}
	}

?>