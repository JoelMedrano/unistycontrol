<?php

require_once "conexion.php";

class ModeloMiembros{

    /*
	*Registrar miembros
    */

	static public function mdlCrearMiembros($datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO miembros (
                                                    nombre_completo,
                                                    documento,
                                                    celular,
                                                    correo,
                                                    foto,
                                                    id_red_social,
                                                    usuario_red_social,
                                                    id_empresa,
                                                    id_usuario
                                                ) 
                                                VALUES
                                                    (
                                                    :nombre_completo,
                                                    :documento,
                                                    :celular,
                                                    :correo,
                                                    :foto,
                                                    :id_red_social,
                                                    :usuario_red_social,
                                                    :id_empresa,
                                                    :id_usuario
                                                    )");

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
		$stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
		$stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_red_social", $datos["id_red_social"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_red_social", $datos["usuario_red_social"], PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlMostrarMiembros($item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM miembros WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM miembros");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

	static public function mdlListarMiembroEmpresa($empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT
                                                m.id_miembro,
                                                m.nombre_completo,
                                                m.documento,
                                                m.celular,
                                                m.correo,
                                                m.foto,
                                                m.id_red_social,
                                                r.nombre_red_social,
                                                m.usuario_red_social,
                                                m.fecha_creacion,
                                                m.id_empresa,
                                                e.nombre,
                                                m.estado,
                                                CASE
                                                WHEN m.id_membresia = 0 
                                                THEN 'Pendiente' 
                                                ELSE m.id_membresia 
                                                END AS id_membresia 
                                            FROM
                                                miembros m 
                                                LEFT JOIN empresa e 
                                                ON m.id_empresa = e.id_empresa 
                                                LEFT JOIN membresia me 
                                                ON m.id_miembro = me.id_miembro 
                                                LEFT JOIN red_social r 
                                                ON m.id_red_social = r.id_red_social
                                            WHERE m.eliminado=1");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT DISTINCT
                                                m.id_miembro,
                                                m.nombre_completo,
                                                m.documento,
                                                m.celular,
                                                m.correo,
                                                m.foto,
                                                m.id_red_social,
                                                r.nombre_red_social,
                                                m.usuario_red_social,
                                                m.fecha_creacion,
                                                m.id_empresa,
                                                e.nombre,
                                                m.estado,
                                                CASE
                                                WHEN m.id_membresia = 0 
                                                THEN 'Pendiente' 
                                                ELSE m.id_membresia 
                                                END AS id_membresia 
                                            FROM
                                                miembros m 
                                                LEFT JOIN empresa e 
                                                ON m.id_empresa = e.id_empresa 
                                                LEFT JOIN membresia me 
                                                ON m.id_miembro = me.id_miembro 
                                                LEFT JOIN red_social r 
                                                ON m.id_red_social = r.id_red_social 
                                            WHERE m.id_empresa = $empresa AND m.eliminado=1");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }


    /* 
    *Editar miembro
    */
    static public function mdlEditarMiembro($datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE 
                                                miembros 
                                            SET
                                                nombre_completo = :nombre_completo,
                                                documento = :documento,
                                                celular = :celular,
                                                correo = :correo,
                                                foto = :foto,
                                                id_red_social = :id_red_social,
                                                usuario_red_social = :usuario_red_social,
                                                id_empresa = :id_empresa 
                                            WHERE id_miembro = :id_miembro");

        $stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
        $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
        $stmt->bindParam(":celular", $datos["celular"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_red_social", $datos["id_red_social"], PDO::PARAM_STR);
        $stmt->bindParam(":usuario_red_social", $datos["usuario_red_social"], PDO::PARAM_STR);
        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /* 
    *Borrar Miembro
    */
    static public function mdlBorrarMiembro($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE 
                                                    miembros 
                                                SET
                                                    eliminado = 0 
                                                WHERE id_miembro = :idMiembro ");

		$stmt -> bindParam(":idMiembro", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /* 
    *Activar miembro
    */
    static public function mdlActualizarMiembro($item1, $valor1, $item2, $valor2, $item3, $valor3){

		$stmt = Conexion::conectar()->prepare("UPDATE miembros SET $item1 = :$item1, $item3=:$item3 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item3, $valor3, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}

    /* 
    *Activar miembro
    */
    static public function mdlActualizarMiembro2($item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE miembros SET $item1 = :$item1 WHERE $item2 = :$item2");

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

}