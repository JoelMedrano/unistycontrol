<?php
session_start();
require_once "../../controladores/membresias.controlador.php";
require_once "../../modelos/membresias.modelo.php";

class TablaPrecioMembresias{

    /*=============================================
    MOSTRAR LA TABLA DE PRECIO DE MEMBRESIAS
    =============================================*/ 

    public function mostrarTablaPrecioMembresias(){

        $valor = $_SESSION["empresa"];

        $precio = ControladorMembresias::ctrSelecPrecioMembresias($valor);	
        if(count($precio)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($precio); $i++){  

        
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarPrecioMembresia' idPrecioMembresia='".$precio[$i]["id_precio_membresia"]."' data-toggle='modal' data-target='#modalEditarPrecioMembresia'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarPrecioMembresia' idPrecioMembresia='".$precio[$i]["id_precio_membresia"]."'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$precio[$i]["nombre_precio_membresia"].'",
            "'.$precio[$i]["nombre_membresia"].'",
            "'.$precio[$i]["nombre_empresa"].'",
            "'.$precio[$i]["precio"].'",
            "'.$precio[$i]["fecha_creacion"].'",
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
ACTIVAR TABLA PRECIO DE MEMBRESIAS
=============================================*/ 
$activarPrecioMembresias = new TablaPrecioMembresias();
$activarPrecioMembresias -> mostrarTablaPrecioMembresias();

