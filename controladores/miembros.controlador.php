<?php
class ControladorMiembros{

    /* 
    Registrar miembros
    */
    static public function ctrCrearMiembro(){

        if(isset($_POST["nuevoDocumento"])){

            /*=============================================
            VALIDAR IMAGEN
            =============================================*/

            $ruta = "";

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
                            "email" => $_POST["nuevoEmail"],
                            "foto" => $_POST["nuevaFotoMiembro"]);

        }
    }

}