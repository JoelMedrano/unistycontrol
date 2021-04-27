 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<?php 
			$idEmpresa= $_SESSION["empresa"];
 			if($idEmpresa == "0"){

				echo'<!-- logo mini -->
				<span class="logo-mini">
				
					
					<img src="vistas/img/plantilla/logo-grande.png" class="img-responsive" style="padding:10px">
		
				</span>
		
				<!-- logo normal -->
		
				<span class="logo-lg">
					
					<img src="vistas/img/plantilla/logo-largo.png" class="img-responsive" style="padding:5px 0px">
		
				</span>';
			 }else{

				$empresas=ControladorEmpresas::ctrMostrarEmpresas("id_empresa",$idEmpresa);

				if($empresas["logo1"] == ""){
					echo'<!-- logo mini -->
					<span class="logo-mini">
					
						
						<img src="vistas/img/plantilla/logo-grande.png" class="img-responsive" style="padding:10px">
			
					</span>
			
					<!-- logo normal -->
			
					<span class="logo-lg">
						
						<img src="vistas/img/plantilla/logo-largo.png" class="img-responsive" style="padding:5px 0px">
			
					</span>';
					
				}else{

					echo'<!-- logo mini -->
					<span class="logo-mini">
					
						
						<img src="'.$empresas["logo1"].'" class="img-responsive" style="padding:10px">
			
					</span>
			
					<!-- logo normal -->
			
					<span class="logo-lg">
						
						<img src="'.$empresas["logo2"].'" class="img-responsive" style="padding:10px 0px">
			
					</span>';
				
				}
			 }
		?>
		

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
						<?php

							if($_SESSION["foto"] != ""){

								echo '<img src="'.$_SESSION["foto"].'" class="img-circle" alt="User Image">';

							}else{


								echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">';

							}


						?>
							
							<p>
							<?php  echo $_SESSION["nombre"]; ?>
							</p>
						</li>
						<!-- Menu Body -->
						<li class="user-body">
							<div class="row">
							<div class="col-xs-4 text-center">
								<a href="#">Miembros</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Nuevos Miembros</a>
							</div>
							<div class="col-xs-4 text-center">
								<a href="#">Miembros caducados</a>
							</div>
							</div>
							<!-- /.row -->
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
							<a href="perfil" class="btn btn-default btn-flat">Perfil</a>
							</div>
							<div class="pull-right">
							<a href="salir" class="btn btn-default btn-flat">Salir</a>
							</div>
						</li>
					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>