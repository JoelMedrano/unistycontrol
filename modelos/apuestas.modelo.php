<?php

require_once "conexion.php";

class ModeloApuestas{

    /*
	*Registrar apuestas
    */
    static public function mdlCrearApuesta($datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO apuestas (
                                                    id_empresa,
                                                    id_tipo_membresia,
                                                    tipo_apuesta,
                                                    fecha,
                                                    partido,
                                                    pronostico,
                                                    cuota,
                                                    monto,
                                                    id_usuario
                                                ) 
                                                VALUES
                                                    (
                                                    :id_empresa,
                                                    :id_tipo_membresia,
                                                    :tipo_apuesta,
                                                    :fecha,
                                                    :partido,
                                                    :pronostico,
                                                    :cuota,
                                                    :monto,
                                                    :id_usuario
                                                    )");

		$stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_apuesta", $datos["tipo_apuesta"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":partido", $datos["partido"], PDO::PARAM_STR);
        $stmt->bindParam(":pronostico", $datos["pronostico"], PDO::PARAM_STR);
        $stmt->bindParam(":cuota", $datos["cuota"], PDO::PARAM_STR);
        $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

    }

    /* 
    *Listar apuestas por empresa 
    */    
    static public function mdlListarApuestasEmpresa($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                    a.id_apuestas,
                                                    a.id_empresa,
                                                    em.nombre AS nombre_empresa,
                                                    a.id_tipo_membresia,
                                                    tm.nombre_membresia,
                                                    a.tipo_apuesta,
                                                    CASE
                                                    WHEN a.tipo_apuesta = '1' 
                                                    THEN 'Recomendada' 
                                                    ELSE 'MVP' 
                                                    END AS tipo_apuesta_nombre,
                                                    DATE(a.fecha) AS fecha,
                                                    a.partido,
                                                    a.pronostico,
                                                    a.cuota,
                                                    a.monto,
                                                    a.estado 
                                                FROM
                                                    apuestas a 
                                                    LEFT JOIN empresa em 
                                                    ON a.id_empresa = em.id_empresa 
                                                    LEFT JOIN tipo_membresia tm 
                                                    ON a.id_tipo_membresia = tm.id_tipo_membresia
                                                    WHERE a.eliminado=1
                                                    ORDER BY a.fecha DESC,
                                                    a.id_empresa");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        a.id_apuestas,
                                                        a.id_empresa,
                                                        em.nombre AS nombre_empresa,
                                                        a.id_tipo_membresia,
                                                        tm.nombre_membresia,
                                                        a.tipo_apuesta,
                                                        CASE
                                                        WHEN a.tipo_apuesta = '1' 
                                                        THEN 'Recomendada' 
                                                        ELSE 'MVP' 
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.monto,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia 
                                                    WHERE a.id_empresa = $empresa AND a.eliminado=1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Listar apuestas por empresa 
    */    
    static public function mdlListarApuestasEmpresaPerfil($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                    a.id_apuestas,
                                                    a.id_empresa,
                                                    em.nombre AS nombre_empresa,
                                                    a.id_tipo_membresia,
                                                    tm.nombre_membresia,
                                                    a.tipo_apuesta,
                                                    CASE
                                                    WHEN a.tipo_apuesta = '1' 
                                                    THEN 'Recomendada' 
                                                    ELSE 'MVP' 
                                                    END AS tipo_apuesta_nombre,
                                                    DATE(a.fecha) AS fecha,
                                                    a.partido,
                                                    a.pronostico,
                                                    a.cuota,
                                                    a.monto,
                                                    a.estado 
                                                FROM
                                                    apuestas a 
                                                    LEFT JOIN empresa em 
                                                    ON a.id_empresa = em.id_empresa 
                                                    LEFT JOIN tipo_membresia tm 
                                                    ON a.id_tipo_membresia = tm.id_tipo_membresia
                                                    WHERE a.eliminado=1 AND a.tipo_apuesta=2
                                                    ORDER BY a.fecha DESC,
                                                    a.id_empresa");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        a.id_apuestas,
                                                        a.id_empresa,
                                                        em.nombre AS nombre_empresa,
                                                        a.id_tipo_membresia,
                                                        tm.nombre_membresia,
                                                        a.tipo_apuesta,
                                                        CASE
                                                        WHEN a.tipo_apuesta = '1' 
                                                        THEN 'Recomendada' 
                                                        ELSE 'MVP' 
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.monto,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia 
                                                        WHERE a.id_empresa = $empresa 
                                                            AND a.eliminado = 1 
                                                            AND a.tipo_apuesta = 2 
                                                            AND a.estado NOT IN ('0')");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }    
    /* 
    *Listar apuestas por empresa usuario
    */    
    static public function mdlListarApuestasEmpresaUsuario($empresa,$usuario){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                    a.id_apuestas,
                                                    a.id_empresa,
                                                    em.nombre AS nombre_empresa,
                                                    a.id_tipo_membresia,
                                                    tm.nombre_membresia,
                                                    a.tipo_apuesta,
                                                    CASE
                                                    WHEN a.tipo_apuesta = '1' 
                                                    THEN 'Recomendada' 
                                                    ELSE 'MVP' 
                                                    END AS tipo_apuesta_nombre,
                                                    DATE(a.fecha) AS fecha,
                                                    a.partido,
                                                    a.pronostico,
                                                    a.cuota,
                                                    a.monto,
                                                    a.estado 
                                                FROM
                                                    apuestas a 
                                                    LEFT JOIN empresa em 
                                                    ON a.id_empresa = em.id_empresa 
                                                    LEFT JOIN tipo_membresia tm 
                                                    ON a.id_tipo_membresia = tm.id_tipo_membresia
                                                    where a.eliminado=1");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        a.id_apuestas,
                                                        a.id_empresa,
                                                        em.nombre AS nombre_empresa,
                                                        a.id_tipo_membresia,
                                                        tm.nombre_membresia,
                                                        a.tipo_apuesta,
                                                        CASE
                                                        WHEN a.tipo_apuesta = '1' 
                                                        THEN 'Recomendada' 
                                                        ELSE 'MVP'  
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.monto,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia 
                                                    WHERE a.id_empresa = $empresa AND a.id_usuario = $usuario AND a.eliminado=1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Mostrar apuestas
    */
	static public function mdlMostrarApuestas($item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        a.id_apuestas,
                                                        a.id_empresa,
                                                        em.nombre AS nombre_empresa,
                                                        a.id_tipo_membresia,
                                                        tm.nombre_membresia,
                                                        a.tipo_apuesta,
                                                        CASE
                                                        WHEN a.tipo_apuesta = '1' 
                                                        THEN 'Recomendada' 
                                                        ELSE 'MVP' 
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.monto,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia WHERE a.$item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
                                                        a.id_apuestas,
                                                        a.id_empresa,
                                                        em.nombre AS nombre_empresa,
                                                        a.id_tipo_membresia,
                                                        tm.nombre_membresia,
                                                        a.tipo_apuesta,
                                                        CASE
                                                        WHEN a.tipo_apuesta = '1' 
                                                        THEN 'Recomendada' 
                                                        ELSE 'MVP' 
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.monto,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

    /* 
    *Editar apuesta
    */
    static public function mdlEditarApuesta($datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE 
                                                    apuestas 
                                                SET
                                                    id_empresa = :id_empresa,
                                                    id_tipo_membresia = :id_tipo_membresia,
                                                    tipo_apuesta = :tipo_apuesta,
                                                    fecha = :fecha,
                                                    partido = :partido,
                                                    pronostico = :pronostico,
                                                    cuota = :cuota,
                                                    monto = :monto 
                                                WHERE id_apuestas = :id_apuestas");

        $stmt->bindParam(":id_apuestas", $datos["id_apuestas"], PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
        $stmt->bindParam(":tipo_apuesta", $datos["tipo_apuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":partido", $datos["partido"], PDO::PARAM_STR);
        $stmt->bindParam(":pronostico", $datos["pronostico"], PDO::PARAM_STR);
        $stmt->bindParam(":cuota", $datos["cuota"], PDO::PARAM_STR);
        $stmt->bindParam(":monto", $datos["monto"], PDO::PARAM_STR);


		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /* 
    *Borrar apuesta
    */
    static public function mdlBorrarApuesta($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE 
                                                    apuestas
                                                SET
                                                    eliminado = 0 
                                                WHERE id_apuestas = :id_apuestas ");

		$stmt -> bindParam(":id_apuestas", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";

		}else{

			return "error";

		}

		$stmt -> close();

		$stmt = null;

	}

    /* 
    *Actualizar el estado de la apuesta
    */
    static public function mdlEstadoApuesta($item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE apuestas SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
  

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}    

    /*=============================================
	RANGO FECHAS APUESTAS PLAYER
	=============================================*/	

	static public function mdlRangoFechasApuestasPlayer($tabla, $fechaInicial, $fechaFinal,$empresa,$usuario){

		if($fechaInicial == "null"){

			$stmt = Conexion::conectar()->prepare("SELECT 
            a.id_apuestas,
            a.id_empresa,
            em.nombre AS nombre_empresa,
            a.id_tipo_membresia,
            tm.nombre_membresia,
            a.tipo_apuesta,
            CASE
            WHEN a.tipo_apuesta = '1' 
            THEN 'Recomendada' 
            ELSE 'MVP'  
            END AS tipo_apuesta_nombre,
            DATE(a.fecha) AS fecha,
            a.partido,
            a.pronostico,
            a.cuota,
            a.monto,
            a.estado 
        FROM
            apuestas a 
            LEFT JOIN empresa em 
            ON a.id_empresa = em.id_empresa 
            LEFT JOIN tipo_membresia tm 
            ON a.id_tipo_membresia = tm.id_tipo_membresia 
        WHERE a.id_empresa = $empresa AND a.id_usuario = $usuario AND a.eliminado=1");

			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

			$stmt = Conexion::conectar()->prepare("SELECT 
            a.id_apuestas,
            a.id_empresa,
            em.nombre AS nombre_empresa,
            a.id_tipo_membresia,
            tm.nombre_membresia,
            a.tipo_apuesta,
            CASE
            WHEN a.tipo_apuesta = '1' 
            THEN 'Recomendada' 
            ELSE 'MVP'  
            END AS tipo_apuesta_nombre,
            DATE(a.fecha) AS fecha,
            a.partido,
            a.pronostico,
            a.cuota,
            a.monto,
            a.estado 
        FROM
            apuestas a 
            LEFT JOIN empresa em 
            ON a.id_empresa = em.id_empresa 
            LEFT JOIN tipo_membresia tm 
            ON a.id_tipo_membresia = tm.id_tipo_membresia 
        WHERE a.id_empresa = $empresa AND a.id_usuario = $usuario 
        AND a.eliminado=1 AND DATE(a.fecha) like '%$fechaFinal%'");

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

				$stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE a.id_empresa = $empresa AND a.id_usuario = $usuario 
            AND DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

			}else{


				$stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE a.id_empresa = $empresa AND a.id_usuario = $usuario 
            AND DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinal'");

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}

    /*=============================================
	RANGO FECHAS APUESTAS 
	=============================================*/	

	static public function mdlRangoFechasApuestas($tabla, $fechaInicial, $fechaFinal,$empresa){

		if($fechaInicial == "null"){

            if($empresa == "0"){
                $stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE  a.eliminado=1");

            }else{

                $stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE a.id_empresa = $empresa  AND a.eliminado=1");

            }


			$stmt -> execute();

			return $stmt -> fetchAll();	


		}else if($fechaInicial == $fechaFinal){

            if($empresa == "0"){
                $stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE a.eliminado=1 AND DATE(a.fecha) like '%$fechaFinal%'");


            }else{
                $stmt = Conexion::conectar()->prepare("SELECT 
                a.id_apuestas,
                a.id_empresa,
                em.nombre AS nombre_empresa,
                a.id_tipo_membresia,
                tm.nombre_membresia,
                a.tipo_apuesta,
                CASE
                WHEN a.tipo_apuesta = '1' 
                THEN 'Recomendada' 
                ELSE 'MVP'  
                END AS tipo_apuesta_nombre,
                DATE(a.fecha) AS fecha,
                a.partido,
                a.pronostico,
                a.cuota,
                a.monto,
                a.estado 
            FROM
                apuestas a 
                LEFT JOIN empresa em 
                ON a.id_empresa = em.id_empresa 
                LEFT JOIN tipo_membresia tm 
                ON a.id_tipo_membresia = tm.id_tipo_membresia 
            WHERE a.id_empresa = $empresa 
            AND a.eliminado=1 AND DATE(a.fecha) like '%$fechaFinal%'");


            }

			

			$stmt -> bindParam(":fecha", $fechaFinal, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$fechaActual = new DateTime();
			$fechaActual ->add(new DateInterval("P1D"));
			$fechaActualMasUno = $fechaActual->format("Y-m-d");

			$fechaFinal2 = new DateTime($fechaFinal);
			$fechaFinal2 ->add(new DateInterval("P1D"));
			$fechaFinalMasUno = $fechaFinal2->format("Y-m-d");

			if($fechaFinalMasUno == $fechaActualMasUno){

                if($empresa == "0"){
                    $stmt = Conexion::conectar()->prepare("SELECT 
                    a.id_apuestas,
                    a.id_empresa,
                    em.nombre AS nombre_empresa,
                    a.id_tipo_membresia,
                    tm.nombre_membresia,
                    a.tipo_apuesta,
                    CASE
                    WHEN a.tipo_apuesta = '1' 
                    THEN 'Recomendada' 
                    ELSE 'MVP'  
                    END AS tipo_apuesta_nombre,
                    DATE(a.fecha) AS fecha,
                    a.partido,
                    a.pronostico,
                    a.cuota,
                    a.monto,
                    a.estado 
                FROM
                    apuestas a 
                    LEFT JOIN empresa em 
                    ON a.id_empresa = em.id_empresa 
                    LEFT JOIN tipo_membresia tm 
                    ON a.id_tipo_membresia = tm.id_tipo_membresia 
                WHERE  DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

                }else{

                    $stmt = Conexion::conectar()->prepare("SELECT 
                    a.id_apuestas,
                    a.id_empresa,
                    em.nombre AS nombre_empresa,
                    a.id_tipo_membresia,
                    tm.nombre_membresia,
                    a.tipo_apuesta,
                    CASE
                    WHEN a.tipo_apuesta = '1' 
                    THEN 'Recomendada' 
                    ELSE 'MVP'  
                    END AS tipo_apuesta_nombre,
                    DATE(a.fecha) AS fecha,
                    a.partido,
                    a.pronostico,
                    a.cuota,
                    a.monto,
                    a.estado 
                FROM
                    apuestas a 
                    LEFT JOIN empresa em 
                    ON a.id_empresa = em.id_empresa 
                    LEFT JOIN tipo_membresia tm 
                    ON a.id_tipo_membresia = tm.id_tipo_membresia 
                WHERE a.id_empresa = $empresa
                AND DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinalMasUno'");

                }

				

			}else{
                if($empresa == "0"){

                    $stmt = Conexion::conectar()->prepare("SELECT 
                    a.id_apuestas,
                    a.id_empresa,
                    em.nombre AS nombre_empresa,
                    a.id_tipo_membresia,
                    tm.nombre_membresia,
                    a.tipo_apuesta,
                    CASE
                    WHEN a.tipo_apuesta = '1' 
                    THEN 'Recomendada' 
                    ELSE 'MVP'  
                    END AS tipo_apuesta_nombre,
                    DATE(a.fecha) AS fecha,
                    a.partido,
                    a.pronostico,
                    a.cuota,
                    a.monto,
                    a.estado 
                FROM
                    apuestas a 
                    LEFT JOIN empresa em 
                    ON a.id_empresa = em.id_empresa 
                    LEFT JOIN tipo_membresia tm 
                    ON a.id_tipo_membresia = tm.id_tipo_membresia 
                WHERE DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinal'");

                }else{

                    $stmt = Conexion::conectar()->prepare("SELECT 
                    a.id_apuestas,
                    a.id_empresa,
                    em.nombre AS nombre_empresa,
                    a.id_tipo_membresia,
                    tm.nombre_membresia,
                    a.tipo_apuesta,
                    CASE
                    WHEN a.tipo_apuesta = '1' 
                    THEN 'Recomendada' 
                    ELSE 'MVP'  
                    END AS tipo_apuesta_nombre,
                    DATE(a.fecha) AS fecha,
                    a.partido,
                    a.pronostico,
                    a.cuota,
                    a.monto,
                    a.estado 
                FROM
                    apuestas a 
                    LEFT JOIN empresa em 
                    ON a.id_empresa = em.id_empresa 
                    LEFT JOIN tipo_membresia tm 
                    ON a.id_tipo_membresia = tm.id_tipo_membresia 
                WHERE a.id_empresa = $empresa 
                AND DATE(a.fecha) BETWEEN '$fechaInicial' AND '$fechaFinal'");

                }
 

				

			}
		
			$stmt -> execute();

			return $stmt -> fetchAll();

		}

	}


}