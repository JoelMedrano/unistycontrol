<?php
session_start();
require_once "../../controladores/membresias.controlador.php";
require_once "../../modelos/membresias.modelo.php";

class TablaMembresiasCaducadas{

    /*=============================================
    MOSTRAR LA TABLA DE MEMBRESIAS
    =============================================*/ 

    public function mostrarTablaMembresiasCaducadas(){

        $valor = $_SESSION["empresa"];    

        $membresia = ControladorMembresias::ctrSelecMembresiasCaducadas($valor);	
        if(count($membresia)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($membresia); $i++){  

        if($membresia[$i]["estado"] == 0){

            /* $estado = "<button class='btn btn-danger btn-xs btnActivar'>".$articulos[$i]["id"]."</button>"; */
            $estado = "<button class='btn btn-primary btn-xs '  estadoEmpresa='1'>Nuevo</button>";

        }else if($membresia[$i]["estado"] == 1){

            /* $estado = "<button class='btn btn-danger btn-xs btnActivar'>".$articulos[$i]["id"]."</button>"; */
            $estado = "<button class='btn btn-info btn-xs '  estadoEmpresa='2'>Renovado</button>";

        }else{

            /* $estado = "<button class='btn btn-success btn-xs btnActivarArt'>".$articulos[$i]["id"]."</button>"; */
            $estado = "<button class='btn btn-danger btn-xs ' >Caducado</button>";

        }
        
        

            $datosJson .= '[
            "'.$membresia[$i]["id_membresia"].'",
            "'.$membresia[$i]["nombre_completo"].'",
            "'.$membresia[$i]["nombre"].'",
            "'.$membresia[$i]["nombre_membresia"].'",
            "'.$membresia[$i]["fecha_inicio"].'",
            "'.$membresia[$i]["fecha_fin"].'",
            "'.$estado.'"
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
ACTIVAR TABLA MEMBRESIAS
=============================================*/ 
$activarMembresiasCaducadas = new TablaMembresiasCaducadas();
$activarMembresiasCaducadas -> mostrarTablaMembresiasCaducadas();

