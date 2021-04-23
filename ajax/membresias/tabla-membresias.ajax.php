<?php
session_start();
require_once "../../controladores/membresias.controlador.php";
require_once "../../modelos/membresias.modelo.php";

class TablaMembresias{

    /*=============================================
    MOSTRAR LA TABLA DE MEMBRESIAS
    =============================================*/ 

    public function mostrarTablaMembresias(){

        $valor = $_SESSION["empresa"];    

        $membresia = ControladorMembresias::ctrSelecMembresias($valor);	
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
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        if($membresia[$i]["destino"] != '0'){
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMembresia' idMembresia='".$membresia[$i]["id_membresia"]."' data-toggle='modal' data-target='#modalEditarMembresia' title='Editar Membresia'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMembresia' idMembresia='".$membresia[$i]["id_membresia"]."' comprobante='".$membresia[$i]["comprobante"]."' title='Eliminar Membresia'><i class='fa fa-times'></i></button></div>"; 
        }else{
            $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarMembresia' idMembresia='".$membresia[$i]["id_membresia"]."' data-toggle='modal' data-target='#modalEditarMembresia' title='Editar Membresia'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarMembresia' idMembresia='".$membresia[$i]["id_membresia"]."' comprobante='".$membresia[$i]["comprobante"]."' title='Eliminar Membresia'><i class='fa fa-times'></i></button><button class='btn btn-info btnRenovarMembresia' idMembresia='".$membresia[$i]["id_membresia"]."' data-toggle='modal' data-target='#modalRenovarMembresia'  title='Renovar Membresia'><i class='fa fa-retweet'></i></button></div>"; 
        }
        

            $datosJson .= '[
            "'.$membresia[$i]["id_membresia"].'",
            "'.$membresia[$i]["nombre_completo"].'",
            "'.$membresia[$i]["nombre"].'",
            "'.$membresia[$i]["nombre_membresia"].'",
            "'.$membresia[$i]["fecha_inicio"].'",
            "'.$membresia[$i]["fecha_fin"].'",
            "'.$estado.'",
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
ACTIVAR TABLA MEMBRESIAS
=============================================*/ 
$activarMembresias = new TablaMembresias();
$activarMembresias -> mostrarTablaMembresias();

