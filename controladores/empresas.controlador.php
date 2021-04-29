<?php

class ControladorEmpresas{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function ctrCrearEmpresa(){

		if(isset($_POST["nuevaRazonSocial"])){
				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";
				$ruta2="";

				if(isset($_FILES["nuevoLogo1"]["tmp_name"]) ){

					list($ancho, $alto) = getimagesize($_FILES["nuevoLogo1"]["tmp_name"]);
					list($ancho2, $alto2) = getimagesize($_FILES["nuevoLogo2"]["tmp_name"]);

					$nuevoAncho = 172;
					$nuevoAlto = 172;

					$nuevoAncho2 = 480;
					$nuevoAlto2 = 120;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DE LA EMPRESA
					=============================================*/

					$directorio = "vistas/img/empresas/".$_POST["nuevoDocumento"];
					
					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevoLogo1"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empresas/".$_POST["nuevoDocumento"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevoLogo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

						$aleatorio2 = mt_rand(100,999);

						$ruta2 = "vistas/img/empresas/".$_POST["nuevoDocumento"]."/".$aleatorio2.".jpg";

						$origen2 = imagecreatefromjpeg($_FILES["nuevoLogo2"]["tmp_name"]);						

						$destino2 = imagecreatetruecolor($nuevoAncho2, $nuevoAlto2);

						imagecopyresized($destino, $origen2, 0, 0, 0, 0, $nuevoAncho2, $nuevoAlto2, $ancho2, $alto2);

						imagejpeg($destino2, $ruta2);
					}

					if($_FILES["nuevoLogo1"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/empresas/".$_POST["nuevoDocumento"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevoLogo1"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						//poner fondo transparente

						imagealphablending($destino, false);

						imagesavealpha($destino,true);

						$transparent = imagecolorallocatealpha($destino, 255, 255, 255, 127);

						imagefilledrectangle($destino, 0, 0, $nuevoAncho, $nuevoAlto, $transparent);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

						$aleatorio2 = mt_rand(100,999);

						$ruta2 = "vistas/img/empresas/".$_POST["nuevoDocumento"]."/".$aleatorio2.".png";

						$origen2 = imagecreatefrompng($_FILES["nuevoLogo2"]["tmp_name"]);	

						$destino2 = imagecreatetruecolor($nuevoAncho2, $nuevoAlto2);
						
						//poner fondo transparente

						imagealphablending($destino2, false);

						imagesavealpha($destino2,true);

						$transparent2 = imagecolorallocatealpha($destino2, 255, 255, 255, 127);

						imagefilledrectangle($destino, 0, 0, $nuevoAncho2, $nuevoAlto2, $transparent2);

						imagecopyresized($destino2, $origen2, 0, 0, 0, 0, $nuevoAncho2, $nuevoAlto2, $ancho2, $alto2);

						imagepng($destino2, $ruta2);

					}

				}

				$tabla="empresa";
			   	$datos = array("nombre"=>$_POST["nuevaRazonSocial"],
							   "documento"=>$_POST["nuevoDocumento"],
							   "logo1"=>$ruta,
							   "logo2"=>$ruta2,
							   "id_responsable"=>$_POST["nuevoResponsable"],
							   "id_usuario"=>$_SESSION["id"]);

			   	$respuesta = ModeloEmpresas::mdlIngresarEmpresa($tabla,$datos);
				
				$ultimoID = ModeloEmpresas::mdlMostrarUltimoID();

				$actualizar = ModeloUsuarios::mdlActualizarUsuario("usuarios","id_empresa",$ultimoID["id_empresa"],"id",$_POST["nuevoResponsable"]);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido guardado correctamente",
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

		if(isset($_POST["idEmpresa"])){

			$tabla="empresa";
			$datos = array("id"=>$_POST["idEmpresa"],
						"nombre"=>$_POST["editarRazonSocial"],
						"documento"=>$_POST["editarDocumento"],
						"id_responsable"=>$_POST["editarResponsable"],
						"id_usuario"=>$_SESSION["id"]);

			   	$respuesta = ModeloEmpresas::mdlEditarEmpresa($tabla,$datos);


				$actualizar = ModeloUsuarios::mdlActualizarUsuario("usuarios","id_empresa",$_POST["idEmpresa"],"id",$_POST["editarResponsable"]);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La empresa ha sido cambiado correctamente",
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

			if($_GET["logo1"] != ""){

				unlink($_GET["logo1"]);
				unlink($_GET["logo2"]);
				rmdir('vistas/img/empresas/'.$empresas["documento"]);

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
