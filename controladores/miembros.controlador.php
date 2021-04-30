<?php

class ControladorMiembros{

    /* 
    *Registrar miembros
    */
    static public function ctrCrearMiembro(){

        if(isset($_POST["nuevoDocumento"])){

            // var_dump($_SESSION["empresa"]);

            /*=============================================
            VALIDAR IMAGEN
            =============================================*/

            $ruta = "vistas/img/miembros/default/anonymous.png";

            if(isset($_FILES["nuevaFotoMiembro"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["nuevaFotoMiembro"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
                CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                =============================================*/

                $directorio = "vistas/img/miembros/".$_POST["nuevoDocumento"];

                mkdir($directorio, 0755);

                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/

                if($_FILES["nuevaFotoMiembro"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/miembros/".$_POST["nuevoDocumento"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevaFotoMiembro"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["nuevaFotoMiembro"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/miembros/".$_POST["nuevoDocumento"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevaFotoMiembro"]["tmp_name"]);

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

            }

            $_POST["nuevoNombre"]=ucwords(mb_strtolower($_POST["nuevoNombre"]));

            $datos = array( "nombre_completo" => $_POST["nuevoNombre"],
                            "documento" => $_POST["nuevoDocumento"],
                            "celular" => $_POST["nuevoCelular"],
                            "correo" => $_POST["nuevoEmail"],
                            "foto" => $ruta,
                            "id_red_social" => $_POST["nuevaRedSocial"],
                            "usuario_red_social" => $_POST["nuevoPerfil"],
                            "id_empresa" => $_POST["empresa"],
                            "id_usuario" => $_SESSION["id"]);

            //var_dump($datos);
            $respuesta = ModeloMiembros::mdlCrearMiembros($datos);

            //var_dump($respuesta);

            if($respuesta == "ok"){

                echo '<script>

                swal({

                    type: "success",
                    title: "¡El miembro ha sido guardado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "miembros";

                    }

                });
            

                </script>';

            }

        }
    }

    /* 
    *Mostrar Miembros
    */
    static public function ctrMostrarMiembros($item, $valor){

        $respuesta = ModeloMiembros::mdlMostrarMiembros($item,$valor);

        return $respuesta;

    }


    /* 
    *Listar miembros por empresa
    */
    static public function ctrListarMiembroEmpresa($empresa){

        $respuesta = ModeloMiembros::mdlListarMiembroEmpresa($empresa);

		return $respuesta;

    }

    /* 
    *Listar Miemros pendientes con estado activo por empresa
    */
    static public function ctrListarMiembroPendiente($empresa){

        $respuesta = ModeloMiembros::mdlListarMiembroPendiente($empresa);

		return $respuesta;

    }

    /* 
    *Actualizar Miembros 2
    */
    static public function ctrActualizarMiembro2($item1,$valor1,$item2,$valor2){

        $respuesta = ModeloMiembros::mdlActualizarMiembro2($item1,$valor1,$item2,$valor2);

		return $respuesta;

    }

    /* 
    *Editar miembro
    */
    static public function ctrEditarMiembro(){

        if(isset($_POST["idMiembro"])){

            /*=============================================
            VALIDAR IMAGEN
            =============================================*/

            $ruta = $_POST["fotoMiembroActual"];

            if(isset($_FILES["editarFotoMiembro"]["tmp_name"]) && !empty($_FILES["editarFotoMiembro"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["editarFotoMiembro"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
                CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                =============================================*/

                $directorio = "vistas/img/miembros/".$_POST["editarDocumento"];

                /*=============================================
                PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
                =============================================*/

                if(!empty($_POST["fotoMiembroActual"])){

                    unlink($_POST["fotoMiembroActual"]);

                }else{

                    mkdir($directorio, 0755);

                }	

                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/

                if($_FILES["editarFotoMiembro"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/miembros/".$_POST["editarDocumento"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["editarFotoMiembro"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["editarFotoMiembro"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/miembros/".$_POST["editarDocumento"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["editarFotoMiembro"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

            }

            $_POST["editarNombre"]=ucwords(mb_strtolower($_POST["editarNombre"]));

            $datos = array( "id_miembro" => $_POST["idMiembro"],
                            "nombre_completo" => $_POST["editarNombre"],
                            "documento" => $_POST["editarDocumento"],
                            "celular" => $_POST["editarCelular"],
                            "correo" => $_POST["editarEmail"],
                            "foto" => $ruta,
                            "id_red_social" => $_POST["editarRedSocial"],
                            "usuario_red_social" => $_POST["editarPerfil"],
                            "id_empresa" => $_POST["editarEmpresa"],
                            "id_usuario" => $_SESSION["id"]);

            //var_dump($datos);

            $respuesta = ModeloMiembros::mdlEditarMiembro($datos);

            date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$miembro=ControladorMiembros::ctrMostrarMiembros("id_miembro",$_POST["idMiembro"]);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' edito al miembro '.$miembro["nombre_completo"];
			if($_SESSION["datos"] == 1){
				$datos2= array( "usuario" => $usuario,
								"concepto" => $descripcion,
								"fecha" => $fecha->format("Y-m-d H:i:s"));
				$auditoria=ModeloUsuarios::mdlIngresarAuditoria("auditoria",$datos2);
			}
	   
            //var_dump($respuesta);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "El miembro ha sido editado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "miembros";

                                }
                            })

                </script>';

            }

        }

    }

    /* 
    *Eliminar miembro
    */
    static public function ctrBorrarMiembro(){

		if(isset($_GET["idMiembro"])){

            $datos = $_GET["idMiembro"];

			if($_GET["fotoMiembro"] != ""){

				unlink($_GET["fotoMiembro"]);
				rmdir('vistas/img/miembros/'.$_GET["documento"]);

			}

			$respuesta = ModeloMiembros::mdlBorrarMiembro($tabla, $datos);

            date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$miembro=ControladorMiembros::ctrMostrarMiembros("id_miembro",$datos);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' elimino al miembro '.$miembro["nombre_completo"];
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
					  title: "El miembro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "miembros";

								}
							})

				</script>';

			}		

		}

	}


}