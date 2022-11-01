<?php
	/**
	* Conexión BD con la API de MySQLi
	*/
	class ConnectDB {

		private $user="root";
		private $password='';
		private $host="localhost";
		private $db="phppuro";

		private $charset="utf8";
		private $conexion;
		public $errMsj=null;

		public function __construct() {
			if (!$this->Conectar()) {
				$this->errMsj = $this->conexion->connect_errno.":".$this->conexion->connect_error;
				echo $this->errMsj;
			}
		}
		private function Conectar() {
			$this->conexion = new mysqli($this->host, $this->user, $this->password, $this->db);
			$this->conexion->set_charset($this->charset);

			if ($this->conexion->connect_errno) {
				return false;
			}else {
				return true;
			}
		}
	   
		function filtrar($value) {
			$valor = stripslashes($value);
			$valor = ltrim($valor);
			$valor = rtrim($valor);
			return $this->conexion->escape_string($valor);
		}

	   
		function enviarQuery($query,$tipo,$rtID=false) {
			switch ($tipo) {
				case 'R':/*SP que devuelven un Select.*/
					$resultado = $this->conexion->query($query);
					if (!$resultado) {
						$this->errMsj = $this->conexion->connect_errno.":".$this->conexion->connect_error;
					}else {
						if (@$resultado->num_rows == 0) {
							return false;
						}
						else {
							$resultado->data_seek(0);
							while ($fila = $resultado->fetch_assoc()) {
								$rst[] = $fila;
							}
							$resultado->free_result();
							return $rst;
						}
					}
					break;
				case 'CUD':/*SP que no devuelve consultas.*/
					$resultado=$this->conexion->query($query);
					if (!$resultado) {
						$this->errMsj = $this->conexion->connect_errno.":".$this->conexion->connect_error;
					}
					else {
						if ($rtID) {
							return $this->conexion->insert_id;
						}
						else {
							return $this->conexion->affected_rows;
						}
					}
					break;
				default:
					$this->errMsj ="Tipo de consulta no permitida.";
					break;
			}
		}
		public function __destruct() {
			@$this->conexion->close();
		}		
	}
?>