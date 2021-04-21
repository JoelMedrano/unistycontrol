<?php

require_once "../../controladores/miembros.controlador.php";
require_once "../../modelos/miembros.modelo.php";

class TablaMiembros{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaMiembros(){

        $item = null;     
        $valor = null;

        $miembros = ControladorMiembros::ctrMostrarMiembros($item, $valor);	

        if(count($miembros)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($miembros); $i++){  

        
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."' data-toggle='modal' data-target='#modalEditarMiembro'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$miembros[$i]["nombre_completo"].'",
            "'.$miembros[$i]["documento"].'",
            "'.$miembros[$i]["foto"].'",
            "'.$miembros[$i]["celular"].'",
            "'.$miembros[$i]["correo"].'",
            "'.$miembros[$i]["id_red_social"].'",
            "'.$miembros[$i]["usuario_red_social"].'",
            "'.$miembros[$i]["estado"].'",
            "'.$miembros[$i]["id_membresia"].'",
            "'.$miembros[$i]["fecha_creacion"].'",
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
$activarSocial = new TablaMiembros();
$activarSocial -> mostrarTablaMiembros();

