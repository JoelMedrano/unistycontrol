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

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tipo_membresia,fecha_inicio,fecha_fin,comprobante,id_usuario,id_miembro) VALUES (:id_tipo_membresia,:fecha_inicio,:fecha_fin,:comprobante,:id_usuario,:id_miembro)");

        $stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);


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

			$stmt = Conexion::conectar()->prepare("SELECT m.*,t.nombre_membresia,mb.nombre_completo FROM $tabla m LEFT JOIN tipo_membresia t ON t.id_tipo_membresia=m.id_tipo_membresia  LEFT JOIN miembros mb ON mb.id_miembro=m.id_miembro WHERE m.$item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT m.*,t.nombre_membresia,mb.nombre_completo FROM $tabla m LEFT JOIN tipo_membresia t ON t.id_tipo_membresia=m.id_tipo_membresia  LEFT JOIN miembros mb ON mb.id_miembro=m.id_miembro");

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

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_tipo_membresia = :id_tipo_membresia,fecha_inicio = :fecha_inicio,fecha_fin = :fecha_fin,comprobante = :comprobante, id_usuario = :id_usuario, id_miembro = :id_miembro WHERE id_membresia = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);

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

	/*=============================================
	CREAR PRECIO MEMBRESIA
	=============================================*/

	static public function mdlIngresarPrecioMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tipo_membresia,nombre_precio_membresia,precio,id_usuario) VALUES (:id_tipo_membresia,:nombre_precio_membresia,:precio,:id_usuario)");

        $stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_precio_membresia", $datos["nombre_precio_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
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
	MOSTRAR PRECIO MEMBRESIAS
	=============================================*/

	static public function mdlMostrarPrecioMembresias($tabla,$item,$valor){

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
	EDITAR PRECIO MEMBRESIA
	=============================================*/

	static public function mdlEditarPrecioMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET id_tipo_membresia = :id_tipo_membresia,nombre_precio_membresia = :nombre_precio_membresia, precio = :precio, id_usuario = :id_usuario WHERE id_precio_membresia = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre_precio_membresia", $datos["nombre_precio_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
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
	ELIMINAR PRECIO MEMBRESIA
	=============================================*/

	static public function mdlEliminarPrecioMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_precio_membresia = :id");

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
	SELECT PARA TIPO DE MEMBRESIAS POR EMPRESA
	=============================================*/

	static public function mdlSelecTipoMembresias($tabla,$empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
			t.*,
			e.nombre 
		  FROM
			$tabla t 
			LEFT JOIN empresa e 
			  ON e.id_empresa = t.id_empresa ");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
			t.*,
			e.nombre 
		  FROM
			$tabla t 
			LEFT JOIN empresa e 
			  ON e.id_empresa = t.id_empresa 
		  WHERE t.id_empresa = '".$empresa."' ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

	/*=============================================
	SELECT PARA PRECIO DE MEMBRESIAS POR EMPRESA
	=============================================*/

	static public function mdlSelecPrecioMembresias($tabla,$empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT 
			p.*,
			t.nombre_membresia,
			t.id_empresa,
			e.nombre as nombre_empresa
		  FROM
			$tabla p 
			LEFT JOIN tipo_membresia t 
			ON t.id_tipo_membresia = p.id_tipo_membresia 
			LEFT JOIN empresa e 
			ON t.id_empresa = e.id_empresa  ");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT 
			p.*,
			t.nombre_membresia,
			t.id_empresa,
			e.nombre as nombre_empresa
		  FROM
			$tabla p 
			LEFT JOIN tipo_membresia t 
			  ON t.id_tipo_membresia = p.id_tipo_membresia
			LEFT JOIN empresa e 
			  ON t.id_empresa = e.id_empresa  
		  WHERE t.id_empresa = '".$empresa."' ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

/*=============================================
	SELECT PARA MEMBRESIAS POR EMPRESA
	=============================================*/

	static public function mdlSelecMembresias($tabla,$empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT m.*,t.nombre_membresia,mb.nombre_completo,e.nombre FROM $tabla m LEFT JOIN tipo_membresia t ON t.id_tipo_membresia=m.id_tipo_membresia  LEFT JOIN miembros mb ON mb.id_miembro=m.id_miembro LEFT JOIN empresa e ON e.id_empresa=t.id_empresa ");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT m.*,t.nombre_membresia,mb.nombre_completo,e.nombre FROM $tabla m LEFT JOIN tipo_membresia t ON t.id_tipo_membresia=m.id_tipo_membresia  LEFT JOIN miembros mb ON mb.id_miembro=m.id_miembro LEFT JOIN empresa e ON e.id_empresa=t.id_empresa WHERE t.id_empresa = '".$empresa."' ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }


	/*=============================================
	MOSTRAR ULTIMO ID DE MEMBRESIA
	=============================================*/

	static public function mdlMostrarUltimoID(){


		$stmt = Conexion::conectar()->prepare("SELECT * FROM membresia ORDER BY id_membresia DESC LIMIT 1");

		$stmt -> execute();

		return $stmt -> fetch();

	
		

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ASIGNAR MIEMBRO
	=============================================*/

	static public function mdlAsignarMiembro($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE miembros SET id_membresia = :id_membresia WHERE id_miembro = :id_miembro");

		$stmt->bindParam(":id_membresia", $datos["id_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

	
    /*=============================================
	RENOVAR MEMBRESIA
	=============================================*/

	static public function mdlRenovarMembresia($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_tipo_membresia,fecha_inicio,fecha_fin,comprobante,id_usuario,id_miembro,estado) VALUES (:id_tipo_membresia,:fecha_inicio,:fecha_fin,:comprobante,:id_usuario,:id_miembro,:estado)");

        $stmt->bindParam(":id_tipo_membresia", $datos["id_tipo_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_inicio", $datos["fecha_inicio"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_fin", $datos["fecha_fin"], PDO::PARAM_STR);
		$stmt->bindParam(":comprobante", $datos["comprobante"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}    
	
	/*=============================================
	ASIGNAR DESTINO
	=============================================*/

	static public function mdlAsignarDestino($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE membresia SET destino = :destino WHERE id_membresia = :id_membresia");

		$stmt->bindParam(":id_membresia", $datos["id_membresia"], PDO::PARAM_STR);
		$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

	/*=============================================
	ASIGNAR MIEMBRO
	=============================================*/

	static public function mdlAsignarCodigo($datos){

		$stmt = Conexion::conectar()->prepare("UPDATE miembros SET codigo_activador = :codigo_activador WHERE id_miembro = :id_miembro");

		$stmt->bindParam(":codigo_activador", $datos["codigo_activador"], PDO::PARAM_STR);
		$stmt->bindParam(":id_miembro", $datos["id_miembro"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

    }

	/*=============================================
	SELECT PARA MEMBRESIAS POR EMPRESA PARA APUESTAS
	=============================================*/

	static public function mdlSelecMembresiasApuestas($tabla,$empresa){

		if($empresa == "0"){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_membresia");


			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tipo_membresia WHERE id_empresa= $empresa");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

    }

}