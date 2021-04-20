<?php

require_once "conexion.php";

class ModeloSocial{

	/*=============================================
	CREAR RED SOCIAL
	=============================================*/

	static public function mdlIngresarSocial($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_red_social,id_usuario) VALUES (:nombre_red_social,:id_usuario)");

		$stmt->bindParam(":nombre_red_social", $datos["nombre_red_social"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}    

	/*=============================================
	MOSTRAR REDES SOCIALES
	=============================================*/

	static public function mdlMostrarSocial($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }
    
	/*=============================================
	EDITAR RED SOCIAL
	=============================================*/

	static public function mdlEditarSocial($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_red_social = :nombre_red_social, id_usuario = :id_usuario WHERE id_red_social = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre_red_social", $datos["nombre_red_social"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }
	
	
	/*=============================================
	ELIMINAR RED SOCIAL
	=============================================*/

	static public function mdlEliminarSocial($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_red_social = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}    

	

}