<?php

class ControladorMiembros{

    /* 
    *Registrar miembros
    */
    static public function ctrCrearMiembro(){

        if(isset($_POST["nuevoDocumento"])){

            var_dump($_SESSION["empresa"]);

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
    * listar miembros por empresa
    */
    static public function ctrListarMiembroEmpresa($empresa){

        $respuesta = ModeloMiembros::mdlListarMiembroEmpresa($empresa);

		return $respuesta;

    }

}