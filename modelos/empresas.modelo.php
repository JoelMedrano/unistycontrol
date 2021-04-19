<?php

require_once "conexion.php";

class ModeloEmpresas{

	/*=============================================
	CREAR UNIDAD MEDIDA
	=============================================*/

	static public function mdlIngresarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(codigo,descripcion,tipo_dato) VALUES (:codigo,:descripcion,:tipo_dato)");

		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_dato", $datos["tipo_dato"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}    

	/*=============================================
	MOSTRAR TIPO DE PAGO
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
	EDITAR TIPO DE PAGO
	=============================================*/

	static public function mdlEditarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET codigo = :codigo, descripcion = :descripcion WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":codigo", $datos["codigo"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }
	
	
	/*=============================================
	ELIMINAR TIPO DE PAGO
	=============================================*/

	static public function mdlEliminarEmpresa($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

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