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

			   	$respuesta = ModeloMembresias::mdlEditarTipoMembresia($tabla,$datos);

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
	
	/*=============================================
	CREAR PRECIO DE MEMBRESIA
	=============================================*/

	static public function ctrCrearPrecioMembresia(){

		if(isset($_POST["nuevaDescripcionPrecio"])){
				
            $tabla="precio_membresia";
            $datos = array("nombre_precio_membresia"=>$_POST["nuevaDescripcionPrecio"],
                            "id_tipo_membresia"=>$_POST["nuevoTipoMembresia"],
							"precio"=>$_POST["nuevoPrecio"],
                            "id_usuario"=>$_SESSION["id"]);

            $respuesta = ModeloMembresias::mdlIngresarPrecioMembresia($tabla,$datos);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "El precio de membresia ha sido guardado correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "preciomembresias";

                                }
                            })

                </script>';

            }

			

		}

    }
    

	/*=============================================
	MOSTRAR PRECIO MEMBRESIAS
	=============================================*/

	static public function ctrMostrarPrecioMembresias($item,$valor){
		$tabla="precio_membresia";
		$respuesta = ModeloMembresias::mdlMostrarPrecioMembresias($tabla,$item,$valor);

		return $respuesta;

    }
    
	/*=============================================
	EDITAR PRECIO DE MEMBRESIA
	=============================================*/

	static public function ctrEditarPrecioMembresia(){

		if(isset($_POST["idPrecio"])){

			$tabla="precio_membresia";
			$datos = array("id"=>$_POST["idPrecio"],
							"nombre_precio_membresia"=>$_POST["editarDescripcionPrecio"],
							"id_tipo_membresia"=>$_POST["editarTipoMembresia"],
							"precio"=>$_POST["editarPrecio"],
							"id_usuario"=>$_SESSION["id"]);

			   	$respuesta = ModeloMembresias::mdlEditarPrecioMembresia($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El precio de membresia ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "preciomembresias";

									}
								})

					</script>';


			}
		}

    }
    
	/*=============================================
	ELIMINAR TIPO MEMBRESIA
	=============================================*/

	static public function ctrEliminarPrecioMembresia(){

		if(isset($_GET["idPrecioMembresia"])){

			$datos = $_GET["idPrecioMembresia"];
			$tabla="precio_membresia";
			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$precio=ControladorMembresias::ctrMostrarPrecioMembresias("id_precio_membresia",$datos);
			$usuario= $_SESSION["nombre"];
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se elimino un precio de membresia';
			$descripcion   = 'El usuario '.$usuario.' elimino el precio de membresia '.$precio["nombre_precio_membresia"];
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
			
			$respuesta = ModeloMembresias::mdlEliminarPrecioMembresia($tabla,$datos);
			if($respuesta == "ok"){
				
				
				echo'<script>

				swal({
					  type: "success",
					  title: "El precio de membresia ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "preciomembresias";

								}
							})

				</script>';

			}		

		}

	} 

	/*=============================================
	MOSTRAR PRECIO MEMBRESIAS
	=============================================*/

	static public function ctrSelecTipoMembresias($empresa){
		$tabla="tipo_membresia";
		$respuesta = ModeloMembresias::mdlSelecTipoMembresias($tabla,$empresa);

		return $respuesta;

    }

}
