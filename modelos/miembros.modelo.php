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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM miembros ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

}