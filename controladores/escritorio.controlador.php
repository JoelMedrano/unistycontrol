<?php
class ControladorEscritorio{

    /* 
    *Total miembros
    */
    static public function ctrTotalMiembros($empresa){

        $respuesta = ModeloEscritorio::mdlTotalMiembros($empresa);

        return $respuesta;

    }

    /* 
    *Total miembros nuevos
    */
    static public function ctrTotalMiembrosNuevos($empresa){

        $respuesta = ModeloEscritorio::mdlTotalMiembrosNuevos($empresa);

        return $respuesta;

    }

    /* 
    *Total renovaciones
    */
    static public function ctrTotalRenovaciones($empresa){

        $respuesta = ModeloEscritorio::mdlTotalRenovaciones($empresa);

        return $respuesta;

    }

    /* 
    *Por vencer
    */
    static public function ctrTotalPorVencer($empresa){

        $respuesta = ModeloEscritorio::mdlTotalPorVencer($empresa);

        return $respuesta;

    }
    
    /* 
    *MVP Totales
    */
    static public function ctrMvpTotales($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpTotales($empresa,$tipo_membresia);

        return $respuesta;

    }

    /* 
    *MVP Ganadas
    */
    static public function ctrMvpGanadas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpGanadas($empresa,$tipo_membresia);
        
        return $respuesta;

    }

    /* 
    *MVP Perdidas
    */
    static public function ctrMvpPerdidas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpPerdidas($empresa,$tipo_membresia);
        
        return $respuesta;

    } 
    
    /* 
    *MVP Anuladas
    */
    static public function ctrMvpAnuladas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpAnuladas($empresa,$tipo_membresia);
        
        return $respuesta;

    }
    
    /* 
    *MVP Pendientes
    */
    static public function ctrMvpPendientes($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpPendientes($empresa,$tipo_membresia);
        
        return $respuesta;

    }
    
    /* 
    *MVP CUOTA PROMEDIO
    */
    static public function ctrMvpCuota($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlMvpCuota($empresa,$tipo_membresia);
        
        return $respuesta;

    }
    
    /* 
    *Ultimo MVP
    */
    static public function ctrUltimoMVP($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlUltimoMVP($empresa,$tipo_membresia);
        
        return $respuesta;

    }


}