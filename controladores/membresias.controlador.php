<?php

class ControladorMembresias{

	/*=============================================
	CREAR TIPO DE MEMBRESIA
	=============================================*/

	static public function ctrCrearTipoMembresia(){

		if(isset($_POST["nuevoTipo"])){
				
            $tabla="tipo_membresia";
            $datos = array("nombre_membresia"=>$_POST["nuevoTipo"],
                            "id_empresa"=>$_POST["nuevaEmpresa"],
                            "id_usuario"=>$_SESSION["id"]);

            $respuesta = ModeloMembresias::mdlIngresarTipoMembresia($tabla,$datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "El tipo de membresia ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "tipomembresias";

                                }
                            })

                </script>';

            }

			

		}

    }
    

	/*=============================================
	MOSTRAR TIPO MEMBRESIAS
	=============================================*/

	static public function ctrMostrarTipoMembresias($item,$valor){
		$tabla="tipo_membresia";
		$respuesta = ModeloMembresias::mdlMostrarTipoMembresias($tabla,$item,$valor);

		return $respuesta;

    }
    
	/*=============================================
	EDITAR TIPO DE MEMBRESIA
	=============================================*/

	static public function ctrEditarTipoMembresia(){

		if(isset($_POST["idTipo"])){

			$tabla="tipo_membresia";
			$datos = array("id"=>$_POST["idTipo"],
						"nombre_membresia"=>$_POST["editarTipo"],
                        "id_empresa"=>$_POST["editarEmpresa"],
						"id_usuario"=>$_SESSION["id"]);

			   	$respuesta = ModeloMembresia::mdlEditarTipoMembresia($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El tipo de membresia ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "tipomembresias";

									}
								})

					</script>';


			}
		}

    }
    
	/*=============================================
	ELIMINAR TIPO MEMBRESIA
	=============================================*/

	static public function ctrEliminarTipoMembresia(){

		if(isset($_GET["idTipoMembresia"])){

			$datos = $_GET["idTipoMembresia"];
			$tabla="tipo_membresia";
			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$tipo=ControladorMembresias::ctrMostrarTipoMembresias("id_tipo_membresia",$datos);
			$usuario= $_SESSION["nombre"];
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se elimino una tipo de membresia';
			$descripcion   = 'El usuario '.$usuario.' elimino el tipo de membresia '.$tipo["nombre_membresia"];
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
			
			$respuesta = ModeloMembresias::mdlEliminarTipoMembresia($tabla,$datos);
			if($respuesta == "ok"){
				
				
				echo'<script>

				swal({
					  type: "success",
					  title: "El tipo de membresia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "tipomembresias";

								}
							})

				</script>';

			}		

		}

	}    

}
