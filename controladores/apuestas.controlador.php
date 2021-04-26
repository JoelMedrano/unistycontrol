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
                            "monto" => $_POST["nuevoMonto"],
                            "id_usuario" => $_SESSION["id"]);

            //var_dump($datos);

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

    /* 
    *MOSTRAR APUESTAS
    */
    static public function ctrMostrarApuestas($item, $valor){

        $respuesta = ModeloApuestas::mdlMostrarApuestas($item, $valor);

		return $respuesta;

    }

   /* 
    *Editar apuesta
    */
    static public function ctrEditarApuesta(){

        if(isset($_POST["idApuesta"])){

            //var_dump($_POST["idApuesta"]);
            
            $datos = array( "id_apuestas" => $_POST["idApuesta"],
                            "id_empresa" => $_POST["editarEmpresa"],
                            "id_tipo_membresia" => $_POST["editarTipoMembresia"],
                            "tipo_apuesta" => $_POST["editarTipoApuesta"],
                            "fecha" => $_POST["editarFecha"],
                            "partido" => $_POST["editarPartido"],
                            "pronostico" => $_POST["editarPronostico"],
                            "cuota" => $_POST["editarCuota"],
                            "monto" => $_POST["editarMonto"]);

            //var_dump($datos);

            $respuesta = ModeloApuestas::mdlEditarApuesta($datos);
            //var_dump($respuesta);

            if($respuesta == "ok"){

                echo'<script>

                swal({
                      type: "success",
                      title: "La apuesta ha sido editada correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                                if (result.value) {

                                window.location = "apuestas";

                                }
                            })

                </script>';

            }            

        }   
        
    }

    /* 
    *Eliminar apuesta
    */
    static public function ctrBorrarApuesta(){

		if(isset($_GET["idApuesta"])){

            $datos = $_GET["idApuesta"];
            var_dump($datos);

			$respuesta = ModeloApuestas::mdlBorrarApuesta($datos);
            var_dump($respuesta);

	

		}

	}    

}