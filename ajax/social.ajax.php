<?php
session_start();
require_once "../controladores/social.controlador.php";
require_once "../modelos/social.modelo.php";

class AjaxSocial{

	/*=============================================
	EDITAR RED SOCIAL
	=============================================*/	

	public $idSocial;

	public function ajaxEditarSocial(){

		$item = "id_red_social";
		$valor = $this->idSocial;

		$respuesta = ControladorSocial::ctrMostrarSocial($item, $valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
EDITAR RED SOCIAL
=============================================*/
if(isset($_POST["idSocial"])){

	$editarSocial = new AjaxSocial();
	$editarSocial -> idSocial = $_POST["idSocial"];
	$editarSocial -> ajaxEditarSocial();

}
