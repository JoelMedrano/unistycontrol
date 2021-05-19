<?php

session_start();

require_once "../../controladores/apuestas.controlador.php";
require_once "../../modelos/apuestas.modelo.php";

class TablaApuestas{

    /*=============================================
    MOSTRAR LA TABLA DE SOCIALES
    =============================================*/ 

    public function mostrarTablaApuestasPerfil(){

        $empresa = $_SESSION["empresa"];
        $apuestas = ControladorApuestas::ctrListarApuestasEmpresaPerfil($empresa);

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
    
                $estado = "<button class='btn btn-success btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'  nombre= '".$apuestas[$i]["partido"]."'>Ganada</button>";
    
            }else if($apuestas[$i]["estado"] == 2){
    
                $estado = "<button class='btn btn-warning btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'  nombre= '".$apuestas[$i]["partido"]."'>Anulada</button>";
    
            }else{

                $estado = "<button class='btn btn-danger btn-xs btnReiniciarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='0'  nombre= '".$apuestas[$i]["partido"]."'>Perdida</button>";

            }

            /*
            *Resultado
            */
            if($apuestas[$i]["estado"] == 0){

                $ganada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnGanada ".'G'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'G'.$apuestas[$i]["id_apuestas"]." name=".'G'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'>G</button></div>";

                $anulada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnAnulada ".'A'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'A'.$apuestas[$i]["id_apuestas"]." name=".'A'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2'>A</button></div>";

                $perdida = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnPerdida ".'P'.$apuestas[$i]["id_apuestas"]."' id=".'P'.$apuestas[$i]["id_apuestas"]." name=".'P'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3'>P</button></div>";


            }else if($apuestas[$i]["estado"] == 1){

                $ganada = "<div class='btn-group text-center'><button class='btn btn-success btn-xs ' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1'>G</button></div>";

                $anulada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs ".'A'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'A'.$apuestas[$i]["id_apuestas"]." name=".'A'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2' disabled>A</button></div>";

                $perdida = "<div class='btn-group text-center'><button class='btn btn-default btn-xs ".'P'.$apuestas[$i]["id_apuestas"]."' id=".'P'.$apuestas[$i]["id_apuestas"]." name=".'P'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3' disabled>P</button></div>";


            }else if($apuestas[$i]["estado"] == 2){

                $anulada = "<div class='btn-group text-center'><button class='btn btn-warning btn-xs' style='margin-right: 20px' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2'>A</button></div>";

                $ganada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnGanada ".'G'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'G'.$apuestas[$i]["id_apuestas"]." name=".'G'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1' disabled>G</button></div>";


                $perdida = "<div class='btn-group text-center'><button class='btn btn-default btn-xs ".'P'.$apuestas[$i]["id_apuestas"]."' id=".'P'.$apuestas[$i]["id_apuestas"]." name=".'P'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3' disabled>P</button></div>";

            }else if($apuestas[$i]["estado"] == 3){

                $perdida = "<div class='btn-group text-center'><button class='btn btn-danger btn-xs' idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='3'>P</button></div>";

                $ganada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnGanada ".'G'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'G'.$apuestas[$i]["id_apuestas"]." name=".'G'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='1' disabled>G</button></div>";

                $anulada = "<div class='btn-group text-center'><button class='btn btn-default btn-xs btnAnulada ".'A'.$apuestas[$i]["id_apuestas"]."' style='margin-right: 20px' id=".'A'.$apuestas[$i]["id_apuestas"]." name=".'A'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' estadoApuesta='2' disabled>A</button></div>";

            }     

            /* 
            *monto
            */
            $monto = "<div class='text-right'>".number_format($apuestas[$i]["monto"],2)."</div>";

            /* 
            *Etiqueta negra VIP
            */

            if($apuestas[$i]["tipo_apuesta_nombre"] == 'MVP'){

                $tipo_apuesta = "<b><span class='btn btn-xs' style='color:#FFFFFF; background-color:black ;'>".$apuestas[$i]["tipo_apuesta_nombre"]."</span></b>";

            }else{

                $tipo_apuesta = $apuestas[$i]["tipo_apuesta_nombre"];
            }

            /*
            *Acciones
            */
            if($apuestas[$i]["estado"] == 0){

                $botones =  "<div class='btn-group'><button class='btn btn-warning btn-xs btnEditarApuesta ".'ED'.$apuestas[$i]["id_apuestas"]."' id=".'ED'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."' empresa='".$apuestas[$i]["id_empresa"]."' data-toggle='modal' data-target='#modalEditarApuesta'><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarApuesta ".'EL'.$apuestas[$i]["id_apuestas"]."' id=".'EL'.$apuestas[$i]["id_apuestas"]." idApuesta='".$apuestas[$i]["id_apuestas"]."'><i class='fa fa-times'></i></button></div>";

            }else{

                $botones =  "<div class='btn-group'><button class='btn btn-warning btn-xs btnEditarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' empresa='".$apuestas[$i]["id_empresa"]."' data-toggle='modal' data-target='#modalEditarApuesta' disabled><i class='fa fa-pencil'></i></button><button class='btn btn-danger btnEliminarApuesta' idApuesta='".$apuestas[$i]["id_apuestas"]."' disabled><i class='fa fa-times'></i></button></div>";

            }
            
            $datosJson .= '[

                "'.$apuestas[$i]["fecha"].'",
                "<b>'.$apuestas[$i]["partido"].'</b>",
                "'.$apuestas[$i]["pronostico"].'",
                "<center>'.$estado.'</center>",
                "<center><b>'.$apuestas[$i]["cuota"].'</b></center>"
                
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
$activarApuestas -> mostrarTablaApuestasPerfil();
