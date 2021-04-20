<?php

class ControladorSocial{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function ctrCrearSocial(){

		if(isset($_POST["nuevaRazonSocial"])){
				
            $tabla="red_social";
            $datos = array("nombre_red_social"=>$_POST["nuevaRedSocial"],
                            "id_usuario"=>$_SESSION["id"]);

            $respuesta = ModeloSocial::mdlIngresarSocial($tabla,$datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "La red social ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "social";

                                }
                            })

                </script>';

            }

			

		}

    }
    

	/*=============================================
	MOSTRAR EMPRESAS
	=============================================*/

	static public function ctrMostrarSocial($item,$valor){
		$tabla="red_social";
		$respuesta = ModeloSocial::mdlMostrarSocial($tabla,$item,$valor);

		return $respuesta;

    }
    
	/*=============================================
	EDITAR RED SOCIAL
	=============================================*/

	static public function ctrEditarSocial(){

		if(isset($_POST["idRedSocial"])){

			$tabla="red_social";
			$datos = array("id"=>$_POST["idRedSocial"],
						"nombre_red_social"=>$_POST["editarRedSocial"],
						"id_usuario"=>$_SESSION["id"]);

			   	$respuesta = ModeloSocial::mdlEditarSocial($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La red social ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "social";

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
			$tabla="empresa";
			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$empresas=ControladorEmpresas::ctrMostrarEmpresas("id_empresa",$datos);
			$usuario= $_SESSION["nombre"];
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se elimino una empresa';
			$descripcion   = 'El usuario '.$usuario.' elimino la empresa '.$empresas["documento"].' - '.$empresas["nombre"];
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
			
			$respuesta = ModeloEmpresas::mdlEliminarEmpresa($tabla,$datos);
			if($respuesta == "ok"){
				
				
				echo'<script>

				swal({
					  type: "success",
					  title: "La empresa ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "empresas";

								}
							})

				</script>';

			}		

		}

	}    

}
