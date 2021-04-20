<?php

require_once "conexion.php";

class ModeloMembresias{

	/*=============================================
	CREAR TIPO MEMBRESIA
	=============================================*/

	static public function mdlIngresarTipoMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_empresa,nombre_membresia,id_usuario) VALUES (:id_empresa,:nombre_membresia,:id_usuario)");

        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_membresia", $datos["nombre_membresia"], PDO::PARAM_STR);
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
	MOSTRAR TIPO MEMBRESIAS
	=============================================*/

	static public function mdlMostrarTipoMembresias($tabla,$item,$valor){

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
	EDITAR TIPO MEMBRESIA
	=============================================*/

	static public function mdlEditarTipoMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_empresa = :id_empresa,nombre_membresia = :nombre_membresia, id_usuario = :id_usuario WHERE id_tipo_membresia = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_membresia", $datos["nombre_membresia"], PDO::PARAM_STR);
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
	ELIMINAR TIPO MEMBRESIA
	=============================================*/

	static public function mdlEliminarTipoMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_membresia = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}    



    /*=============================================
	CREAR MEMBRESIA
	=============================================*/

	static public function mdlIngresarMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tipo_membresia,fecha_inicio,fecha_fin,comprobante,estado,id_usuario) VALUES (:id_tipo_membresia,:fecha_inicio,:fecha_fin,:comprobante,:estado,:id_usuario)");

        $stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_empresa", $datos["nombre_empresa"], PDO::PARAM_STR);
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
	MOSTRAR MEMBRESIAS
	=============================================*/

	static public function mdlMostrarMembresias($tabla,$item,$valor){

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
	EDITAR MEMBRESIA
	=============================================*/

	static public function mdlEditarMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_empresa = :id_empresa,nombre_empresa = :nombre_empresa, id_usuario = :id_usuario WHERE id_tipo_membresia = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_empresa", $datos["id_empresa"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_empresa", $datos["nombre_empresa"], PDO::PARAM_STR);
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
	ELIMINAR  MEMBRESIA
	=============================================*/

	static public function mdlEliminarMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_membresia = :id");

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