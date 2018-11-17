<?php
	
	include_once("class_conexion.php");

	class Usuario{

		private $userCode;
		private $name;
		private $lastName;
		private $email;
		private $password;
		private $userType;

		public function __construct($userCode,$name,$lastName,$email,$password,$userType){
			$this->userCode = $userCode;
			$this->name = $name;
			$this->lastName = $lastName;
			$this->email = $email;
			$this->password = $password;
			$this->userType = $userType;
		}
		public function getUserCode(){
			return $this->userCode;
		}
		public function setUserCode($userCode){
			$this->userCode = $userCode;
		}
		public function getName(){
			return $this->name;
		}
		public function setName($name){
			$this->name = $name;
		}
		public function getLastName(){
			return $this->lastName;
		}
		public function setLastName($lastName){
			$this->lastName = $lastName;
		}
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
		public function getPassword(){
			return $this->password;
		}
		public function setPassword($password){
			$this->password = $password;
		}
		public function getUserType(){
			return $this->userType;
		}
		public function setUserType($userType){
			$this->userType = $userType;
		}
		public function toString(){
			return "UserCode: " . $this->userCode . 
				" Name: " . $this->name . 
				" LastName: " . $this->lastName . 
				" Email: " . $this->email . 
				" Password: " . $this->password . 
				" UserType: " . $this->userType;
		}

		public static function mostrarTipoUsuario($conexion){
			$result = $conexion->executeQuery(
				"SELECT num_tipo_usuario_pk, txt_nombre FROM TipoUsuario");

			echo '<select id="slc-tipo" name="slc-tipo" class="form-control">';
			while($fila = $conexion->getRow($result)){
				echo '<option value="'.$fila["num_tipo_usuario_pk"].'">'.
					$fila["txt_nombre"].'</option>';
			}
			echo '</select>';
		}

		public static function verificarUsuario($conexion, $email, $password){
			$resultado = $conexion->executeQuery(
				sprintf("SELECT num_usuario_pk,num_tipo_usuario_fk,txt_nombre,txt_apellido,txt_email, txt_password FROM Usuario WHERE txt_email = '%s' AND txt_password = sha1('%s')",
					stripslashes($email),
					stripslashes($password)
			));
			$respuesta = array();

			if($conexion->countRegisters($resultado) >0){
				$fila = $conexion->getRow($resultado);
				$respuesta["codigo_resultado"] = 1;
				$respuesta["resultado"] = "Usuario Existe";
				$respuesta["num_usuario_pk"] = $fila["num_usuario_pk"];
				$respuesta["txt_email"] = $fila["txt_email"];
				$respuesta["txt_nombre"] = $fila["txt_nombre"];
				$respuesta["txt_apellido"] = $fila["txt_apellido"];
				$respuesta["num_tipo_usuario_fk"] = $fila["num_tipo_usuario_fk"];
			}
			else {
				$respuesta["codigo_resultado"] = 0;
				$respuesta["resultado"] = "Usuario no Existe";
			}
			return $respuesta;

		}

		public function guardarRegistro($conexion){
			$sql = sprintf(
				"INSERT INTO Usuario 
						(txt_nombre, txt_apellido, txt_email, txt_password, num_tipo_usuario_fk) 
						VALUES ('%s', '%s', '%s', sha1('%s'), '%s')",
						stripslashes($this->name),
						stripslashes($this->lastName),
						stripslashes($this->email),
						stripslashes($this->password),
						stripslashes($this->userType)
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