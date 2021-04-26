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

                $estado = "<button class='btn btn-info btn-xs' idApuesta='".$apuestas[$i]["id_apuestas"]."'>Pendiente</button>";
    
            }else if($apuestas[$i]["estado"] == 1){
    
                $estado = "<button class='btn btn-success btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Ganada</button>";
    
            }else if($apuestas[$i]["estado"] == 2){
    
                $estado = "<button class='btn btn-danger btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Perdida</button>";
    
            }else{

                $estado = "<button class='btn btn-secundary btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'>Anulada</button>";

            }

            /*
            *Resultado
            */
            $resultado =  "<div class='btn-group'><button class='btn btn-success btnGanada' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'><i class='fa fa-check-circle-o'></i></button><button class='btn btn-secundary btnGanada' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'><i class='fa fa-refresh'></i></button><button class='btn btn-danger btnGanada' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'><i class='fa fa-times'></i></button></div>"; 

            /*
            *Acciones
            */            
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' data-toggle='modal' data-target='#modalEditarApuesta'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$apuestas[$i]["nombre_empresa"].'",
            "'.$apuestas[$i]["nombre_membresia"].'",
            "'.$apuestas[$i]["tipo_apuesta_nombre"].'",
            "'.$apuestas[$i]["fecha"].'",
            "'.$apuestas[$i]["partido"].'",
            "'.$apuestas[$i]["pronostico"].'",
            "'.$apuestas[$i]["cuota"].'",
            "'.$estado.'",
            "'.$resultado.'",
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
