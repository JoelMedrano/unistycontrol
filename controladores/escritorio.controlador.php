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


}