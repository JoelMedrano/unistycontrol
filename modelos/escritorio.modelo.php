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
                                    WHERE eliminado = 1");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                        COUNT(id_miembro) AS total_miembros 
                                    FROM
                                        miembros 
                                    WHERE eliminado = 1 
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
                                            WHERE eliminado = 1 
                                                AND MONTH(fecha_creacion) = MONTH(NOW())");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                COUNT(id_miembro) AS total_miembros 
                                            FROM
                                                miembros 
                                            WHERE eliminado = 1 
                                                AND id_empresa = $empresa
                                                AND MONTH(fecha_creacion) = MONTH(NOW()) ");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Renovaciones
    */
    static public function mdlTotalRenovaciones($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                COUNT(m.id_miembro) AS renovaciones 
                                            FROM
                                                miembros m 
                                                LEFT JOIN membresia me 
                                                ON m.id_membresia = me.id_membresia 
                                            WHERE me.estado = 1 
                                                AND MONTH(me.fecha_inicio) = MONTH(NOW())");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(m.id_miembro) AS renovaciones 
                                                FROM
                                                    miembros m 
                                                    LEFT JOIN membresia me 
                                                    ON m.id_membresia = me.id_membresia 
                                                WHERE m.id_empresa = $empresa 
                                                    AND me.estado = 1 
                                                    AND MONTH(me.fecha_inicio) = MONTH(NOW())");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Renovaciones
    */
    static public function mdlTotalPorVencer($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        COUNT(m.id_miembro) AS por_vencer 
                                                    FROM
                                                        miembros m 
                                                        LEFT JOIN membresia me 
                                                        ON m.id_membresia = me.id_membresia 
                                                    WHERE DATE(me.fecha_fin) >= DATE(NOW()) 
                                                        AND me.estado IN ('0','1')");

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(m.id_miembro) AS por_vencer 
                                                FROM
                                                    miembros m 
                                                    LEFT JOIN membresia me 
                                                    ON m.id_membresia = me.id_membresia 
                                                WHERE DATE(me.fecha_fin) >= DATE(NOW()) 
                                                    AND me.estado IN ('0','1') 
                                                    AND m.id_empresa =  $empresa");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }    

}