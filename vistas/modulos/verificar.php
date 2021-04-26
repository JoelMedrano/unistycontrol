<!--=====================================
VERIFICAR
======================================-->

<?php

	$usuarioVerificado = false;
	
	$item = "codigo_activador";
	$valor =  $_GET["id"];

	$respuesta = ControladorMiembros::ctrMostrarMiembros($item, $valor);
	

	if($valor == $respuesta["codigo_activador"]){

		$item1="estado";
		$valor1 = 1;
		$item2="id_miembro";
		$valor2 = $respuesta["id"];

		$respuesta2 = ControladorMiembros::ctrActualizarMiembro2($item1,$valor1, $item2, $valor2);
		


		if($respuesta2 == "ok"){

			$usuarioVerificado = true;

		}

	}
		

?>

<div class="container box">
	
	<div class="row box-body">
	 
		<div class="col-xs-12 text-center verificar">
			
			<?php

				if($usuarioVerificado){

					echo '<h3>Gracias</h3>
						<h2><small>¡Hemos verificado a su miembro, ya puede verificarlo!</small></h2>

						<br>

						<a href="https://unistycontrol.com/" ><button class="btn btn-default backColor btn-lg">INGRESAR</button></a>';
				

				}else{

					echo '<h3>Error</h3>

					<h2><small>¡No se ha podido verificar a su miembro,  vuelva a registrarse!</small></h2>
					
					<a href="https://unistycontrol.com/" ><button class="btn btn-default backColor btn-lg">INGRESAR</button></a>';



				}

			?>

		</div>

	</div>

</div>

