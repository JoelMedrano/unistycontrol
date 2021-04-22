<?php
session_start();
require_once "../controladores/miembros.controlador.php";
require_once "../modelos/miembros.modelo.php";

class AjaxMiembros{

    /* 
    *editar miembros
    */
	public function ajaxEditarMiembro(){

		$item = "id_miembro";
		$valor = $this->idMiembro;

		$respuesta = ControladorMiembros::ctrMostrarMiembros($item, $valor);

		echo json_encode($respuesta);

	}

	/* 
	*Activar miembros
	*/
	public function ajaxActivarMiembro(){

		$item1 = "estado";
		$valor1 = $this->activarMiembro;

		$item2 = "id_miembro";
		$valor2 = $this->activarId;

		$respuesta = ModeloMiembros::mdlActualizarMiembro($item1, $valor1, $item2, $valor2);

	}

}
/* 
*Editar Miembro
*/
if(isset($_POST["idMiembro"])){

	$editarEmpresa = new AjaxMiembros();
	$editarEmpresa -> idMiembro = $_POST["idMiembro"];
	$editarEmpresa -> ajaxEditarMiembro();

}

/* 
*Activar Miembro
*/
if(isset($_POST["activarMiembro"])){

	$activarMiembro = new AjaxMiembros();
	$activarMiembro -> activarMiembro = $_POST["activarMiembro"];
	$activarMiembro -> activarId = $_POST["activarId"];
	$activarMiembro -> ajaxActivarMiembro();

}