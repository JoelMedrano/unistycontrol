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


}
/* 
*Editar Miembro
*/
if(isset($_POST["idMiembro"])){

	$editarEmpresa = new AjaxMiembros();
	$editarEmpresa -> idMiembro = $_POST["idMiembro"];
	$editarEmpresa -> ajaxEditarMiembro();

}