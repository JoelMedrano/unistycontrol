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
                                                    :id_usuario
                                                    )");

		$stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_apuesta", $datos["tipo_apuesta"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":partido", $datos["partido"], PDO::PARAM_STR);
        $stmt->bindParam(":pronostico", $datos["pronostico"], PDO::PARAM_STR);
        $stmt->bindParam(":cuota", $datos["cuota"], PDO::PARAM_STR);
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
                                                    THEN 'Normal' 
                                                    ELSE 'VIP' 
                                                    END AS tipo_apuesta_nombre,
                                                    DATE(a.fecha) AS fecha,
                                                    a.partido,
                                                    a.pronostico,
                                                    a.cuota,
                                                    a.estado 
                                                FROM
                                                    apuestas a 
                                                    LEFT JOIN empresa em 
                                                    ON a.id_empresa = em.id_empresa 
                                                    LEFT JOIN tipo_membresia tm 
                                                    ON a.id_tipo_membresia = tm.id_tipo_membresia");


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
                                                        THEN 'Normal' 
                                                        ELSE 'VIP' 
                                                        END AS tipo_apuesta_nombre,
                                                        DATE(a.fecha) AS fecha,
                                                        a.partido,
                                                        a.pronostico,
                                                        a.cuota,
                                                        a.estado 
                                                    FROM
                                                        apuestas a 
                                                        LEFT JOIN empresa em 
                                                        ON a.id_empresa = em.id_empresa 
                                                        LEFT JOIN tipo_membresia tm 
                                                        ON a.id_tipo_membresia = tm.id_tipo_membresia 
                                                    WHERE a.id_empresa = $empresa");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }


}