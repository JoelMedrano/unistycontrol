<?php

class ControladorApuestas{

    /* 
    *Registrar apuestas
    */
    static public function ctrCrearApuesta(){

        if(isset($_POST["nuevaEmpresa"])){

            //var_dump($_POST["nuevaEmpresa"]);

            $datos = array( "id_empresa" => $_POST["nuevaEmpresa"],
                            "id_tipo_membresia" => $_POST["nuevoTipoMembresia"],
                            "tipo_apuesta" => $_POST["nuevoTipoApuesta"],
                            "fecha" => $_POST["nuevaFecha"],
                            "partido" => $_POST["nuevoPartido"],
                            "pronostico" => $_POST["nuevoPronostico"],
                            "cuota" => $_POST["nuevaCuota"],
                            "id_usuario" => $_SESSION["id"]);

            var_dump($datos);

            $respuesta = ModeloApuestas::mdlCrearApuesta($datos);

            //var_dump($respuesta);

            if($respuesta == "ok"){

                echo '<script>

                swal({

                    type: "success",
                    title: "¡La apuesta ha sido guardada correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "apuestas";

                    }

                });
            

                </script>';

            }

        }

    }

    /* 
    *Listar apuestas por empresa
    */
    static public function ctrListarApuestasEmpresa($empresa){

        $respuesta = ModeloApuestas::mdlListarApuestasEmpresa($empresa);

		return $respuesta;

    }

}