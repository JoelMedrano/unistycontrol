<?php

require_once "conexion.php";

class ModeloEmpresas{

	/*=============================================
	CREAR EMPRESA
	=============================================*/

	static public function mdlIngresarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,documento,logo1,logo2,id_responsable,id_usuario) VALUES (:nombre,:documento,:logo1,:logo2,:id_responsable,:id_usuario)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":logo1", $datos["logo1"], PDO::PARAM_STR);
		$stmt->bindParam(":logo2", $datos["logo2"], PDO::PARAM_STR);
		$stmt->bindParam(":id_responsable", $datos["id_responsable"], PDO::PARAM_STR);
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
	MOSTRAR EMPRESAS
	=============================================*/

	static public function mdlMostrarEmpresas($tabla,$item,$valor){

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
	EDITAR EMPRESA
	=============================================*/

	static public function mdlEditarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, documento = :documento , id_responsable = :id_responsable , id_usuario = :id_usuario WHERE id_empresa = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
		$stmt->bindParam(":id_responsable", $datos["id_responsable"], PDO::PARAM_STR);
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
	ELIMINAR EMPRESA
	=============================================*/

	static public function mdlEliminarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_empresa = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}    

	/* 
	* Método para activar y desactivar un usuario
	*/
	static public function mdlActualizarEmpresa($valor1, $valor2){

		$sql = "UPDATE empresa SET estado= :estado WHERE id_empresa=:valor";

		$stmt = Conexion::conectar()->prepare($sql);

		$stmt->bindParam(":estado", $valor1, PDO::PARAM_STR);
		$stmt->bindParam(":valor", $valor2, PDO::PARAM_STR);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt = null;
	}

	/*=============================================
	MOSTRAR ULTIMA EMPRESA REGISTRADA
	=============================================*/

	static public function mdlMostrarUltimoID(){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM empresa ORDER BY id DESC LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

	
		

		$stmt -> close();

		$stmt = null;

	}

}