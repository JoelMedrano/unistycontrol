<?php

class ControladorApuestas{

    /* 
    *Registrar apuestas
    */
    static public function ctrCrearApuesta(){

        if(isset($_POST["nuevaEmpresa"])){

            //var_dump($_POST["nuevaEmpresa"]);

            $_POST["nuevoPartido"]=ucwords(mb_strtolower($_POST["nuevoPartido"]));
            $_POST["nuevoPronostico"]=ucwords(mb_strtolower($_POST["nuevoPronostico"]));

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
    *Listar apuestas por empresa
    */
    static public function ctrListarApuestasEmpresaPerfil($empresa){

        $respuesta = ModeloApuestas::mdlListarApuestasEmpresaPerfil($empresa);

		return $respuesta;

    }    

    /* 
    *Listar apuestas por empresa usuario
    */
    static public function ctrListarApuestasEmpresaUsuario($empresa,$usuario){

        $respuesta = ModeloApuestas::mdlListarApuestasEmpresaUsuario($empresa,$usuario);

		return $respuesta;

    }


    /* 
    *MOSTRAR APUESTAS
    */
    static public function ctrMostrarApuestas($item, $valor){

        $respuesta = ModeloApuestas::mdlMostrarApuestas($item, $valor);

		return $respuesta;

    }

    static public function ctrRangoFechasApuestasPlayer($fechaInicial,$fechaFinal,$empresa,$usuario){
        $tabla="apuestas";

        $respuesta = ModeloApuestas::mdlRangoFechasApuestasPlayer($tabla, $fechaInicial,$fechaFinal,$empresa,$usuario);

		return $respuesta;

    }

    static public function ctrRangoFechasApuestas($fechaInicial,$fechaFinal,$empresa){
        $tabla="apuestas";

        $respuesta = ModeloApuestas::mdlRangoFechasApuestas($tabla, $fechaInicial,$fechaFinal,$empresa);

		return $respuesta;

    }



   /* 
    *Editar apuesta
    */
    static public function ctrEditarApuesta(){

        if(isset($_POST["idApuesta"])){

            //var_dump($_POST["idApuesta"]);
            
            $_POST["editarPartido"]=ucwords(mb_strtolower($_POST["editarPartido"]));
            $_POST["editarPronostico"]=ucwords(mb_strtolower($_POST["editarPronostico"]));

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

            date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$apuesta=ControladorApuestas::ctrMostrarApuestas("id_apuestas",$_POST["idApuesta"]);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' edito la apuesta del partido '.$apuesta["partido"];
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
            // var_dump($datos);

			$respuesta = ModeloApuestas::mdlBorrarApuesta($datos);
            // var_dump($respuesta);
            date_default_timezone_set('America/Lima');
			$fecha = new DateTime();
			$apuesta=ControladorApuestas::ctrMostrarApuestas("id_apuestas",$datos);
			$usuario= $_SESSION["nombre"];
			$descripcion   = 'El usuario '.$usuario.' elimino la apuesta del partido '.$apuesta["partido"];
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
                      title: "La apuesta ha sido eliminada correctamente",
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

}