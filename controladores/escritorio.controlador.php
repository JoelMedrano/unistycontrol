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

    /* 
    *Empresas menos Unisty 
    */
    static public function ctrEmpresasPerfil(){

        $respuesta = ModeloEscritorio::mdlEmpresasPerfil();
        
        return $respuesta;

    }

    /* 
    *Empresas menos Unisty 
    */
    static public function ctrEmpresasPerfilUnido($valor){

        $respuesta = ModeloEscritorio::mdlEmpresasPerfilUnido($valor);
        
        return $respuesta;

    }    
    
    /* 
    *Normal Totales
    */
    static public function ctrNormalTotales($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalTotales($empresa,$tipo_membresia);

        return $respuesta;

    }

    /* 
    *Normal Ganadas
    */
    static public function ctrNormalGanadas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalGanadas($empresa,$tipo_membresia);
        
        return $respuesta;

    }

    /* 
    *Normal Perdidas
    */
    static public function ctrNormalPerdidas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalPerdidas($empresa,$tipo_membresia);
        
        return $respuesta;

    } 
    
    /* 
    *Normal Anuladas
    */
    static public function ctrNormalAnuladas($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalAnuladas($empresa,$tipo_membresia);
        
        return $respuesta;

    }
    
    /* 
    *Normal Pendientes
    */
    static public function ctrNormalPendientes($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalPendientes($empresa,$tipo_membresia);
        
        return $respuesta;

    }
    
    /* 
    *Normal CUOTA PROMEDIO
    */
    static public function ctrNormalCuota($empresa,$tipo_membresia){

        $respuesta = ModeloEscritorio::mdlNormalCuota($empresa,$tipo_membresia);
        
        return $respuesta;

    } 
    
    /* 
    *PORCENTAJES
    */
    static public function ctrPorcentajes($empresa){

        $respuesta = ModeloEscritorio::ctrPorcentajes($empresa);
        
        return $respuesta;

    }      


}