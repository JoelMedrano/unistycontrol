<?php
session_start();
require_once "../controladores/empresas.controlador.php";
require_once "../modelos/empresas.modelo.php";
require_once '../modelos/usuarios.modelo.php';

class AjaxEmpresas{

	/*=============================================
	EDITAR EMPRESA
	=============================================*/	

	public $idEmpresa;

	public function ajaxEditarEmpresa(){

		$item = "id_empresa";
		$valor = $this->idEmpresa;

		$respuesta = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);

		echo json_encode($respuesta);

	}

	public $activarId;
	public $activarEstado;

	public function ajaxActivarDesactivarEmpresa(){

		$valor1=$this->activarEstado;
		date_default_timezone_set('America/Lima');
		$fecha = new DateTime();
		$valor2=$this->activarId;
		$empresa=ControladorEmpresas::ctrMostrarEmpresas("id_empresa",$valor2);
		$usuario= $_SESSION["nombre"];
		if($valor1 == "1"){
			
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se activo una empresa';
			$descripcion   = 'El usuario '.$usuario.' activo la empresa '.$empresa["documento"].' - '.$empresa["nombre"];
			$de = 'From: notificacionesvascorp@gmail.com';
			if($_SESSION["correo"] == 1){
				mail($para, $asunto, $descripcion, $de);
			  }
			if($_SESSION["datos"] == 1){
				$datos2= array( "usuario" => $usuario,
						"concepto" => $descripcion,
						"fecha" => $fecha->format("Y-m-d H:i:s"));
				$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
			}	
		}else{
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se desactivo una empresa';
			$descripcion   = 'El usuario '.$usuario.' desactivo la empresa '.$empresa["documento"].' - '.$empresa["nombre"];
			$de = 'From: notificacionesvascorp@gmail.com';
			if($_SESSION["correo"] == 1){
				mail($para, $asunto, $descripcion, $de);
			}
			if($_SESSION["datos"] == 1){
			$datos2= array( "usuario" => $usuario,
					"concepto" => $descripcion,
					"fecha" => $fecha->format("Y-m-d H:i:s"));
			$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
			}
		}
		$respuesta=ModeloEmpresas::mdlActualizarEmpresa($valor1, $valor2);

		echo $respuesta;
	}

}

/*=============================================
EDITAR EMPRESA
=============================================*/
if(isset($_POST["idEmpresa"])){

	$editarEmpresa = new AjaxEmpresas();
	$editarEmpresa -> idEmpresa = $_POST["idEmpresa"];
	$editarEmpresa -> ajaxEditarEmpresa();

}

/*=============================================
ACTIVAR Y DESACTIVAR EMPRESA
=============================================*/
if(isset($_POST["activarId"])){
	$activar=new AjaxEmpresas();
	$activar->activarId=$_POST["activarId"];
	$activar->activarEstado=$_POST["estadoEmpresa"];
	$activar->ajaxActivarDesactivarEmpresa();
}
