<?php

class ControladorEmpresas{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function ctrCrearEmpresa(){

		if(isset($_POST["nuevaDescripcion"])){

				$tabla="maestrajf";
			   	$datos = array("codigo"=>$_POST["nuevoCodigo"],
							   "descripcion"=>$_POST["nuevaDescripcion"],
							   "tipo_dato"=>"TBAN",);

			   	$respuesta = ModeloBancos::mdlIngresarBanco($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El banco ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "empresas";

									}
								})

					</script>';

				}

			

		}

    }
    

	/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function ctrMostrarEmpresas($item,$valor){
		$tabla="empresa";
		$respuesta = ModeloEmpresas::mdlMostrarEmpresas($tabla,$item,$valor);

		return $respuesta;

    }
    
	/*=============================================
	EDITAR EMPRESA
	=============================================*/

	static public function ctrEditarEmpresa(){

		if(isset($_POST["editarDescripcion"])){

				$tabla="empresa";
				   $datos = array("id"=>$_POST["idBanco"],
				   				"codigo"=> $_POST["editarCodigo"],
                               "descripcion"=>$_POST["editarDescripcion"]);

			   	$respuesta = ModeloEmpresas::mdlEditarEmpresa($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El banco ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "bancos";

									}
								})

					</script>';


			}
		}

    }
    
	/*=============================================
	ELIMINAR EMPRESAS
	=============================================*/

	static public function ctrEliminarEmpresa(){

		if(isset($_GET["idEmpresa"])){

			$datos = $_GET["idEmpresa"];
			$tabla="maestrajf";
			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$bancos=ControladorBancos::ctrMostrarBancos("id",$datos);
			$usuario= $_SESSION["nombre"];
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se elimino un banco';
			$descripcion   = 'El usuario '.$usuario.' elimino el banco '.$bancos["codigo"].' - '.$bancos["descripcion"];
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
			
			$respuesta = ModeloBancos::mdlEliminarBanco($tabla,$datos);
			if($respuesta == "ok"){
				
				
				echo'<script>

				swal({
					  type: "success",
					  title: "El banco ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "bancos";

								}
							})

				</script>';

			}		

		}

	}    

}
