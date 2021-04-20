<?php

require_once "../../controladores/membresias.controlador.php";
require_once "../../modelos/membresias.modelo.php";

class TablaTipoMembresias{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaTipoMembresias(){

        $item = null;     
        $valor = null;

        $tipo = ControladorMembresias::ctrMostrarTipoMembresias($item, $valor);	
        if(count($social)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($tipo); $i++){  

        
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarTipoMembresia' idTipoMembresia='".$tipo[$i]["id_tipo_membresia"]."' data-toggle='modal' data-target='#modalEditarTipoMembresia'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarTipoMembresia' idTipoMembresia='".$tipo[$i]["id_tipo_membresia"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$tipo[$i]["nombre_membresia"].'",
            "'.$tipo[$i]["id_empresa"].'",
            "'.$tipo[$i]["fecha_creacion"].'",
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
ACTIVAR TABLA TIPO DE MEMBRESIAS
=============================================*/ 
$activarTipoMembresias = new TablaTipoMembresias();
$activarTipoMembresias -> mostrarTablaTipoMembresias();

