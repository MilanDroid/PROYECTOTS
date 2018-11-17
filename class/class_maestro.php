<?php

	class Maestro{

		private $codigoMaestro;
		private $nombre;
		private $apellido;
		private $identidad;
		private $genero;
		private $email;
		private $telefono;
		private $codigoDepartamento;
		private $codigoNivelEducativo;
		private $codigoCargo;
		private $nombreCentro;
		private $distrito;
		private $capacitacion;
		private $horas;

		public function __construct($nombre,$apellido,$identidad,$genero,$email,$telefono,
			$codigoDepartamento,$codigoNivelEducativo,$codigoCargo,$nombreCentro,$distrito,$capacitacion,$horas){
			//$this->codigoMaestro = $codigoMaestro;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->identidad = $identidad;
			$this->genero = $genero;
			$this->email = $email;
			$this->telefono = $telefono;
			$this->codigoDepartamento = $codigoDepartamento;
			$this->codigoNivelEducativo = $codigoNivelEducativo;
			$this->codigoCargo = $codigoCargo;
			$this->nombreCentro = $nombreCentro;
			$this->distrito = $distrito;
			$this->capacitacion = $capacitacion;
			$this->horas = $horas;
		}
		public function getCodigoMaestro(){
			return $this->codigoMaestro;
		}
		public function setCodigoMaestro($codigoMaestro){
			$this->codigoMaestro = $codigoMaestro;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getApellido(){
			return $this->apellido;
		}
		public function setApellido($apellido){
			$this->apellido = $apellido;
		}
		public function getIdentidad(){
			return $this->identidad;
		}
		public function setIdentidad($identidad){
			$this->identidad = $identidad;
		}
		public function getGenero(){
			return $this->genero;
		}
		public function setGenero($genero){
			$this->genero = $genero;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getTelefono(){
			return $this->telefono;
		}
		public function setTelefono($telefono){
			$this->telefono = $telefono;
		}
		public function getCodigoDepartamento(){
			return $this->codigoDepartamento;
		}
		public function setCodigoDepartamento($codigoDepartamento){
			$this->codigoDepartamento = $codigoDepartamento;
		}
		public function getCodigoNivelEducativo(){
			return $this->codigoNivelEducativo;
		}
		public function setCodigoNivelEducativo($codigoNivelEducativo){
			$this->codigoNivelEducativo = $codigoNivelEducativo;
		}
		public function getCodigoCargo(){
			return $this->codigoCargo;
		}
		public function setCodigoCargo($codigoCargo){
			$this->codigoCargo = $codigoCargo;
		}
		public function getNombreCentro(){
			return $this->nombreCentro;
		}
		public function setNombreCentro($nombreCentro){
			$this->nombreCentro = $nombreCentro;
		}
		public function toString(){
			return "CodigoMaestro: " . $this->codigoMaestro . 
				" Nombre: " . $this->nombre . 
				" Apellido: " . $this->apellido . 
				" Identidad: " . $this->identidad . 
				" Genero: " . $this->genero . 
				" Email: " . $this->email . 
				" Telefono: " . $this->telefono . 
				" CodigoDepartamento: " . $this->codigoDepartamento . 
				" CodigoNivelEducativo: " . $this->codigoNivelEducativo . 
				" CodigoCargo: " . $this->codigoCargo . 
				" NombreCentro: " . $this->nombreCentro;
		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
					"INSERT INTO Maestro 
							(
								txt_nombre, txt_apellido, txt_identidad,
								txt_genero, txt_email, txt_telefono, 
								num_depto_fk, num_nivel_fk, num_cargo_fk, txt_centro_educativo,txt_distrito
							) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
							stripslashes($this->nombre),
							stripslashes($this->apellido),
							stripslashes($this->identidad),
							stripslashes($this->genero),
							stripslashes($this->email),
							stripslashes($this->telefono),
							stripslashes($this->codigoDepartamento),
							stripslashes($this->codigoNivelEducativo),
							stripslashes($this->codigoCargo),
							stripslashes($this->nombreCentro),
							stripslashes($this->distrito)
					);
				$resultado = $conexion->executeQuery($sql);
				if($resultado){
					echo "<b>Registro almacenado con exito</b>";
				}else{
					echo "Error al guardar el registro";
					exit;
				}

				$resultado = $conexion->executeQuery("SELECT last_insert_id() as id;");
				$fila = $conexion->getRow($resultado);

				if ($fila["id"]>0){
					$sql = sprintf(
						"INSERT INTO Capacitacion_X_Maestro(num_maestro_fk, num_capacitacion_fk,horas_recibidas) 
						 VALUES ('%s','%s','%s')",
						stripslashes($fila["id"]),
						stripslashes($this->capacitacion),
						stripslashes($this->horas)
					);
					$r = $conexion->executeQuery($sql);
					if($r){
						echo "<script> console.log('Capacitacion almacenada con exito!'); </script>";
					}
				}
		}
	}
?>