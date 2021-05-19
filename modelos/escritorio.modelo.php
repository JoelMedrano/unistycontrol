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
                                                    WHERE MONTH(DATE(me.fecha_fin)) = MONTH(NOW())
                                                        AND DATE(me.fecha_fin) >= DATE(NOW()) 
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
                                                WHERE MONTH(DATE(me.fecha_fin)) = MONTH(NOW()) 
                                                AND DATE(me.fecha_fin) >= DATE(NOW()) 
                                                    AND me.estado IN ('0','1') 
                                                    AND m.id_empresa =  $empresa");

			$stmt -> execute();

			return $stmt -> fetch();

		}

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *Mvp Totales
    */
    static public function mdlMvpTotales($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_mvp 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND a.id_tipo_membresia = $tipo_membresia
                                                    AND a.tipo_apuesta = 2 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Mvp Ganadas
    */
    static public function mdlMvpGanadas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_ganadas 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 2 
                                                    AND a.estado = 1 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Mvp Perdidas
    */
    static public function mdlMvpPerdidas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_perdidas
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 2 
                                                    AND a.estado = 3 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    } 
    
    /* 
    *Mvp Anuladas
    */
    static public function mdlMvpAnuladas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_anuladas 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 2 
                                                    AND a.estado = 2 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *Mvp Pendientes
    */
    static public function mdlMvpPendientes($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_pendientes
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 2 
                                                    AND a.estado = 0 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *CUOTA PROMEDIO
    */
    static public function mdlMvpCuota($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    IFNULL(AVG(a.cuota),0) AS promedio_cuota
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa 
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 2 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *Ultimo MVP
    */
    static public function mdlUltimoMVP($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    * 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND a.id_tipo_membresia = $tipo_membresia
                                                    AND a.tipo_apuesta = 2 
                                                    AND a.eliminado = 1 
                                                ORDER BY a.id_apuestas DESC 
                                                LIMIT 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Empresas menos Unisty 
    */
    static public function mdlEmpresasPerfil(){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    * 
                                                FROM
                                                    empresa e 
                                                WHERE e.id_empresa <> 1");

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Empresas menos Unisty 
    */
    static public function mdlEmpresasPerfilUnido($valor){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    * 
                                                FROM
                                                    empresa e 
                                                WHERE e.id_empresa = $valor");

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }    
    
    /* 
    *Normal Totales
    */
    static public function mdlNormalTotales($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_Normal 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND a.id_tipo_membresia = $tipo_membresia
                                                    AND a.tipo_apuesta = 1 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Normal Ganadas
    */
    static public function mdlNormalGanadas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_ganadas 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 1 
                                                    AND a.estado = 1 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Normal Perdidas
    */
    static public function mdlNormalPerdidas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_perdidas
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 1 
                                                    AND a.estado = 3 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    } 
    
    /* 
    *Normal Anuladas
    */
    static public function mdlNormalAnuladas($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_anuladas 
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 1 
                                                    AND a.estado = 2 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *Normal Pendientes
    */
    static public function mdlNormalPendientes($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    COUNT(*) AS total_pendientes
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 1 
                                                    AND a.estado = 0 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }
    
    /* 
    *CUOTA PROMEDIO
    */
    static public function mdlNormalCuota($empresa, $tipo_membresia){

		$stmt = Conexion::conectar()->prepare("SELECT 
                                                    IFNULL(AVG(a.cuota),0) AS promedio_cuota_normal
                                                FROM
                                                    apuestas a 
                                                WHERE a.id_empresa = $empresa 
                                                    AND id_tipo_membresia = $tipo_membresia 
                                                    AND a.tipo_apuesta = 1 
                                                    AND eliminado = 1");

        $stmt -> execute();

        return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

    }    
    
    /* 
    *PORCENTAJES
    */
    static public function ctrPorcentajes($empresa){

		$stmt = Conexion::conectar()->prepare("SELECT 
        DAY(a.fecha) AS dia,
        a.id_empresa,
        (SELECT 
          COUNT(*) 
        FROM
          apuestas a1 
        WHERE a1.id_empresa = $empresa 
          AND a1.tipo_apuesta = 2 
          AND a1.estado = 1 
          AND DAY(a1.fecha) <= DAY(a.fecha)) AS ganadas_mvp,
        (SELECT 
          COUNT(*) 
        FROM
          apuestas a1 
        WHERE a1.id_empresa = $empresa 
          AND a1.tipo_apuesta = 2 
          AND a1.estado NOT IN ('0','2') 
          AND DAY(a1.fecha) <= DAY(a.fecha)) AS total_mvp,
        ROUND(
          (
            (
              (SELECT 
                COUNT(*) 
              FROM
                apuestas a1 
              WHERE a1.id_empresa = $empresa 
                AND a1.tipo_apuesta = 2 
                AND a1.estado = 1 
                AND DAY(a1.fecha) <= DAY(a.fecha))
            ) / (
              (SELECT 
                COUNT(*) 
              FROM
                apuestas a1 
              WHERE a1.id_empresa = $empresa 
                AND a1.tipo_apuesta = 2 
                AND a1.estado NOT IN ('0','2') 
                AND DAY(a1.fecha) <= DAY(a.fecha))
            )
          ) * 100,
          2
        ) AS efectividad_dia_mvp,
        (SELECT 
          COUNT(*) 
        FROM
          apuestas a1 
        WHERE a1.id_empresa = $empresa 
          AND a1.tipo_apuesta = 1 
          AND a1.estado = 1 
          AND DAY(a1.fecha) <= DAY(a.fecha)) AS ganadas_normal,
        (SELECT 
          COUNT(*) 
        FROM
          apuestas a1 
        WHERE a1.id_empresa = $empresa
          AND a1.tipo_apuesta = 1 
          AND a1.estado NOT IN ('0','2') 
          AND DAY(a1.fecha) <= DAY(a.fecha)) AS total_normal,
        ROUND(
          (
            (
              (SELECT 
                COUNT(*) 
              FROM
                apuestas a1 
              WHERE a1.id_empresa = $empresa 
                AND a1.tipo_apuesta = 1 
                AND a1.estado = 1 
                AND DAY(a1.fecha) <= DAY(a.fecha))
            ) / (
              (SELECT 
                COUNT(*) 
              FROM
                apuestas a1 
              WHERE a1.id_empresa = $empresa 
                AND a1.tipo_apuesta = 1 
                AND a1.estado NOT IN ('0','2') 
                AND DAY(a1.fecha) <= DAY(a.fecha))
            )
          ) * 100,
          2
        ) AS efectividad_dia_normal 
      FROM
        apuestas a 
      WHERE a.id_empresa = $empresa
        AND a.tipo_apuesta = 1 
      GROUP BY DAY(a.fecha),
        a.id_empresa");

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

    }    

}