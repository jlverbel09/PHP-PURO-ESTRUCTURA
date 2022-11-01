<?php
	include '../../globalConfig.php';
	header("Content-type: application/json"); 
	include '../../class/clsConnectDB.php';
	include '../../class/clsDashboard.php';

	//Datos

	if (isset($_POST['accion'])) {

		if ($_POST['accion'] == 'guardarCliente') {
			
			$nombre 	= $_POST['nombre'];
			$apellido 	= $_POST['apellido'];
			$email		= $_POST['email'];
			$telefono  	= $_POST['telefono'];
			$comentario = $_POST['comentario'];

			$Dashboard = new Dashboard();
			$guardado = $Dashboard->guardarClientes($nombre,$apellido,$email,$telefono,$comentario);
			
			if($guardado){
				echo 'Usuario Registrado Correctamente!';
				return;
			}
		}

		if($_POST['accion'] == 'eliminarCliente'){

			
			$idCliente 	= $_POST['idCliente'];

			$Dashboard = new Dashboard();
			$eliminado = $Dashboard->eliminarClientes($idCliente);
			if($eliminado){
				echo 'Usuario Eliminado Correctamente';
				return;
			}
		}


		if($_POST['accion'] == 'editarCliente'){
			
			$idCliente 	= $_POST['idCliente'];
			$nombre 	= $_POST['nombre'];
			$apellido 	= $_POST['apellido'];
			$email		= $_POST['email'];
			$telefono  	= $_POST['telefono'];
			$comentario = $_POST['comentario'];

			$Dashboard = new Dashboard();
			$editado = $Dashboard->editarCliente($nombre,$apellido,$email,$telefono,$comentario,$idCliente);
			
			if($editado){
				echo 'Usuario Editado Correctamente!';
				return;
			}
		}

		if($_POST['accion'] == 'consultarCliente'){

			$idCliente 	= $_POST['idCliente'];
			
			$Dashboard = new Dashboard();
			$datosCliente = $Dashboard->consultarCliente($idCliente);
			
			echo json_encode($datosCliente);
			return;
			
		}
	}


	/* 	if (isset($_SESSION['codUser'])) {
	}else{
      header("Location: ../../index.php");
   	} */
?>