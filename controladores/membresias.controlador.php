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
	MOSTRAR TIPO MEMBRESIAS
	=============================================*/

	static public function ctrSelecTipoMembresias($empresa){
		$tabla="tipo_membresia";
		$respuesta = ModeloMembresias::mdlSelecTipoMembresias($tabla,$empresa);

		return $respuesta;

    }

	/*=============================================
	MOSTRAR PRECIO MEMBRESIAS
	=============================================*/

	static public function ctrSelecPrecioMembresias($empresa){
		$tabla="precio_membresia";
		$respuesta = ModeloMembresias::mdlSelecPrecioMembresias($tabla,$empresa);

		return $respuesta;

    }

	/*=============================================
	MOSTRAR  MEMBRESIAS
	=============================================*/

	static public function ctrSelecMembresias($empresa){
		$tabla="membresia";
		$respuesta = ModeloMembresias::mdlSelecMembresias($tabla,$empresa);

		return $respuesta;

    }


	/*=============================================
	CREAR PRECIO DE MEMBRESIA
	=============================================*/

	static public function ctrCrearMembresia(){

		if(isset($_POST["nuevoTipoMembresia"])){
				

			/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["nuevoComprobante"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevoComprobante"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/comprobantes/".$_POST["nuevoMiembro"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevoComprobante"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["nuevoMiembro"]."/".$aleatorio.".jpg";
	
						$origen = imagecreatefromjpeg($_FILES["nuevoComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagejpeg($destino, $ruta);
	
					}
	
					if($_FILES["nuevoComprobante"]["type"] == "image/png"){
	
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["nuevoMiembro"]."/".$aleatorio.".png";
	
						$origen = imagecreatefrompng($_FILES["nuevoComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagepng($destino, $ruta);
	
					}

				}

            $tabla="membresia";
            $datos = array("id_tipo_membresia"=>$_POST["nuevoTipoMembresia"],
							"fecha_inicio"=>$_POST["nuevaFechaInicio"],
							"fecha_fin"=>$_POST["nuevaFechaFin"],
							"comprobante"=>$ruta,
                            "id_usuario"=>$_SESSION["id"],
							"id_miembro"=>$_POST["nuevoMiembro"]);

            $respuesta = ModeloMembresias::mdlIngresarMembresia($tabla,$datos);

			$ultimoId= ModeloMembresias::mdlMostrarUltimoID();

			$asignado = ModeloMembresias::mdlAsignarMiembro($ultimoId);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "La membresia ha sido guardada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "membresias";

                                }
                            })

                </script>';

            }

			

		}

    }
    

	/*=============================================
	MOSTRAR PRECIO MEMBRESIAS
	=============================================*/

	static public function ctrMostrarMembresias($item,$valor){
		$tabla="membresia";
		$respuesta = ModeloMembresias::mdlMostrarMembresias($tabla,$item,$valor);

		return $respuesta;

    }
    
	/*=============================================
	EDITAR PRECIO DE MEMBRESIA
	=============================================*/

	static public function ctrEditarMembresia(){

		if(isset($_POST["idMembresia"])){

			/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActualComprobante"];

				if(isset($_FILES["editarComprobante"]["tmp_name"]) && !empty($_FILES["editarComprobante"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarComprobante"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/comprobantes/".$_POST["editarMiembro"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActualComprobante"])){

						unlink($_POST["fotoActualComprobante"]);

					}else{

						mkdir($directorio, 0755);

					}	

					

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarComprobante"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["editarMiembro"]."/".$aleatorio.".jpg";
	
						$origen = imagecreatefromjpeg($_FILES["editarComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagejpeg($destino, $ruta);
	
					}
	
					if($_FILES["editarComprobante"]["type"] == "image/png"){
	
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["editarMiembro"]."/".$aleatorio.".png";
	
						$origen = imagecreatefrompng($_FILES["editarComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagepng($destino, $ruta);
	
					}

				}

			$tabla="membresia";
			$datos = array("id"=>$_POST["idMembresia"],
							"id_tipo_membresia"=>$_POST["editarTipoMembresia"],
							"fecha_inicio"=>$_POST["editarFechaInicio"],
							"fecha_fin"=>$_POST["editarFechaFin"],
							"comprobante"=>$ruta,
							"id_usuario"=>$_SESSION["id"],
							"id_miembro"=>$_POST["editarMiembro"]);

			   	$respuesta = ModeloMembresias::mdlEditarMembresia($tabla,$datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La membresia ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "membresias";

									}
								})

					</script>';


			}
		}

    }
    
	/*=============================================
	ELIMINAR TIPO MEMBRESIA
	=============================================*/

	static public function ctrEliminarMembresia(){

		if(isset($_GET["idMembresia"])){

			$datos = $_GET["idMembresia"];
			$tabla="membresia";
			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$membresia=ControladorMembresias::ctrMostrarMembresias("id_membresia",$datos);
			$usuario= $_SESSION["nombre"];
			$para      = 'notificacionesvascorp@gmail.com';
			$asunto    = 'Se elimino una membresia';
			$descripcion   = 'El usuario '.$usuario.' elimino la membresia de '.$membresia["nombre_completo"];
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

			if($_GET["comprobante"] != ""){

				unlink($_GET["comprobante"]);
				rmdir('vistas/img/comprobantes/'.$membresia["id_miembro"]);

			}
			$respuesta = ModeloMembresias::mdlEliminarMembresia($tabla,$datos);
			if($respuesta == "ok"){
				
				
				echo'<script>

				swal({
					  type: "success",
					  title: "La membresia ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "membresias";

								}
							})

				</script>';

			}		

		}

	} 

	/*=============================================
	CREAR PRECIO DE MEMBRESIA
	=============================================*/

	static public function ctrRenovarMembresia(){

		if(isset($_POST["renovarTipoMembresia"])){
				

			/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["renovarComprobante"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["renovarComprobante"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/comprobantes/".$_POST["renovarMiembro"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["renovarComprobante"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["renovarMiembro"]."/".$aleatorio.".jpg";
	
						$origen = imagecreatefromjpeg($_FILES["renovarComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagejpeg($destino, $ruta);
	
					}
	
					if($_FILES["renovarComprobante"]["type"] == "image/png"){
	
						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/
	
						$aleatorio = mt_rand(100,999);
	
						$ruta = "vistas/img/comprobantes/".$_POST["renovarMiembro"]."/".$aleatorio.".png";
	
						$origen = imagecreatefrompng($_FILES["renovarComprobante"]["tmp_name"]);
	
						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
	
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
	
						imagepng($destino, $ruta);
	
					}

				}

            $tabla="membresia";
            $datos = array("id_tipo_membresia"=>$_POST["renovarTipoMembresia"],
							"fecha_inicio"=>$_POST["renovarFechaInicio"],
							"fecha_fin"=>$_POST["renovarFechaFin"],
							"comprobante"=>$ruta,
                            "id_usuario"=>$_SESSION["id"],
							"id_miembro"=>$_POST["renovarMiembro"],
							"estado"=>'1');

            $respuesta = ModeloMembresias::mdlRenovarMembresia($tabla,$datos);

			$ultimoId= ModeloMembresias::mdlMostrarUltimoID();

			$datosAsignar = array("destino"=>$ultimoId["id_membresia"],
							"id_membresia"=>$_POST["idMembresia2"]);

			$asignado = ModeloMembresias::mdlAsignarDestino($datosAsignar);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                        type: "success",
                        title: "La membresia ha sido renovada correctamente",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                        }).then(function(result){
                                if (result.value) {

                                window.location = "membresias";

                                }
                            })

                </script>';

            }

			

		}

    }

}
