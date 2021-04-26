<?php
session_start();
require_once "../controladores/membresias.controlador.php";
require_once "../modelos/membresias.modelo.php";

class AjaxMembresias{

	/*=============================================
	EDITAR TIPO DE MEMBRESIA
	=============================================*/	

	public $idTipoMembresia;

	public function ajaxEditarTipoMembresia(){

		$item = "id_tipo_membresia";
		$valor = $this->idTipoMembresia;

		$respuesta = ControladorMembresias::ctrMostrarTipoMembresias($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR PRECIO DE MEMBRESIA
	=============================================*/	

	public $idPrecioMembresia;

	public function ajaxEditarPrecioMembresia(){

		$item = "id_precio_membresia";
		$valor = $this->idPrecioMembresia;

		$respuesta = ControladorMembresias::ctrMostrarPrecioMembresias($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	EDITAR  MEMBRESIA
	=============================================*/	

	public $idMembresia;

	public function ajaxEditarMembresia(){

		$item = "id_membresia";
		$valor = $this->idMembresia;

		$respuesta = ControladorMembresias::ctrMostrarMembresias($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	TIPO DE MEMBRESIA POR EMPRESA
	=============================================*/	

	public function ajaxTipoEmpresa(){

		$valor = $this->empresa;

		$respuesta = ControladorMembresias::ctrSelecMembresiasApuestas($valor);

		echo json_encode($respuesta);

	}	


}

/*=============================================
EDITAR TIPO MEMBRESIA
=============================================*/
if(isset($_POST["idTipoMembresia"])){

	$editarTipoMembresia = new AjaxMembresias();
	$editarTipoMembresia -> idTipoMembresia = $_POST["idTipoMembresia"];
	$editarTipoMembresia -> ajaxEditarTipoMembresia();

}

/*=============================================
EDITAR PRECIO MEMBRESIA
=============================================*/
if(isset($_POST["idPrecioMembresia"])){

	$editarPrecioMembresia = new AjaxMembresias();
	$editarPrecioMembresia -> idPrecioMembresia = $_POST["idPrecioMembresia"];
	$editarPrecioMembresia -> ajaxEditarPrecioMembresia();

}

/*=============================================
EDITAR MEMBRESIA
=============================================*/
if(isset($_POST["idMembresia"])){

	$editarMembresia = new AjaxMembresias();
	$editarMembresia -> idMembresia = $_POST["idMembresia"];
	$editarMembresia -> ajaxEditarMembresia();

}


/*=============================================
TIPO DE MEMBRESIA POR EMPRESA
=============================================*/
if(isset($_POST["empresa"])){

	$editarMembresia = new AjaxMembresias();
	$editarMembresia -> empresa = $_POST["empresa"];
	$editarMembresia -> ajaxTipoEmpresa();

}