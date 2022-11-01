<?php
	/**
	* 
	*/
	class Dashboard
	{
		private $operacion = "";
		private $db;
		function __construct() {
			$this->db = new ConnectDB();
		}


		/* 
		Guardado de Clientes - insercion database
		 */
		function guardarClientes($firstname,$lastname,$email,$phone,$commentary){
			
			$query = "CALL sp_clients (
				'registrar',
				'$firstname',
				'$lastname',
				'$email',
				'$phone',
				'$commentary',
				''
				)";
			$rst = $this->db->enviarQuery($query,'CUD');
			return $rst;
		}
		/* 
		Listado de clientes Registrados
		 */
		function listadoClientes(){
			$query = "CALL sp_clients ('consultar','','','','','','')";
			$rst = $this->db->enviarQuery($query,'R');
			
			if(@$rst[0]['id'] != ""){
				return $rst;
			}else{
				return array("ErrorStatus"=>true);
			}
		}

		/* 
			Eliminar Clientes Registrados 
		*/
		function eliminarClientes($idCliente){
			$query = "CALL sp_clients (
				'eliminar',
				'',
				'',
				'',
				'',
				'',
				'$idCliente'
				)";
			$rst = $this->db->enviarQuery($query,'CUD');
			return $rst;
		}

		/* 
			Edicion de cliente Segun ID
		*/
		function editarCliente($firstname,$lastname,$email,$phone,$commentary,$idCliente){
			$query = "CALL sp_clients (
				'modificar',
				'$firstname',
				'$lastname',
				'$email',
				'$phone',
				'$commentary',
				'$idCliente'
				)";
			$rst = $this->db->enviarQuery($query,'CUD');
			return $rst;
		}

		/* 
		* Consultar datos del cliente segun ID
		*/
		function consultarCliente($idCliente){
			$query = "CALL sp_clients ('consultarById','','','','','','$idCliente')";
			$rst = $this->db->enviarQuery($query,'R');
			
			$data = @$rst[0];
			if(@$rst[0]['id'] != ""){
				return $data;
			}else{
				return array("ErrorStatus"=>true);
			}
		}

	}
?>