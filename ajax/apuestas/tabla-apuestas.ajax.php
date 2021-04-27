<?php

session_start();

require_once "../../controladores/apuestas.controlador.php";
require_once "../../modelos/apuestas.modelo.php";

class TablaApuestas{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaApuestas(){

        $empresa = $_SESSION["empresa"];
        $apuestas = ControladorApuestas::ctrListarApuestasEmpresa($empresa);

        if(count($apuestas)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($apuestas); $i++){  

            /* 
            *estado
            */
            if($apuestas[$i]["estado"] == 0){

                $estado = "<button class='btn btn-info btn-xs ".'I'.$apuestas[$i]["id_apuestas"]."' id=".'I'.$apuestas[$i]["id_apuestas"]." name=".'I'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."'>Pendiente</button>";
    
            }else if($apuestas[$i]["estado"] == 1){
    
                $estado = "<button class='btn btn-success btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Ganada</button>";
    
            }else if($apuestas[$i]["estado"] == 2){
    
                $estado = "<button class='btn btn-warning btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Anulada</button>";
    
            }else{

                $estado = "<button class='btn btn-danger btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Perdida</button>";

            }

            /*
            *Resultado
            */
            if($apuestas[$i]["estado"] == 1){

                $ganada = "<div class='btn-group text-center'><button class='btn btn-success' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'>G</button></div>";

            }else{

                $ganada = "<div class='btn-group text-center'><button class='btn btn-default btnGanada' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'>G</button></div>";


            }

            if($apuestas[$i]["estado"] == 2){

                $anulada = "<div class='btn-group text-center'><button class='btn btn-warning' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2'>A</button></div>";

            }else{

                $anulada = "<div class='btn-group text-center'><button class='btn btn-default btnAnulada' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2'>A</button></div>";


            }

            if($apuestas[$i]["estado"] == 3){

                $perdida = "<div class='btn-group text-center'><button class='btn btn-danger' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3'>P</button></div>";

            }else{

                $perdida = "<div class='btn-group text-center'><button class='btn btn-default btnPerdida' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3'>P</button></div>";


            }            

            /*
            *Acciones
            */            
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' empresa='".$apuestas[$i]["id_empresa"]."' data-toggle='modal' data-target='#modalEditarApuesta'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$apuestas[$i]["pronostico"].'",
            "'.$estado.'",
            "'.$apuestas[$i]["cuota"].'",
            "'.$apuestas[$i]["tipo_apuesta_nombre"].'",
            "'.$apuestas[$i]["fecha"].'",
            "'.$apuestas[$i]["partido"].'",            
                        
            "'.$ganada.$anulada.$perdida.'",
            "'.$apuestas[$i]["nombre_empresa"].'",
            "'.$apuestas[$i]["nombre_membresia"].'",
            "'.$botones.'"
            ],';        
        }

            $datosJson=substr($datosJson, 0, -1);

            $datosJson .= '] 

            }';

        echo $datosJson;
        }else{

            echo '{
                "data":[]
            }';
            return;

        }
    }

}

/*=============================================
ACTIVAR TABLA DE APUESTAS
=============================================*/ 
$activarApuestas = new TablaApuestas();
$activarApuestas -> mostrarTablaApuestas();
