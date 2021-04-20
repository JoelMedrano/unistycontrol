<?php

require_once "../../controladores/social.controlador.php";
require_once "../../modelos/social.modelo.php";

class TablaSocial{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaSocial(){

        $item = null;     
        $valor = null;

        $social = ControladorSocial::ctrMostrarSocial($item, $valor);	
        if(count($social)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($social); $i++){  

        
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarSocial' idSocial='".$social[$i]["id_red_social"]."' data-toggle='modal' data-target='#modalEditarSocial'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarSocial' idSocial='".$social[$i]["id_red_social"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$social[$i]["nombre_red_social"].'",
            "'.$social[$i]["fecha_creacion"].'",
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
ACTIVAR TABLA DE RED SOCIAL
=============================================*/ 
$activarSocial = new TablaSocial();
$activarSocial -> mostrarTablaSocial();

