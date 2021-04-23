<?php

require_once "conexion.php";

class ModeloEscritorio{

    /* 
    *Miembros totales
    */
    static public function mdlTotalMiembros($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                        COUNT(id_miembro) AS total_miembros 
                                    FROM
                                        miembros 
                                    WHERE eliminado = 0");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                        COUNT(id_miembro) AS total_miembros 
                                    FROM
                                        miembros 
                                    WHERE eliminado = 0 
                                        AND id_empresa = $empresa");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Miembros totales
    */
    static public function mdlTotalMiembrosNuevos($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                COUNT(id_miembro) AS total_miembros 
                                            FROM
                                                miembros 
                                            WHERE eliminado = 0 
                                                AND MONTH(fecha_creacion) = MONTH(NOW())");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                COUNT(id_miembro) AS total_miembros 
                                            FROM
                                                miembros 
                                            WHERE eliminado = 0 
                                                AND id_empresa = $empresa
                                                AND MONTH(fecha_creacion) = MONTH(NOW()) ");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }
}