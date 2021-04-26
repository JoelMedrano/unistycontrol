<?php
session_start();
require_once "../controladores/apuestas.controlador.php";
require_once "../modelos/apuestas.modelo.php";

class AjaxApuestas{

    /* 
    *editar apuesta
    */
	public function ajaxEditarApuesta(){

		$item = "id_apuestas";
		$valor = $this->idApuesta;

		$respuesta = ControladorApuestas::ctrMostrarApuestas($item, $valor);

		echo json_encode($respuesta);

	}

	/* 
	*Actualizar el estado de la apuesta
	*/
	public function ajaxEstadoApuesta(){

		$item1 = "estado";
		$valor1 = $this->estadoApuesta;

		$item2 = "id_apuestas";
		$valor2 = $this->idApuesta;

		$respuesta = ModeloApuestas::mdlEstadoApuesta($item1, $valor1, $item2, $valor2);

	}	

}

/* 
*Editar Apuesta
*/
if(isset($_POST["idApuesta"])){

	$editarApuesta = new AjaxApuestas();
	$editarApuesta -> idApuesta = $_POST["idApuesta"];
	$editarApuesta -> ajaxEditarApuesta();

}

/* 
*Actualizar el estado de la apuesta
*/
if(isset($_POST["idApuesta"])){

	$estadoApuesta = new AjaxApuestas();
	$estadoApuesta -> idApuesta = $_POST["idApuesta"];
	$estadoApuesta -> estadoApuesta = $_POST["estadoApuesta"];
	$estadoApuesta -> ajaxEstadoApuesta();

}