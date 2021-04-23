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


}