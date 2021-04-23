<?php

require_once "../../controladores/empresas.controlador.php";
require_once "../../modelos/empresas.modelo.php";

class TablaEmpresas{

    /*=============================================
    MOSTRAR LA TABLA DE EMPRESAS
    =============================================*/ 

    public function mostrarTablaEmpresas(){

        $item = null;     
        $valor = null;

        $empresa = ControladorEmpresas::ctrMostrarEmpresas($item, $valor);	
        if(count($empresa)>0){

        $datosJson = '{
        "data": [';

        for($i = 0; $i < count($empresa); $i++){  

            if($empresa[$i]["logo1"] != ""){

                $foto= "<img src='".$empresa[$i]["logo1"]."' class='img-thumbnail' width='40px'>";
    
              }else{
    
                $foto= "<img src='vistas/img/usuarios/default/anonymous.png' class='img-thumbnail' width='40px'>";
    
              }

            if($empresa[$i]["estado"] == 1){

                /* $estado = "<button class='btn btn-danger btn-xs btnActivar'>".$articulos[$i]["id"]."</button>"; */
                $estado = "<button class='btn btn-success btn-xs btnActivarEmpresa' idEmpresa='".$empresa[$i]["id_empresa"]."' estadoEmpresa='0'>Activo</button>";
    
            }else{
    
                /* $estado = "<button class='btn btn-success btn-xs btnActivarArt'>".$articulos[$i]["id"]."</button>"; */
                $estado = "<button class='btn btn-danger btn-xs btnActivarEmpresa' idEmpresa='".$empresa[$i]["id_empresa"]."' estadoEmpresa='1'>Inactivo</button>";
    
            }
    
        /*=============================================
        TRAEMOS LAS ACCIONES
        =============================================*/         
        
        $botones =  "<div class='btn-group'><button class='btn btn-warning btnEditarEmpresa' idEmpresa='".$empresa[$i]["id_empresa"]."' data-toggle='modal' data-target='#modalEditarEmpresa' title='Editar Empresa'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarEmpresa' idEmpresa='".$empresa[$i]["id_empresa"]."' logo1='".$empresa[$i]["logo1"]."' logo2='".$empresa[$i]["logo2"]."' title='Eliminar Empresa'><i class='fa fa-times'></i></button></div>"; 

            $datosJson .= '[
            "'.($i+1).'",
            "'.$foto.'",
            "'.$empresa[$i]["nombre"].'",
            "'.$empresa[$i]["documento"].'",
            "'.$estado.'",
            "'.$empresa[$i]["fecha_creacion"].'",
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
ACTIVAR TABLA DE EMPRESAS
=============================================*/ 
$activarEmpresas = new TablaEmpresas();
$activarEmpresas -> mostrarTablaEmpresas();

