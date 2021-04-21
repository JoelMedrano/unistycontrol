<?php

session_start();

require_once "../../controladores/miembros.controlador.php";
require_once "../../modelos/miembros.modelo.php";

class TablaMiembros{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaMiembros(){

        $empresa = $_SESSION["empresa"];
        $miembros = ControladorMiembros::ctrListarMiembroEmpresa($empresa);	

        if(count($miembros)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($miembros); $i++){  

            /* 
            * imagen
            */
            $foto="<img src='".$miembros[$i]["foto"]."' class='img-thumbnail' width='40px'>";

            /* 
            *estado
            */
            if($miembros[$i]["estado"] == 1){

                $estado = "<button class='btn btn-success btn-xs btnActivarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."' estadoMiembro='0'>Activo</button>";
    
            }else{
    
                $estado = "<button class='btn btn-danger btn-xs btnActivarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."' estadoMiembro='1'>Inactivo</button>";
    
            }

            /*
            *Botones
            */            
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."' data-toggle='modal' data-target='#modalEditarMiembro'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMiembro' idMiembro='".$miembros[$i]["id_miembro"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$miembros[$i]["nombre_completo"].'",
            "'.$miembros[$i]["documento"].'",
            "'.$foto.'",
            "'.$miembros[$i]["celular"].'",
            "'.$miembros[$i]["correo"].'",
            "'.$miembros[$i]["nombre_red_social"].'",
            "'.$miembros[$i]["usuario_red_social"].'",
            "'.$estado.'",
            "'.$miembros[$i]["nombre"].'",
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

