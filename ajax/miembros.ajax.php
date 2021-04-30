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

		$item3 = "id_usuario_activador";
		$valor3 = $this->idActivador;

		$respuesta = ModeloMiembros::mdlActualizarMiembro($item1, $valor1, $item2, $valor2, $item3, $valor3);

	}

	/* 
    *Listar miembros con membresia pendiente y estado activo
    */
	public function ajaxListarMiembro(){


		$respuesta = ControladorMiembros::ctrListarMiembroPendiente($_SESSION["empresa"]);

		echo json_encode($respuesta);

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
	$activarMiembro -> idActivador = $_POST["idActivador"];
	$activarMiembro -> ajaxActivarMiembro();

}


/* 
*Listar Miembros
*/
if(isset($_POST["listarMiembros"])){

	$listaMiembros = new AjaxMiembros();
	$listaMiembros -> listarMiembros = $_POST["listarMiembros"];
	$listaMiembros -> ajaxListarMiembro();

}