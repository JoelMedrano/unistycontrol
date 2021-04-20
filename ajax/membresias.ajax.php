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


}

/*=============================================
EDITAR RED SOCIAL
=============================================*/
if(isset($_POST["idTipoMembresia"])){

	$editarTipoMembresia = new AjaxMembresias();
	$editarTipoMembresia -> idTipoMembresia = $_POST["idTipoMembresia"];
	$editarTipoMembresia -> ajaxEditarTipoMembresia();

}
