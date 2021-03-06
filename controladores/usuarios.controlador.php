<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["mantener_sesion_abierta"])){

			if(isset($_POST["ingUsuario"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				//var_dump($respuesta);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["password"] = $encriptar;
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["empresa"] = $respuesta["id_empresa"];
						$_SESSION["miembro"] = $respuesta["id_miembro"];
						$_SESSION["datos"] = $respuesta["datos"];
						$_SESSION["correo"] = $respuesta["correo"];

						if (isset($_POST["mantener_sesion_abierta"])) {

							$_SESSION["mantenerSesion"] = "ok";
							
						}				

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Lima');
						
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							var_dump("entra la ptm");

							if($_SESSION["empresa"] == "1"){
								echo '<script>

								window.location = "perfil-usuario";

								</script>';
							}else{
								echo '<script>

								window.location = "inicio";

								</script>';
							}

						}

					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';						
					}

				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}	

			}	


		}else{

			if(isset($_POST["ingUsuario"])){

				$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "usuario";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
				//var_dump($respuesta);

				if($respuesta["usuario"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					if($respuesta["estado"] == 1){

						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["password"] = $encriptar;
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["empresa"] = $respuesta["id_empresa"];
						$_SESSION["miembro"] = $respuesta["id_miembro"];
						$_SESSION["datos"] = $respuesta["datos"];
						$_SESSION["correo"] = $respuesta["correo"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Lima');
						
						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							if($_SESSION["empresa"] == "1"){
								echo '<script>

								window.location = "perfil-usuario";

								</script>';
							}else{
								echo '<script>

								window.location = "inicio";

								</script>';
							}

						}

					}else{

						echo '<br>
							<div class="alert alert-danger">El usuario aún no está activado</div>';						

					}



				}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}
			}			

		}		


	}

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario(){

		if(isset($_POST["nuevoUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){

			   	/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = "";

				if(isset($_FILES["nuevaFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["nuevoUsuario"];

					mkdir($directorio, 0755);

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["nuevaFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["nuevaFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuarios";

				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datos = array("nombre" => $_POST["nuevoNombre"],
					           "usuario" => $_POST["nuevoUsuario"],
					           "password" => $encriptar,
					           "perfil" => $_POST["nuevoPerfil"],
					           "foto"=>$ruta,
							   "email" => $_POST["nuevoEmail"],
							   "telefono" => $_POST["nuevoCelular"]);

				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				$ultimoID=ModeloUsuarios::mdlMostrarUltimoID($tabla);
				$permisosCHK=$_POST["permiso"];
				
				
				for ($i=0; $i <count($permisosCHK) ; $i++) { 
					$tabla2="usuario_permiso";
					$datos2=array("id_usuario"=>$ultimoID["id"],
								   "id_permiso"=>$permisosCHK[$i]);
					$usuario_permiso=ModeloUsuarios::mdlIngresarPermiso($tabla2,$datos2);
				}
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El usuario ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El usuario no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR PERMISOS
	=============================================*/

	static public function ctrMostrarPermisos($item, $valor){

		$tabla = "permisos";

		$respuesta = ModeloUsuarios::MdlMostrarPermisos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR PERMISOS
	=============================================*/

	static public function ctrMostrarUsuariosPermisos($item, $valor){

		$tabla = "usuario_permiso";

		$respuesta = ModeloUsuarios::MdlMostrarUsuariosPermisos($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	MOSTRAR EMAIL POR PERFIL Y EMPRESA
	=============================================*/

	static public function ctrMostrarEmail($valor){


		$respuesta = ModeloUsuarios::MdlMostrarEmail($valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				$ruta = $_POST["fotoActual"];

				if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_FILES["editarFoto"]["tmp_name"])){

					list($ancho, $alto) = getimagesize($_FILES["editarFoto"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
					=============================================*/

					$directorio = "vistas/img/usuarios/".$_POST["editarUsuario"];

					/*=============================================
					PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
					=============================================*/

					if(!empty($_POST["fotoActual"])){

						unlink($_POST["fotoActual"]);

					}else{

						mkdir($directorio, 0755);

					}	

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/

					if($_FILES["editarFoto"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";

						$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $ruta);

					}

					if($_FILES["editarFoto"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$aleatorio = mt_rand(100,999);

						$ruta = "vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";

						$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $ruta);

					}

				}

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array("nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "foto" => $ruta,
							   "email" => $_POST["editarEmail"],
							   "telefono" => $_POST["editarCelular"]);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);

				$permisosCHK=$_POST["permisos"];
				$tabla2="usuario_permiso";
				$datosBorrar = $_POST["idUsuario"];
				$borrado=ModeloUsuarios::mdlBorrarUsuarioPermiso($tabla2, $datosBorrar);
				
				for ($i=0; $i <count($permisosCHK) ; $i++) { 
					
					$datos2=array("id_usuario"=>$_POST["idUsuario"],
								   "id_permiso"=>$permisosCHK[$i]);
					$usuario_permiso=ModeloUsuarios::mdlIngresarPermiso($tabla2,$datos2);
				}

				date_default_timezone_set('America/Lima');
				$fecha = new DateTime();
				$user=ControladorUsuarios::ctrMostrarUsuarios("id",$_POST["idUsuario"]);
				$usuario= $_SESSION["nombre"];
				$descripcion   = 'El usuario '.$usuario.' edito al usuario '.$user["nombre"];
				
				if($_SESSION["datos"] == 1){
					$datos2= array( "usuario" => $usuario,
									"concepto" => $descripcion,
									"fecha" => $fecha->format("Y-m-d H:i:s"));
					$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
				}



				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);
			$tabla2="usuario_permiso";
			$borrado=ModeloUsuarios::mdlBorrarUsuarioPermiso($tabla2, $datos);

			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$user=ControladorUsuarios::ctrMostrarUsuarios("id",$datos);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' elimino al usuario '.$user["nombre"];
			
			if($_SESSION["datos"] == 1){
				$datos2= array( "usuario" => $usuario,
								"concepto" => $descripcion,
								"fecha" => $fecha->format("Y-m-d H:i:s"));
				$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
			}

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}

	/*=============================================
	ACTUALIZAR CORREO DE  USUARIO
	=============================================*/

	static public function ctrActualizarCorreo(){

		if(isset($_POST["idUsuarioCorreo"]) ){

			$tabla ="usuarios";
			$item3 = "id";
			$valor3 = $_POST["idUsuarioCorreo"];
			$item2 = "correo";
			$item1 = "datos";
			if(empty($_POST["nuevoCorreo"])){
				$valor2="0";
			}else{
				$valor2=$_POST["nuevoCorreo"];
			}
			if(empty($_POST["nuevoDatos"])){
				$valor1="0";
			}else{
				$valor1=$_POST["nuevoDatos"];
			}
			// var_dump($valor3);
			$respuesta = ModeloUsuarios::mdlActualizarCorreo($tabla, $item1, $valor1, $item2, $valor2, $item3, $valor3);

			date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$user=ControladorUsuarios::ctrMostrarUsuarios("id",$_POST["idUsuarioCorreo"]);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' actualizo el guardado de auditoria de '.$user["nombre"];
			
			if($_SESSION["datos"] == 1){
				$datos2= array( "usuario" => $usuario,
								"concepto" => $descripcion,
								"fecha" => $fecha->format("Y-m-d H:i:s"));
				$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
			}

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido actualizado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}

	}


}
	


